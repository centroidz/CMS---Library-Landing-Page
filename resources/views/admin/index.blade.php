@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold">Library Overview</h2>
                <p class="text-muted">Welcome back! Here is what's happening with your library portal.</p>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded">
                            <i class="bi bi-people text-primary fs-3"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-muted">Total Staff</h6>
                            <h4 class="mb-0 fw-bold">12</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 bg-success bg-opacity-10 p-3 rounded">
                            <i class="bi bi-megaphone text-success fs-3"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-muted">Active Announcements</h6>
                            <h4 class="mb-0 fw-bold">4</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 bg-warning bg-opacity-10 p-3 rounded">
                            <i class="bi bi-eye text-warning fs-3"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-muted">Page Views</h6>
                            <h4 class="mb-0 fw-bold">1,240</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 bg-info bg-opacity-10 p-3 rounded">
                            <i class="bi bi-clock-history text-info fs-3"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-muted">Last Update</h6>
                            <h4 class="mb-0 fw-bold fs-6 text-nowrap">2 hours ago</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h5 class="fw-bold">Content Management</h5>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                <div>
                                    <h6 class="mb-1 fw-bold">Landing Page</h6>
                                    <small class="text-muted">Edit hero section, library hours, and contact info.</small>
                                </div>
                                <a href="/landing-page" class="btn btn-sm btn-outline-primary">Edit Content</a>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                <div>
                                    <h6 class="mb-1 fw-bold">Staff Directory</h6>
                                    <small class="text-muted">Manage library personnel and their designations.</small>
                                </div>
                                <a href="/staff" class="btn btn-sm btn-outline-primary">Manage Staff</a>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                <div>
                                    <h6 class="mb-1 fw-bold">Announcements</h6>
                                    <small class="text-muted">Post news, holiday closures, or new book arrivals.</small>
                                </div>
                                <a href="/announcements" class="btn btn-sm btn-outline-primary">Post Update</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm bg-dark text-white p-2">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Live Preview</h5>
                        <p class="card-text text-light opacity-75 small">Check how your landing page looks to the public.
                        </p>
                        <a href="/" target="_blank" class="btn btn-light w-100 btn-sm mt-2">
                            <i class="bi bi-box-arrow-up-right me-2"></i>View Public Site
                        </a>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">System Status</h6>
                        <div class="d-flex justify-content-between small mb-2">
                            <span>Database</span>
                            <span class="badge bg-success">Online</span>
                        </div>
                        <div class="d-flex justify-content-between small mb-2">
                            <span>Storage</span>
                            <span class="text-muted">45% used</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection