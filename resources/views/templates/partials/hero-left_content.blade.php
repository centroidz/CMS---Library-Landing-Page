<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Column: Text Content -->
            <div class="col-lg-6">
                <span class="section-tag">Digital Library Platform</span>
                <h1 class="display-3 mb-4">
                    {{ $title ?? 'Discover, Learn, and Grow with Our Library' }}
                </h1>
                <p class="lead text-muted mb-5" style="line-height: 1.6;">
                    {{ $description ?? 'Access thousands of digital resources, curated collections, and learning tools to support your academic and personal growth journey.' }}
                </p>
                <div class="d-flex gap-3 align-items-center">
                    <!-- ONLY ONE Get Started Button -->
                    <button class="btn-get-started-hero">
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
/* ===== Hero Left Layout ===== */
.hero-section {
    padding: 100px 0 60px;
}

.hero-img-container {
    width: 100%;
    border-radius: 1.5rem;
    overflow: hidden;
    box-shadow: 0 25px 50px -12px rgba(99, 102, 241, 0.3);
}

.hero-img-container img {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

/* ===== Get Started Button (ONLY ONE) ===== */
.btn-get-started-hero {
    background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
    color: white;
    border: none;
    padding: 14px 40px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-get-started-hero:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(99, 102, 241, 0.4);
    color: white;
}

.btn-get-started-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.btn-get-started-hero:hover::before {
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

/* Responsive adjustments */
@media (max-width: 992px) {
    .hero-section {
        padding: 80px 0 40px;
    }
    
    .hero-img-container img {
        height: 350px;
    }
}

@media (max-width: 768px) {
    .row.align-items-center {
        flex-direction: column;
    }
    
    .col-lg-6 {
        margin-bottom: 2rem;
    }
    
    .d-flex.gap-3 {
        flex-direction: column;
        gap: 1rem !important;
    }
    
    .btn-get-started-hero {
        width: 100%;
        max-width: 300px;
    }
    
    .hero-img-container img {
        height: 300px;
    }
}

@media (max-width: 576px) {
    .btn-get-started-hero {
        padding: 12px 32px;
        font-size: 1rem;
    }
    
    .display-3 {
        font-size: 2.5rem;
    }
}

/* ===== Additional Get Started Button ===== */
.btn-get-started-extra {
    background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
    color: white;
    border: none;
    padding: 12px 32px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-get-started-extra:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(16, 185, 129, 0.3);
    color: white;
}

.btn-get-started-extra::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.btn-get-started-extra:hover::before {
    left: 100%;
}

/* ===== Get Started Button UNDER Image ===== */
.btn-get-started-under {
    background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
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
    box-shadow: 0 20px 40px rgba(99, 102, 241, 0.4);
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

/* Responsive adjustments for buttons */
@media (max-width: 768px) {
    .d-flex.gap-3 {
        flex-direction: column;
        gap: 1rem !important;
    }
    
    .btn-get-started-extra,
    .btn-modern {
        width: 100%;
        max-width: 300px;
    }
    
    .btn-get-started-under {
        padding: 12px 32px;
        font-size: 1rem;
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
    background: var(--bg-card); /* KEEP SAME BACKGROUND, DON'T CHANGE TO BLACK */
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
}

@media (max-width: 576px) {
    .btn-get-started-under {
        padding: 10px 28px;
        font-size: 0.95rem;
    }
}
</style>

<!-- REST OF YOUR CODE REMAINS EXACTLY THE SAME -->
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
                        {{ $mission ?? 'To provide equitable access to information, foster lifelong learning, and support academic excellence through our comprehensive digital and physical collections.' }}
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
                        {{ $vision ?? 'To be the leading knowledge hub that inspires discovery, innovation, and community engagement through accessible and diverse information resources.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Strategic Goals Section -->
<section class="goals-section py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-10 mx-auto text-center">
                <h2 class="display-5 fw-bold mb-4">Library Strategic Goals</h2>
                <p class="fs-5 text-white-50 mx-auto" style="max-width: 800px; line-height: 1.6;">
                    {{ $goals ?? 'Our library is committed to enhancing accessibility, promoting learning and research excellence, integrating modern technology, encouraging community engagement, preserving knowledge, and continuously improving our collections and services.' }}
                </p>
            </div>
        </div>

        <div class="row g-4">
            @php
                $goalItems = [
                    [
                        'title' => 'Digital Accessibility',
                        'description' => 'Expand e-book collections and ensure all resources are accessible to users with disabilities.',
                        'icon' => 'bi-universal-access'
                    ],
                    [
                        'title' => 'Research Support',
                        'description' => 'Provide specialized research assistance, citation tools, and academic database access.',
                        'icon' => 'bi-search'
                    ],
                    [
                        'title' => 'Tech Integration',
                        'description' => 'Implement AI-powered search, virtual reality tours, and mobile library apps.',
                        'icon' => 'bi-tablet'
                    ],
                    [
                        'title' => 'Community Programs',
                        'description' => 'Host author talks, literacy workshops, and cultural events for all age groups.',
                        'icon' => 'bi-calendar-event'
                    ],
                    [
                        'title' => 'Digital Preservation',
                        'description' => 'Archive local history, rare manuscripts, and special collections in digital format.',
                        'icon' => 'bi-archive'
                    ],
                    [
                        'title' => 'Service Enhancement',
                        'description' => 'Continuously improve user experience through feedback and new service offerings.',
                        'icon' => 'bi-graph-up-arrow'
                    ]
                ];
            @endphp

            @foreach($goalItems as $goal)
                <div class="col-md-6 col-lg-4">
                    <div class="card-feature h-100">
                        <div class="text-center mb-4">
                            <i class="bi {{ $goal['icon'] }} fs-1 text-primary"></i>
                        </div>
                        <h4 class="text-center mb-3">{{ $goal['title'] }}</h4>
                        <p class="text-center mb-0">{{ $goal['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Resources -->
<section class="resources-section py-5">
    <div class="container">
        <div class="section-title-row mb-5">
            <div>
                <h2>Library Resources</h2>
                <p class="text-muted mb-0">Everything you need for research and learning</p>
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
                        <p class="resource-desc mb-0">Access e-books and academic journals</p>
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
                        <p class="resource-desc mb-0">Book appointments with librarians and research experts</p>
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
                        <p class="resource-desc mb-0">Reserve group study spaces and quiet reading areas</p>
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
                <p class="text-muted small mb-0">&copy; 2025 University Library System. Knowledge for All.</p>
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

<style>
/* Add these styles for the resources section */
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

/* Responsive adjustments */
@media (max-width: 768px) {
    .section-title-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .resource-card {
        padding: 20px;
    }
}
</style>