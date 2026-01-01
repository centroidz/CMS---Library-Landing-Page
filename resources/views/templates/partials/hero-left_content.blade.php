<section class="hero-section" id="home">
    <div class="container position-relative" style="z-index: 1;">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span class="section-tag mb-3 d-block"
                    style="background: rgba(142, 192, 255, 0.2); width: fit-content; padding: 5px 15px; border-radius: 50px; font-size: 0.8rem; font-weight: 600;">Welcome
                    to Keeper Library</span>
                <h1 class="display-3 fw-bold mb-4 hero-title" style="letter-spacing: -1px;">
                    {{ $title ?? 'Welcome to Keeper Library' }}
                </h1>
                <p class="lead text-muted mb-5 hero-description" style="max-width: 90%;">
                    {{ $description ?? 'Discover a world of knowledge and endless possibilities.' }}
                </p>
                <div class="d-flex gap-3">
                    <button class="btn btn-primary px-4 py-3 shadow-lg hero-btn"
                        style="border-radius: 12px; font-weight: 600;">
                        {{ $button ?? 'Explore More' }}
                    </button>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div class="hero-img-container"
                    style="border-radius: 30px; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.15);">
                    <img src="{{ isset($image) ? asset('storage/' . $image) : asset('images/defaults/landing-default.png') }}"
                        class="hero-bg img-fluid" alt="Hero" id="hero-image-element"
                        >
                    @if(!isset($image))
                        <div id="hero-placeholder-icon"
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 500px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-rocket-takeoff text-white" style="font-size: 10rem; opacity: 0.3;"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="about">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="p-4 border-0 shadow-sm card-feature" style="background: #fff; border-radius: 20px;">
                    <div class="mb-3 text-primary bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                        style="width: 50px; height: 50px; border-radius: 12px;">
                        <i class="bi bi-compass fs-4"></i>
                    </div>
                    <h3 class="fw-bold">Our Mission</h3>
                    <p class="text-muted" data-key="mission">
                        {{ $mission ?? 'To empower our community through accessible information.' }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 border-0 shadow-sm card-feature" style="background: #fff; border-radius: 20px;">
                    <div class="mb-3 text-success bg-success bg-opacity-10 d-flex align-items-center justify-content-center"
                        style="width: 50px; height: 50px; border-radius: 12px;">
                        <i class="bi bi-eye fs-4"></i>
                    </div>
                    <h3 class="fw-bold">Our Vision</h3>
                    <p class="text-muted" data-key="vision">
                        {{ $vision ?? 'To be a global leader in digital knowledge.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="goals" style="background-color: #f9fafb;">
    <div class="container text-center">
        <h2 class="display-6 fw-bold mb-3">Strategic Goals</h2>
        <p class="fs-5 mx-auto text-muted" style="max-width: 700px;" data-key="goals">
            {{ $goals ?? 'Scaling excellence through strategic alignment.' }}
        </p>
    </div>
</section>

<section class="py-5" id="team">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Meet Our Team</h2>
            <p class="text-muted">Dedicated professionals supporting your learning journey.</p>
        </div>
        <div class="row g-4 justify-content-center" id="staff-container">
            @isset($staff)
                @foreach($staff->where('is_public', true) as $member)
                    <div class="col-lg-4 col-md-6">
                        <div class="text-center p-4 border-0 shadow-sm" style="background: #fff; border-radius: 20px;">
                            <img src="{{ $member->profile_image ? asset('storage/' . $member->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($member->name) . '&size=400' }}"
                                class="mb-3" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;">
                            <div class="text-primary small fw-bold text-uppercase">{{ $member->role ?? 'Administrator' }}</div>
                            <h4 class="fw-bold mt-2">{{ $member->name }}</h4>
                            <p class="small text-muted">Driving innovation through expertise and commitment.</p>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
</section>

<section class="py-5" id="announcement" style="background-color: #f9fafb;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold m-0">Latest News</h2>
            <a href="#" onclick="loadPage('announcements'); return false;" class="btn btn-outline-primary btn-sm">View
                All</a>
        </div>
        <div class="announcement-wrapper d-flex gap-4 overflow-auto pb-4" id="announcement-list">
            @isset($news)
                @foreach($news as $item)
                    <div class="announcement-card flex-shrink-0"
                        style="width: 300px; background: #fff; border-radius: 15px; overflow: hidden; shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/defaults/image-default.png') }}"
                            style="width: 100%; height: 180px; object-fit: cover;">
                        <div class="p-3">
                            <span class="text-muted small">{{ $item->created_at->format('M d, Y') }}</span>
                            <h5 class="fw-bold mt-1 text-truncate">{{ $item->title }}</h5>
                            <p class="small text-muted text-truncate">{{ $item->content }}</p>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
</section>

<div class="container-fluid py-5 bg-white">
    @include('public.testimonials')
</div>

<section class="py-5" id="resources" style="background-color: #f9fafb;">
    <div class="container">
        <h2 class="fw-bold text-center mb-4">Library Resources</h2>
        <div class="row g-4" id="related-links">
            @php
                $currentLinks = $related_links ?? [];
                $links = is_array($currentLinks) ? $currentLinks : json_decode($currentLinks, true);
                $links = $links ?? [];
            @endphp
            @foreach($links as $link)
                <div class="col-lg-4 col-md-6">
                    @php $url = str_contains($link, '://') ? $link : 'https://' . $link; @endphp
                    <a href="{{ $url }}" target="_blank" class="text-decoration-none card border-0 shadow-sm p-3 h-100"
                        style="border-radius: 15px; transition: transform 0.2s;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary bg-opacity-10 text-primary p-2 rounded">
                                <i class="bi bi-link-45deg fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-dark">{{ ucfirst(explode('.', $link)[0]) }}</h6>
                                <span class="small text-muted">{{ $link }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<footer class="py-5 bg-dark text-white mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="fw-bold text-primary">Keeper Library</h4>
                <p class="text-muted">Your trusted partner in knowledge discovery since 2010.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0">&copy; 2025 Keeper Library. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
