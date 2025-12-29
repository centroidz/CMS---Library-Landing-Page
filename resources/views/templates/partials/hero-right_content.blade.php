<!-- ================= HERO SECTION ================= -->
<section class="section-padding position-relative" style="background: #f6f9ff;">
    <div class="floating-shape floating-shape-1"></div>
    <div class="floating-shape floating-shape-2"></div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-1">
                <div class="hero-image-container position-relative">
                    <div class="position-relative z-2" style="height: 500px;">
                        @if(!empty($image))
                            <img src="{{ asset('storage/' . $image) }}" alt="Digital Library Platform"
                                class="img-fluid w-100 h-100" style="object-fit: cover; border-radius: 20px;">
                        @else
                            <div class="d-flex flex-column align-items-center justify-content-center h-100 text-white"
                                style="background-color: #2A71FE; border-radius: 20px;">
                                <i class="bi bi-book" style="font-size: 5rem; opacity: .2;"></i>
                                <p class="mt-3 opacity-75">Digital Library Platform</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6 order-2">
                <div class="position-relative z-1">
                    <span class="badge rounded-pill px-4 py-2 mb-3"
                        style="background-color: rgba(42, 113, 254, 0.1); color: #2A71FE; font-weight: 600;">
                        <i class="bi bi-book me-2"></i> Welcome to Our Digital Library
                    </span>

                    <h1 class="hero-title fw-bold mb-4">
                        {{ $title ?? 'Discover Limitless Knowledge' }}
                    </h1>

                    <p class="text-muted fs-5 mb-4" style="line-height: 1.8;">
                        {{ $description ?? 'Access thousands of digital books, academic journals, and research materials from anywhere, anytime. Our modern library platform connects you with the world of knowledge.' }}
                    </p>

                    <div class="d-flex flex-wrap gap-3 align-items-center">
                        <button class="btn gradient-btn text-white">
                            {{ $button ?? 'Browse Collection' }}
                            <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= MISSION & VISION ================= -->
<section class="section-padding bg-white position-relative">
    <div class="container">
        <h2 class="text-center section-title fw-bold">Our Library Values</h2>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="stat-card h-100">
                    <div class="icon-container">
                        <i class="bi bi-book-half fs-3" style="color: #2A71FE;"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Our Mission</h4>
                    <p class="text-muted mb-0" style="line-height: 1.8;">
                        {{ $mission ?? 'To provide universal access to knowledge and information through our digital library platform, empowering lifelong learning, research, and intellectual growth for all.' }}
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="stat-card h-100">
                    <div class="icon-container">
                        <i class="bi bi-eye fs-3" style="color: #2A71FE;"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Our Vision</h4>
                    <p class="text-muted mb-0" style="line-height: 1.8;">
                        {{ $vision ?? 'To become the premier digital library platform that bridges knowledge gaps, fosters innovation, and creates a global community of learners and researchers.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= GOALS ================= -->
<section class="section-padding goals-section position-relative">
    <div class="container position-relative z-1">
        <div class="row align-items-center">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="text-uppercase opacity-75 mb-3" style="letter-spacing: 2px; font-size: 0.9rem;">
                    <i class="bi bi-bullseye me-2"></i> Library Strategy
                </div>
                <h2 class="fw-bold text-white mb-4">Library Strategic Goals</h2>
                <a href="#" class="btn btn-outline-light rounded-pill px-4">
                    Learn More <i class="bi bi-arrow-up-right ms-1"></i>
                </a>
            </div>

            <div class="col-lg-8">
                <div class="bg-white rounded-4 p-4 p-md-5">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <i class="bi bi-collection feature-icon"></i>
                            <h5 class="fw-bold mb-3">Collection Development</h5>
                            <p class="text-muted small mb-0">Expand and diversify our digital collection with
                                relevant, high-quality resources.</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <i class="bi bi-people feature-icon"></i>
                            <h5 class="fw-bold mb-3">User Engagement</h5>
                            <p class="text-muted small mb-0">Enhance library services and user experience through
                                innovative programs.</p>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-0">
                            <i class="bi bi-search feature-icon"></i>
                            <h5 class="fw-bold mb-3">Research Excellence</h5>
                            <p class="text-muted small mb-0">Provide comprehensive research support and access to
                                scholarly resources.</p>
                        </div>
                        <div class="col-md-6">
                            <i class="bi bi-globe2 feature-icon"></i>
                            <h5 class="fw-bold mb-3">Global Accessibility</h5>
                            <p class="text-muted small mb-0">Make library resources accessible to communities
                                worldwide.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= RELATED RESOURCES ================= -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="fw-bold mb-3">Library Resources</h3>
            <p class="text-muted mb-0">Explore our curated collection of digital resources and references</p>
        </div>

        <div class="row g-4">
            @php
                $links = is_array($related_links ?? []) ? ($related_links ?? []) : json_decode($related_links, true);
                $defaultLinks = ['Digital Books', 'Academic Journals', 'Research Databases', 'E-Learning Materials', 'Library Guides', 'Archival Collections'];
                $displayLinks = !empty($links) ? $links : $defaultLinks;
                $icons = ['bi-book', 'bi-journal-text', 'bi-database', 'bi-play-btn', 'bi-journal-bookmark', 'bi-archive'];
            @endphp

            @foreach($displayLinks as $index => $link)
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="resource-card d-block text-decoration-none">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-container me-3" style="width: 50px; height: 50px;">
                                <i class="bi {{ $icons[$index] ?? 'bi-book' }} fs-5" style="color: #2A71FE;"></i>
                            </div>
                            <h6 class="fw-bold text-dark mb-0">{{ $link }}</h6>
                        </div>
                        <p class="text-muted small mb-3">
                            Access comprehensive {{ $link }} for academic research and learning purposes.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">Updated regularly</small>
                            <i class="bi bi-arrow-right-circle" style="color: #2A71FE;"></i>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ================= FOOTER ================= -->
<footer class="py-5 border-top" style="background: white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="d-flex align-items-center">
                    <div class="icon-container me-3" style="width: 40px; height: 40px;">
                        <i class="bi bi-book" style="color: #2A71FE;"></i>
                    </div>
                    <span class="fw-bold fs-5">Digital<span class="text-gradient">Library</span></span>
                </div>
                <p class="text-muted small mt-3 mb-0">
                    &copy; 2025 Digital Library Platform. All rights reserved.<br>
                    Empowering minds through accessible knowledge.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="d-flex justify-content-md-end gap-3">
                    <a href="#" class="text-decoration-none text-muted small">Library Policies</a>
                    <a href="#" class="text-decoration-none text-muted small">Terms of Use</a>
                    <a href="#" class="text-decoration-none text-muted small">Contact Librarian</a>
                </div>
                <div class="mt-3">
                    <a href="#" class="text-decoration-none me-3">
                        <i class="bi bi-twitter" style="color: #2A71FE;"></i>
                    </a>
                    <a href="#" class="text-decoration-none me-3">
                        <i class="bi bi-linkedin" style="color: #2A71FE;"></i>
                    </a>
                    <a href="#" class="text-decoration-none me-3">
                        <i class="bi bi-facebook" style="color: #2A71FE;"></i>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <i class="bi bi-envelope" style="color: #2A71FE;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>