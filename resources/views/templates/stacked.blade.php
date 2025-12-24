<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stacked Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        /* ================= STACKED LAYOUT SPECIFIC ================= */
        body {
            font-family: 'Inter', sans-serif;
            color: #1e293b;
            background-color: #f8fafc;
        }

        .navbar {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.8);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-light .navbar-toggler-icon {
            filter: invert(0.3);
        }

        /* STACKED HERO SECTION */
        .stacked-hero {
            padding: 120px 0 80px;
            text-align: center;
            background: radial-gradient(circle at top, #e0e7ff 0%, #f8fafc 60%);
            position: relative;
        }

        .stacked-hero .floating-image {
            max-width: 600px;
            margin: 0 auto 40px;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            animation: floatStacked 6s ease-in-out infinite;
        }

        @keyframes floatStacked {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .stacked-hero h1 {
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .stacked-hero p {
            font-size: 1.125rem;
            color: #475569;
            margin-bottom: 2rem;
        }

        .btn-modern {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            color: white;
            border: none;
            padding: 12px 32px;
            border-radius: 12px;
            transition: transform 0.2s ease;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
        }

        /* CARDS */
        .card-feature {
            border: none;
            border-radius: 24px;
            padding: 40px;
            background: white;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }

        .card-feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
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

        /* STRATEGIC GOALS */
        .goals-section {
            background-color: #0f172a;
            color: white;
            border-radius: 40px;
            margin: 40px 20px;
            padding: 80px 20px;
            text-align: center;
        }

        .section-tag {
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.8rem;
            font-weight: 700;
            color: #818cf8;
        }

        /* RELATED LINKS */
        .link-preview-card {
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
        }

        .link-preview-card:hover {
            border-color: #6366f1;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
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
        }

        .link-title {
            font-weight: 600;
            color: #1e293b;
            font-size: 0.95rem;
            margin-bottom: 2px;
        }

        .link-description {
            font-size: 0.8rem;
            color: #64748b;
            line-height: 1.4;
        }

        .page-content {
            padding-top: 90px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">LIBRARY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navRes">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navRes">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @php $navPages = \App\Models\Page::orderBy('order_index')->get(); @endphp
                    @foreach($navPages as $navPage)
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-dark" href="#">{{ $navPage->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <main class="page-content">
        @include('templates.partials.stacked_content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>