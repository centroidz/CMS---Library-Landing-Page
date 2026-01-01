<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --glass-bg: rgba(255, 255, 255, 0.8);
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #1e293b;
            background-color: #f8fafc;
        }

        /* Navbar */
        .navbar {
            backdrop-filter: blur(10px);
            background: var(--glass-bg);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-light .navbar-toggler-icon {
            filter: invert(0.3);
        }


        .hero-section {
            padding: 160px 0 100px;
            background: radial-gradient(circle at top right, #e0e7ff 0%, #f8fafc 50%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -10%;
            right: -5%;
            width: 400px;
            height: 400px;
            background: var(--primary-gradient);
            filter: blur(120px);
            opacity: 0.1;
            z-index: 0;
        }

        .btn-modern {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 12px 32px;
            border-radius: 12px;
            transition: transform 0.2s ease;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 10px 20px -5px rgba(99, 102, 241, 0.4);
        }

        .card-feature {
            border: none;
            border-radius: 24px;
            padding: 40px;
            background: white;
            transition: all 0.3s ease;
            height: 100%;
        }

        .card-feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .goals-section {
            background-color: #0f172a;
            color: white;
            border-radius: 40px;
            margin: 40px 20px;
            padding: 80px 0;
        }

        .section-tag {
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.8rem;
            font-weight: 700;
            color: #818cf8;
        }

        .link-preview-card {
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 12px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            max-width: 400px;
            margin-bottom: 1rem;
        }

        .link-preview-card:hover {
            border-color: #6366f1;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            transform: translateY(-3px);
        }

        .link-thumbnail {
            width: 80px;
            height: 80px;
            background: #f1f5f9;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-right: 16px;
            overflow: hidden;
        }

        .link-content {
            overflow: hidden;
        }

        .link-title {
            display: block;
            font-weight: 600;
            color: #1e293b;
            font-size: 0.95rem;
            margin-bottom: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .link-description {
            display: block;
            font-size: 0.8rem;
            color: #64748b;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .floating-image {
            animation: floating 6s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* Hero Image Container */
        .hero-img-container {
            width: 100%;
            height: 450px;
            border-radius: 2rem;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .hero-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .page-content {
            padding-top: 90px;
            /* adjust to your navbar height */
        }

        /* Merged styles from hero-right_content */
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

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            25% {
                transform: translate(20px, 20px) rotate(90deg);
            }

            50% {
                transform: translate(0, 40px) rotate(180deg);
            }

            75% {
                transform: translate(-20px, 20px) rotate(270deg);
            }
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

        /*added styles */
        /* Staff Section - Theme Matched */
        .staff-section {
            padding: 80px 0;
            background-color: var(--bg-body);
            /* Matches your body background */
        }

        .staff-card {
            border: 1px solid var(--border-soft);
            border-radius: 20px;
            background: var(--bg-card);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: var(--shadow);
            height: 100%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .staff-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(25, 51, 143, 0.15);
            border-color: var(--br-200);
        }

        .staff-image-container {
            padding: 15px 15px 0 15px;
        }

        .staff-image {
            height: 280px;
            width: 100%;
            object-fit: cover;
            border-radius: 15px;
            transition: transform 0.7s ease;
        }

        .staff-card:hover .staff-image {
            transform: scale(1.05);
        }

        .staff-info {
            padding: 1.75rem 1.5rem;
            text-align: center;
            flex-grow: 1;
        }

        .staff-role {
            color: var(--br-600);
            font-weight: 600;
            font-size: 0.75rem;
            letter-spacing: 1px;
            display: inline-block;
            padding: 0.4rem 1.2rem;
            background: var(--br-50);
            border: 1px solid var(--br-100);
            border-radius: 50px;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .staff-name {
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--text-main);
            /* Using your br-950 variable */
        }

        .staff-social-links {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
            min-height: 40px;
        }

        .social-icon-link {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: var(--br-50);
            color: var(--br-600);
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            border: 1px solid transparent;
        }

        /* Brand Colors on Hover */
        .social-icon-link:hover {
            transform: translateY(-3px);
            color: white !important;
            border-color: transparent;
        }

        .link-facebook:hover {
            background-color: #1877f2;
        }

        .link-twitter:hover {
            background-color: #000000;
        }

        .link-instagram:hover {
            background-color: #e4405f;
        }

        .link-linkedin:hover {
            background-color: #0a66c2;
        }

        /* View All Button - Theme Matched */
        .view-all-container {
            margin-top: 4rem;
        }

        .btn-view-all {
            padding: 12px 35px;
            border-radius: 50px;
            border: 2px solid var(--br-500);
            color: var(--br-600);
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            background: transparent;
        }

        .btn-view-all:hover {
            background: var(--br-600);
            border-color: var(--br-600);
            color: white !important;
        }

        /* Announcement Section Styles */
        #announcement {
            padding: 60px 0;
            background-color: var(--br-50);
            overflow: hidden;
        }

        .announcement-wrapper {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding-bottom: 20px;
            /* Custom Scrollbar for Chrome/Safari */
            scrollbar-width: thin;
            scrollbar-color: var(--br-200) transparent;
        }

        .announcement-wrapper::-webkit-scrollbar {
            height: 6px;
        }

        .announcement-wrapper::-webkit-scrollbar-thumb {
            background: var(--br-200);
            border-radius: 10px;
        }

        .announcement-card {
            flex: 0 0 400px;
            /* Fixed width for the film frame */
            height: 30vh;
            /* Your requested height */
            min-height: 250px;
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            background-color: var(--br-950);
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }

        .announcement-card:hover {
            transform: scale(1.02);
        }

        .ann-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.7;
            /* Darkens image for text readability */
            transition: opacity 0.3s ease;
        }

        .announcement-card:hover .ann-img {
            opacity: 0.5;
        }

        .ann-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(transparent, rgba(20, 33, 87, 0.9));
            /* br-950 gradient */
            color: white;
        }

        .ann-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 5px;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .ann-content {
            font-size: 0.85rem;
            opacity: 0.9;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .ann-date {
            font-size: 0.75rem;
            color: var(--br-400);
            font-weight: 600;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#">
                <i class="bi bi-hexagon-fill text-primary me-2"></i>KEEPER LIBRARY
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navRes">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navRes">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-semibold">
                    @php
                        $navPages = \App\Models\Page::orderBy('order_index')->get();
                    @endphp

                    @foreach($navPages as $navPage)
                        @if(!is_null($navPage->html_content) || $navPage->is_default == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="loadPage('{{ $navPage->slug }}'); return false;">
                                    {{ $navPage->title }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <main id="page-content-area" class="page-content">
        @include('templates.partials.hero-right_content')
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        /**
         * GLOBAL PAGE DATA STATE
         * Blade loads first, API may override later
         */
        window.PAGE_DATA = {
            source: 'blade'
        };

        /**
         * MAIN DATA APPLIER
         * This handles BOTH Blade & API data
         */
        window.applyPageData = function (data) {
            if (!data || typeof data !== 'object') return;

            window.PAGE_DATA = { ...window.PAGE_DATA, ...data, source: 'api' };

            /* --- HERO --- */
            if (data.title) document.querySelector('.hero-title').textContent = data.title;
            if (data.description) document.querySelector('.hero-description').textContent = data.description;
            if (data.button) document.querySelector('.hero-btn').textContent = data.button;

            // Update Hero Image
            if (data.image) {
                const heroImg = document.querySelector('.hero-bg');
                if (heroImg) heroImg.src = data.image;
            }

            /* --- MISSION / VISION / GOALS (Using Data Keys) --- */
            // This is much safer than using array indexes [0] [1]
            const missionEl = document.querySelector('[data-key="mission"]');
            if (missionEl && data.mission) missionEl.textContent = data.mission;

            const visionEl = document.querySelector('[data-key="vision"]');
            if (visionEl && data.vision) visionEl.textContent = data.vision;

            const goalsEl = document.querySelector('[data-key="goals"]');
            if (goalsEl && data.goals) goalsEl.textContent = data.goals;

            /* --- ARRAYS --- */
            if (Array.isArray(data.staff)) renderStaff(data.staff);
            if (Array.isArray(data.news)) renderAnnouncements(data.news);
            if (Array.isArray(data.related_links)) renderLinks(data.related_links);
        };

        /* =====================================================
           POSTMESSAGE LISTENER (FOR IFRAME / PUBLIC SITE)
        ===================================================== */
        window.addEventListener('message', (event) => {
            const allowedOrigins = [
                'http://127.0.0.1:5500' //link of the public website
            ];

            if (!allowedOrigins.includes(event.origin)) return;
            if (!event.data || event.data.type !== 'PAGE_DATA') return;

            window.applyPageData(event.data.payload);
        });

        /* =====================================================
            RENDER FUNCTIONS (MATCHING OLD DESIGN)
        ===================================================== */

        function renderStaff(staff) {
            const container = document.getElementById('staff-container');
            if (!container) return;
            container.innerHTML = '';

            staff.forEach(user => {
                let socialHtml = '';
                const s = user.social_media; // It's an object in your JSON

                if (s) {
                    if (s.facebook) socialHtml += `<a href="${s.facebook}" class="social-icon-link"><i class="fab fa-facebook-f"></i></a>`;
                    if (s.twitter) socialHtml += `<a href="${s.twitter}" class="social-icon-link"><i class="fab fa-x-twitter"></i></a>`;
                    if (s.linkedin) socialHtml += `<a href="${s.linkedin}" class="social-icon-link"><i class="fab fa-linkedin-in"></i></a>`;
                    if (s.instagram) socialHtml += `<a href="${s.instagram}" class="social-icon-link"><i class="fab fa-instagram"></i></a>`;
                }

                container.innerHTML += `
            <div class="col-lg-4 col-md-6">
                <div class="staff-card">
                    <div class="staff-image-container">
                        <img src="${user.profile_image || '/images/defaults/avatar.png'}" class="staff-image" alt="${user.name}">
                    </div>
                    <div class="staff-info">
                        <div class="staff-role">${user.role || 'Staff'}</div>
                        <h3 class="staff-name">${user.name}</h3>
                        <div class="staff-social-links">
                            ${socialHtml || '<span class="text-muted small">Professional Profile</span>'}
                        </div>
                    </div>
                </div>
            </div>`;
            });
        }

        function renderAnnouncements(news) {
            const container = document.getElementById('announcement-list');
            if (!container) return;

            container.innerHTML = '';

            news.forEach(item => {
                const date = item.created_at ? new Date(item.created_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }) : '';
                const image = item.image || '/images/defaults/image-default.png';

                container.innerHTML += `
            <div class="announcement-card">
                <img src="${image}" class="ann-img" alt="${item.title}">
                <div class="ann-overlay">
                    <span class="ann-date">${date}</span>
                    <h3 class="ann-title">${item.title}</h3>
                    <p class="ann-content">${item.content}</p>
                </div>
            </div>
        `;
            });
        }

        function renderLinks(links) {
            const container = document.getElementById('related-links');
            if (!container) return;

            container.innerHTML = '';

            links.forEach(link => {
                // Use either link.url/link.label or just the string depending on your API format
                const url = typeof link === 'string' ? (link.includes('://') ? link : 'https://' + link) : link.url;
                const label = typeof link === 'string' ? link.split('.')[0] : link.label;

                container.innerHTML += `
            <div class="col-lg-4 col-md-6">
                <a href="${url}" target="_blank" class="link-preview-card">
                    <div class="link-thumbnail"><i class="bi bi-arrow-up-right"></i></div>
                    <div>
                        <span class="link-title" style="text-transform: capitalize;">${label}</span>
                        <p class="small text-muted mb-2">Deep dive into our ecosystem and master the workflow.</p>
                        <span class="link-url">${url}</span>
                    </div>
                </a>
            </div>
        `;
            });
        }

        /* =====================================================
           PAGE NAVIGATION (SLUG BASED)
        ===================================================== */
        async function initTestimonials() {
            handleAuthRedirect();
            await checkUserSession();
            fetchTestimonials();

        }

        function loadPage(slug) {
            const contentArea = document.getElementById('page-content-area');
            const ADMIN_URL = "http://127.0.0.1:8000";

            fetch(`${ADMIN_URL}/api/page/${slug}`)
                .then(res => {
                    if (!res.ok) throw new Error(`Server responded with ${res.status}`);
                    return res.text();
                })
                .then(html => {
                    // 1. Inject the HTML
                    contentArea.innerHTML = html;

                    // 2. Trigger scripts
                    const scripts = contentArea.querySelectorAll("script");
                    scripts.forEach((oldScript) => {
                        const newScript = document.createElement("script");
                        Array.from(oldScript.attributes).forEach(attr =>
                            newScript.setAttribute(attr.name, attr.value)
                        );
                        newScript.textContent = oldScript.textContent;
                        document.body.appendChild(newScript);
                        oldScript.remove();
                    });

                    // 3. HYDRATION FIX: Manually kickstart the logic
                    // We wait 100ms to ensure the scripts we just injected are parsed by the browser
                    setTimeout(() => {
                        if (slug === 'landing') {
                            if (typeof window.initTestimonials === 'function') {
                                console.log("Kicking off testimonials...");
                                window.initTestimonials();
                            } else {
                                console.warn("initTestimonials function not found in injected HTML.");
                            }
                        }
                    }, 100);

                    window.scrollTo({ top: 0, behavior: 'smooth' });
                })
                .catch(err => {
                    console.error("Hydration Error:", err);
                    contentArea.innerHTML = `<div class="alert alert-danger">Failed to load ${slug}.</div>`;
                });
        }

        /* =====================================================
           SMOOTH SCROLL
        ===================================================== */

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        /* =====================================================
           ACTIVE NAV LINK ON SCROLL
        ===================================================== */

        window.addEventListener('scroll', function () {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

            let current = '';
            sections.forEach(section => {
                if (scrollY >= section.offsetTop - 100) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });
    </script>

</body>

</html>