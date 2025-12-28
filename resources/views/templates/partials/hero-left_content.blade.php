<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Column: Text Content -->
            <div class="col-lg-6">
                <span class="section-tag">Digital Library Platform</span>
                <h1 class="display-3 mb-4">
                    Lorem ipsum dolor sit amet consectetur
                </h1>
                <p class="lead text-muted mb-5" style="line-height: 1.6;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                </p>
                <div class="d-flex gap-3 align-items-center">
                    <!-- ONLY ONE Get Started Button (GREEN gradient) -->
                    <button class="btn-get-started-under">
                        <i class="bi bi-rocket-takeoff me-2"></i> Get Started
                    </button>
                </div>
            </div>
            
            <!-- Right Column: Image -->
            <div class="col-lg-6">
                <div class="floating-image">
                    <div class="hero-img-container">
                        @if(!empty($image))
                            <img src="{{ asset('storage/' . $image) }}" alt="Hero" class="img-fluid">
                        @else
                            <div style="background: var(--primary-gradient); display: flex; align-items: center; justify-content: center; height: 100%; min-height: 400px;">
                                <i class="bi bi-book-half text-white" style="font-size: 10rem; opacity: 0.15;"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* ===== Get Started Button ===== */
.btn-get-started-under {
    background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
    color: white;
    border: none;
    padding: 14px 40px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    display: inline-block;
}

.btn-get-started-under:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(16, 185, 129, 0.4);
    color: white;
}

.btn-get-started-under::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.btn-get-started-under:hover::before {
    left: 100%;
}

/* Floating animation for image */
.floating-image {
    animation: floating 6s ease-in-out infinite;
}

@keyframes floating {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

/* Responsive adjustments for buttons */
@media (max-width: 768px) {
    .d-flex.gap-3 {
        flex-direction: column;
        gap: 1rem !important;
    }
    
    .btn-get-started-under {
        padding: 12px 32px;
        font-size: 1rem;
        width: 100%;
        max-width: 300px;
    }
}

/* ===== Features Section (Mission & Vision) ===== */
.card-feature {
    border: 1px solid var(--border-color);
    border-radius: 28px;
    padding: 35px 30px;
    background: var(--bg-card);
    transition: all 0.4s ease;
    height: 100%;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
}

.card-feature:hover {
    border-color: var(--primary);
    transform: translateY(-8px);
    background: var(--bg-card);
    box-shadow: 0 15px 30px rgba(129, 140, 248, 0.3);
}

.icon-box {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.card-feature:hover .icon-box {
    transform: scale(1.1);
}

.card-feature h3 {
    font-weight: 700;
    margin-bottom: 0.5rem;
    font-size: 1.5rem;
}

.card-feature p {
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 0;
}

/* Specific Icon Colors */
.icon-bg-mission {
    background: #eef2ff; /* Indigo 50 */
    color: var(--primary);
}

.icon-bg-vision {
    background: #ecfdf5; /* Emerald 50 */
    color: #10b981; /* Keep success green */
}

/* ===== Strategic Goals Section - DARK BACKGROUND ONLY ===== */
.goals-section {
    background: #0f172a; /* DARK background */
    color: #f1f5f9; /* Light text */
    padding: 5rem 0;
    border-radius: 40px;
    margin: 40px 20px;
}

.goals-section .card-feature {
    background: #1e293b; /* Dark card background */
    border: 1px solid #334155; /* Dark border */
    color: #f1f5f9; /* Light text */
}

.goals-section .card-feature:hover {
    background: #243049; /* Darker hover */
    border-color: #818cf8; /* Purple border on hover */
    box-shadow: 0 15px 30px rgba(129, 140, 248, 0.3);
}

.goals-section .card-feature h4 {
    color: #f1f5f9; /* Light text */
    font-weight: 600;
}

.goals-section .card-feature p {
    color: #94a3b8; /* Muted light text */
}

.goals-section .text-primary {
    color: #818cf8 !important; /* Purple for icons */
}

/* Goals Section Icons with Different Colors - VIBRANT COLORS for contrast */
.goals-section .card-feature:nth-child(1) .fs-1 { color: #818cf8; } /* Indigo */
.goals-section .card-feature:nth-child(2) .fs-1 { color: #10b981; } /* Green */
.goals-section .card-feature:nth-child(3) .fs-1 { color: #f59e0b; } /* Yellow */
.goals-section .card-feature:nth-child(4) .fs-1 { color: #ef4444; } /* Red */
.goals-section .card-feature:nth-child(5) .fs-1 { color: #8b5cf6; } /* Purple */
.goals-section .card-feature:nth-child(6) .fs-1 { color: #06b6d4; } /* Cyan */

/* ===== Resources Section ===== */
.resources-section {
    padding: 80px 0;
}

.section-title-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 40px;
}

.resource-card {
    display: flex;
    gap: 20px;
    padding: 25px;
    border: 1px solid var(--border-color);
    border-radius: 20px;
    background: var(--bg-card);
    transition: all 0.3s ease;
    text-decoration: none;
    color: inherit;
    height: 100%;
}

.resource-card:hover {
    border-color: var(--primary);
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(129, 140, 248, 0.15);
}

.resource-icon {
    font-size: 2rem;
    color: var(--primary);
    flex-shrink: 0;
}

.resource-title {
    font-weight: 600;
    font-size: 1.2rem;
    display: block;
    margin-bottom: 8px;
    color: var(--text-color);
}

.resource-desc {
    color: var(--text-muted);
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 12px;
}

.resource-url {
    font-size: 0.875rem;
    color: var(--primary);
    font-family: monospace;
}

/* Responsive */
@media (max-width: 768px) {
    .card-feature {
        padding: 25px 20px;
    }
    .icon-box {
        width: 50px;
        height: 50px;
        font-size: 1.75rem;
    }
    .card-feature h3 {
        font-size: 1.25rem;
    }
    
    .section-title-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .resource-card {
        padding: 20px;
    }
    
    .goals-section {
        margin: 20px 10px;
        border-radius: 30px;
    }
}

@media (max-width: 576px) {
    .btn-get-started-under {
        padding: 10px 28px;
        font-size: 0.95rem;
    }
}
</style>

<!-- Mission & Vision Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-feature text-center text-md-start">
                    <div class="icon-box icon-bg-mission">
                        <i class="bi bi-book"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-feature text-center text-md-start">
                    <div class="icon-box icon-bg-vision">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Strategic Goals Section - DARK BACKGROUND ONLY -->
<section class="goals-section py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-10 mx-auto text-center">
                <h2 class="display-5 fw-bold mb-4">Library Strategic Goals</h2>
                <p class="fs-5 text-white-50 mx-auto" style="max-width: 800px; line-height: 1.6;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                </p>
            </div>
        </div>

        <div class="row g-4">
            @php
                $goalItems = [
                    [
                        'title' => 'Digital Accessibility',
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod.',
                        'icon' => 'bi-universal-access'
                    ],
                    [
                        'title' => 'Research Support',
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod.',
                        'icon' => 'bi-search'
                    ],
                    [
                        'title' => 'Tech Integration',
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod.',
                        'icon' => 'bi-tablet'
                    ],
                    [
                        'title' => 'Community Programs',
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod.',
                        'icon' => 'bi-calendar-event'
                    ],
                    [
                        'title' => 'Digital Preservation',
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod.',
                        'icon' => 'bi-archive'
                    ],
                    [
                        'title' => 'Service Enhancement',
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod.',
                        'icon' => 'bi-graph-up-arrow'
                    ]
                ];
            @endphp

            @foreach($goalItems as $goal)
                <div class="col-md-6 col-lg-4">
                    <div class="card-feature h-100">
                        <div class="text-center mb-4">
                            <i class="bi {{ $goal['icon'] }} fs-1"></i>
                        </div>
                        <h4 class="text-center mb-3">{{ $goal['title'] }}</h4>
                        <p class="text-center mb-0">{{ $goal['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Resources Section -->
<section class="resources-section py-5">
    <div class="container">
        <div class="section-title-row mb-5">
            <div>
                <h2>Library Resources</h2>
                <p class="text-muted mb-0">Lorem ipsum dolor sit amet consectetur</p>
            </div>
            <a href="#" class="btn btn-outline-secondary btn-sm rounded-pill px-4">View All Resources</a>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <a href="#" class="resource-card">
                    <div class="resource-icon">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <div>
                        <span class="resource-title">Digital Collections</span>
                        <p class="resource-desc mb-0">Lorem ipsum dolor sit amet consectetur adipiscing</p>
                        <span class="resource-url">library.edu/collections</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="#" class="resource-card">
                    <div class="resource-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div>
                        <span class="resource-title">Research Assistance</span>
                        <p class="resource-desc mb-0">Lorem ipsum dolor sit amet consectetur adipiscing</p>
                        <span class="resource-url">library.edu/research-help</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="#" class="resource-card">
                    <div class="resource-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <span class="resource-title">Study Rooms</span>
                        <p class="resource-desc mb-0">Lorem ipsum dolor sit amet consectetur adipiscing</p>
                        <span class="resource-url">library.edu/study-rooms</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<footer class="py-5 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="text-muted small mb-0">&copy; 2025 University Library System. Lorem Ipsum Dolor.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="d-flex gap-4 justify-content-center justify-content-md-end mt-3 mt-md-0">
                    <a href="#" class="text-muted" aria-label="Library Twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-muted" aria-label="Library Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-muted" aria-label="Library Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-muted" aria-label="Library YouTube"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>