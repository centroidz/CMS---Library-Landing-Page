<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3a0ca3;
        --accent-color: #f72585;
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        --card-shadow-hover: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    /* Header Background */
    .page-header {
        position: relative;
        padding: 4rem 0;
        background: linear-gradient(135deg, #f5f7ff 0%, #eef1ff 100%);
        border-radius: 20px;
        margin-bottom: 3rem;
        overflow: hidden;
    }

    .main-title {
        font-weight: 800;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .title-line {
        width: 80px;
        height: 5px;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        margin: 1.5rem auto;
        border-radius: 10px;
    }

    /* Enhanced Staff Cards */
    .staff-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        background: white;
        box-shadow: var(--card-shadow);
        height: 100%;
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }

    .staff-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--card-shadow-hover);
    }

    .staff-image-container {
        overflow: hidden;
        height: 280px;
        position: relative;
    }

    .staff-image {
        height: 100%;
        width: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .staff-card:hover .staff-image {
        transform: scale(1.08);
    }

    .staff-info {
        padding: 1.5rem;
        text-align: center;
    }

    .staff-name {
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 0.4rem;
        color: #212529;
    }

    .staff-role {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        display: inline-block;
        padding: 0.25rem 1rem;
        background: rgba(67, 97, 238, 0.1);
        border-radius: 50px;
        text-transform: uppercase;
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@if(request()->has('preview'))
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endif

<div class="container py-5">
    <header class="page-header text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="main-title display-4">Meet Our Team</h1>
                <div class="title-line"></div>
                <p class="lead text-muted">Passionate experts dedicated to your success.</p>
            </div>
        </div>
    </header>

    <div class="row justify-content-center">
        @foreach($users->where('is_public', true) as $index => $staff)
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="staff-card" style="animation-delay: {{ ($index + 1) * 0.1 }}s">
                    <div class="staff-image-container">
                        <img src="{{ $staff->profile_image ? asset('storage/' . $staff->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($staff->name) . '&size=300' }}"
                            class="staff-image" alt="{{ $staff->name }}">
                    </div>
                    <div class="staff-info">
                        <h3 class="staff-name">{{ $staff->name }}</h3>
                        <div class="staff-role">{{ $staff->role ?? 'Team Member' }}</div>
                        <p class="text-muted small mt-2">Dedicated professional committed to excellence.</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-5 py-4 border-top text-center">
        <div class="col-4">
            <h4 class="fw-bold mb-0" style="color: var(--primary-color)">50+</h4>
            <small class="text-muted text-uppercase">Experience</small>
        </div>
        <div class="col-4 border-start border-end">
            <h4 class="fw-bold mb-0" style="color: var(--primary-color)">200+</h4>
            <small class="text-muted text-uppercase">Projects</small>
        </div>
        <div class="col-4">
            <h4 class="fw-bold mb-0" style="color: var(--primary-color)">24/7</h4>
            <small class="text-muted text-uppercase">Support</small>
        </div>
    </div>
</div>

@if(request()->has('preview'))
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endif