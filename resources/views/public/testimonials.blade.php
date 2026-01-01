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
                <div class="bg-white rounded-4 shadow-sm p-4">
                    <h5 class="fw-bold mb-3">Write a Review</h5>
                    <form id="testimonial-form">
                        <div class="mb-3">
                            <textarea id="review-content" class="form-control bg-light border-0" rows="3"
                                placeholder="Share your experience..." required></textarea>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <select id="review-rating" class="form-select w-auto border-0 bg-light"
                                style="font-weight: bold;">
                                <option value="5">★★★★★ 5 Stars</option>
                                <option value="4">★★★★☆ 4 Stars</option>
                                <option value="3">★★★☆☆ 3 Stars</option>
                                <option value="2">★★☆☆☆ 2 Stars</option>
                                <option value="1">★☆☆☆☆ 1 Star</option>
                            </select>
                            <button type="submit" class="btn text-white px-4 rounded-pill"
                                style="background-color: var(--text-main);">Post Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

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
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: var(--text-main);
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
    // const API_URL = 'https://keeper.ccs-octa.com/api';
    const API_URL = 'http://127.0.0.1:8000/api';
    // STATE
    let token = localStorage.getItem('api_token');
    let currentUser = null;

    // document.addEventListener('DOMContentLoaded', async () => {
    //     handleAuthRedirect();
    //     await checkUserSession();
    //     fetchTestimonials();
    //     alert('sa');
    // });

    /* --- Replace your existing DOMContentLoaded block with this --- */
    window.initTestimonials = async function () {
        console.log("Initializing Testimonials...");
        handleAuthRedirect();
        await checkUserSession();
        await fetchTestimonials();
    };

    // This handles the "Admin Preview" (where the page loads normally)
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        initTestimonials();
    } else {
        document.addEventListener('DOMContentLoaded', initTestimonials);
    }

    // 1. Handle Login Redirect
    function handleAuthRedirect() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('token')) {
            token = urlParams.get('token');
            localStorage.setItem('api_token', token);
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    }

    // 2. Check User Session
    async function checkUserSession() {
        if (!token) {
            renderAuthUI();
            return;
        }

        try {
            const res = await fetch(`${API_URL}/auth/me`, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            });
            if (res.ok) {
                currentUser = await res.json();
            } else {
                logout(); // Token expired
            }
        } catch (e) {
            console.error(e);
        }
        renderAuthUI();
    }

    // 3. Render Buttons based on Login State
    function renderAuthUI() {
        const container = document.getElementById('auth-buttons');
        const formContainer = document.getElementById('review-form-container');

        if (currentUser) {
            // Logged In
            container.innerHTML = `
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <img src="${currentUser.avatar || 'https://via.placeholder.com/40'}" class="rounded-circle" width="40" height="40">
                    <span class="fw-bold">Hi, ${currentUser.name.split(' ')[0]}!</span>
                    <button onclick="document.getElementById('review-form-container').style.display='flex'" class="btn btn-outline-primary rounded-pill btn-sm">Write Review</button>
                    <button onclick="logout()" class="btn btn-link text-muted btn-sm text-decoration-none">Logout</button>
                </div>
            `;
        } else {
            // Guest
            formContainer.style.display = 'none';
            container.innerHTML = `
                <a href="${API_URL}/auth/google?redirect_to=${window.location.href}" class="btn px-4 py-2 rounded-pill shadow-sm text-white" style="background-color: #DB4437; font-weight: 500;">
                    <i class="bi bi-google me-2"></i> Sign in to Review
                </a>
            `;
        }
    }

    // 4. Fetch and Render Testimonials
    // 4. Fetch and Render Testimonials (Carousel Version)
    async function fetchTestimonials() {
        try {
            const res = await fetch(`${API_URL}/testimonials`);
            const data = await res.json();
            const track = document.getElementById('testimonials-track');

            if (data.length === 0) {
                track.innerHTML = `<div class="text-center text-muted py-5">No reviews yet. Be the first!</div>`;
                return;
            }

            // Clear loading spinner
            track.innerHTML = '';

            // LOGIC: Chunk data into groups of 3
            const chunkSize = 3;
            for (let i = 0; i < data.length; i += chunkSize) {
                const chunk = data.slice(i, i + chunkSize);

                // First item must be active
                const isActive = (i === 0) ? 'active' : '';

                // Create Slide Item
                const slideItem = document.createElement('div');
                slideItem.className = `carousel-item ${isActive}`;

                // Create Row for the 3 Cards
                let rowHtml = '<div class="row g-4">';

                // Map the 3 (or fewer) cards inside this slide
                rowHtml += chunk.map(t => `
                    <div class="col-md-4">
                        <div class="bg-white rounded-4 shadow-sm p-4 h-100 position-relative">

                            ${currentUser && currentUser.id === t.user_id ?
                        `<button onclick="deleteReview(${t.id})" class="btn btn-sm text-danger position-absolute top-0 end-0 m-3" style="z-index:10;" title="Delete Review">✕</button>`
                        : ''}

                            <div class="mb-4">
                                <div class="text-warning mb-2 small">${'★'.repeat(t.rating)}${'☆'.repeat(5 - t.rating)}</div>
                                <p class="text-muted">"${t.content}"</p>
                            </div>

                            <div class="d-flex align-items-center gap-3 mt-auto">
                                <div style="border: 2px dashed var(--text-main); border-radius: 50%; padding: 3px; width: 56px; height: 56px; flex-shrink: 0;">
                                    <img src="${t.user.avatar || 'https://ui-avatars.com/api/?name=' + t.user.name}" class="rounded-circle" style="width: 46px; height: 46px; object-fit: cover;">
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0" style="color: var(--text-main);">${t.user.name}</h6>
                                    <small class="text-muted" style="font-size: 0.8rem;">${new Date(t.created_at).toLocaleDateString()}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                `).join('');

                rowHtml += '</div>'; // Close Row
                slideItem.innerHTML = rowHtml;
                track.appendChild(slideItem);
            }

        } catch (error) {
            console.error(error);
            document.getElementById('testimonials-track').innerHTML = '<div class="text-center text-danger py-5">Failed to load reviews.</div>';
        }
    }

    // 5. Submit Review
    document.getElementById('testimonial-form').addEventListener('submit', async (e) => {
        e.preventDefault();
        const content = document.getElementById('review-content').value;
        const rating = document.getElementById('review-rating').value;
        const btn = e.target.querySelector('button');

        btn.disabled = true;
        btn.innerText = "Posting...";

        try {
            const res = await fetch(`${API_URL}/testimonials`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({
                    content,
                    rating
                })
            });

            if (res.ok) {
                document.getElementById('review-content').value = '';
                document.getElementById('review-form-container').style.display = 'none'; // Hide form
                fetchTestimonials(); // Refresh grid
                alert('Review posted!');
            } else {
                alert('Error posting review.');
            }
        } catch (err) {
            alert('Network error.');
        }

        btn.disabled = false;
        btn.innerText = "Post Review";
    });

    // 6. Logout
    function logout() {
        localStorage.removeItem('api_token');
        window.location.href = 'https://keeperlibrary.online';
    }

    // 7. Delete
    async function deleteReview(id) {
        if (!confirm("Delete this review?")) return;
        await fetch(`${API_URL}/testimonials/${id}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });
        fetchTestimonials();
    }
</script>