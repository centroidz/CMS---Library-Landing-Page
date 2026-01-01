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
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-main);
            background-color: var(--bg-body);
            overflow-x: hidden;
            line-height: 1.6;
            position: relative;
        }

        /* --- Background Patterns --- */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 10% 20%, rgba(217, 232, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 90% 80%, rgba(188, 216, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(238, 245, 255, 0.05) 0%, transparent 60%);
            z-index: -1;
            pointer-events: none;
        }

        /* --- Navigation --- */
        .navbar {
            background: linear-gradient(135deg, var(--br-50) 0%, white 100%);
            backdrop-filter: blur(10px);
            box-shadow: var(--shadow);
            border-bottom: 1px solid var(--border-soft);
            transition: all 0.3s ease;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.98);
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            box-shadow: 0 5px 20px rgba(25, 51, 143, 0.1);
        }

        .navbar-brand {
            color: var(--br-600) !important;
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
            transition: all 0.3s ease;
            padding: 0.5rem 0;
        }

        .navbar-brand:hover {
            color: var(--br-500) !important;
            transform: translateY(-1px);
        }

        .navbar-brand i {
            color: var(--br-400);
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover i {
            transform: rotate(15deg);
        }

        .nav-link {
            color: var(--text-muted) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            margin: 0 0.25rem;
            border-radius: 0.5rem;
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--br-400), var(--br-500));
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .nav-link:hover {
            color: var(--br-600) !important;
            background: var(--br-50);
            transform: translateY(-1px);
        }

        .nav-link:hover::before {
            width: 70%;
        }

        .nav-link.active {
            color: var(--br-600) !important;
            font-weight: 600;
        }

        .nav-link.active::before {
            width: 70%;
            background: linear-gradient(90deg, var(--br-500), var(--br-600));
        }

        .navbar-toggler {
            border: 1px solid var(--border-soft);
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(42, 113, 254, 0.1);
            border-color: var(--br-400);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%232a71fe' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            transition: transform 0.3s ease;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
            transform: rotate(90deg);
        }

        /* Animation for dropdown menu */
        .navbar-collapse {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .navbar-collapse.collapsing {
            opacity: 0;
            transform: translateY(-10px);
        }

        .navbar-collapse.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .navbar-nav {
                padding: 1rem 0;
                background: white;
                border-radius: 1rem;
                box-shadow: var(--shadow);
                margin-top: 1rem;
            }

            .nav-item {
                margin: 0.25rem 0;
            }

            .nav-link {
                margin: 0;
                border-radius: 0.5rem;
            }

            .nav-link:hover {
                background: var(--br-50);
            }

            .nav-link::before {
                display: none;
            }
        }

        /* Ripple effect for clicks */
        .ripple {
            position: relative;
            overflow: hidden;
        }

        .ripple::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(42, 113, 254, 0.3);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .ripple:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }

            20% {
                transform: scale(25, 25);
                opacity: 0.3;
            }

            100% {
                transform: scale(50, 50);
                opacity: 0;
            }
        }

        /* --- Keep Hero Section Exactly As Is --- */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 80px;
            overflow: hidden;
        }

        .hero-bg-container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
        }

        .hero-bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .hero-bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg,
                    rgba(255, 255, 255, 0.15) 0%,
                    rgba(195, 219, 252, 0.41) 30%,
                    rgba(165, 184, 213, 0.4) 70%,
                    rgba(255, 255, 255, 0.5) 100%);
        }

        .text-content-container {
            position: relative;
            z-index: 1;
            padding: 80px 40px;
            border-radius: 32px;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(4px);
            box-shadow:
                0 20px 60px -20px rgba(25, 51, 143, 0.15),
                inset 0 1px 0 0 rgba(255, 255, 255, 0);
            border: 1px solid rgba(255, 255, 255, 0);
            max-width: 1000px;
            margin: 0 auto;
            width: 90%;

        }

        .section-tag {
            display: inline-block;
            padding: 8px 24px;
            background: linear-gradient(135deg, var(--br-400), var(--br-600));
            color: white;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 2rem;
            letter-spacing: 0.8px;
            box-shadow: 0 4px 12px rgba(42, 126, 254, 0.2);
        }

        .display-3 {
            font-weight: 800;
            color: var(--br-950);
            letter-spacing: -0.02em;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .lead {
            color: var(--text-muted);
            font-size: 1.2rem;
            line-height: 1.7;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 2.5rem !important;
        }

        /* --- Mission & Vision Section --- */
        .mission-vision-section {
            position: relative;
            padding: 100px 0;
            background: var(--bg-body);
            overflow: hidden;
        }

        .mission-vision-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100px;
            background:
                radial-gradient(circle at 20% 0%, rgba(89, 157, 255, 0.1) 0%, transparent 70%),
                radial-gradient(circle at 80% 0%, rgba(42, 113, 254, 0.05) 0%, transparent 70%);
        }

        /* Wave Pattern Container */
        .wave-container {
            position: relative;
            padding: 60px 0;
        }

        .wave-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23eef5ff' fill-opacity='0.6' d='M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }

        /* Floating Circle Cards */
        .circle-card {
            border: none;
            padding: 50px 40px;
            background: var(--bg-card);
            border-radius: 24px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 40px -15px rgba(25, 51, 143, 0.08);
        }

        .circle-card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(89, 157, 255, 0.08), rgba(42, 113, 254, 0.04));
            transition: all 0.5s ease;
        }

        .circle-card::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: -30px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(217, 232, 255, 0.1), rgba(188, 216, 255, 0.05));
            transition: all 0.5s ease;
        }

        .circle-card:hover::before {
            transform: scale(1.2) translate(-20px, -20px);
        }

        .circle-card:hover::after {
            transform: scale(1.2) translate(20px, 20px);
        }

        .circle-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -15px rgba(42, 113, 254, 0.15);
        }

        .circle-card-content {
            position: relative;
            z-index: 2;
        }

        .circle-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--br-50), white);
            box-shadow: 0 10px 25px rgba(217, 232, 255, 0.5);
            position: relative;
            overflow: hidden;
        }

        .circle-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 40%, rgba(89, 157, 255, 0.1) 50%, transparent 60%);
            border-radius: 50%;
        }

        /* --- Strategic Goals Section --- */
        .goals-section {
            position: relative;
            padding: 120px 0;
            background: linear-gradient(135deg, var(--br-400), var(--br-600));
            color: white;
            overflow: hidden;
        }

        .goals-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        }

        /* Floating Circles Animation */
        .floating-circles {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            animation: float 20s infinite linear;
        }

        .floating-circle:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 15%;
            animation-delay: -5s;
        }

        .floating-circle:nth-child(3) {
            width: 80px;
            height: 80px;
            bottom: 30%;
            left: 20%;
            animation-delay: -10s;
        }

        .floating-circle:nth-child(4) {
            width: 120px;
            height: 120px;
            top: 40%;
            right: 25%;
            animation-delay: -15s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(30px, -30px) rotate(120deg);
            }

            66% {
                transform: translate(-20px, 20px) rotate(240deg);
            }
        }

        .goals-content {
            position: relative;
            z-index: 2;
        }

        /* Wave Text Container */
        .wave-text-container {
            position: relative;
            display: inline-block;
        }

        .wave-text-container::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 4px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
            border-radius: 2px;
        }

        /* --- Resources Section --- */
        .resources-section {
            position: relative;
            padding: 100px 0;
            background: var(--bg-body);
        }

        .resources-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23eef5ff' fill-opacity='0.4' d='M0,256L48,245.3C96,235,192,213,288,186.7C384,160,480,128,576,138.7C672,149,768,203,864,213.3C960,224,1056,192,1152,170.7C1248,149,1344,139,1392,133.3L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }

        /* Resource Cards with Circular Elements */
        .resource-card {
            display: flex;
            gap: 20px;
            background: var(--bg-card);
            border: none;
            border-radius: 24px;
            padding: 30px;
            text-decoration: none;
            transition: all 0.4s ease;
            color: var(--text-main);
            height: 100%;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px -10px rgba(25, 51, 143, 0.08);
        }

        .resource-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg,
                    transparent 0%,
                    rgba(217, 232, 255, 0.1) 50%,
                    transparent 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .resource-card:hover::before {
            opacity: 1;
        }

        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -15px rgba(42, 113, 254, 0.12);
        }

        .resource-icon-circle {
            width: 60px;
            height: 60px;
            min-width: 60px;
            background: linear-gradient(135deg, var(--br-50), var(--br-100));
            color: var(--br-500);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(217, 232, 255, 0.4);
        }

        .resource-icon-circle::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 60%, rgba(89, 157, 255, 0.1) 70%, transparent 80%);
            border-radius: 50%;
        }

        .resource-content {
            flex: 1;
        }

        /* --- Footer --- */
        .wave-footer {
            position: relative;
            padding: 70px 0 40px;
            background: linear-gradient(180deg, var(--br-50) 0%, var(--bg-body) 100%);
            overflow: hidden;
        }

        .wave-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23ffffff' d='M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,138.7C672,128,768,160,864,176C960,192,1056,192,1152,170.7C1248,149,1344,107,1392,85.3L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }

        .footer-circles {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            pointer-events: none;
        }

        .footer-circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(89, 158, 255, 0.13), rgba(42, 113, 254, 0.02));
        }

        .footer-circle:nth-child(1) {
            width: 200px;
            height: 200px;
            bottom: -100px;
            left: -100px;
        }

        .footer-circle:nth-child(2) {
            width: 150px;
            height: 150px;
            top: -75px;
            right: -75px;
        }

        .footer-content {
            position: relative;
            z-index: 2;
        }

        /* --- Buttons (Kept from original for consistency) --- */
        .btn-modern {
            background: linear-gradient(135deg, var(--br-400), var(--br-600));
            color: white;
            border-radius: 16px;
            padding: 16px 40px;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(42, 126, 254, 0.25);
            font-size: 1rem;
        }

        .btn-modern:hover {
            background: linear-gradient(135deg, var(--br-600), var(--br-800));
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(42, 126, 254, 0.35);
            color: white;
        }

        .btn-outline-modern {
            border: 2px solid var(--br-500);
            color: var(--br-500);
            border-radius: 16px;
            padding: 14px 36px;
            font-weight: 600;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .btn-outline-modern:hover {
            background: var(--br-50);
            border-color: var(--br-600);
            color: var(--br-600);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(42, 126, 254, 0.15);
        }

        #page-content-area {
            padding-top: 0;
        }

        /* --- Responsive adjustments --- */
        @media (max-width: 992px) {
            .display-3 {
                font-size: 2.8rem;
                max-width: 90%;
            }

            .lead {
                font-size: 1.1rem;
                max-width: 90%;
            }

            .text-content-container {
                padding: 60px 30px;
                width: 95%;
            }

            .mission-vision-section,
            .goals-section,
            .resources-section {
                padding: 80px 0;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: 80vh;
                padding-top: 60px;
            }

            .text-content-container {
                padding: 50px 25px;
                border-radius: 24px;
                backdrop-filter: blur(15px);
            }

            .display-3 {
                font-size: 2.3rem;
            }

            .lead {
                font-size: 1rem;
            }

            .circle-card {
                padding: 40px 30px;
            }

            .circle-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .floating-circles {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .text-content-container {
                padding: 40px 20px;
                border-radius: 20px;
                width: 100%;
                margin: 0 15px;
            }

            .display-3 {
                font-size: 2rem;
            }

            .section-tag {
                padding: 6px 20px;
                font-size: 0.75rem;
            }

            .btn-modern,
            .btn-outline-modern {
                padding: 12px 24px;
                width: 100%;
                margin-bottom: 10px;
            }

            .btn-outline-modern {
                margin-bottom: 0;
            }

            .circle-card::before,
            .circle-card::after {
                display: none;
            }
        }


        /*additional styles*/
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
        @include('templates.partials.hero-center_content')
    </div>

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