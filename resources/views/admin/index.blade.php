@extends('layout.app')

@section('content')
    <div class="container-fluid">
        @include('admin.notification')
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h2 class="fw-bold">Website Navigation</h2>
                <p class="text-muted">Manage default pages and custom GrapesJS web pages.</p>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addPageModal">
                    <i class="bi bi-plus-lg me-2"></i>Add Web Page
                </button>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive d-none d-lg-block">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>Status</th>
                                <th class="ps-4">Page Title</th>
                                <th>Route/Slug</th>
                                <th>Type</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>
                                        @if (!is_null($page->html_content) || $page->is_default == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="ps-4 fw-bold">{{ $page->title }}</td>
                                    <td><code>/api/{{ $page->slug }}</code></td>
                                    <td>
                                        <span class="badge {{ $page->is_default ? 'bg-secondary' : 'bg-info' }}">
                                            {{ $page->is_default ? 'System Default' : 'Custom (GrapesJS)' }}
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        @if($page->slug == 'landing')
                                            <a href="/admin/landing-page" class="btn btn-sm btn-outline-primary">Manage</a>
                                        @elseif($page->is_default)
                                            <a href="/admin/{{ $page->slug }}" class="btn btn-sm btn-outline-primary">Manage</a>
                                        @else
                                            <div class="btn-group">
                                                <a href="/admin/editor/{{ $page->id }}" class="btn btn-sm btn-primary">
                                                    <i class="bi bi-palette me-1"></i> Open Editor
                                                </a>
                                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteConfirmModal"
                                                    data-url="{{ route('pages.destroy', $page->id) }}"
                                                    data-title="{{ $page->title }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-block d-lg-none p-3">
                    @foreach($pages as $page)
                        <div class="card mb-3 border-0 shadow-sm overflow-hidden">
                            <div class="p-1 {{ $page->is_default ? 'bg-secondary' : 'bg-info' }}"></div>

                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0 fw-bold text-dark">{{ $page->title }}</h5>
                                    <div>

                                        @if (!is_null($page->html_content) || $page->is_default == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Inactive</span>
                                        @endif

                                        <span
                                            class="badge rounded-pill {{ $page->is_default ? 'bg-light text-secondary border' : 'bg-info-subtle text-info' }} small">
                                            {{ $page->is_default ? 'System' : 'GrapesJS' }}
                                        </span>
                                    </div>

                                </div>

                                <div class="text-muted small mb-3">
                                    <i class="bi bi-link-45deg me-1"></i>
                                    <code class="text-primary">/api/{{ $page->slug }}</code>
                                </div>

                                <div class="d-grid gap-2 d-sm-flex justify-content-sm-end pt-3 border-top">
                                    @if($page->slug == 'landing')
                                        <a href="/admin/landing-page" class="btn btn-sm btn-outline-primary px-3">
                                            <i class="bi bi-pencil-square me-1"></i> Edit Form
                                        </a>
                                    @elseif($page->is_default)
                                        <a href="/admin/{{ $page->slug }}" class="btn btn-sm btn-outline-primary px-3">
                                            <i class="bi bi-gear me-1"></i> Manage
                                        </a>
                                    @else
                                        <div class="btn-group">
                                            <a href="/admin/editor/{{ $page->id }}" class="btn btn-sm btn-primary editor-link"
                                                data-id="{{ $page->id }}">
                                                <i class="bi bi-palette me-1"></i> Open Editor
                                            </a>

                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmModal"
                                                data-url="{{ route('pages.destroy', $page->id) }}" data-title="{{ $page->title }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mobileWarningModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title"><i class="bi bi-exclamation-triangle-fill me-2"></i> Desktop Recommended</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>The Page Editor is designed for large screens to maximize usability and precision. Using it on a
                        mobile device may be difficult.</p>
                    <p class="mb-0 text-muted small">Would you like to continue anyway or switch to a desktop?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go Back</button>
                    <a href="#" id="continueToEditor" class="btn btn-primary">Continue on Mobile</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>Confirm Deletion
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="mb-1">Are you sure you want to delete this page?</p>
                    <h5 id="pageTitleDisplay" class="fw-bold text-dark"></h5>
                    <p class="text-muted small mt-2">This action is permanent and cannot be undone.</p>
                </div>
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-secondary rounded-pill px-4"
                        data-bs-dismiss="modal">Cancel</button>
                    <form id="deletePageForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-pill px-4">
                            Delete Permanently
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPageModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('pages.store') }}" method="POST" class="modal-content role-protected-form">
                @csrf
                <div class="modal-header">
                    <h5>New Web Page</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Page Title</label>
                        <input type="text" name="title" class="form-control" placeholder="e.g. About Us" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100" data-role="{{ auth()->user()->role }}">Create & Open
                        Editor</button>
                </div>
            </form>
        </div>
    </div>
@endsection