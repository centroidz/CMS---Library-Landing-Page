<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Left Hero</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

            --bg-body: #2A71FE;
            --text-main: var(--br-950);
            --text-muted: #64748b;
            --border-soft: var(--br-100);
            --shadow: 0 10px 30px -5px rgba(25, 51, 143, 0.08);

            --primary-gradient: linear-gradient(135deg, #8EC0FF 0%, #599DFF 100%);
            --glass-bg: rgba(255, 255, 255, 0.5);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-main);
            background-color: var(--bg-body);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Navbar */
        .navbar {
            backdrop-filter: blur(10px);
            background: var(--glass-bg);
            border-bottom: 1px solid var(--border-soft);
            padding: 1rem 0;
        }

        .navbar-toggler {
            border: 1px solid var(--border-soft);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%232a71fe' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Hero image card opacity */
        .hero-card {
            opacity: 0.6; /* adjust this value to lower or increase opacity */
            transition: opacity 0.3s ease;
        }

        .hero-card:hover {
            opacity: 1; /* optional: makes card fully visible on hover */
        }

        /* Hero Section */
        .hero-section {
            padding: 160px 0 100px;
            background: radial-gradient(circle at top right, var(--br-50) 0%, var(--bg-body) 50%);
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
            opacity: 0.15;
            z-index: 0;
        }

        .section-tag {
            display: inline-block;
            padding: 8px 24px;
            background: var(--primary-gradient);
            color: white;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 2rem;
            letter-spacing: 0.8px;
        }

        .display-3 {
            font-weight: 800;
            color: var(--br-950);
        }

        .lead {
            color: var(--text-muted);
        }

        .btn-modern {
            background: #8EC0FF;
            color: var(--br-950);
            border: none;
            padding: 12px 32px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .btn-modern:hover {
            background: #A6D0FF;
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(142, 192, 255, 0.35);
        }

        /* Image */
        .hero-img-container {
            width: 100%;
            height: 450px;
            border-radius: 2rem;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            margin-top: 2rem;
        }

        .hero-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ✅ Mission & Vision Cards */
        .card-feature {
            border: none;
            border-radius: 24px;
            padding: 40px;
            background: var(--primary-gradient);
            color: #ffffff;
            transition: all 0.3s ease;
            height: 100%;
        }

        .card-feature h3 {
            color: #ffffff;
        }

        .card-feature p {
            color: rgba(255, 255, 255, 0.9);
        }

        .card-feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* Strategic Goals section */
        .goals-section {
             background: linear-gradient(135deg, #2A71FE 0%, #1c56f4 100%);
             color: rgba(5, 0, 47, 0.85);
        }

        .goals-section p {
            opacity: 0.9;
        }

        /* Footer */
        .footer {
             background: #1c56f4;
             color: rgba(255, 255, 255, 0.75);
             padding: 2rem 0;
        }

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
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
                            <a class="nav-link fw-semibold text-dark" href="#"
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
    </script>

</body>
</html>
