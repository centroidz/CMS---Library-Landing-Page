// CONFIGURATION
const API_URL = 'https://keeper.ccs-octa.com/api';

// STATE
let token = localStorage.getItem('api_token');
let currentUser = null;

// 1. GLOBAL INITIALIZATION
window.initTestimonials = async function() {
    console.log("Initializing Testimonials System...");
    
    // Clean up URL if we just logged out (prevents the infinite loop)
    if (!token && window.location.search.includes('token=')) {
        const url = new URL(window.location.href);
        url.searchParams.delete('token');
        window.history.replaceState({}, document.title, url.pathname);
    }

    handleAuthRedirect();
    await checkUserSession();
    fetchTestimonials();
};

// 2. Handle Login Redirect
function handleAuthRedirect() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('token')) {
        token = urlParams.get('token');
        localStorage.setItem('api_token', token);
        // Clean URL so a refresh doesn't re-trigger this
        window.history.replaceState({}, document.title, window.location.pathname);
    }
}

// 3. Check User Session
async function checkUserSession() {
    if (!token) { 
        renderAuthUI(); 
        return; 
    }

    try {
        const res = await fetch(`${API_URL}/auth/me`, {
            headers: { 
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json'
            }
        });
        
        if (res.ok) {
            currentUser = await res.json();
        } else {
            // Token is invalid/expired - Clear it silently
            console.warn("Token expired");
            localStorage.removeItem('api_token');
            token = null;
        }
    } catch (e) { 
        console.error("Auth check failed", e); 
    }
    renderAuthUI();
}

// 4. Render UI
function renderAuthUI() {
    const container = document.getElementById('auth-buttons');
    const formContainer = document.getElementById('review-form-container');

    if (!container) return; // Stop if HTML isn't ready

    if (currentUser) {
        // LOGGED IN VIEW
        container.innerHTML = `
            <div class="d-flex align-items-center justify-content-center gap-3">
                <img src="${currentUser.avatar || 'https://via.placeholder.com/40'}" class="rounded-circle" width="40" height="40" style="object-fit:cover;">
                <span class="fw-bold" style="color: #1C54E4;">Hi, ${currentUser.name.split(' ')[0]}!</span>
                <button id="btn-show-review" class="btn btn-outline-primary rounded-pill btn-sm">Write Review</button>
                <button onclick="logout()" class="btn btn-link text-muted btn-sm text-decoration-none">Logout</button>
            </div>
        `;

        // Attach event listener manually to the new button
        document.getElementById('btn-show-review').addEventListener('click', function() {
            if(formContainer) formContainer.style.display = 'flex';
        });

        if(formContainer) formContainer.style.display = 'none'; 
    } else {
        // GUEST VIEW
        if(formContainer) formContainer.style.display = 'none';
        container.innerHTML = `
            <a href="${API_URL}/auth/google?redirect_to=${window.location.href}" class="btn px-4 py-2 rounded-pill shadow-sm text-white" style="background-color: #DB4437; font-weight: 500;">
                <i class="bi bi-google me-2"></i> Sign in to Review
            </a>
        `;
    }
}

// 5. Fetch Testimonials (With Error Recovery)
async function fetchTestimonials() {
    const track = document.getElementById('testimonials-track');
    if (!track) return;

    try {
        const res = await fetch(`${API_URL}/testimonials`);
        
        if (!res.ok) throw new Error(`API Error: ${res.status}`);
        
        const data = await res.json();

        if (data.length === 0) {
            track.innerHTML = `<div class="text-center text-muted py-5">No reviews yet. Be the first!</div>`;
            return;
        }

        // Clear loading spinner
        track.innerHTML = '';

        const chunkSize = 3;
        for (let i = 0; i < data.length; i += chunkSize) {
            const chunk = data.slice(i, i + chunkSize);
            const isActive = (i === 0) ? 'active' : '';

            const slideItem = document.createElement('div');
            slideItem.className = `carousel-item ${isActive}`;
            
            let rowHtml = '<div class="row g-4">';
            rowHtml += chunk.map(t => `
                <div class="col-md-4">
                    <div class="bg-white rounded-4 shadow-sm p-4 h-100 position-relative">
                        ${currentUser && currentUser.id === t.user_id ? 
                            `<button onclick="deleteReview(${t.id})" class="btn btn-sm text-danger position-absolute top-0 end-0 m-3" style="z-index:10; font-weight:bold; font-size:1.2rem;">&times;</button>` 
                            : ''}
                        <div class="mb-4">
                            <div class="text-warning mb-2 small">${'★'.repeat(t.rating)}${'☆'.repeat(5-t.rating)}</div>
                            <p class="text-muted">"${t.content}"</p>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-auto">
                            <div style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 3px; width: 56px; height: 56px; flex-shrink: 0;">
                                <img src="${t.user.avatar || 'https://ui-avatars.com/api/?name='+t.user.name}" class="rounded-circle" style="width: 46px; height: 46px; object-fit: cover;">
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: #1C54E4;">${t.user.name}</h6>
                                <small class="text-muted" style="font-size: 0.8rem;">${new Date(t.created_at).toLocaleDateString()}</small>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
            
            rowHtml += '</div>';
            slideItem.innerHTML = rowHtml;
            track.appendChild(slideItem);
        }

    } catch (error) {
        console.error("Fetch Error:", error);
        // Important: Remove the spinner so the user isn't stuck "loading"
        track.innerHTML = '<div class="text-center text-danger py-5">Unable to load reviews at this time.</div>';
    }
}

// 6. FORM SUBMISSION (Corrected Event Listener)
// Use specific target check to ensure we catch the submit event
document.addEventListener('submit', async (e) => {
    // Check if the event target is our form
    if (e.target && e.target.id === 'testimonial-form') {
        e.preventDefault();
        
        const contentEl = document.getElementById('review-content');
        const ratingEl = document.getElementById('review-rating');
        const btn = e.target.querySelector('button[type="submit"]');

        if (!token) {
            alert("You are not logged in.");
            return;
        }

        const originalBtnText = btn.innerText;
        btn.disabled = true;
        btn.innerText = "Posting...";

        try {
            const res = await fetch(`${API_URL}/testimonials`, {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json', 
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ 
                    content: contentEl.value, 
                    rating: ratingEl.value 
                })
            });

            const responseData = await res.json();

            if (res.ok) {
                contentEl.value = ''; // Clear text
                document.getElementById('review-form-container').style.display = 'none'; // Hide form
                await fetchTestimonials(); // Refresh the list
                alert('Review posted successfully!');
            } else {
                alert('Error: ' + (responseData.message || 'Could not post review'));
            }
        } catch (err) {
            console.error(err);
            alert('Network error occurred.');
        } finally {
            btn.disabled = false;
            btn.innerText = originalBtnText;
        }
    }
});

// 7. GLOBAL ACTIONS
window.logout = function() {
    localStorage.removeItem('api_token');
    // Redirect to the CLEAN URL (removes ?token=... parameters)
    window.location.href = window.location.pathname; 
}

window.deleteReview = async function(id) {
    if(!confirm("Are you sure you want to delete this review?")) return;
    
    try {
        const res = await fetch(`${API_URL}/testimonials/${id}`, {
            method: 'DELETE',
            headers: { 
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json' 
            }
        });

        if(res.ok) {
            fetchTestimonials();
        } else {
            alert("Failed to delete review.");
        }
    } catch(e) {
        alert("Network error.");
    }
}