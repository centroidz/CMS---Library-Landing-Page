@if(request()->has('preview'))
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        @if(request()->has('preview') && request()->has('title'))
            @php
                // Handle existing image passed via query param
                $previewImage = request('image') ? asset('storage/' . request('image')) : '';
            @endphp
            <div class="list-group-item p-4 border-0 border-bottom bg-light preview-item">
                <div class="d-flex w-100 justify-content-between mb-2">
                    <h5 class="mb-1 fw-bold text-primary">{{ request('title') }} <span class="badge bg-warning text-dark ms-2">Preview</span></h5>
                    <small class="text-muted">{{ request('created_at') ? \Carbon\Carbon::parse(request('created_at'))->diffForHumans() : 'Just now' }}</small>
                </div>
                <img id="preview-img-tag" src="{{ $previewImage }}" class="img-fluid rounded mb-3 {{ $previewImage ? '' : 'd-none' }}" style="max-height: 400px; width: auto;">
                <p class="mb-1 text-muted text-break" style="white-space: pre-wrap;">{{ request('content') }}</p>
            </div>
            <script>
                // Check if we should load a temporary new image from LocalStorage (for live preview of uploads)
                if("{{ request('use_temp_image') }}" === "true") {
                    const tempImg = localStorage.getItem('preview_temp_image');
                    if(tempImg) {
                        const imgTag = document.getElementById('preview-img-tag');
                        const item = document.querySelector('.preview-item');
                        imgTag.src = tempImg;
                        imgTag.classList.remove('d-none');
                    }
                }
            </script>
        @endif

        @foreach($announcements as $announcement)
            <div class="list-group-item p-4 border-0 border-bottom">
                <div class="d-flex w-100 justify-content-between mb-2">
                    <h5 class="mb-1 fw-bold">{{ $announcement->title }}</h5>
                    <small class="text-muted">{{ $announcement->created_at->diffForHumans() }}</small>
                </div>
                @if($announcement->image)
                    <img src="{{ asset('storage/' . $announcement->image) }}" class="img-fluid rounded mb-3" alt="{{ $announcement->title }}" style="max-height: 400px; width: auto;">
                @endif
                <p class="mb-1 text-muted text-break" style="white-space: pre-wrap;">{{ $announcement->content }}</p>
            </div>
        @endforeach
    </div>
</div>
