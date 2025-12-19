<section class="hero-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <span class="section-tag">Next Generation Platform</span>
                <h1 class="display-3 mb-4">
                    {{ $title ?? 'Build something that truly matters' }}
                </h1>
                <p class="lead text-muted mb-5 mx-auto" style="max-width: 650px; line-height: 1.6;">
                    {{ $description ?? 'Our platform provides the tools you need to build, scale, and manage your vision with unprecedented efficiency and style.' }}
                </p>
                <div class="d-flex gap-3 justify-content-center align-items-center">
                    <button class="btn btn-modern">{{ $button ?? 'Start Building' }}</button>
                    <button class="btn btn-link text-dark fw-bold text-decoration-none px-4">
                        View Demo <i class="bi bi-play-circle-fill ms-2"></i>
                    </button>
                </div>
            </div>

            <div class="col-12">
                <div class="floating-image">
                    <div class="hero-img-container">
                        @if(!empty($image))
                            <img src="{{ asset('storage/' . $image) }}" class="w-100" alt="Hero">
                        @else
                            <div
                                style="background: var(--primary-gradient); height: 540px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-layers-half text-white" style="font-size: 10rem; opacity: 0.15;"></i>
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
                <div class="card-feature">
                    <div class="icon-box bg-indigo-50 text-primary" style="background: #eef2ff;">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <h3 class="fw-bold h4">Our Mission</h3>
                    <p class="text-muted mb-0">
                        {{ $mission ?? 'We aim to redefine industry standards by providing high-performance tools for modern creators.' }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-feature">
                    <div class="icon-box bg-emerald-50 text-success" style="background: #ecfdf5;">
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
</section>

<section class="goals-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <h2 class="display-5 fw-bold mb-4">Strategic Goals</h2>
                <p class="fs-5 text-white-50">
                    {{ $goals ?? 'We focus on operational excellence, customer intimacy, and relentless product leadership to stay ahead of the curve.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h2 class="fw-bold mb-0">Resources</h2>
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
                    <a href="#" class="link-preview-card">
                        <div class="link-thumbnail">
                            <i class="bi bi-arrow-up-right"></i>
                        </div>
                        <div>
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

<footer class="py-5 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="text-muted small mb-0">&copy; 2025 BRAND Inc. Crafted with precision.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="d-flex gap-4 justify-content-center justify-content-md-end mt-3 mt-md-0">
                    <a href="#" class="text-muted"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-muted"><i class="bi bi-github"></i></a>
                    <a href="#" class="text-muted"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>