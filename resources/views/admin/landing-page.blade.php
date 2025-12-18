@extends('layout.app')

@section('title', 'Landing Page Builder')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-pencil-square me-2 text-primary"></i>Page Builder
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Template Style</label>
                            <select id="template" class="form-select">
                                <option value="hero-left" {{ $page->template == 'hero-left' ? 'selected' : '' }}>Hero Left
                                </option>
                                <option value="hero-center" {{ $page->template == 'hero-center' ? 'selected' : '' }}>Hero
                                    Center</option>
                                <option value="split-layout" {{ $page->template == 'split-layout' ? 'selected' : '' }}>Split
                                    Layout</option>
                            </select>
                            <div class="form-text">Choose the visual structure of your landing page.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Headline Title</label>
                            <input type="text" id="title" class="form-control" value="{{ $page->title }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description Text</label>
                            <textarea id="description" class="form-control" rows="4">{{ $page->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Call to Action (Button)</label>
                            <input type="text" id="button" class="form-control" value="{{ $page->button }}">
                        </div>

                        <hr class="my-4">

                        <button onclick="savePage(this)" class="btn btn-primary w-100 shadow-sm py-2">
                            <i class="bi bi-cloud-arrow-up me-2"></i> Save Changes
                        </button>
                    </div>
                </div>

                <div class="alert alert-info mt-3 small shadow-sm border-0">
                    <i class="bi bi-info-circle me-1"></i>
                    Changes are visible in the preview in real-time. Don't forget to save to make them live!
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm overflow-hidden" style="height: calc(100vh - 160px);">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <span class="small fw-bold text-uppercase tracking-wider">
                            <i class="bi bi-eye me-2"></i>Live Preview
                        </span>
                        <div class="d-flex gap-2">
                            <span class="badge bg-success opacity-75">Live Sync Active</span>
                            <span class="badge bg-secondary">Desktop View</span>
                        </div>
                    </div>
                    <div class="card-body p-0 bg-light">
                        <iframe id="previewFrame"
                            style="width: 100%; height: 100%; border: none; background: white;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Elements
        const templateSelect = document.getElementById('template');
        const titleInput = document.getElementById('title');
        const descInput = document.getElementById('description');
        const buttonInput = document.getElementById('button');
        const frame = document.getElementById('previewFrame');

        // Dynamic Base URL from Laravel
        const baseUrl = "{{ url('/') }}";

        /**
         * Updates the iframe source with current input values
         */
        function updatePreview() {
            const params = new URLSearchParams({
                template: templateSelect.value,
                title: titleInput.value,
                description: descInput.value,
                button: buttonInput.value
            });

            // Use your API route for preview
            frame.src = `${baseUrl}/api/landing/preview?${params.toString()}`;
        }

        /**
         * Saves the data to the database via API
         */
        function savePage(btn) {
            // UI Feedback: Loading state
            const originalText = btn.innerHTML;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Saving...';
            btn.disabled = true;

            fetch(`${baseUrl}/api/landing/save`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF Protection
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    template: templateSelect.value,
                    title: titleInput.value,
                    description: descInput.value,
                    button: buttonInput.value
                })
            })
                .then(async response => {
                    const data = await response.json();
                    if (!response.ok) throw new Error(data.message || 'Error saving data');
                    return data;
                })
                .then(() => {
                    alert('Success! Landing page content has been updated.');
                })
                .catch(err => {
                    console.error('Save error:', err);
                    alert('Error: ' + err.message);
                })
                .finally(() => {
                    // Restore button state
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                });
        }

        // Attach Event Listeners for Live Preview
        templateSelect.onchange = updatePreview;
        titleInput.oninput = updatePreview;
        descInput.oninput = updatePreview;
        buttonInput.oninput = updatePreview;

        // Run preview once on page load
        window.onload = updatePreview;

    </script>
@endsection