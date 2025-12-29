<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Left Hero</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
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

            --bg-body: #2A71FE;
            --text-main: var(--br-950);
            --text-muted: #64748b;
            --text-light: rgba(255, 255, 255, 0.9);
            --border-soft: var(--br-100);
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
            --shadow: 0 10px 25px -5px rgba(25, 51, 143, 0.15);
            --shadow-lg: 0 20px 40px -10px rgba(25, 51, 143, 0.2);
            --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);

            --primary-gradient: linear-gradient(135deg, #8EC0FF 0%, #599DFF 100%);
            --primary-gradient-hover: linear-gradient(135deg, #9ac9ff 0%, #6aa8ff 100%);
            --glass-bg: rgba(255, 255, 255, 0.92);
            --card-bg: #ffffff;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: white;
            background-color: var(--bg-body);
            overflow-x: hidden;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Navbar */
        .navbar {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.4);
            border-bottom: 1px solid rgba(142, 192, 255, 0.3);
            padding: 1rem 0;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.4);
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
            border: 1px solid rgba(142, 192, 255, 0.4);
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
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%232a71fe' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2.5' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            width: 1.25em;
            height: 1.25em;
        }

        .nav-link {
            font-weight: 600;
            color: var(--br-950);
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--br-600);
            background: rgba(255, 255, 255, 0.6);
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

        /* Hero Section */
        .hero-section {
            padding: 180px 0 120px;
            background: radial-gradient(circle at top right, rgba(238, 245, 255, 0.3) 0%, var(--bg-body) 50%);
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
            opacity: 0.25;
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
            opacity: 0.15;
            z-index: 0;
            border-radius: 50%;
        }

        .section-tag {
            display: inline-block;
            padding: 10px 28px;
            background: var(--primary-gradient);
            color: white;
            border-radius: 100px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 2.5rem;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(89, 157, 255, 0.4);
            position: relative;
            z-index: 1;
        }

        .display-3 {
            font-weight: 800;
            color: var(--br-950); 
            line-height: 1.2;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .display-3::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 4px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        .lead {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.25rem;
            font-weight: 400;
            margin-bottom: 2.5rem;
            position: relative;
            z-index: 1;
        }

        .btn-modern {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 14px 36px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(89, 157, 255, 0.4);
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
            box-shadow: 0 12px 30px rgba(89, 157, 255, 0.6);
            color: white;
        }

        .btn-modern:hover::before {
            left: 0;
        }

        .btn-modern-outline {
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 12px 34px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-modern-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
        }

        /* Image Container */
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
            border: 8px solid rgba(255, 255, 255, 0.1);
        }

        .hero-img-container:hover {
            transform: translateY(-5px);
            border-color: rgba(255, 255, 255, 0.2);
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
            background: linear-gradient(to bottom, transparent 70%, rgba(0, 0, 0, 0.1) 100%);
            z-index: 1;
            pointer-events: none;
        }

        /* Mission & Vision Cards */
        .card-feature {
            border: none;
            border-radius: 24px;
            padding: 48px 40px;
            background: var(--primary-gradient); 
            color: #ffffff; 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .card-feature h3 {
            color: #ffffff; 
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .card-feature p {
            color: rgba(255, 255, 255, 0.9); 
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .card-feature:hover {
            transform: translateY(-12px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(142, 192, 255, 0.4);
        }

        .card-feature:hover h3 {
            color: var(--br-500);
        }

        /* Strategic Goals section */
        .goals-section {
            background: linear-gradient(135deg, var(--br-600) 0%, var(--br-400) 100%);
            color: white;
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
            opacity: 0.3;
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
            color: white;
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
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            line-height: 1.8;
            position: relative;
            z-index: 1;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--br-950) 0%, #0d1b3e 100%);
            color: rgba(255, 255, 255, 0.85);
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

        /* Container */
        .container {
            position: relative;
            z-index: 1;
        }

        /* Animation for page content */
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

        .page-content > * {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Text color */
        .text-dark-on-blue {
            color: var(--br-950) !important;
        }

        .text-light-on-blue {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        /* Glass effect for content cards */
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#" onclick="loadPage('landing'); return false;">
                LIBRARY
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navRes">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navRes">
                <ul class="navbar-nav ms-auto">
                    @php
                        $navPages = \App\Models\Page::orderBy('order_index')->get();
                    @endphp

                    @foreach($navPages as $navPage)
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-dark-on-blue" href="#"
                                onclick="loadPage('{{ $navPage->slug }}'); return false;">
                                {{ $navPage->title }}
                            </a>
                        </li>
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
        function loadPage(slug) {
            const contentArea = document.getElementById('page-content-area');
            const nav = document.getElementById('navRes');

            fetch(`/api/page/${slug}`)
                .then(res => res.text())
                .then(html => {
                    contentArea.innerHTML = html;
                    window.scrollTo({ top: 0, behavior: 'smooth' });

                    const bsCollapse = bootstrap.Collapse.getInstance(nav);
                    if (bsCollapse) bsCollapse.hide();
                });
        }

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    </script>

</body>
</html>