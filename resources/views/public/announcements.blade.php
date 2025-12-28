@if(request()->has('preview'))
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endif

@php
    $announcements = $announcements ?? \App\Models\Announcement::latest()->get();
@endphp

<div class="container py-5">
    <div class="row mb-5">
        <div class="col-lg-8">
            <span class="section-tag mb-3 d-block text-danger fw-bold">Updates</span>
            <h2 class="display-5 fw-bold mb-3">Latest Announcements</h2>
            <p class="lead text-muted">Testing the dynamic load for the announcements section.</p>
        </div>
    </div>

    <div class="list-group list-group-flush shadow-sm rounded-4 bg-white overflow-hidden">
        @if(request()->has('preview') && request('title'))
            <div class="list-group-item p-4 border-0 border-bottom bg-light">
                <div class="d-flex w-100 justify-content-between mb-2">
                    <h5 class="mb-1 fw-bold text-primary">{{ request('title') }} <span class="badge bg-warning text-dark ms-2">Preview</span></h5>
                    <small class="text-muted">{{ \Carbon\Carbon::parse(request('created_at'))->diffForHumans() }}</small>
                </div>
                <p class="mb-1 text-muted">{{ request('content') }}</p>
            </div>
        @endif

        @foreach($announcements as $announcement)
            <div class="list-group-item p-4 border-0 border-bottom">
                <div class="d-flex w-100 justify-content-between mb-2">
                    <h5 class="mb-1 fw-bold">{{ $announcement->title }}</h5>
                    <small class="text-muted">{{ $announcement->created_at->diffForHumans() }}</small>
                </div>
                <p class="mb-1 text-muted">{{ $announcement->content }}</p>
            </div>
        @endforeach
    </div>
</div>

@if(request()->has('preview'))
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endif
