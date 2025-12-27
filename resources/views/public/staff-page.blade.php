<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3a0ca3;
        --accent-color: #f72585;
        --text-dark: #2b2d42;
        --text-muted: #6c757d;
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        --card-shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    /* Header Background */
    .page-header {
        position: relative;
        padding: 5rem 0;
        background: radial-gradient(circle at top right, #f8f9ff, #ffffff);
        border-radius: 24px;
        margin-bottom: 4rem;
    }

    .main-title {
        font-weight: 800;
        letter-spacing: -1px;
        color: var(--text-dark);
    }

    .title-line {
        width: 60px;
        height: 4px;
        background: var(--primary-color);
        margin: 1.5rem auto;
        border-radius: 10px;
    }

    /* Enhanced Staff Cards */
    .staff-card {
        border: 1px solid rgba(0, 0, 0, 0.03);
        border-radius: 20px;
        background: white;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: var(--card-shadow);
        height: 100%;
        display: flex;
        flex-direction: column;
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
    }

    .staff-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--card-shadow-hover);
    }

    .staff-image-container {
        position: relative;
        padding: 15px 15px 0 15px;
        /* Inset look */
        overflow: hidden;
    }

    .staff-image {
        height: 280px;
        width: 100%;
        object-fit: cover;
        border-radius: 15px;
        /* Rounded inside the card */
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

    .staff-name {
        font-weight: 700;
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
        color: var(--text-dark);
    }

    .staff-role {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 0.75rem;
        letter-spacing: 1px;
        display: inline-block;
        padding: 0.4rem 1.2rem;
        background: rgba(67, 97, 238, 0.08);
        border-radius: 50px;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    /* Social Links Styling */
    .staff-social-links {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 1rem;
    }

    .social-icon-link {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #f1f4f9;
        color: #555;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    /* Dynamic Brand Colors on Hover */
    .social-icon-link:hover {
        transform: translateY(-3px);
        color: white;
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

    .link-github:hover {
        background-color: #333;
    }

    .link-linkedin:hover {
        background-color: #0a66c2;
    }

    .link-default:hover {
        background-color: var(--primary-color);
    }

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
</style>

@if(request()->has('preview'))
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endif

<div class="container py-5">
    <header class="page-header text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="main-title display-5">Our Professional Team</h1>
                <div class="title-line"></div>
                <p class="lead text-muted">A group of dedicated experts focused on delivering high-quality results.</p>
            </div>
        </div>
    </header>

    <div class="row g-4 justify-content-center">
        @foreach($users->where('is_public', true) as $index => $staff)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="staff-card" style="animation-delay: {{ ($index + 1) * 0.1 }}s">
                    <div class="staff-image-container">
                        <img src="{{ $staff->profile_image ? asset('storage/' . $staff->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($staff->name) . '&size=400' }}"
                            class="staff-image" alt="{{ $staff->name }}">
                    </div>

                    <div class="staff-info">
                        <div class="staff-role">{{ $staff->role ?? 'Associate' }}</div>
                        <h3 class="staff-name">{{ $staff->name }}</h3>

                        <p class="text-muted small mb-4">Driving innovation through expertise and commitment to quality.</p>

                        <div class="staff-social-links">
                            @if($staff->social_media)
                                @foreach($staff->social_media as $platform => $url)
                                    @if(!empty($url))
                                        @php
                                            $icons = [
                                                'facebook' => ['icon' => 'fab fa-facebook-f', 'class' => 'link-facebook'],
                                                'twitter' => ['icon' => 'fab fa-x-twitter', 'class' => 'link-twitter'],
                                                'instagram' => ['icon' => 'fab fa-instagram', 'class' => 'link-instagram'],
                                                'github' => ['icon' => 'fab fa-github', 'class' => 'link-github'],
                                                'linkedin' => ['icon' => 'fab fa-linkedin-in', 'class' => 'link-linkedin']
                                            ];
                                            $config = $icons[$platform] ?? ['icon' => 'fas fa-link', 'class' => 'link-default'];
                                        @endphp

                                        <a href="{{ $url }}" target="_blank" class="social-icon-link {{ $config['class'] }}"
                                            title="{{ ucfirst($platform) }}">
                                            <i class="{{ $config['icon'] }}"></i>
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@if(request()->has('preview'))
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endif