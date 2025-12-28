<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Library Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #2A71FE;
            --primary-light: rgba(42, 113, 254, 0.1);
            --primary-lighter: rgba(42, 113, 254, 0.05);
            --background: #f6f9ff;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
        }
        
        .section-padding {
            padding: 100px 0;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: #2A71FE;
            line-height: 1.2;
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
        }
        
        .gradient-btn {
            background: #2A71FE;
            border: none;
            padding: 14px 32px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .gradient-btn:hover {
            background: #1a56db;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(42, 113, 254, 0.3);
        }
        
        .hero-image-container {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(42, 113, 254, 0.15);
        }
        
        .hero-image-container::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            width: 100px;
            height: 100px;
            background: var(--primary-light);
            border-radius: 50%;
            z-index: 0;
        }
        
        .hero-image-container::after {
            content: '';
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 150px;
            height: 150px;
            background: var(--primary-light);
            border-radius: 50%;
            z-index: 0;
        }
        
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(42, 113, 254, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(42, 113, 254, 0.15);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: #2A71FE;
        }
        
        .icon-container {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: var(--primary-lighter);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .resource-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            height: 100%;
            border: 1px solid rgba(42, 113, 254, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .resource-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(42, 113, 254, 0.1);
            border-color: rgba(42, 113, 254, 0.3);
        }
        
        .resource-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #2A71FE;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .resource-card:hover::after {
            transform: scaleX(1);
        }
        
        .goals-section {
            background: #2A71FE;
            position: relative;
            overflow: hidden;
        }
        
        .goals-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }
        
        .goals-section::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }
        
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: var(--primary-light);
            z-index: 0;
        }
        
        .floating-shape-1 {
            top: 10%;
            left: 5%;
            width: 120px;
            height: 120px;
            animation: float 20s infinite linear;
        }
        
        .floating-shape-2 {
            bottom: 20%;
            right: 8%;
            width: 80px;
            height: 80px;
            animation: float 15s infinite linear reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(20px, 20px) rotate(90deg); }
            50% { transform: translate(0, 40px) rotate(180deg); }
            75% { transform: translate(-20px, 20px) rotate(270deg); }
        }
        
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 20px;
            display: inline-block;
            color: #2A71FE;
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 50px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: #2A71FE;
            border-radius: 2px;
        }
        
        .text-gradient {
            background: #2A71FE;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body>

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
                            <img src="{{ asset('storage/' . $image) }}" 
                                 alt="Digital Library Platform"
                                 class="img-fluid w-100 h-100" 
                                 style="object-fit: cover; border-radius: 20px;">
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
                    <span class="badge rounded-pill px-4 py-2 mb-3" style="background-color: rgba(42, 113, 254, 0.1); color: #2A71FE; font-weight: 600;">
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
                            <p class="text-muted small mb-0">Expand and diversify our digital collection with relevant, high-quality resources.</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <i class="bi bi-people feature-icon"></i>
                            <h5 class="fw-bold mb-3">User Engagement</h5>
                            <p class="text-muted small mb-0">Enhance library services and user experience through innovative programs.</p>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-0">
                            <i class="bi bi-search feature-icon"></i>
                            <h5 class="fw-bold mb-3">Research Excellence</h5>
                            <p class="text-muted small mb-0">Provide comprehensive research support and access to scholarly resources.</p>
                        </div>
                        <div class="col-md-6">
                            <i class="bi bi-globe2 feature-icon"></i>
                            <h5 class="fw-bold mb-3">Global Accessibility</h5>
                            <p class="text-muted small mb-0">Make library resources accessible to communities worldwide.</p>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Simple animation on scroll
    document.addEventListener('DOMContentLoaded', function() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);
        
        // Animate cards on scroll
        document.querySelectorAll('.stat-card, .resource-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(card);
        });
    });
</script>
</body>
</html>