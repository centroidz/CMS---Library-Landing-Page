<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Redesign</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --br-50: #eef5ff;
            --br-100: #d9e8ff;
            --br-200: #bcd8ff;
            --br-400: #599dff;
            --br-500: #2a71fe;
            --br-600: #1c56f4;
            --br-950: #142157;
            --bg-body: #f8faff;
            --bg-card: #ffffff;
            --text-main: var(--br-950);
            --text-muted: #64748b;
            --border-soft: var(--br-100);
            --shadow: 0 10px 30px -5px rgba(25, 51, 143, 0.08);
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            padding-top: 76px;
            /* Account for fixed navbar */
        }

        /* Navbar styling */
        nav.navbar {
            background-color: var(--bg-card);
            box-shadow: var(--shadow);
            padding: 1rem 0;
        }

        .navbar-brand {
            color: var(--br-950) !important;
            font-size: 1.75rem;
        }

        .navbar-nav .nav-link {
            color: var(--text-muted);
            margin: 0 0.5rem;
            transition: color 0.2s;
        }

        .navbar-nav .nav-link:hover {
            color: var(--br-600);
        }

        /* Hero section */
        .hero-section {
            min-height: 600px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 4rem;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .hero-overlay {
            background: linear-gradient(to right, rgba(248, 250, 255, 0.95) 0%, rgba(248, 250, 255, 0.8) 100%);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .hero-content {
            max-width: 650px;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            color: var(--br-950);
        }

        .hero-description {
            font-size: 1.25rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .hero-btn {
            background-color: var(--br-500);
            color: white;
            border: none;
            padding: 0.875rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .hero-btn:hover {
            background-color: var(--br-600);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(42, 113, 254, 0.3);
        }

        /* Content sections */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            color: var(--br-950);
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 3rem;
        }

        .card-custom {
            background-color: var(--bg-card);
            border-radius: 12px;
            border: 1px solid var(--border-soft);
            box-shadow: var(--shadow);
            padding: 2rem;
            height: 100%;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px -10px rgba(25, 51, 143, 0.15);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background-color: var(--br-50);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .card-icon i {
            font-size: 1.75rem;
            color: var(--br-500);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--br-950);
        }

        .card-text {
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* Related links */
        .link-preview-card {
            display: flex;
            background-color: var(--bg-card);
            border-radius: 12px;
            border: 1px solid var(--border-soft);
            padding: 1.5rem;
            text-decoration: none;
            color: inherit;
            transition: all 0.2s;
            height: 100%;
        }

        .link-preview-card:hover {
            border-color: var(--br-400);
            box-shadow: var(--shadow);
            transform: translateY(-3px);
        }

        .link-thumbnail {
            width: 60px;
            height: 60px;
            background-color: var(--br-50);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.25rem;
            flex-shrink: 0;
        }

        .link-thumbnail i {
            font-size: 1.5rem;
            color: var(--br-500);
        }

        .link-title {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--br-950);
            display: block;
            margin-bottom: 0.5rem;
        }

        .link-url {
            font-size: 0.875rem;
            color: var(--br-500);
            font-weight: 500;
        }

        /* Footer */
        .footer {
            background-color: var(--br-950);
            color: white;
            padding: 4rem 0 2rem;
            margin-top: 6rem;
        }

        .footer-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: var(--br-100);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: white;
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            margin-top: 3rem;
            color: var(--br-200);
            font-size: 0.9rem;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.75rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.25rem;
            }

            .hero-description {
                font-size: 1.1rem;
            }
        }

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




    <div id="page-content-area">
        @include('templates.partials.default_content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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
            const nav = document.getElementById('navRes');

            fetch(`/api/page/${slug}`)
                .then(res => res.text())
                .then(html => {
                    contentArea.innerHTML = html;
                    window.scrollTo({ top: 0, behavior: 'smooth' });

                    if (slug === 'landing') {
                        initTestimonials();
                    }

                    const bsCollapse = bootstrap.Collapse.getInstance(nav);
                    if (bsCollapse) bsCollapse.hide();
                })
                .catch(err => console.error("Error loading page:", err));
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