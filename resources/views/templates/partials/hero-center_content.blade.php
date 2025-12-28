<section class="hero-section">
    <!-- Full page background image -->
    <div class="hero-bg-container">
        @if(!empty($image))
            <img src="{{ asset('storage/' . $image) }}" class="hero-bg-image" alt="Background">
        @else
            <div class="hero-bg-image" style="background: linear-gradient(135deg, var(--br-100), var(--br-300));"></div>
        @endif
        <div class="hero-bg-overlay"></div>
    </div>
    
    <!-- Text content container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="text-content-container">
                    <span class="section-tag">Library Services</span>
                    <h1 class="display-3 mb-4 text-center">
                        {{ $title ?? 'Build something that truly matters' }}
                    </h1>
                    <p class="lead text-center mb-5">
                        {{ $description ?? 'Our platform provides the tools you need to build, scale, and manage your vision with unprecedented efficiency and style.' }}
                    </p>
                    <div class="d-flex gap-3 justify-content-center align-items-center flex-wrap">
                        <button class="btn btn-modern">{{ $button ?? 'Get Started' }}</button>
                        <button class="btn btn-outline-modern">
                            View Demo <i class="bi bi-play-circle-fill ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="mission-vision-section wave-container">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="circle-card">
                    <div class="circle-card-content">
                        <div class="circle-icon" style="color: var(--br-600);">
                            <i class="bi bi-lightning-charge"></i>
                        </div>
                        <h3 class="fw-bold h4">Our Mission</h3>
                        <p class="text-muted mb-0">
                            {{ $mission ?? 'We aim to redefine industry standards by providing high-performance tools for modern creators.' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="circle-card">
                    <div class="circle-card-content">
                        <div class="circle-icon" style="color: var(--br-500);">
                            <i class="bi bi-command"></i>
                        </div>
                        <h3 class="fw-bold h4">Our Vision</h3>
                        <p class="text-muted mb-0">
                            {{ $vision ?? 'Empowering every individual to turn their ideas into reality with zero technical friction.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Strategic Goals Section -->
<section class="goals-section">
    <div class="floating-circles">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center goals-content">
                <h2 class="display-5 fw-bold mb-4 wave-text-container">Strategic Goals</h2>
                <p class="fs-5 text-white-50 mb-5">
                    {{ $goals ?? 'We focus on operational excellence, customer intimacy, and relentless product leadership to stay ahead of the curve.' }}
                </p>
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4 mb-4">
                        <div class="text-white">
                            <div class="circle-icon mx-auto mb-3" style="width: 80px; height: 80px; background: rgba(255,255,255,0.1);">
                                <i class="bi bi-graph-up-arrow fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Operational Excellence</h5>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="text-white">
                            <div class="circle-icon mx-auto mb-3" style="width: 80px; height: 80px; background: rgba(255,255,255,0.1);">
                                <i class="bi bi-people fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Customer Intimacy</h5>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="text-white">
                            <div class="circle-icon mx-auto mb-3" style="width: 80px; height: 80px; background: rgba(255,255,255,0.1);">
                                <i class="bi bi-rocket-takeoff fs-3"></i>
                            </div>
                            <h5 class="fw-bold">Product Leadership</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Resources Section -->
<section class="resources-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h2 class="fw-bold mb-2">Related Links & Resources</h2>
                <p class="text-muted mb-0">Everything you need to get started.</p>
            </div>
            <a href="#" class="btn btn-outline-secondary btn-sm rounded-pill">View All</a>
        </div>

        <div class="row g-4">
            @php
                $links = is_array($related_links ?? []) ? ($related_links ?? []) : json_decode($related_links ?? '[]', true);
            @endphp

            @forelse($links ?? ['Documentation', 'API Reference', 'Community'] as $link)
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="resource-card">
                        <div class="resource-icon-circle">
                            <i class="bi bi-arrow-up-right"></i>
                        </div>
                        <div class="resource-content">
                            <span class="link-title">{{ $link }}</span>
                            <p class="small text-muted mb-2">Deep dive into our ecosystem and master the workflow.</p>
                            <span class="link-url">docs.brand.io/{{ Str::slug($link) }}</span>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center text-muted">No resources available.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="wave-footer">
    <div class="footer-circles">
        <div class="footer-circle"></div>
        <div class="footer-circle"></div>
    </div>
    <div class="container">
        <div class="row align-items-center footer-content">
            <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                <a href="#" class="navbar-brand mb-3 d-inline-block">
                    <i class="bi bi-grid-3x3-gap-fill me-2"></i>LIBRARY
                </a>
                <p class="text-muted small mb-0">&copy; 2025 LIBRARY Inc. Crafted with precision.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="d-flex gap-4 justify-content-center justify-content-md-end mb-4">
                    <a href="#" class="text-muted"><i class="bi bi-twitter fs-5"></i></a>
                    <a href="#" class="text-muted"><i class="bi bi-github fs-5"></i></a>
                    <a href="#" class="text-muted"><i class="bi bi-linkedin fs-5"></i></a>
                    <a href="#" class="text-muted"><i class="bi bi-youtube fs-5"></i></a>
                </div>
                <p class="text-muted small mb-0">
                    <a href="#" class="text-muted text-decoration-none me-3">Privacy Policy</a>
                    <a href="#" class="text-muted text-decoration-none">Terms of Service</a>
                </p>
            </div>
        </div>
    </div>
</footer>