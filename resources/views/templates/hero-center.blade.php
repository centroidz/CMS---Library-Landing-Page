<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Redesign</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            /* Blue Ribbon Palette */
            --br-50: #eef5ff;
            --br-100: #d9e8ff;
            --br-200: #bcd8ff;
            --br-400: #599dff;
            --br-500: #2a71fe;
            /* Primary Action */
            --br-600: #1c56f4;
            --br-950: #142157;
            /* Dark Text */

            --bg-body: #f8faff;
            --bg-card: #ffffff;
            --text-main: var(--br-950);
            --text-muted: #64748b;
            --border-soft: var(--br-100);
            --shadow: 0 10px 30px -5px rgba(25, 51, 143, 0.08);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-main);
            background-color: var(--bg-body);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* --- Navigation --- */
        .navbar {
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.8);
            border-bottom: 1px solid var(--border-soft);
            padding: 1.2rem 0;
        }

        .navbar-brand {
            color: var(--br-950) !important;
            letter-spacing: -0.5px;
        }

        .nav-link {
            color: var(--br-950) !important;
            font-size: 0.95rem;
            margin: 0 10px;
        }

        /* --- Section Styling --- */
        .hero-section {
            padding: 160px 0 100px;
            /* Mimics the soft circular pattern in your reference image */
            background-image:
                radial-gradient(circle at 15% 50%, var(--br-50) 0%, transparent 40%),
                radial-gradient(circle at 85% 30%, #f0f4ff 0%, transparent 40%);
        }

        .section-tag {
            display: inline-block;
            padding: 6px 16px;
            background: var(--br-50);
            color: var(--br-500);
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
        }

        .display-3 {
            font-weight: 800;
            color: var(--br-950);
            letter-spacing: -0.04em;
        }

        /* --- Card UI (Based on Image) --- */
        .card-feature {
            border: 1px solid var(--border-soft);
            border-radius: 32px;
            /* Extra rounded as seen in UI */
            padding: 40px;
            background: var(--bg-card);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
            box-shadow: var(--shadow);
        }

        .card-feature:hover {
            transform: translateY(-8px);
            border-color: var(--br-500);
            box-shadow: 0 20px 40px -10px rgba(42, 113, 254, 0.15);
        }

        .hero-img-container {
            max-width: 900px;
            margin: 0 auto;
            border-radius: 40px;
            overflow: hidden;
            box-shadow: var(--shadow);
            border: 8px solid white;
            /* Frame effect */
            background: white;
        }

        /* --- Buttons --- */
        .btn-modern {
            background: var(--br-500);
            color: white;
            border-radius: 16px;
            padding: 14px 32px;
            font-weight: 600;
            border: none;
            transition: 0.3s;
        }

        .btn-modern:hover {
            background: var(--br-600);
            transform: scale(1.02);
            color: white;
        }

        /* --- Resource Cards --- */
        .link-preview-card {
            display: flex;
            gap: 16px;
            background: var(--bg-card);
            border: 1px solid var(--border-soft);
            border-radius: 24px;
            padding: 24px;
            text-decoration: none;
            transition: all 0.3s ease;
            color: var(--text-main);
        }

        .link-preview-card:hover {
            background: var(--br-50);
            border-color: var(--br-200);
        }

        .link-thumbnail {
            width: 48px;
            height: 48px;
            min-width: 48px;
            background: var(--br-50);
            color: var(--br-500);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .goals-section {
            background: var(--br-500);
            padding: 100px 0;
            border-radius: 50px;
            margin: 60px 20px;
            color: white;
        }

        #page-content-area {
            padding-top: 0;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#">
                <i class="bi bi-hexagon-fill text-primary me-2"></i>LIBRARY
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navRes">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navRes">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-semibold">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Portfolio</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-area">
        @include('templates.partials.hero-center_content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>