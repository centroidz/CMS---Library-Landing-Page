<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Services | Digital Knowledge Hub</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #0a1a32;
            --secondary-blue: #1547a3;
            --accent-blue: #4a90e2;
            --vivid-blue: #00b8ff;
            --light-blue: #e8f4ff;
            --deep-blue: #082255;
            --gold-accent: #ffc145;
            --coral: #ff6b6b;
            --success: #00d4aa;
            --nav-bg: rgba(10, 26, 50, 0.98);
            --text-dark: #0a1a32;
            --text-light: #ffffff;
            --glass-bg: rgba(255, 255, 255, 0.12);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-lg: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --shadow-xl: 0 35px 60px -15px rgba(0, 0, 0, 0.3);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: 
                radial-gradient(ellipse at 20% 20%, rgba(74, 144, 226, 0.05) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 80%, rgba(255, 193, 69, 0.04) 0%, transparent 50%),
                linear-gradient(135deg, #f8fbff 0%, #f0f7ff 100%);
            color: var(--text-dark);
            padding-top: 0;
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
        }
        
        /* Animated Background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            overflow: hidden;
        }
        
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, var(--accent-blue) 0%, transparent 70%);
            opacity: 0.03;
            filter: blur(40px);
        }
        
        /* Navigation - Premium Design */
        .navbar {
            background: var(--nav-bg);
            backdrop-filter: blur(30px) saturate(180%);
            -webkit-backdrop-filter: blur(30px) saturate(180%);
            box-shadow: 
                0 4px 30px rgba(0, 0, 0, 0.25),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            padding: 1.2rem 0;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            z-index: 1000;
        }
        
        .navbar.scrolled {
            padding: 0.8rem 0;
            background: rgba(10, 26, 50, 0.98);
        }
        
        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 1.8rem;
            background: linear-gradient(135deg, #ffffff 0%, #a8d0ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 20px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .navbar-brand:hover {
            background: rgba(255, 255, 255, 0.05);
        }
        
        .navbar-brand i {
            font-size: 2rem;
            background: linear-gradient(135deg, var(--vivid-blue), var(--accent-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 600;
            padding: 0.8rem 1.5rem !important;
            margin: 0 0.3rem;
            border-radius: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, 
                rgba(74, 144, 226, 0.15) 0%,
                rgba(0, 184, 255, 0.15) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
            border-radius: 10px;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: white !important;
            transform: translateY(-2px);
        }
        
        .nav-link:hover::before,
        .nav-link.active::before {
            opacity: 1;
        }
        
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            width: 6px;
            height: 6px;
            background: var(--gold-accent);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--gold-accent);
        }
        
        /* Hero Section - Modern Design */
        .hero-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            padding: 100px 80px 80px;
            background: linear-gradient(
                135deg,
                rgba(10, 26, 50, 0.95) 0%,
                rgba(21, 71, 163, 0.85) 100%
            );
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
            overflow: hidden;
        }
        
        .hero-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 30% 30%, rgba(0, 184, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 70% 70%, rgba(255, 193, 69, 0.08) 0%, transparent 50%);
            z-index: 1;
        }
        
        .hero-content {
            flex: 1;
            position: relative;
            z-index: 2;
        }
        
        .hero-image {
            flex: 1;
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .hero-image-wrapper {
            position: relative;
            width: 100%;
            max-width: 550px;
            height: 450px;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .hero-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hero-image-wrapper:hover img {
            transform: scale(1.08);
        }
        
        .subtitle {
            display: inline-block;
            padding: 10px 25px;
            background: rgba(255, 255, 255, 0.1);
            color: var(--vivid-blue);
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 30px;
            border-radius: 25px;
            border: 1px solid rgba(0, 184, 255, 0.2);
            backdrop-filter: blur(10px);
        }
        
        .main-title {
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 25px;
            line-height: 1.1;
            background: linear-gradient(135deg, #ffffff 0%, #a8d0ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .main-title .highlight {
            color: var(--gold-accent);
            -webkit-text-fill-color: var(--gold-accent);
        }
        
        .description {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            line-height: 1.8;
            max-width: 600px;
            margin-top: 30px;
            padding-left: 25px;
            border-left: 4px solid var(--gold-accent);
        }
        
      /* Mission & Vision Section */
.mission-vision-section {
    padding: 120px 80px;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    position: relative;
}

.section-header {
    text-align: center;
    margin-bottom: 80px;
}

.section-badge {
    display: inline-block;
    padding: 12px 30px;
    background: linear-gradient(135deg, var(--accent-blue), var(--vivid-blue));
    color: white;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    border-radius: 25px;
    margin-bottom: 25px;
    font-size: 0.9rem;
    box-shadow: 0 10px 20px rgba(74, 144, 226, 0.2);
}

.section-title {
    font-family: 'Poppins', sans-serif;
    font-size: 3.2rem;
    font-weight: 900;
    color: var(--deep-blue);
    margin-bottom: 20px;
    background: linear-gradient(135deg, var(--deep-blue), var(--secondary-blue));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.mv-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    max-width: 1200px;
    margin: 0 auto;
}

.mv-card {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.95) 0%,
        rgba(248, 250, 255, 0.9) 100%);
    border-radius: 30px;
    padding: 50px;
    box-shadow: 
        0 20px 40px rgba(10, 26, 50, 0.08),
        0 1px 3px rgba(0, 0, 0, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.5);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.mv-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.5s ease;
}

.mission-card::before {
    background: linear-gradient(90deg, var(--accent-blue), var(--vivid-blue));
}

.vision-card::before {
    background: linear-gradient(90deg, var(--gold-accent), #ffd166);
}

.mv-card:hover {
    transform: translateY(-15px);
    box-shadow: 
        0 30px 60px rgba(10, 26, 50, 0.12),
        0 10px 20px rgba(0, 0, 0, 0.08);
}

.mv-card:hover::before {
    transform: scaleX(1);
}

.mv-card-header {
    margin-bottom: 30px;
}

.mv-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--accent-blue), var(--vivid-blue));
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 25px;
    font-size: 2rem;
    color: white;
    box-shadow: 0 10px 20px rgba(74, 144, 226, 0.3);
}

.vision-card .mv-icon {
    background: linear-gradient(135deg, var(--gold-accent), #ffd166);
    box-shadow: 0 10px 20px rgba(255, 193, 69, 0.3);
}

.mv-card-header h3 {
    font-family: 'Poppins', sans-serif;
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--deep-blue);
    margin-bottom: 15px;
}

.mv-divider {
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, var(--accent-blue), transparent);
    border-radius: 2px;
}

.vision-card .mv-divider {
    background: linear-gradient(90deg, var(--gold-accent), transparent);
}

.mv-card-body {
    margin-bottom: 35px;
}

.mv-card-body p {
    color: var(--text-dark);
    font-size: 1.1rem;
    line-height: 1.9;
    opacity: 0.9;
}

.mv-card-footer {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.mv-tag {
    padding: 8px 18px;
    background: rgba(74, 144, 226, 0.1);
    color: var(--accent-blue);
    font-size: 0.85rem;
    font-weight: 600;
    border-radius: 20px;
    border: 1px solid rgba(74, 144, 226, 0.2);
    transition: all 0.3s ease;
}

.vision-card .mv-tag {
    background: rgba(255, 193, 69, 0.1);
    color: var(--gold-accent);
    border-color: rgba(255, 193, 69, 0.2);
}

.mv-tag:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Responsive Design */
@media (max-width: 992px) {
    .mission-vision-section {
        padding: 100px 40px;
    }
    
    .section-title {
        font-size: 2.8rem;
    }
    
    .mv-container {
        grid-template-columns: 1fr;
        gap: 30px;
        max-width: 600px;
    }
    
    .mv-card {
        padding: 40px;
    }
}

@media (max-width: 768px) {
    .mission-vision-section {
        padding: 80px 30px;
    }
    
    .section-title {
        font-size: 2.4rem;
    }
    
    .section-badge {
        font-size: 0.8rem;
        padding: 10px 25px;
    }
    
    .mv-icon {
        width: 60px;
        height: 60px;
        font-size: 1.8rem;
    }
    
    .mv-card-header h3 {
        font-size: 1.6rem;
    }
    
    .mv-card-body p {
        font-size: 1rem;
    }
}

@media (max-width: 576px) {
    .mission-vision-section {
        padding: 60px 20px;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .mv-card {
        padding: 30px 25px;
    }
    
    .mv-card-footer {
        justify-content: center;
    }
    
    .mv-tag {
        padding: 6px 15px;
        font-size: 0.8rem;
    }
}
        
        /* Strategic Goals - Horizontal Hexagons */
.strategic-goals-section {
    padding: 100px 80px;
    background: linear-gradient(135deg, 
        rgba(240, 247, 255, 0.9) 0%,
        rgba(230, 240, 255, 0.8) 100%);
    position: relative;
}

.goals-container {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
}

.hexagon-row {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 80px; /* Increased gap for better spacing */
    margin-bottom: 60px;
    flex-wrap: nowrap;
    width: 100%;
}

.hexagon-item {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    flex-shrink: 0; /* Prevent shrinking */
}

.hexagon-wrapper {
    position: relative;
    width: 140px; /* Increased size */
    height: 140px; /* Increased size */
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 25px;
}

.hexagon-svg {
    width: 100%;
    height: 100%;
    filter: drop-shadow(0 10px 20px rgba(10, 26, 50, 0.15));
}

.hexagon-item:hover {
    transform: translateY(-10px);
}

.hexagon-label {
    font-weight: 700;
    color: var(--deep-blue);
    font-size: 1.1rem;
    text-align: center;
    margin-top: 15px;
    white-space: nowrap;
}

/* Ensure they stay in one line on all screens */
@media (max-width: 1200px) {
    .hexagon-row {
        gap: 60px;
    }
    .hexagon-wrapper {
        width: 120px;
        height: 120px;
    }
}

@media (max-width: 992px) {
    .hexagon-row {
        gap: 40px;
    }
    .hexagon-wrapper {
        width: 100px;
        height: 100px;
    }
}

@media (max-width: 768px) {
    .hexagon-row {
        gap: 30px;
    }
    .hexagon-wrapper {
        width: 90px;
        height: 90px;
    }
    .hexagon-label {
        font-size: 0.95rem;
    }
}

/* For very small screens, reduce gap but keep in one line */
@media (max-width: 576px) {
    .strategic-goals-section {
        padding: 80px 20px;
    }
    
    .hexagon-row {
        gap: 20px;
        flex-wrap: nowrap; /* Keep them in one line */
        overflow-x: auto; /* Allow horizontal scrolling if needed */
        justify-content: flex-start; /* Align to start */
        padding: 0 10px;
        -webkit-overflow-scrolling: touch; /* Smooth scrolling on mobile */
        scrollbar-width: none; /* Hide scrollbar */
    }
    
    .hexagon-row::-webkit-scrollbar {
        display: none; /* Hide scrollbar */
    }
    
    .hexagon-item {
        flex: 0 0 auto; /* Don't grow or shrink */
    }
    
    .hexagon-wrapper {
        width: 80px;
        height: 80px;
        margin-bottom: 15px;
    }
    
    .hexagon-label {
        font-size: 0.85rem;
    }
}
        
        
        /* Resources Section */
        .resources-section {
            padding: 100px 80px;
            background: white;
            position: relative;
        }
        
        .resources-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .resource-card {
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.9) 0%,
                rgba(248, 250, 255, 0.8) 100%);
            padding: 40px;
            border-radius: 20px;
            border: 1px solid rgba(10, 26, 50, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            color: inherit;
        }
        
        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(10, 26, 50, 0.1);
            border-color: var(--accent-blue);
        }
        
        .resource-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--accent-blue), var(--vivid-blue));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            font-size: 1.5rem;
            color: white;
        }
        
        .resource-card h4 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--deep-blue);
            margin-bottom: 15px;
        }
        
        /* Footer */
        .footer {
            background: var(--deep-blue);
            color: white;
            padding: 60px 40px 40px;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-container,
            .mission-vision-container,
            .strategic-goals-section,
            .resources-section {
                padding-left: 60px;
                padding-right: 60px;
            }
            
            .stats-section {
                margin: -50px 60px 60px;
                padding: 60px;
            }
        }
        
        @media (max-width: 992px) {
            .hero-container {
                flex-direction: column;
                padding: 120px 40px 60px;
                text-align: center;
            }
            
            .hero-image-wrapper {
                max-width: 500px;
                height: 400px;
                margin-top: 40px;
            }
            
            .main-title {
                font-size: 3.2rem;
            }
            
            .mission-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .hexagon-row {
                gap: 40px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .hero-container,
            .mission-vision-container,
            .strategic-goals-section,
            .resources-section {
                padding-left: 30px;
                padding-right: 30px;
            }
            
            .stats-section {
                margin: -30px 30px 30px;
                padding: 40px 30px;
            }
            
            .main-title {
                font-size: 2.8rem;
            }
            
            .section-title {
                font-size: 2.5rem;
            }
            
            .stat-number {
                font-size: 3rem;
            }
        }
        
        @media (max-width: 576px) {
            .hero-container {
                padding: 100px 20px 40px;
            }
            
            .main-title {
                font-size: 2.3rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .hexagon-row {
                gap: 30px;
            }
            
            .hexagon-wrapper {
                width: 100px;
                height: 100px;
            }
            
            .mission-card,
            .resource-card {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="animated-bg" id="animated-bg"></div>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#" onclick="loadPage('landing'); return false;">
                <span>LIBRARY<span class="highlight">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navRes"
                aria-controls="navRes" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list" style="color: white; font-size: 1.5rem;"></i>
            </button>

            <div class="collapse navbar-collapse" id="navRes">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @php
                        $navPages = \App\Models\Page::orderBy('order_index')->get();
                    @endphp

                    @foreach($navPages as $navPage)
                        <li class="nav-item">
                            <a class="nav-link @if($loop->first) active @endif" href="#"
                                onclick="loadPage('{{ $navPage->slug }}'); return false;">
                                <i class="bi bi-dot me-1"></i>
                                {{ $navPage->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-area">
        @include('templates.partials.stacked_content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p style="opacity: 0.8; font-size: 0.9rem;">© 2024 Library Digital Hub. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Create floating shapes
        function createFloatingShapes() {
            const container = document.getElementById('animated-bg');
            if (!container) return;
            
            const colors = ['#4a90e2', '#00b8ff', '#ffc145'];
            
            for (let i = 0; i < 5; i++) {
                const shape = document.createElement('div');
                shape.className = 'floating-shape';
                
                const size = Math.random() * 300 + 100;
                shape.style.width = `${size}px`;
                shape.style.height = `${size}px`;
                shape.style.left = `${Math.random() * 100}vw`;
                shape.style.top = `${Math.random() * 100}vh`;
                shape.style.background = `radial-gradient(circle, ${colors[i % 3]} 0%, transparent 70%)`;
                shape.style.animation = `floatShape ${Math.random() * 20 + 20}s linear infinite`;
                shape.style.animationDelay = `${Math.random() * 5}s`;
                
                container.appendChild(shape);
            }
            
            // Add CSS animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes floatShape {
                    0%, 100% {
                        transform: translate(0, 0) rotate(0deg);
                    }
                    25% {
                        transform: translate(20px, -20px) rotate(90deg);
                    }
                    50% {
                        transform: translate(0, -40px) rotate(180deg);
                    }
                    75% {
                        transform: translate(-20px, -20px) rotate(270deg);
                    }
                }
            `;
            document.head.appendChild(style);
        }
        
        // Scroll effect for navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Statistics counter animation
        function animateStatistics() {
            const statNumbers = document.querySelectorAll('.stat-number');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        const count = parseInt(element.getAttribute('data-count'));
                        const suffix = element.textContent.replace(/[0-9]/g, '');
                        const duration = 2000; // 2 seconds
                        const steps = 60;
                        const increment = count / steps;
                        let current = 0;
                        
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= count) {
                                element.textContent = count + suffix;
                                clearInterval(timer);
                            } else {
                                element.textContent = Math.floor(current) + suffix;
                            }
                        }, duration / steps);
                        
                        observer.unobserve(element);
                    }
                });
            }, { threshold: 0.5 });
            
            statNumbers.forEach(stat => observer.observe(stat));
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            createFloatingShapes();
            animateStatistics();
            
            // Smooth scroll for navigation
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
            
            // Hexagon hover effect
            document.querySelectorAll('.hexagon-item').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px) scale(1.1)';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });

        // Add to your existing script section
document.addEventListener('DOMContentLoaded', function() {
    const mvCards = document.querySelectorAll('.mv-card');
    
    mvCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-15px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
        
        // Add animation on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.2 });
        
        observer.observe(card);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const hexagonRow = document.querySelector('.hexagon-row');
    const hexagonItems = document.querySelectorAll('.hexagon-item');
    
    // Calculate total width needed
    function calculateRowWidth() {
        if (window.innerWidth <= 576) {
            let totalWidth = 0;
            hexagonItems.forEach(item => {
                totalWidth += item.offsetWidth;
            });
            hexagonRow.style.width = totalWidth + 40 + 'px'; // Add padding
        } else {
            hexagonRow.style.width = '100%';
        }
    }
    
    // Initial calculation
    calculateRowWidth();
    
    // Recalculate on resize
    window.addEventListener('resize', calculateRowWidth);
    
    // Add smooth hover effects
    hexagonItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.05)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
});
    </script>
</body>
</html>