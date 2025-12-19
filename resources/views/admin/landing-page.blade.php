@extends('layout.app')

@section('title', 'Landing Page Builder')

@section('content')
    <style>
        /* Animation for the reload button */
        .spin-loader {
            animation: rotate 0.8s linear;
            display: inline-block;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* Smooth transition for the iframe */
        #previewFrame {
            transition: opacity 0.3s ease;
        }

        .loading-iframe {
            opacity: 0.5;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4" style="height: calc(100vh - 120px); overflow-y: auto;">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3 sticky-top">
                        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Content Editor</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Template</label>
                            <select id="template" class="form-select">
                                <option value="hero-left" {{ $page->template == 'hero-left' ? 'selected' : '' }}>Hero Left
                                </option>
                                <option value="hero-center" {{ $page->template == 'hero-center' ? 'selected' : '' }}>Hero
                                    Center</option>
                                <option value="split" {{ $page->template == 'split' ? 'selected' : '' }}>Split Layout
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Hero Image</label>
                            <input type="file" id="image" class="form-control" accept="image/*">
                            <div id="imagePreviewWrapper" class="mt-2 {{ $page->image ? '' : 'd-none' }}">
                                <img id="imgPreview" src="{{ $page->image ? asset('storage/' . $page->image) : '#' }}"
                                    class="img-thumbnail" style="max-height: 150px;">
                            </div>
                            <div class="form-text">Recommended: 800x600px or similar ratio.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Headline</label>
                            <input type="text" id="title" class="form-control" value="{{ $page->title }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Hero Description</label>
                            <textarea id="description" class="form-control" rows="3">{{ $page->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase">Button Text</label>
                            <input type="text" id="button" class="form-control" value="{{ $page->button }}">
                        </div>

                        <h6 class="fw-bold border-bottom pb-2 mb-3">Core Values</h6>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Mission</label>
                            <textarea id="mission" class="form-control" rows="5">{{ $page->mission }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Vision</label>
                            <textarea id="vision" class="form-control" rows="5">{{ $page->vision }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase">Strategic Goals</label>
                            <textarea id="goals" class="form-control" rows="6">{{ $page->goals }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase">Related Links</label>
                            <div id="relatedLinksWrapper"></div>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addLinkField()">
                                <i class="bi bi-plus"></i> Add Link
                            </button>
                        </div>

                        <button onclick="savePage(this)" class="btn btn-primary w-100 py-2 shadow-sm">
                            <i class="bi bi-cloud-arrow-up me-2"></i> Save Changes
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm overflow-hidden" style="height: calc(100vh - 120px);">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <span class="small fw-bold"><i class="bi bi-eye me-2"></i>PREVIEW MODE</span>
                        <button id="reloadBtn" onclick="manualReload()" class="btn btn-sm btn-outline-light border-0"
                            title="Refresh Preview">
                            <i id="reloadIcon" class="bi bi-arrow-clockwise"></i>
                        </button>
                    </div>
                    <div class="card-body p-0 position-relative">
                        <iframe id="previewFrame" style="width: 100%; height: 100%; border: none;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const baseUrl = "{{ url('/') }}";
        const frame = document.getElementById('previewFrame');
        const fields = ['template', 'title', 'description', 'button', 'mission', 'vision', 'goals'];

        /* ================= RELATED LINKS ================= */
        const relatedLinksWrapper = document.getElementById('relatedLinksWrapper');

        function addLinkField(value = '') {
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                                <input type="text" class="form-control related-link" placeholder="e.g. E-Library" value="${value}">
                                <button class="btn btn-outline-danger" type="button" onclick="this.parentElement.remove(); updatePreview();">
                                    <i class="bi bi-trash"></i>
                                </button>
                            `;
            relatedLinksWrapper.appendChild(div);
            div.querySelector('input').addEventListener('input', updatePreview);
            updatePreview();
        }

        function getRelatedLinks() {
            return Array.from(document.querySelectorAll('.related-link'))
                .map(el => el.value.trim())
                .filter(Boolean);
        }

        /* ================= IMAGE PREVIEW LOGIC ================= */
        document.getElementById('image').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    document.getElementById('imgPreview').src = event.target.result;
                    document.getElementById('imagePreviewWrapper').classList.remove('d-none');
                    updatePreview();
                };
                reader.readAsDataURL(file);
            }
        });

        /* ================= PREVIEW LOGIC ================= */
        function updatePreview() {
            const params = new URLSearchParams();
            fields.forEach(f => {
                params.append(f, document.getElementById(f).value);
            });

            getRelatedLinks().forEach(link => {
                params.append('related_links[]', link);
            });

            // Cache busting: ensure the iframe refreshes even if the URL looks similar
            params.append('t', new Date().getTime());

            frame.classList.add('loading-iframe');
            frame.src = `${baseUrl}/api/landing/preview?${params.toString()}`;

            frame.onload = () => {
                frame.classList.remove('loading-iframe');
            };
        }

        // Manual reload triggered by the button
        function manualReload() {
            const icon = document.getElementById('reloadIcon');
            icon.classList.add('spin-loader');

            updatePreview();

            setTimeout(() => {
                icon.classList.remove('spin-loader');
            }, 800);
        }

        fields.forEach(f => {
            document.getElementById(f).addEventListener('input', updatePreview);
        });

        /* ================= SAVE (USING FORMDATA) ================= */
        function savePage(btn) {
            const originalText = btn.innerHTML;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Saving...';
            btn.disabled = true;

            const formData = new FormData();
            fields.forEach(f => {
                formData.append(f, document.getElementById(f).value);
            });

            getRelatedLinks().forEach(link => {
                formData.append('related_links[]', link);
            });

            const imageFile = document.getElementById('image').files[0];
            if (imageFile) {
                formData.append('image', imageFile);
            }

            fetch(`${baseUrl}/api/landing/save`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    alert('Landing page updated!');
                    updatePreview();
                })
                .catch(() => alert('Save failed'))
                .finally(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                });
        }

        /* ================= INIT ================= */
        const existingLinks = @json($page->related_links ?? []);
        if (existingLinks.length) {
            existingLinks.forEach(link => addLinkField(link));
        } else {
            addLinkField();
        }

        window.onload = updatePreview;
    </script>
@endsection