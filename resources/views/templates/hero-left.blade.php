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

        /* Modern Navbar */
        .navbar {
            backdrop-filter: blur(10px);
            background: var(--glass-bg);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Hero Section */
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

        /* Mission/Vision Cards */
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

        /* Goals Section - Asymmetric Layout */
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

        /* Chips/Pills for Links */
        .link-chip {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 10px 20px;
            border-radius: 100px;
            text-decoration: none;
            color: #64748b;
            transition: all 0.2s;
        }

        .link-chip:hover {
            border-color: #6366f1;
            color: #6366f1;
            background: #f5f3ff;
        }

        /* Link Preview Card Style */
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

        .link-thumbnail i {
            font-size: 1.5rem;
            color: #94a3b8;
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

        .link-url {
            display: block;
            font-size: 0.7rem;
            color: #94a3b8;
            text-transform: lowercase;
            margin-top: 4px;
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
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">BRAND</a>
            <button class="btn btn-sm btn-outline-dark rounded-pill">Contact Us</button>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="section-tag mb-3 d-block">Welcome to the future</span>
                    <h1 class="display-3 fw-bold mb-4" style="letter-spacing: -1px;">{{ $title }}</h1>
                    <p class="lead text-muted mb-5" style="max-width: 90%;">{{ $description }}</p>
                    <div class="d-flex gap-3">
                        <button class="btn btn-modern shadow-lg">{{ $button }}</button>
                        <button class="btn btn-link text-dark fw-semibold text-decoration-none">Learn More <i
                                class="bi bi-arrow-right"></i></button>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="floating-image">
                        <div class="rounded-5 shadow-lg overflow-hidden"
                            style="background: var(--primary-gradient); height: 450px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-rocket-takeoff text-white" style="font-size: 10rem; opacity: 0.2;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card-feature shadow-sm">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary">
                            <i class="bi bi-lightning-charge-fill fs-4"></i>
                        </div>
                        <h3 class="fw-bold">Our Mission</h3>
                        <p class="text-muted leading-relaxed">
                            {{ $mission ?? 'We aim to redefine the industry standards through innovation and a relentless pursuit of excellence.' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-feature shadow-sm">
                        <div class="icon-box bg-success bg-opacity-10 text-success">
                            <i class="bi bi-eye-fill fs-4"></i>
                        </div>
                        <h3 class="fw-bold">Our Vision</h3>
                        <p class="text-muted leading-relaxed">
                            {{ $vision ?? 'To be the global leader in sustainable solutions, creating a better everyday life for people everywhere.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="goals-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <span class="section-tag mb-2 d-block">Strategy</span>
                    <h2 class="display-6 fw-bold mb-4">Strategic Goals</h2>
                </div>
                <div class="col-lg-8">
                    <p class="fs-5 opacity-75">
                        {{ $goals ?? 'Our strategy is built on three pillars: Operational Excellence, Customer Intimacy, and Product Leadership. We invest heavily in R&D to stay ahead.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="fw-bold m-0">Related Resources</h2>
                <span class="badge bg-light text-dark border">External Links</span>
            </div>

            <div class="row g-4">
                @forelse($related_links ?? [] as $link)
                    <div class="col-lg-4 col-md-6">
                        <a href="#" class="link-preview-card">
                            <div class="link-thumbnail">
                                <i class="bi bi-link-45deg"></i>
                            </div>
                            <div class="link-content">
                                <span class="link-title">{{ $link }}</span>
                                <span class="link-description">
                                    View details and explore the resources regarding {{ $link }}.
                                </span>
                                <span class="link-url">
                                    https://resource.link/{{ Str::slug($link) }}
                                </span>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        No related resources available.
                    </div>
                @endforelse
            </div>
        </div>
    </section>


    <footer class="py-4 border-top">
        <div class="container text-center text-muted small">
            &copy; 2024 Your Modern Site. All rights reserved.
        </div>
    </footer>

</body>

</html>