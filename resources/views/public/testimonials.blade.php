<section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold display-5 mb-3">Testimonials</h2>
            <p class="text-muted lead">See what others are saying about the Keeper Library</p>

            <div id="auth-buttons" class="mt-4">
            </div>
        </div>

        <div id="review-form-container" class="row justify-content-center mb-5" style="display: none;">
            <div class="col-md-8">
                <div class="bg-white rounded-4 shadow-sm p-4 border border-light">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0" id="form-title">Write a Review</h5>
                        <button type="button" class="btn-close" onclick="closeForm()" aria-label="Close"></button>
                    </div>
                    
                    <form id="testimonial-form">
                        <input type="hidden" id="edit-id" value="">

                        <div class="mb-3">
                            <textarea id="review-content" class="form-control bg-light border-0" rows="3"
                                placeholder="Share your experience..." required></textarea>
                        </div>
                        <div class="d-flex align-items-center justify-content-between gap-2">
                            <select id="review-rating" class="form-select w-auto border-0 bg-light"
                                style="font-weight: bold;">
                                <option value="5">★★★★★ 5 Stars</option>
                                <option value="4">★★★★☆ 4 Stars</option>
                                <option value="3">★★★☆☆ 3 Stars</option>
                                <option value="2">★★☆☆☆ 2 Stars</option>
                                <option value="1">★☆☆☆☆ 1 Star</option>
                            </select>
                            
                            <div class="d-flex gap-2">
                                <button type="button" id="btn-cancel-edit" class="btn btn-secondary rounded-pill px-3" 
                                    style="display: none;" onclick="resetForm()">Cancel</button>
                                <button type="submit" id="btn-submit" class="btn text-white px-4 rounded-pill"
                                    style="background-color: var(--text-main, #0d6efd);">Post Review</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="8000">
            <div class="carousel-inner" id="testimonials-track">
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="text-muted mt-2">Loading reviews...</p>
                </div>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                data-bs-slide="prev" style="left: -50px;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                data-bs-slide="next" style="right: -50px;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</section>

<style>
    /* Styling for the Edit/Delete buttons on the card */
    .card-actions {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 10;
        display: flex;
        gap: 5px;
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: var(--text-main, #0d6efd);
        border-radius: 50%;
        background-size: 60%;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
        opacity: 0.8;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        opacity: 1;
    }
</style>

<script>
    // CONFIGURATION
    const API_URL = 'https://keeper.ccs-octa.com/api'; // Or your production URL
    
    // STATE
    let token = localStorage.getItem('api_token');
    let currentUser = null;

    // document.addEventListener('DOMContentLoaded', async () => {
    //     handleAuthRedirect();
    //     await checkUserSession();
    //     fetchTestimonials();
    //     alert('sa');
    // });

    document.addEventListener('DOMContentLoaded', () => {
        initTestimonials();
    } else {
        document.addEventListener('DOMContentLoaded', initTestimonials);
    }

    // 1. Auth & Token Handling
    function handleAuthRedirect() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('token')) {
            token = urlParams.get('token');
            localStorage.setItem('api_token', token);
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    }

    async function checkUserSession() {
        if (!token) { renderAuthUI(); return; }
        try {
            const res = await fetch(`${API_URL}/auth/me`, {
                headers: { 'Authorization': `Bearer ${token}` }
            });
            if (res.ok) {
                currentUser = await res.json();
            } else {
                logout(); 
            }
        } catch (e) { console.error(e); }
        renderAuthUI();
    }

    function renderAuthUI() {
        const container = document.getElementById('auth-buttons');
        const formContainer = document.getElementById('review-form-container');

        if (currentUser) {
            container.innerHTML = `
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <img src="${currentUser.avatar || 'https://via.placeholder.com/40'}" class="rounded-circle" width="40" height="40">
                    <span class="fw-bold">Hi, ${currentUser.name.split(' ')[0]}!</span>
                    <button onclick="openCreateForm()" class="btn btn-outline-primary rounded-pill btn-sm">Write Review</button>
                    <button onclick="logout()" class="btn btn-link text-muted btn-sm text-decoration-none">Logout</button>
                </div>
            `;
        } else {
            formContainer.style.display = 'none';
            container.innerHTML = `
                <a href="${API_URL}/auth/google?redirect_to=${window.location.href}" class="btn px-4 py-2 rounded-pill shadow-sm text-white" style="background-color: #DB4437; font-weight: 500;">
                    <i class="bi bi-google me-2"></i> Sign in to Review
                </a>
            `;
        }
    }

    // 2. Fetching Data
    async function fetchTestimonials() {
        try {
            const res = await fetch(`${API_URL}/testimonials`);
            const data = await res.json();
            const track = document.getElementById('testimonials-track');

            if (data.length === 0) {
                track.innerHTML = `<div class="text-center text-muted py-5">No reviews yet. Be the first!</div>`;
                return;
            }

            track.innerHTML = '';
            const chunkSize = 3;
            
            for (let i = 0; i < data.length; i += chunkSize) {
                const chunk = data.slice(i, i + chunkSize);
                const isActive = (i === 0) ? 'active' : '';

                const slideItem = document.createElement('div');
                slideItem.className = `carousel-item ${isActive}`;

                let rowHtml = '<div class="row g-4">';
                rowHtml += chunk.map(t => {
                    // ESCAPE strings to safely pass to JS function
                    const safeContent = t.content.replace(/'/g, "\\'").replace(/"/g, '&quot;');
                    
                    const actionsHtml = (currentUser && currentUser.id === t.user_id) ? `
                        <div class="card-actions">
                            <button onclick="editReview(${t.id}, '${safeContent}', ${t.rating})" 
                                    class="btn btn-sm btn-light border text-primary rounded-circle shadow-sm" 
                                    style="width:32px; height:32px; padding:0;" title="Edit">
                                <i class="bi bi-pencil-fill" style="font-size: 0.8rem;"></i>
                            </button>
                            <button onclick="deleteReview(${t.id})" 
                                    class="btn btn-sm btn-light border text-danger rounded-circle shadow-sm" 
                                    style="width:32px; height:32px; padding:0;" title="Delete">
                                <i class="bi bi-trash-fill" style="font-size: 0.8rem;"></i>
                            </button>
                        </div>` : '';

                    return `
                    <div class="col-md-4">
                        <div class="bg-white rounded-4 shadow-sm p-4 h-100 position-relative">
                            ${actionsHtml}
                            <div class="mb-4">
                                <div class="text-warning mb-2 small">${'★'.repeat(t.rating)}${'☆'.repeat(5 - t.rating)}</div>
                                <p class="text-muted">"${t.content}"</p>
                            </div>
                            <div class="d-flex align-items-center gap-3 mt-auto">
                                <div style="border: 2px dashed var(--text-main, #0d6efd); border-radius: 50%; padding: 3px; width: 56px; height: 56px; flex-shrink: 0;">
                                    <img src="${t.user.avatar || 'https://ui-avatars.com/api/?name=' + t.user.name}" class="rounded-circle" style="width: 46px; height: 46px; object-fit: cover;">
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0" style="color: var(--text-main, #0d6efd);">${t.user.name}</h6>
                                    <small class="text-muted" style="font-size: 0.8rem;">${new Date(t.created_at).toLocaleDateString()}</small>
                                </div>
                            </div>
                        </div>
                    </div>`;
                }).join('');

                rowHtml += '</div>';
                slideItem.innerHTML = rowHtml;
                track.appendChild(slideItem);
            }

        } catch (error) {
            console.error(error);
            document.getElementById('testimonials-track').innerHTML = '<div class="text-center text-danger py-5">Failed to load reviews.</div>';
        }
    }

    // 3. Form Handling (Create & Edit)
    document.getElementById('testimonial-form').addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const id = document.getElementById('edit-id').value; // Check if editing
        const content = document.getElementById('review-content').value;
        const rating = document.getElementById('review-rating').value;
        const btn = document.getElementById('btn-submit');

        btn.disabled = true;
        btn.innerText = id ? "Updating..." : "Posting...";

        // Determine URL and Method
        const url = id ? `${API_URL}/testimonials/${id}` : `${API_URL}/testimonials`;
        const method = id ? 'PUT' : 'POST';

        try {
            const res = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({ content, rating })
            });

            if (res.ok) {
                resetForm();
                closeForm();
                await fetchTestimonials();
                alert(id ? 'Review updated!' : 'Review posted!');
            } else {
                const errData = await res.json();
                alert('Error: ' + (errData.message || 'Something went wrong'));
            }
        } catch (err) {
            alert('Network error.');
        }

        btn.disabled = false;
        btn.innerText = id ? "Update Review" : "Post Review";
    });

    // 4. UI Helper Functions
    window.openCreateForm = function() {
        resetForm();
        document.getElementById('review-form-container').style.display = 'flex';
        // Scroll to form
        document.getElementById('review-form-container').scrollIntoView({ behavior: 'smooth' });
    }

    window.closeForm = function() {
        document.getElementById('review-form-container').style.display = 'none';
        resetForm();
    }

    // Triggered by the Pencil Icon
    window.editReview = function(id, content, rating) {
        document.getElementById('review-form-container').style.display = 'flex';
        
        // Populate fields
        document.getElementById('edit-id').value = id;
        document.getElementById('review-content').value = content;
        document.getElementById('review-rating').value = rating;

        // Change UI to Edit Mode
        document.getElementById('form-title').innerText = "Edit Your Review";
        document.getElementById('btn-submit').innerText = "Update Review";
        document.getElementById('btn-cancel-edit').style.display = 'block';

        // Scroll to form
        document.getElementById('review-form-container').scrollIntoView({ behavior: 'smooth' });
    }

    window.resetForm = function() {
        document.getElementById('edit-id').value = '';
        document.getElementById('review-content').value = '';
        document.getElementById('review-rating').value = '5';
        
        // Reset UI to Create Mode
        document.getElementById('form-title').innerText = "Write a Review";
        document.getElementById('btn-submit').innerText = "Post Review";
        document.getElementById('btn-cancel-edit').style.display = 'none';
    }

    // 5. Delete Logic
    window.deleteReview = async function(id) {
        if (!confirm("Are you sure you want to delete this review?")) return;
        try {
            await fetch(`${API_URL}/testimonials/${id}`, {
                method: 'DELETE',
                headers: { 'Authorization': `Bearer ${token}` }
            });
            fetchTestimonials();
        } catch (e) { alert("Network error"); }
    }

    window.logout = function() {
        localStorage.removeItem('api_token');
        window.location.href = window.location.pathname; 
    }
</script>