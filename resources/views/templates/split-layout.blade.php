<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Split Layout' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #818cf8;
            --accent: #c084fc;
            --primary-gradient: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            --bg-dark: #0f172a;
            --bg-card: #1e293b;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --border-color: rgba(255, 255, 255, 0.1);
            --glass: rgba(15, 23, 42, 0.8);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-main);
            background-color: var(--bg-dark);
            overflow-x: hidden;
            line-height: 1.6;
        }

        .navbar {
            backdrop-filter: blur(12px);
            background: var(--glass);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
        }

        .nav-link {
            color: var(--text-main) !important;
        }

        .hero-section {
            padding: 140px 0 60px;
            background: radial-gradient(circle at 50% 0%, rgba(99, 102, 241, 0.15), transparent 50%),
                        radial-gradient(circle at bottom left, rgba(168, 85, 247, 0.05), transparent);
            text-align: center;
        }

        .section-tag {
            display: inline-block;
            padding: 6px 16px;
            background: rgba(129, 140, 248, 0.15);
            color: var(--primary);
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
        }

        .display-3 {
            font-weight: 800;
            letter-spacing: -0.04em;
            background: linear-gradient(to bottom right, #ffffff 30%, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-modern {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: #fff;
            font-weight: 600;
        }

        .card-feature {
            border: 1px solid var(--border-color);
            border-radius: 28px;
            padding: 40px;
            background: var(--bg-card);
            transition: all 0.4s ease;
            height: 100%;
        }

        .card-feature:hover {
            border-color: var(--primary);
            transform: translateY(-8px);
            background: #243049;
        }

        .hero-img-container {
            max-width: 900px;
            margin: 0 auto;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.5);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
        }

        .link-preview-card {
            display: flex;
            gap: 16px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 20px;
            text-decoration: none;
            transition: all 0.3s ease;
            color: var(--text-main);
        }

        .link-preview-card:hover {
            background: #2d3a4f;
            color: var(--primary);
            border-color: var(--primary);
        }

        .link-thumbnail {
            background: rgba(255, 255, 255, 0.05);
            color: var(--primary);
        }

        .text-muted {
            color: var(--text-muted) !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 text-white" href="#">
                <i class="bi bi-hexagon-fill text-primary me-2"></i>LIBRARY
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navRes">
                <span class="navbar-toggler-icon navbar-dark"></span>
            </button>
            <div class="collapse navbar-collapse" id="navRes">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @php $navPages = \App\Models\Page::orderBy('order_index')->get(); @endphp
                    @foreach($navPages as $navPage)
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#">{{ $navPage->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-area">
        @include('templates.partials.split-layout_content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>