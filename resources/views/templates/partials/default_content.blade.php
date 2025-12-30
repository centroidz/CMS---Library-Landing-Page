<!-- Hero Section -->
<section class="hero-section" id="home">
    @if(!empty($image))
        <img src="{{ asset('storage/' . $image) }}" class="hero-bg" alt="Hero">
    @else
        <img src="{{ asset('images/defaults/landing-default.png') }}" class="hero-bg" alt="Hero Default">
    @endif

    <div class="hero-overlay"></div>

    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">{{ $title ?? 'Welcome to Keeper Library' }}</h1>
            <p class="hero-description">{{ $description ?? 'Discover a world of knowledge and endless possibilities.' }}
            </p>
            <a href="#" class="hero-btn">{{ $button ?? 'Explore More' }}</a>
        </div>
    </div>
</section>

<section class="py-5" id="about">
    <div class="container">
        <h2 class="section-title text-center">Our Purpose</h2>
        <p class="section-subtitle text-center">Keeper Library is committed to providing equitable access to information
            and fostering a culture of continuous learning and discovery.</p>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card-custom">
                    <div class="card-icon">
                        <i class="bi bi-compass"></i>
                    </div>
                    <h3 class="card-title">Our Mission</h3>
                    <p class="card-text">
                        {{ $mission ?? 'To empower our community through accessible information and resources.' }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-custom">
                    <div class="card-icon">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h3 class="card-title">Our Vision</h3>
                    <p class="card-text">
                        {{ $vision ?? 'To be a global leader in digital and physical knowledge preservation.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="goals" style="background-color: var(--br-50);">
    <div class="container">
        <h2 class="section-title text-center">Our Strategic Goals</h2>
        <p class="section-subtitle text-center">We're working towards measurable objectives that align with our mission
            and vision for the future of knowledge sharing.</p>

        <div class="row g-4">
            <div class="col-12 text-center">
                <p>{{ $goals ?? 'Scaling excellence through strategic alignment and community engagement.' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="staff-section" id="team">
    <div class="container">
        <h2 class="section-title text-center" style="color: var(--text-main);">Meet Our Team</h2>
        <p class="section-subtitle text-center mb-5" style="color: var(--text-muted);">Dedicated professionals committed
            to supporting your learning journey.</p>

        <div class="row g-4 justify-content-center">
            @if (isset($staff))
                @foreach($staff->where('is_public', true) as $member)
                    <div class="col-lg-4 col-md-6">
                        <div class="staff-card">
                            <div class="staff-image-container">
                                <img src="{{ $member->profile_image ? asset('storage/' . $member->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($member->name) . '&size=400' }}"
                                    class="staff-image" alt="{{ $member->name }}">
                            </div>

                            <div class="staff-info">
                                <div class="staff-role">{{ $member->role ?? 'Administrator' }}</div>
                                <h3 class="staff-name">{{ $member->name }}</h3>
                                <p style="color: var(--text-muted); font-size: 0.9rem;">Driving innovation through expertise and
                                    commitment to quality.</p>

                                <div class="staff-social-links">
                                    @php
                                        $socialData = is_string($member->social_media) ? json_decode($member->social_media, true) : $member->social_media;
                                        $iconMap = [
                                            'facebook' => ['icon' => 'fab fa-facebook-f', 'class' => 'link-facebook'],
                                            'twitter' => ['icon' => 'fab fa-x-twitter', 'class' => 'link-twitter'],
                                            'instagram' => ['icon' => 'fab fa-instagram', 'class' => 'link-instagram'],
                                            'linkedin' => ['icon' => 'fab fa-linkedin-in', 'class' => 'link-linkedin']
                                        ];
                                    @endphp

                                    @if(!empty($socialData) && is_array($socialData))
                                        @foreach($socialData as $platform => $url)
                                            @if(!empty($url) && $url !== 'null' && isset($iconMap[$platform]) && filter_var($url, FILTER_VALIDATE_URL))
                                                @php $config = $iconMap[$platform]; @endphp
                                                <a href="{{ $url }}" target="_blank" class="social-icon-link {{ $config['class'] }}"
                                                    title="{{ ucfirst($platform) }}" rel="noopener noreferrer">
                                                    <i class="{{ $config['icon'] }}"></i>
                                                </a>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

        <div class="view-all-container text-center">
            <a class="btn-view-all" href="#" onclick="loadPage('{{ 'staff-page'}}'); return false;">
                View All Team Members <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>



<section class="py-5" id="announcement" style="background-color: var(--br-50);">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="section-title mb-0" style="color: var(--text-main);">Latest News</h2>
                <p class="text-muted mb-0">Stay updated with our community updates.</p>
            </div>
            {{-- Optional: Scroll buttons or link to all --}}
            <a href="#" onclick="loadPage('{{ 'announcements'}}'); return false;" class="btn-view-all py-2 px-4"
                style="font-size: 0.8rem; border-width: 1px;">
                View All
            </a>
        </div>

        <div class="announcement-wrapper">
            @if (isset($news))
                @forelse($news as $item)
                    <div class="announcement-card">
                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/defaults/image-default.png') }}"
                            class="ann-img" alt="{{ $item->title }}">

                        <div class="ann-overlay">
                            <span class="ann-date">{{ $item->created_at->format('M d, Y') }}</span>
                            <h3 class="ann-title">{{ $item->title }}</h3>
                            <p class="ann-content">{{ $item->content }}</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center w-100 py-5">
                        <p class="text-muted">No announcement available at the moment.</p>
                    </div>
                @endforelse
            @endif                           
        </div>
    </div>
    <div class="container-fluid bg-light p-5">                  
        @include('public.testimonials')
    </div>
</section>

<section class="py-5" id="resources">
    <div class="container">
        <h2 class="section-title text-center">Library Resources</h2>
        <p class="section-subtitle text-center">Explore our digital tools, research guides, and community resources.</p>

        <div class="row g-4">
            @php
                // Decode the JSON if it's a string, otherwise default to an empty array
                $links = is_array($related_links) ? $related_links : json_decode($related_links ?? '[]', true);
            @endphp

            @forelse($links as $link)
                <div class="col-lg-4 col-md-6">
                    {{-- Check if link has a protocol; if not, prepend https:// --}}
                    @php
                        $url = str_contains($link, '://') ? $link : 'https://' . $link;
                    @endphp

                    <a href="{{ $url }}" target="_blank" class="link-preview-card">
                        <div class="link-thumbnail">
                            <i class="bi bi-arrow-up-right"></i>
                        </div>
                        <div>
                            <span class="link-title">{{ ucfirst(explode('.', $link)[0]) }}</span>
                            <p class="small text-muted mb-2">Deep dive into our ecosystem and master the workflow.</p>
                            <span class="link-url">{{ $link }}</span>
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