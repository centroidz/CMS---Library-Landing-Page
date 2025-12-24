<section class="hero-section text-center">
    <div class="container">
        <!-- HERO IMAGE -->
        <div class="floating-image mx-auto mb-4" style="max-width: 600px;">
            @if(!empty($image))
                <img src="{{ asset('storage/' . $image) }}" alt="Hero Image" class="img-fluid rounded-3">
            @else
                <div class="bg-primary rounded-3 d-flex align-items-center justify-content-center" style="height:350px;">
                    <i class="bi bi-rocket-takeoff text-white" style="font-size:5rem;opacity:0.2;"></i>
                </div>
            @endif
        </div>

        <!-- HERO TEXT -->
        <div class="mt-4">
            <span class="section-tag mb-2 d-block">Welcome to the future</span>
            <h1 class="display-4 fw-bold mb-3">{{ $title ?? 'Default Title' }}</h1>
            <p class="lead text-muted mb-4">{{ $description ?? 'Default Description text goes here.' }}</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <button class="btn btn-modern shadow-lg">{{ $button ?? 'Get Started' }}</button>
                <button class="btn btn-link text-dark fw-semibold text-decoration-none">
                    Learn More <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- MISSION & VISION CARDS -->
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

<!-- STRATEGIC GOALS -->
<section class="goals-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-center text-lg-start mb-3 mb-lg-0">
                <span class="section-tag mb-2 d-block">Strategy</span>
                <h2 class="display-6 fw-bold mb-2">Strategic Goals</h2>
            </div>
            <div class="col-lg-8">
                <p class="fs-5 opacity-75">
                    {{ $goals ?? 'Operational Excellence, Customer Intimacy, and Product Leadership.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- RELATED RESOURCES -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="fw-bold m-0">Related Resources</h2>
            <span class="badge bg-light text-dark border">External Links</span>
        </div>

        <div class="row g-4">
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

<!-- FOOTER -->
<footer class="py-4 border-top">
    <div class="container text-center text-muted small">
        &copy; 2025 Your Modern Site. All rights reserved.
    </div>
</footer>