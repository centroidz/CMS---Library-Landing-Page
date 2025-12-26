{{-- NOTIFICATIONS FOR EDITOR --}}
@if(auth()->user()->role !== 'admin' && isset($myRequests) && $myRequests->count() > 0)
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3 collapse-toggle" 
             style="cursor: pointer;"
             data-bs-toggle="collapse" 
             data-bs-target="#myRequestsCollapse" 
             aria-expanded="true">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0 text-secondary">
                    <i class="bi bi-bell me-2"></i>My Page Requests
                </h5>
                <i class="bi bi-chevron-down text-muted"></i>
            </div>
        </div>

        <div id="myRequestsCollapse" class="collapse show">
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @foreach($myRequests as $req)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $req->title }}</strong>
                                <small class="text-muted d-block">{{ $req->created_at->diffForHumans() }}</small>
                            </div>
                            
                            <div class="d-flex align-items-center gap-2">
                                @if($req->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($req->status == 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @else
                                    <span class="badge bg-danger">Rejected</span>
                                @endif

                                {{-- Delete Button (Only for processed requests) --}}
                                @if($req->status !== 'pending')
                                    <button class="btn btn-sm btn-link text-secondary p-0 ms-2" 
                                            onclick="confirmDeleteRequest({{ $req->id }})"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteRequestModal"
                                            title="Dismiss Notification">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

{{-- ADMIN APPROVAL PANEL --}}
@if(auth()->user()->role === 'admin' && isset($pendingRequests) && $pendingRequests->count() > 0)
    <div class="card border-warning mb-4 shadow-sm">
        <div class="card-header bg-warning text-dark py-3 collapse-toggle" 
             style="cursor: pointer;"
             data-bs-toggle="collapse" 
             data-bs-target="#adminRequestsCollapse" 
             aria-expanded="true">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="fw-bold mb-0">
                    <i class="bi bi-exclamation-circle me-2"></i> 
                    Pending Page Requests
                    <span class="badge bg-danger ms-2">{{ $pendingRequests->count() }}</span>
                </h6>
                <i class="bi bi-chevron-down"></i>
            </div>
        </div>

        <div id="adminRequestsCollapse" class="collapse show">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-3">Requested Page</th>
                                <th>Requested By</th>
                                <th>Date</th>
                                <th class="text-end pe-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingRequests as $req)
                                <tr>
                                    <td class="ps-3 fw-bold">{{ $req->title }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 25px; height: 25px; font-size: 0.8rem;">
                                                {{ strtoupper(substr($req->user->name, 0, 1)) }}
                                            </div>
                                            {{ $req->user->name }}
                                        </div>
                                    </td>
                                    <td>{{ $req->created_at->format('M d, Y') }}</td>
                                    <td class="text-end pe-3">
                                        <form action="{{ route('page_requests.approve', $req->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-success me-1">
                                                <i class="bi bi-check-lg"></i> Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('page_requests.reject', $req->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-x-lg"></i> Reject
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif

<style>
    /* Rotates the chevron when the collapse is open */
    .collapse-toggle[aria-expanded="true"] .bi-chevron-down {
        transform: rotate(180deg);
        transition: transform 0.3s;
    }
    .collapse-toggle .bi-chevron-down {
        transition: transform 0.3s;
    }
</style>

{{-- Delete Request Notification Modal --}}
<div class="modal fade" id="deleteRequestModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <form id="deleteRequestForm" method="POST" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title">Remove Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Remove this from your list?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
            </div>
        </form>
    </div>
</div>

<script>
    function confirmDeleteRequest(id) {
        document.getElementById('deleteRequestForm').action = `/admin/page-request/${id}`;
    }
</script>