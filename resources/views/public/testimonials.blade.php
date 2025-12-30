 <style> 
        header h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        /* Buttons */
        .btn { padding: 10px 20px; border-radius: 5px; text-decoration: none; cursor: pointer; border: none; font-size: 14px; font-weight: 600; }
        .btn-google { background-color: #DB4437; color: white; display: inline-flex; align-items: center; gap: 10px; }
        .btn-google:hover { background-color: #c53929; }
        .btn-primary { background-color: #3498db; color: white; }
        .btn-logout { background-color: #95a5a6; color: white; }

        /* Form Section */
        #post-review-section { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 30px; display: none; }
        textarea { width: 100%; height: 80px; padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; font-family: inherit; }
        select { padding: 8px; border: 1px solid #ddd; border-radius: 4px; margin-right: 10px; }

        /* Review Cards */
        .review-card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); margin-bottom: 15px; display: flex; gap: 15px; }
        .user-avatar { width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 2px solid #eef2f7; }
        .review-content { flex: 1; }
        .review-header { display: flex; justify-content: space-between; margin-bottom: 5px; }
        .user-name { font-weight: bold; color: #2c3e50; }
        .rating { color: #f1c40f; }
        .timestamp { font-size: 0.8em; color: #95a5a6; }
        
        /* Loading State */
        .loading { text-align: center; color: #7f8c8d; padding: 20px; }
    </style>
    <header>
        <h1>Community Reviews</h1>
        <div id="auth-container">
            </div>
    </header>

    <div id="post-review-section">
        <h3 style="margin-top:0;">Write a Review</h3>
        <form id="testimonial-form">
            <textarea id="content" placeholder="Share your experience with Keeper Library..." required></textarea>
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <label style="font-size: 0.9em; color: #666;">Rating:</label>
                    <select id="rating">
                        <option value="5">★★★★★ (5 Stars)</option>
                        <option value="4">★★★★☆ (4 Stars)</option>
                        <option value="3">★★★☆☆ (3 Stars)</option>
                        <option value="2">★★☆☆☆ (2 Stars)</option>
                        <option value="1">★☆☆☆☆ (1 Star)</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Post Review</button>
            </div>
        </form>
    </div>

    <div id="testimonials-list">
        <div class="loading">Loading reviews...</div>
    </div>

    <script>
        // CONFIGURATION
        const BACKEND_URL = 'https://keeper.ccs-octa.com'; 
        const API_URL = `${BACKEND_URL}/api`;

        // STATE
        let token = localStorage.getItem('api_token');
        let currentUser = null;

        // INITIALIZATION
        document.addEventListener('DOMContentLoaded', async () => {
            handleAuthRedirect();
            await fetchUserProfile(); 
            updateUI();
            fetchTestimonials();
        });

        // 1. Handle Google Redirect (Extract token from URL)
        function handleAuthRedirect() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('token')) {
                token = urlParams.get('token');
                localStorage.setItem('api_token', token);
                // Clean URL to remove token
                window.history.replaceState({}, document.title, window.location.pathname);
            }
        }

        // 2. Fetch User Profile (Verify token is valid)
        async function fetchUserProfile() {
            if (!token) return;

            try {
                const res = await fetch(`${API_URL}/auth/me`, {
                    headers: { 'Authorization': `Bearer ${token}` }
                });

                if (res.ok) {
                    currentUser = await res.json();
                } else {
                    // Token invalid/expired
                    logout(); 
                }
            } catch (error) {
                console.error("Auth check failed:", error);
            }
        }

        // 3. Update UI based on Auth State
        function updateUI() {
            const authContainer = document.getElementById('auth-container');
            const postSection = document.getElementById('post-review-section');

            if (currentUser) {
                // Logged In
                authContainer.innerHTML = `
                    <div style="display:flex; align-items:center; gap:10px;">
                        <img src="${currentUser.avatar || 'https://via.placeholder.com/30'}" style="width:30px; height:30px; border-radius:50%;">
                        <span style="font-size:0.9em; font-weight:bold;">${currentUser.name}</span>
                        <button onclick="logout()" class="btn btn-logout" style="padding: 5px 10px; font-size: 0.8em;">Logout</button>
                    </div>
                `;
                postSection.style.display = 'block';
            } else {
                // Guest
                authContainer.innerHTML = `
                    <a href="${API_URL}/auth/google" class="btn btn-google">
                        <span>Sign in with Google</span>
                    </a>
                `;
                postSection.style.display = 'none';
            }
        }

        // 4. Fetch Public Testimonials
        async function fetchTestimonials() {
            const container = document.getElementById('testimonials-list');
            
            try {
                const res = await fetch(`${API_URL}/testimonials`);
                const data = await res.json();

                if (data.length === 0) {
                    container.innerHTML = '<div class="loading">No reviews yet. Be the first!</div>';
                    return;
                }

                container.innerHTML = data.map(t => `
                    <div class="review-card">
                        <img src="${t.user.avatar || 'https://ui-avatars.com/api/?name='+t.user.name}" class="user-avatar" alt="${t.user.name}">
                        <div class="review-content">
                            <div class="review-header">
                                <span class="user-name">${t.user.name}</span>
                                <span class="rating">${'★'.repeat(t.rating)}${'☆'.repeat(5-t.rating)}</span>
                            </div>
                            <p style="margin: 5px 0; color: #555;">${t.content}</p>
                            <span class="timestamp">${new Date(t.created_at).toLocaleDateString()}</span>
                            ${currentUser && currentUser.id === t.user_id ? 
                                `<button onclick="deleteReview(${t.id})" style="color:red; background:none; border:none; cursor:pointer; font-size:0.8em; float:right;">Delete</button>` 
                                : ''}
                        </div>
                    </div>
                `).join('');

            } catch (error) {
                container.innerHTML = '<div class="loading" style="color:red;">Failed to load reviews. Is the backend running?</div>';
                console.error(error);
            }
        }

        // 5. Post New Review
        document.getElementById('testimonial-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button');
            const originalText = btn.innerText;
            btn.innerText = "Posting...";
            btn.disabled = true;

            const content = document.getElementById('content').value;
            const rating = document.getElementById('rating').value;

            try {
                const res = await fetch(`${API_URL}/testimonials`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    body: JSON.stringify({ content, rating })
                });

                if (res.ok) {
                    document.getElementById('content').value = ''; // Clear form
                    fetchTestimonials(); // Refresh list
                    alert('Review posted successfully!');
                } else {
                    const err = await res.json();
                    alert('Error: ' + (err.message || 'Could not post review'));
                }
            } catch (error) {
                alert('Network error occurred.');
            } finally {
                btn.innerText = originalText;
                btn.disabled = false;
            }
        });

        // 6. Delete Review
        async function deleteReview(id) {
            if(!confirm("Are you sure you want to delete this review?")) return;

            try {
                const res = await fetch(`${API_URL}/testimonials/${id}`, {
                    method: 'DELETE',
                    headers: { 'Authorization': `Bearer ${token}` }
                });

                if (res.ok) {
                    fetchTestimonials();
                } else {
                    alert("Could not delete review.");
                }
            } catch (error) {
                alert("Network error.");
            }
        }

        // 7. Logout
        function logout() {
            localStorage.removeItem('api_token');
            token = null;
            currentUser = null;
            updateUI();
            // Optional: reload to clear any state
            // location.reload();
        }
    </script>