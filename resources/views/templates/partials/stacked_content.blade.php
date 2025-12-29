<!-- Hero Section -->
<section class="hero-container">
    <div class="hero-content">
        <div class="subtitle">LIBRARY SERVICES</div>
        <h1 class="main-title">{{ $title ?? 'Welcome to Our Library' }}<span class="dot">.</span></h1>
        <p class="description">
            {{ $description ?? 'Discover a world of knowledge with our comprehensive library services. Access millions of resources, expert assistance, and state-of-the-art facilities designed to support your academic and personal growth.' }}
        </p>
    </div>
    <div class="hero-image">
        @if(!empty($image) && file_exists(public_path('storage/' . $image)))
            <img src="{{ asset('storage/' . $image) }}" alt="Library Image" id="heroImage">
        @else
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=1200&auto=format&fit=crop&q=80" alt="Modern Library Interior" id="heroImage">
        @endif
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="mission-vision-container">
    <!-- Illustration on the LEFT -->
    <div class="illustration-box">
        <div class="planet-illustration">
            <div class="orbit orbit-1"></div>
            <div class="orbit orbit-2"></div>
            <div class="orbit orbit-3"></div>
            <div class="planet-dot dot-1"></div>
            <div class="planet-dot dot-2"></div>
            <div class="planet-dot dot-3"></div>
        </div>
    </div>
    
   <!-- Mission & Vision Section -->
<section class="mission-vision-section">
    <div class="section-header">
        <div class="section-badge">OUR PURPOSE</div>
    </div>
    
    <div class="mv-container">
        <!-- Mission Card -->
        <div class="mv-card mission-card">
            <div class="mv-card-header">
                <div class="mv-icon">
                    <i class="bi bi-bullseye"></i>
                </div>
                <h3>OUR MISSION</h3>
                <div class="mv-divider"></div>
            </div>
            <div class="mv-card-body">
                <p>{{ $mission ?? 'To democratize access to knowledge through innovative digital solutions, empowering lifelong learning and fostering intellectual growth for all communities. We bridge the gap between information and impact through cutting-edge technology and expert guidance.' }}</p>
            </div>
            
        </div>
        
        <!-- Vision Card -->
        <div class="mv-card vision-card">
            <div class="mv-card-header">
                <div class="mv-icon">
                    <i class="bi bi-eye"></i>
                </div>
                <h3>OUR VISION</h3>
                <div class="mv-divider"></div>
            </div>
            <div class="mv-card-body">
                <p>{{ $vision ?? 'To become the leading digital-first knowledge ecosystem, transforming how people discover, access, and engage with information in the 21st century. We envision a future where every individual has equitable access to the tools and resources needed to achieve their full potential.' }}</p>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- Strategic Goals Section - Horizontal Layout -->
<section class="strategic-goals-section">
    <div class="goals-container">
        <h2 class="section-title" style="text-align: center; margin-bottom: 60px; font-size: 2.8rem; color: var(--deep-blue);">Strategic Goals</h2>
        
        <div class="hexagon-row">
            <!-- First Hexagon -->
            <div class="hexagon-item">
                <div class="hexagon-wrapper">
                    <svg viewBox="0 0 100 100" class="hexagon-svg">
                        <polygon points="50,10 90,30 90,70 50,90 10,70 10,30" fill="#4a7cb8" opacity="0.8"/>
                        <polygon points="50,20 80,35 80,65 50,80 20,65 20,35" fill="#5a8fc4" opacity="0.6"/>
                        <polygon points="50,25 75,40 75,60 50,75 25,60 25,40" fill="#6ba3d8"/>
                    </svg>
                </div>
            </div>
            
            <!-- Second Hexagon -->
            <div class="hexagon-item">
                <div class="hexagon-wrapper">
                    <svg viewBox="0 0 100 100" class="hexagon-svg">
                        <polygon points="50,10 90,30 90,70 50,90 10,70 10,30" fill="#4a7cb8" opacity="0.8"/>
                        <polygon points="50,20 80,35 80,65 50,80 20,65 20,35" fill="#5a8fc4" opacity="0.6"/>
                        <polygon points="50,25 75,40 75,60 50,75 25,60 25,40" fill="#6ba3d8"/>
                    </svg>
                </div>
            </div>
            
            <!-- Third Hexagon -->
            <div class="hexagon-item">
                <div class="hexagon-wrapper">
                    <svg viewBox="0 0 100 100" class="hexagon-svg">
                        <polygon points="50,10 90,30 90,70 50,90 10,70 10,30" fill="#4a7cb8" opacity="0.8"/>
                        <polygon points="50,20 80,35 80,65 50,80 20,65 20,35" fill="#5a8fc4" opacity="0.6"/>
                        <polygon points="50,25 75,40 75,60 50,75 25,60 25,40" fill="#6ba3d8"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <p class="goals-description">
            {{ $goals ?? 'Our strategic goals focus on three key areas: 1) Expanding digital access and virtual services, 2) Enhancing community engagement through innovative programs, and 3) Fostering lifelong learning through personalized support. We are committed to creating an inclusive environment where knowledge is freely accessible and learning never stops.' }}
        </p>
    </div>
</section>


<!-- Related Resources Section -->
<section class="resources-section">
    <div class="resources-content">
        <h2 class="resources-title">Featured Resources</h2>
        
        <div class="resources-grid">
            @php
                $links = is_array($related_links ?? null) ? ($related_links ?? []) : json_decode($related_links ?? '[]', true);
                if (empty($links)) {
                    $links = [
                        'Digital Collections',
                        'Research Databases',
                        'Online Learning',
                        'Special Archives',
                        'Library Workshops',
                        'Study Spaces'
                    ];
                }
            @endphp

            @foreach($links as $link)
                <a href="#" class="resource-card">
                    <div class="resource-card-inner">
                        <span class="resource-text">{{ $link }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

