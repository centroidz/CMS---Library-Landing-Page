<section class="hero-section" id="home">
    <img
        src="{{ isset($image) ? asset('storage/' . $image) : asset('images/defaults/landing-default.png') }}"
        class="hero-bg"
        alt="Hero"
        data-image="hero"
    >
    <div class="hero-overlay"></div>

    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">{{ $title ?? 'Welcome to Keeper Library' }}</h1>
            <p class="hero-description">{{ $description ?? 'Discover a world of knowledge and endless possibilities.' }}</p>
            <a href="#" class="hero-btn">{{ $button ?? 'Explore More' }}</a>
        </div>
    </div>
</section>

<section class="py-5" id="about">
    <div class="container">
        <h2 class="section-title text-center">Our Purpose</h2>
        <p class="section-subtitle text-center">Keeper Library is committed to providing equitable access to information and fostering a culture of continuous learning.</p>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card-custom">
                    <div class="card-icon"><i class="bi bi-compass"></i></div>
                    <h3 class="card-title">Our Mission</h3>
                    <p class="card-text" data-key="mission">
                        {{ $mission ?? 'To empower our community through accessible information.' }}
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card-custom">
                    <div class="card-icon"><i class="bi bi-eye"></i></div>
                    <h3 class="card-title">Our Vision</h3>
                    <p class="card-text" data-key="vision">
                        {{ $vision ?? 'To be a global leader in digital knowledge.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="goals" style="background-color: var(--br-50);">
    <div class="container text-center">
        <h2 class="section-title">Our Strategic Goals</h2>
        <p class="section-subtitle">We're working towards measurable objectives that align with our mission.</p>
        <p class="mt-4 lead" data-key="goals">
            {{ $goals ?? 'Scaling excellence through strategic alignment.' }}
        </p>
    </div>
</section>

<section class="staff-section" id="team">
    <div class="container">
        <h2 class="section-title text-center" style="color: var(--text-main);">Meet Our Team</h2>
        <p class="section-subtitle text-center mb-5">Dedicated professionals committed to supporting your learning journey.</p>

        <div class="row g-4 justify-content-center" id="staff-container">
            @isset($staff)
                @foreach($staff->where('is_public', true) as $member)
                    <div class="col-lg-4 col-md-6">
                        <div class="staff-card">
                            <div class="staff-image-container">
                                <img src="{{ $member->profile_image ? asset('storage/'.$member->profile_image) : 'https://ui-avatars.com/api/?name='.urlencode($member->name).'&size=400' }}" class="staff-image">
                            </div>
                            <div class="staff-info">
                                <div class="staff-role">{{ $member->role ?? 'Administrator' }}</div>
                                <h3 class="staff-name">{{ $member->name }}</h3>
                                <p style="color: var(--text-muted); font-size: 0.9rem;">Driving innovation through expertise and commitment to quality.</p>

                                <div class="staff-social-links">
                                    <a href="#" class="social-icon-link link-facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="social-icon-link link-twitter"><i class="fab fa-x-twitter"></i></a>
                                    <a href="#" class="social-icon-link link-linkedin"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>

        <div class="view-all-container text-center mt-5">
            <a class="btn-view-all" href="#" onclick="loadPage('staff-page'); return false;">
                View All Team Members <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<section class="py-5" id="announcement" style="background-color: var(--br-50);">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="section-title mb-0">Latest News</h2>
                <p class="text-muted mb-0">Stay updated with our community updates.</p>
            </div>
            <a href="#" onclick="loadPage('announcements'); return false;" class="btn-view-all py-2 px-4" style="font-size: 0.8rem;">View All</a>
        </div>

        <div class="announcement-wrapper" id="announcement-list">
            @isset($news)
                @foreach($news as $item)
                    <div class="announcement-card">
                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/defaults/image-default.png') }}" class="ann-img">
                        <div class="ann-overlay">
                            <span class="ann-date">{{ $item->created_at->format('M d, Y') }}</span>
                            <h3 class="ann-title">{{ $item->title }}</h3>
                            <p class="ann-content">{{ $item->content }}</p>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
</section>

<div class="container-fluid bg-light p-5">
    @include('public.testimonials')
</div>

<section class="py-5" id="resources">
    <div class="container">
        <h2 class="section-title text-center">Library Resources</h2>
        <p class="section-subtitle text-center">Explore our digital tools, research guides, and community resources.</p>

        <div class="row g-4" id="related-links">
           @php
                // Use ?? [] to ensure that if the variable is missing, it defaults to an empty array
                $currentLinks = $related_links ?? [];
                $links = is_array($currentLinks) ? $currentLinks : json_decode($currentLinks, true);

                // Ensure $links is an array so the @foreach doesn't crash either
                $links = $links ?? [];
            @endphp

            @foreach($links as $link)
                <div class="col-lg-4 col-md-6">
                    @php $url = str_contains($link, '://') ? $link : 'https://' . $link; @endphp
                    <a href="{{ $url }}" target="_blank" class="link-preview-card">
                        <div class="link-thumbnail"><i class="bi bi-arrow-up-right"></i></div>
                        <div>
                            <span class="link-title">{{ ucfirst(explode('.', $link)[0]) }}</span>
                            <p class="small text-muted mb-2">Deep dive into our ecosystem and master the workflow.</p>
                            <span class="link-url">{{ $link }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>


<footer class="footer" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h3 class="footer-title">
                    <i class="bi bi-hexagon-fill me-2" style="color: var(--br-400);"></i>Keeper Library
                </h3>
                <p>Your trusted partner in knowledge discovery and lifelong learning since 2010.</p>
                <div class="mt-4">
                    <a href="#" class="me-3 text-white"><i class="bi bi-twitter fs-5"></i></a>
                    <a href="#" class="me-3 text-white"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="me-3 text-white"><i class="bi bi-instagram fs-5"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-linkedin fs-5"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                <h4 class="footer-title">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#goals">Our Goals</a></li>
                    <li><a href="#resources">Resources</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
                <h4 class="footer-title">Services</h4>
                <ul class="footer-links">
                    <li><a href="#">Research Help</a></li>
                    <li><a href="#">Interlibrary Loan</a></li>
                    <li><a href="#">Digital Archives</a></li>
                    <li><a href="#">Study Rooms</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h4 class="footer-title">Contact Us</h4>
                <ul class="footer-links">
                    <li><i class="bi bi-geo-alt me-2"></i> 123 Knowledge Ave, EduCity</li>
                    <li><i class="bi bi-telephone me-2"></i> (555) 123-4567</li>
                    <li><i class="bi bi-envelope me-2"></i> info@keeperlibrary.org</li>
                    <li><i class="bi bi-clock me-2"></i> Mon-Fri: 9am-9pm</li>
                </ul>
            </div>
        </div>
        <div class="row copyright">
            <div class="col-md-6">
                <p>&copy; 2023 Keeper Library. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p><a href="#" class="text-decoration-none me-3" style="color: var(--br-200);">Privacy Policy</a>
                    <a href="#" class="text-decoration-none" style="color: var(--br-200);">Terms of Use</a>
                </p>
            </div>
        </div>
    </div>
</footer>
