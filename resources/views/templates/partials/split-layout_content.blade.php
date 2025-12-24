<section class="hero-section">
    <div class="container position-relative" style="z-index: 1;">
        <div class="row align-items-center">
            <!-- Text left -->
            <div class="col-lg-6">
                <span class="section-tag mb-3 d-block">{{ $subtitle ?? 'Welcome' }}</span>
                <h1 class="display-3 fw-bold mb-4">{{ $title ?? 'Default Title' }}</h1>
                <p class="lead text-muted mb-5">{{ $description ?? 'Default description text goes here.' }}</p>
                <div class="d-flex gap-3">
                    <button class="btn btn-modern">{{ $button ?? 'Get Started' }}</button>
                    <button class="btn btn-link text-dark fw-semibold text-decoration-none">Learn More <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>

            <!-- Image right -->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="floating-image">
                    <div class="hero-img-container">
                        @if(!empty($image))
                            <img src="{{ asset('storage/' . $image) }}" alt="Hero Image">
                        @else
                            <div style="background: var(--primary-gradient); height: 100%; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-rocket-takeoff text-white" style="font-size: 10rem; opacity: 0.2;"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-feature shadow-sm">
                    <div class="icon-box bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-lightning-charge-fill fs-4"></i>
                    </div>
                    <h3 class="fw-bold">Our Mission</h3>
                    <p class="text-muted leading-relaxed">
                        {{ $mission ?? 'We aim to redefine the industry standards through innovation.' }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-feature shadow-sm">
                    <div class="icon-box bg-success bg-opacity-10 text-success">
                        <i class="bi bi-eye-fill fs-4"></i>
                    </div>
                    <h3 class="fw-bold">Our Vision</h3>
                    <p class="text-muted leading-relaxed">
                        {{ $vision ?? 'To be the global leader in sustainable solutions.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="goals-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <span class="section-tag mb-2 d-block">Strategy</span>
                <h2 class="display-6 fw-bold mb-4">Strategic Goals</h2>
            </div>
            <div class="col-lg-8">
                <p class="fs-5 opacity-75">
                    {{ $goals ?? 'Operational Excellence, Customer Intimacy, and Product Leadership.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="fw-bold m-0">Related Resources</h2>
            <span class="badge bg-light text-dark border">External Links</span>
        </div>

        <div class="row g-4">
            {{-- Handle both arrays (API) and JSON strings (Direct DB) --}}
            @php
                $links = is_array($related_links ?? []) ? ($related_links ?? []) : json_decode($related_links, true);
            @endphp

            @forelse($links ?? [] as $link)
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="link-preview-card">
                        <div class="link-thumbnail">
                            <i class="bi bi-link-45deg"></i>
                        </div>
                        <div class="link-content">
                            <span class="link-title">{{ $link }}</span>
                            <span class="link-description">Explore resources regarding {{ $link }}.</span>
                            <span class="link-url">https://resource.link/{{ Str::slug($link) }}</span>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center text-muted">No related resources available.</div>
            @endforelse
        </div>
    </div>
</section>

<footer class="py-4 border-top">
    <div class="container text-center text-muted small">
        &copy; 2025 Your Modern Site. All rights reserved.
    </div>
</footer>