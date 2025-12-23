@extends('layout.app')

@section('content')
    <style>
        /* UI Enhancements */
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

        #previewFrame {
            transition: opacity 0.3s ease;
            background-color: #f8f9fa;
        }

        .user-card-item {
            border-bottom: 1px solid #eee;
            padding: 12px;
            transition: background 0.2s;
        }

        .user-card-item:hover {
            background-color: #f8f9fa;
        }

        .sticky-header {
            position: sticky;
            top: 0;
            z-index: 1020;
            background: white;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4" style="height: calc(100vh - 120px); overflow-y: auto;">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3 sticky-header">
                        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-people-fill me-2"></i>Staff Management</h5>
                    </div>
                    <div class="card-body overflow-auto">
                        <p class="small text-muted mb-4">Toggle "Showcase" to display members on your public website.</p>

                        <div id="userList">
                            @foreach($users as $user)
                                <div class="user-card-item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                                            class="rounded-circle me-3 border" width="45" height="45"
                                            style="object-fit: cover;">
                                        <div>
                                            <div class="fw-bold mb-0">{{ $user->name }}</div>
                                            @if($user->is_public)
                                                <span class="badge bg-success" style="font-size: 0.65rem;">SHOWCASING</span>
                                            @else
                                                <span class="badge bg-light text-dark border"
                                                    style="font-size: 0.65rem;">HIDDEN</span>
                                            @endif
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-primary shadow-sm"
                                        onclick="openEditModal({{ $user->id }}, '{{ addslashes($user->name) }}', {{ $user->is_public ? 'true' : 'false' }})">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm overflow-hidden" style="height: calc(100vh - 120px);">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <span class="small fw-bold"><i class="bi bi-eye me-2"></i>LIVE WEBSITE PREVIEW</span>
                        <button id="reloadBtn" onclick="refreshPreview()" class="btn btn-sm btn-outline-light border-0">
                            <i id="reloadIcon" class="bi bi-arrow-clockwise"></i>
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <iframe id="previewFrame" src="{{ route('public.staff', ['preview' => 1]) }}"
                            style="width: 100%; height: 100%; border: none;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <form id="editUserForm">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold">Edit Staff Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit_user_id">

                        <div class="mb-3">
                            <label class="form-label small fw-bold">DISPLAY NAME</label>
                            <input type="text" id="edit_name" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">PROFILE IMAGE</label>
                            <input type="file" id="edit_image" class="form-control" accept="image/*">
                            <div class="form-text">Leave blank to keep current photo.</div>
                        </div>

                        <div class="form-check form-switch p-3 bg-light rounded">
                            <input class="form-check-input ms-0 me-2" type="checkbox" id="is_showcased">
                            <label class="form-check-label fw-bold" for="is_showcased">Showcase on Public Website</label>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="saveBtn" class="btn btn-primary px-4" onclick="saveUserChanges()">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Initialize Modal
        let userModal;
        document.addEventListener('DOMContentLoaded', function () {
            userModal = new bootstrap.Modal(document.getElementById('editUserModal'));
        });

        function openEditModal(userId, userName, isPublic) {
            // Pre-fill form fields
            document.getElementById('edit_user_id').value = userId;
            document.getElementById('edit_name').value = userName;
            document.getElementById('is_showcased').checked = isPublic;

            // Clear file input
            document.getElementById('edit_image').value = '';

            userModal.show();
        }

        function saveUserChanges() {
            const saveBtn = document.getElementById('saveBtn');
            saveBtn.disabled = true;
            saveBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Saving...';

            let formData = new FormData();
            formData.append('user_id', document.getElementById('edit_user_id').value);
            formData.append('name', document.getElementById('edit_name').value);
            formData.append('is_public', document.getElementById('is_showcased').checked);

            const imageFile = document.getElementById('edit_image').files[0];
            if (imageFile) {
                formData.append('image', imageFile);
            }

            formData.append('_token', '{{ csrf_token() }}');

            fetch("{{ route('admin.user.update') }}", {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        userModal.hide();
                        refreshPreview();
                        // We reload the page to update the list badges and names on the left
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong. Please check the console.');
                })
                .finally(() => {
                    saveBtn.disabled = false;
                    saveBtn.innerText = 'Save Changes';
                });
        }

        function refreshPreview() {
            const frame = document.getElementById('previewFrame');
            const icon = document.getElementById('reloadIcon');
            icon.classList.add('spin-loader');
            frame.contentWindow.location.reload();

            setTimeout(() => icon.classList.remove('spin-loader'), 800);
        }
    </script>
@endsection