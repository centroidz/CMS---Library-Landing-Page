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
                                <th class="ps-4">Page Title</th>
                                <th>Route/Slug</th>
                                <th>Type</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td class="ps-4 fw-bold">{{ $page->title }}</td>
                                    <td><code>/api/{{ $page->slug }}</code></td>
                                    <td>
                                        <span class="badge {{ $page->is_default ? 'bg-secondary' : 'bg-info' }}">
                                            {{ $page->is_default ? 'System Default' : 'Custom (GrapesJS)' }}
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        @if($page->slug == 'landing')
                                            <a href="/admin/landing-page" class="btn btn-sm btn-outline-primary">Edit Form</a>
                                        @elseif($page->is_default)
                                            <a href="/admin/{{ $page->slug }}" class="btn btn-sm btn-outline-primary">Manage</a>
                                        @else
                                            <a href="/admin/editor/{{ $page->id }}" class="btn btn-sm btn-primary">Open Editor</a>
                                            <form action="{{ route('pages.destroy', $page->id) }}" method="POST"
                                                style="display:inline;" class="role-protected-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    data-role="{{ auth()->user()->role }}">
                                                    <i class="bi bi-trash"></i></button>
                                            </form>
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
                                    <span
                                        class="badge rounded-pill {{ $page->is_default ? 'bg-light text-secondary border' : 'bg-info-subtle text-info' }} small">
                                        {{ $page->is_default ? 'System' : 'GrapesJS' }}
                                    </span>
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
                                        <a href="/admin/editor/{{ $page->id }}" class="btn btn-sm btn-primary px-3">
                                            <i class="bi bi-palette me-1"></i> Open Editor
                                        </a>

                                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline;"
                                            class="role-protected-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger w-100"
                                                data-role="{{ auth()->user()->role }}">
                                                <i class="bi bi-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
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