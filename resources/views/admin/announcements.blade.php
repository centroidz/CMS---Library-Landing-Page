@extends('layout.app')

@section('title', 'Announcements Editor')

@section('content')
    <style>
        /* Animation for the reload button */
        .spin-loader {
            animation: rotate 0.8s linear;
            display: inline-block;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Smooth transition for the iframe */
        #previewFrame {
            transition: opacity 0.3s ease;
        }

        .loading-iframe {
            opacity: 0.5;
        }
        
        .announcement-list-item {
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .announcement-list-item:hover {
            background-color: #f8f9fa;
        }
        .announcement-list-item.active {
            background-color: #e9ecef;
            border-left: 4px solid #0d6efd;
            color: #212529;
        }
        .announcement-list-item.active h6 {
            color: #0d6efd;
        }
        .announcement-list-item.active .text-muted {
            color: #6c757d !important;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <!-- Editor Column -->
            <div class="col-lg-4" style="height: calc(100vh - 120px);">
                <div class="card border-0 shadow-sm mb-4 h-100">
                    
                    <!-- LIST VIEW -->
                    <div id="listView" class="d-flex flex-column h-100">
                    <div class="card-header bg-white py-3 sticky-top d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-megaphone me-2"></i>Announcements</h5>
                        <button class="btn btn-sm btn-primary" onclick="initNew()">
                            <i class="bi bi-plus-lg"></i> New
                        </button>
                    </div>
                        <div class="list-group list-group-flush border-bottom overflow-auto" style="flex-grow: 1;">
                        @if(isset($announcements) && count($announcements) > 0)
                            @foreach($announcements as $ann)
                                <div class="list-group-item announcement-list-item p-3" 
                                     onclick="loadAnnouncement({{ json_encode($ann) }})"
                                     id="ann-item-{{ $ann->id }}">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1 text-truncate" style="max-width: 70%;">{{ $ann->title }}</h6>
                                        <small class="text-muted">{{ $ann->created_at->diffForHumans() }}</small>
                                    </div>
                                    <small class="text-muted text-truncate d-block">{{ $ann->content }}</small>
                                </div>
                            @endforeach
                        @else
                            <div class="p-3 text-center text-muted small">No announcements found.</div>
                        @endif
                    </div>
                    </div>

                    <!-- EDITOR VIEW -->
                    <div id="editorView" class="d-none flex-column h-100">
                        <div class="card-header bg-white py-3 d-flex align-items-center">
                            <button class="btn btn-sm btn-outline-secondary me-3" onclick="showList()">
                                <i class="bi bi-arrow-left"></i> Back
                            </button>
                            <h6 class="mb-0 fw-bold text-uppercase small text-muted" id="formTitle">Create New Announcement</h6>
                        </div>
                        <div class="card-body bg-light overflow-auto">
                        
                        <form id="announcementForm">
                            <input type="hidden" id="id">
                            <input type="hidden" id="created_at">

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-uppercase">Title</label>
                                <input type="text" id="title" class="form-control" placeholder="Announcement Title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-uppercase">Image</label>
                                <input type="file" id="image" class="form-control" accept="image/*">
                                <div id="imagePreviewContainer" class="mt-2 d-none">
                                    <img id="imagePreview" src="" class="img-fluid rounded" style="max-height: 200px;">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-uppercase">Content</label>
                                <textarea id="announcementContent" class="form-control" rows="6" placeholder="Write your announcement here..."></textarea>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="button" onclick="saveAnnouncement(this)" class="btn btn-primary flex-grow-1 shadow-sm">
                                    <i class="bi bi-save me-2"></i> Save
                                </button>
                                <button type="button" onclick="deleteAnnouncement()" id="deleteBtn" class="btn btn-outline-danger d-none">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Preview Column -->
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
        
        // Form Elements
        const idInput = document.getElementById('id');
        const titleInput = document.getElementById('title');
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        const contentInput = document.getElementById('announcementContent');
        const createdAtInput = document.getElementById('created_at');
        const deleteBtn = document.getElementById('deleteBtn');
        const formTitle = document.getElementById('formTitle');
        
        const listView = document.getElementById('listView');
        const editorView = document.getElementById('editorView');

        let currentImagePath = ''; // Store the existing image path when editing

        function showList() {
            listView.classList.remove('d-none');
            listView.classList.add('d-flex');
            editorView.classList.add('d-none');
            editorView.classList.remove('d-flex');
            frame.src = `${baseUrl}/announcements?preview=true`;
        }

        function showEditor() {
            listView.classList.add('d-none');
            listView.classList.remove('d-flex');
            editorView.classList.remove('d-none');
            editorView.classList.add('d-flex');
        }

        // Initial Setup
        function initNew() {
            showEditor();
            // Reset Form
            idInput.value = '';
            titleInput.value = '';
            contentInput.value = '';
            createdAtInput.value = ''; // Empty means "now" for preview logic
            imageInput.value = '';
            imagePreview.src = '';
            imagePreviewContainer.classList.add('d-none');
            currentImagePath = '';
            
            // UI Updates
            formTitle.textContent = 'Create New Announcement';
            deleteBtn.classList.add('d-none');
            
            // Highlight removal
            document.querySelectorAll('.announcement-list-item').forEach(el => el.classList.remove('active'));
            
            updatePreview();
        }

        function loadAnnouncement(data) {
            showEditor();
            // Fill Form
            idInput.value = data.id;
            titleInput.value = data.title;
            contentInput.value = data.content;
            createdAtInput.value = data.created_at; // Keep original date
            imageInput.value = ''; // Reset file input

            if (data.image) {
                currentImagePath = data.image;
                imagePreview.src = `${baseUrl}/storage/${data.image}`;
                imagePreviewContainer.classList.remove('d-none');
            } else {
                currentImagePath = '';
                imagePreviewContainer.classList.add('d-none');
            }
            
            // UI Updates
            formTitle.textContent = 'Edit Announcement';
            deleteBtn.classList.remove('d-none');
            
            // Highlight active
            document.querySelectorAll('.announcement-list-item').forEach(el => el.classList.remove('active'));
            const activeItem = document.getElementById('ann-item-' + data.id);
            if(activeItem) activeItem.classList.add('active');

            updatePreview();
        }

        // Time Ago Logic (Client Side)
        function timeAgo(dateParam) {
            if (!dateParam) return 'Just now';
            const date = new Date(dateParam);
            const seconds = Math.floor((new Date() - date) / 1000);
            
            let interval = seconds / 31536000;
            if (interval > 1) return Math.floor(interval) + " years ago";
            interval = seconds / 2592000;
            if (interval > 1) return Math.floor(interval) + " months ago";
            interval = seconds / 86400;
            if (interval > 1) return Math.floor(interval) + " days ago";
            interval = seconds / 3600;
            if (interval > 1) return Math.floor(interval) + " hours ago";
            interval = seconds / 60;
            if (interval > 1) return Math.floor(interval) + " minutes ago";
            return "Just now";
        }

        // Preview Logic
        function updatePreview() {
            const params = new URLSearchParams();
            
            // We pass the form data as query params to the preview URL
            params.append('preview', 'true');
            params.append('title', titleInput.value);
            params.append('content', contentInput.value);
            
            // Handle Date for Preview
            // If editing, use stored date. If new, use current time.
            let dateToUse = createdAtInput.value ? new Date(createdAtInput.value) : new Date();
            params.append('created_at', dateToUse.toISOString());

            params.append('t', new Date().getTime());

            // Image Handling for Preview
            const file = imageInput.files[0];
            if (file) {
                // If a new file is selected, read it as DataURL and store in LocalStorage
                // This avoids passing huge strings in the URL
                const reader = new FileReader();
                reader.onload = function(e) {
                    localStorage.setItem('preview_temp_image', e.target.result);
                    params.append('use_temp_image', 'true');
                    loadIframe(params);
                };
                reader.readAsDataURL(file);
            } else {
                // No new file, check if we have an existing one from the record
                if (currentImagePath) {
                    params.append('image', currentImagePath);
                }
                loadIframe(params);
            }
        }

        function loadIframe(params) {
            frame.classList.add('loading-iframe');
            frame.src = `${baseUrl}/announcements?${params.toString()}`;
            frame.onload = () => {
                frame.classList.remove('loading-iframe');
            };
        }

        // Event Listeners for Live Preview
        titleInput.addEventListener('input', () => {
            // Debounce could be added here
            updatePreview();
        });
        contentInput.addEventListener('input', () => {
            updatePreview();
        });

        // Image Input Listener for Local Preview
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                imagePreview.src = URL.createObjectURL(file);
                imagePreviewContainer.classList.remove('d-none');
            }
            // Note: We don't update the iframe preview with the new image here because passing file data via GET params is not feasible.
        });

        // Manual Reload
        function manualReload() {
            const icon = document.getElementById('reloadIcon');
            icon.classList.add('spin-loader');
            updatePreview();
            setTimeout(() => icon.classList.remove('spin-loader'), 800);
        }

        // Save Function
        function saveAnnouncement(btn) {
            const originalText = btn.innerHTML;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Saving...';
            btn.disabled = true;

            const id = idInput.value;
            // Use POST for both, but add _method for PUT if updating (standard for Laravel file uploads)
            const url = id ? `/admin/announcements/${id}` : '/admin/announcements';

            const formData = new FormData();
            formData.append('title', titleInput.value);
            formData.append('content', contentInput.value);
            
            if (imageInput.files[0]) {
                formData.append('image', imageInput.files[0]);
            }

            if (id) {
                formData.append('_method', 'PUT');
            }

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(async res => {
                const data = await res.json();
                if (!res.ok) {
                    throw new Error(data.message || 'Error saving announcement');
                }
                return data;
            })
            .then(data => {
                alert('Announcement saved!');
                location.reload(); // Reload to refresh the list
            })
            .catch(err => {
                console.error(err);
                alert(err.message);
            })
            .finally(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }

        // Delete Function
        function deleteAnnouncement() {
            const id = idInput.value;
            if(!id) return;

            if(confirm('Are you sure you want to delete this announcement?')) {
                fetch(`/admin/announcements/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(res => {
                    if(res.ok) {
                        alert('Announcement deleted');
                        location.reload();
                    } else {
                        alert('Error deleting');
                    }
                });
            }
        }

        // Initialize
        window.onload = showList;
    </script>
@endsection
