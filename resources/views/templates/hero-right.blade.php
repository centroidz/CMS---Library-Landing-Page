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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#" onclick="loadPage('landing'); return false;">
                LIBRARY
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navRes"
                aria-controls="navRes" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navRes">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

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
        @include('templates.partials.hero-right_content')
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
                })
                .catch(err => console.error("Error loading page:", err));
        }

        // Simple animation on scroll
        document.addEventListener('DOMContentLoaded', function () {
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