<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Left Hero</title>

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
            --br-600: #1a56db; /* Darker blue */
            --br-700: #1547b8; /* Even darker for accents */
            --br-950: #142157;

            /* UPDATED: Darker background color */
            --bg-body: #1a56db; /* Changed from #2A71FE to #1a56db */
            --bg-body-gradient: linear-gradient(135deg, #1a56db 0%, #0d47a1 100%);
            
            --text-main: var(--br-950);
            --text-muted: #64748b;
            --text-light: rgba(255, 255, 255, 0.95); /* Increased opacity for better contrast */
            --border-soft: var(--br-100);
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow: 0 10px 25px -5px rgba(25, 51, 143, 0.25); /* Darker shadows */
            --shadow-lg: 0 20px 40px -10px rgba(25, 51, 143, 0.3);
            --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.35);

            --primary-gradient: linear-gradient(135deg, #5d9cff 0%, #1a56db 100%); /* Updated gradient */
            --primary-gradient-hover: linear-gradient(135deg, #6aa8ff 0%, #2563eb 100%);
            --glass-bg: rgba(255, 255, 255, 0.92);
            --card-bg: #ffffff;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: white;
            /* UPDATED: Darker background with gradient */
            background: var(--bg-body-gradient);
            overflow-x: hidden;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        #about,
        #team,
        #announcement,
        #resources,
        #goals,
        .card-feature,
        .staff-card,
        .announcement-card {
            color: var(--br-950) !important;
        }

        html {
            scroll-behavior: smooth;
        }

        .navbar {
            backdrop-filter: blur(16px);
            /* UPDATED: Slightly darker navbar background */
            background: rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgba(142, 192, 255, 0.2);
            padding: 1rem 0;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.35);
            box-shadow: var(--shadow);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--br-600);
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--br-500);
        }

        .navbar-toggler {
            border: 1px solid rgba(142, 192, 255, 0.3);
            padding: 0.5rem 0.75rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.6);
        }

        .navbar-toggler:hover {
            border-color: var(--br-400);
            background: var(--br-50);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%231a56db' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2.5' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            width: 1.25em;
            height: 1.25em;
        }

        .nav-link {
            font-weight: 600;
            color: var(--br-950) !important;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--br-600) !important;
            background: rgba(255, 255, 255, 0.5);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary-gradient);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: calc(100% - 2rem);
        }

        .hero-section {
            padding: 180px 0 120px;
            /* UPDATED: Darker hero background */
            background: radial-gradient(circle at top right, rgba(238, 245, 255, 0.15) 0%, var(--bg-body) 50%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -20%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: var(--primary-gradient);
            filter: blur(150px);
            opacity: 0.2; /* Reduced opacity */
            z-index: 0;
            border-radius: 50%;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -20%;
            left: -10%;
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, var(--br-100) 0%, var(--br-200) 100%);
            filter: blur(120px);
            opacity: 0.1; /* Reduced opacity */
            z-index: 0;
            border-radius: 50%;
        }

        .section-tag {
            display: inline-block;
            padding: 10px 28px;
            background: rgba(255, 255, 255, 0.25) !important; /* More visible */
            color: white !important;
            border-radius: 100px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 2.5rem;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(89, 157, 255, 0.3);
            position: relative;
            z-index: 1;
        }

        .display-3 {
            font-weight: 800;
            color: white !important;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .display-3::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 4px;
            background: white !important;
            border-radius: 2px;
        }

        .lead {
            color: var(--text-light) !important; /* Using variable for consistency */
            font-size: 1.25rem;
            font-weight: 400;
            margin-bottom: 2.5rem;
            position: relative;
            z-index: 1;
        }

        .btn-modern {
            background: var(--primary-gradient);
            color: white !important;
            border: none;
            padding: 14px 36px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(26, 86, 219, 0.4); /* Updated shadow color */
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient-hover);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .btn-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(26, 86, 219, 0.5); /* Updated shadow color */
            color: white !important;
        }

        .btn-modern:hover::before {
            left: 0;
        }

        .btn-modern-outline {
            background: transparent;
            color: white !important;
            border: 2px solid rgba(255, 255, 255, 0.4); /* More visible border */
            padding: 12px 34px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-modern-outline:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: white;
            color: white !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.15);
        }

        .hero-img-container {
            width: 100%;
            height: 480px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            margin-top: 2rem;
            position: relative;
            z-index: 1;
            transition: transform 0.5s ease;
            border: 8px solid rgba(255, 255, 255, 0.15); /* Slightly more visible */
        }

        .hero-img-container:hover {
            transform: translateY(-5px);
            border-color: rgba(255, 255, 255, 0.25);
        }

        .hero-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .hero-img-container:hover img {
            transform: scale(1.03);
        }

        .hero-img-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 70%, rgba(0, 0, 0, 0.15) 100%);
            z-index: 1;
            pointer-events: none;
        }

        .card-feature {
            border: none;
            border-radius: 24px;
            padding: 48px 40px;
            background: white !important;
            color: var(--br-950) !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .card-feature h3 {
            color: var(--br-950) !important;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .card-feature p {
            color: var(--text-muted) !important;
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .card-feature:hover {
            transform: translateY(-12px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(142, 192, 255, 0.4);
        }

        .card-feature:hover h3 {
            color: var(--br-500) !important;
        }

        .goals-section {
            /* UPDATED: Darker gradient */
            background: linear-gradient(135deg, var(--br-700) 0%, var(--br-600) 100%);
            color: white !important;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .goals-section::before {
            content: '';
            position: absolute;
            top: 50%;
            right: 10%;
            width: 300px;
            height: 300px;
            background: var(--primary-gradient);
            filter: blur(100px);
            opacity: 0.25;
            z-index: 0;
            border-radius: 50%;
        }

        .goals-section::after {
            content: '';
            position: absolute;
            bottom: 10%;
            left: 10%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            filter: blur(80px);
            opacity: 0.2;
            z-index: 0;
            border-radius: 50%;
        }

        .goals-section h2 {
            color: white !important;
            font-weight: 700;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .goals-section h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background: white;
            border-radius: 2px;
        }

        .goals-section p {
            color: var(--text-light) !important;
            font-size: 1.2rem;
            line-height: 1.8;
            position: relative;
            z-index: 1;
        }

        .footer {
            /* UPDATED: Darker footer */
            background: linear-gradient(135deg, var(--br-950) 0%, #0a1633 100%);
            color: rgba(255, 255, 255, 0.9);
            padding: 4rem 0 2rem;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--br-500), transparent);
        }

        .footer a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--br-400);
        }

        .container {
            position: relative;
            z-index: 1;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-content>* {
            animation: fadeInUp 0.6s ease forwards;
        }

        .text-dark-on-blue {
            color: var(--br-950) !important;
        }

        .text-light-on-blue {
            color: var(--text-light) !important;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        /* UPDATED: "Meet Our Team" text styling - Improved visibility */
        .meet-team-description {
            color: #1e293b !important; /* Dark charcoal gray for high contrast */
            font-size: 1.25rem !important; /* Larger text */
            font-weight: 700 !important; /* Bolder weight */
            line-height: 1.6 !important;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.95) !important; /* Solid white background */
            border-radius: 12px;
            border-left: 5px solid var(--br-600);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
            margin-top: 10px;
            margin-bottom: 30px;
            display: inline-block;
        }

        .staff-section {
            padding: 80px 0;
            background-color: var(--bg-body);
        }

        .staff-card {
            border: 1px solid var(--border-soft);
            border-radius: 20px;
            background: white !important;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: var(--shadow);
            height: 100%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .staff-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(25, 51, 143, 0.2);
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
            color: var(--br-950) !important;
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
            color: var(--br-950) !important;
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

        .view-all-container {
            margin-top: 4rem;
        }

        .btn-view-all {
            padding: 12px 35px;
            border-radius: 50px;
            border: 2px solid var(--br-600);
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
            height: 30vh;
            min-height: 250px;
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            background-color: white !important;
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
            color: white !important;
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

        #goals .display-6 {
            color: var(--br-950) !important;
        }

        #goals .text-muted {
            color: var(--text-muted) !important;
        }

        #team h2,
        #team p {
            color: var(--br-950) !important;
        }

        #team .text-muted {
            color: var(--text-muted) !important;
        }

        #announcement h2 {
            color: var(--br-950) !important;
        }

        #resources h2 {
            color: var(--br-950) !important;
        }

        .btn-primary {
            color: white !important;
        }

        .btn-outline-primary {
            color: var(--br-600) !important;
            border-color: var(--br-600) !important;
        }

        .btn-outline-primary:hover {
            color: white !important;
            background-color: var(--br-600) !important;
        }

        #about a,
        #team a,
        #announcement a,
        #resources a,
        #goals a {
            color: var(--br-600) !important;
        }

        footer,
        footer * {
            color: white !important;
        }

        footer .text-muted {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        footer .text-primary {
            color: var(--br-400) !important;
        }

        /* Additional contrast improvements for dark background */
        .hero-title, 
        .hero-description,
        .section-title {
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
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
        @include('templates.partials.hero-left_content')
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

        window.applyPageData = function (data) {
            if (!data || typeof data !== 'object') return;

            window.PAGE_DATA = { ...window.PAGE_DATA, ...data, source: 'api' };

            if (data.title) document.querySelector('.hero-title').textContent = data.title;
            if (data.description) document.querySelector('.hero-description').textContent = data.description;
            if (data.button) document.querySelector('.hero-btn').textContent = data.button;

            if (data.image) {
                const heroImg = document.querySelector('.hero-bg');
                if (heroImg) heroImg.src = data.image;
            }

            const missionEl = document.querySelector('[data-key="mission"]');
            if (missionEl && data.mission) missionEl.textContent = data.mission;

            const visionEl = document.querySelector('[data-key="vision"]');
            if (visionEl && data.vision) visionEl.textContent = data.vision;

            const goalsEl = document.querySelector('[data-key="goals"]');
            if (goalsEl && data.goals) goalsEl.textContent = data.goals;

            if (Array.isArray(data.staff)) renderStaff(data.staff);
            if (Array.isArray(data.news)) renderAnnouncements(data.news);
            if (Array.isArray(data.related_links)) renderLinks(data.related_links);
            
            // Apply meet team description if available
            const meetTeamDescEl = document.querySelector('.meet-team-description');
            if (meetTeamDescEl && data.meet_team_description) {
                meetTeamDescEl.textContent = data.meet_team_description;
            }
        };

        window.addEventListener('message', (event) => {
            const allowedOrigins = [
                'http://127.0.0.1:5500'
            ];

            if (!allowedOrigins.includes(event.origin)) return;
            if (!event.data || event.data.type !== 'PAGE_DATA') return;

            window.applyPageData(event.data.payload);
        });

        function renderStaff(staff) {
            const container = document.getElementById('staff-container');
            if (!container) return;
            container.innerHTML = '';

            staff.forEach(user => {
                let socialHtml = '';
                const s = user.social_media;

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