{{-- NOTIFICATIONS FOR EDITOR --}}
@if(auth()->user()->role !== 'admin' && isset($myRequests) && $myRequests->count() > 0)
    <div class="mb-4">
        <h2 class="fw-bold">My Recent Requests</h2>
        <div class="list-group">
            @foreach($myRequests as $req)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $req->title }}</strong>
                        <small class="text-muted ms-2">{{ $req->created_at->diffForHumans() }}</small>
                    </div>
                    @if($req->status == 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($req->status == 'approved')
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif

{{-- ADMIN APPROVAL PANEL --}}
@if(auth()->user()->role === 'admin' && isset($pendingRequests) && $pendingRequests->count() > 0)
    <div class="card border-warning mb-4 shadow-sm">
        <div class="card-header bg-warning text-dark fw-bold">
            <i class="bi bi-exclamation-circle me-2"></i> Pending Page Requests
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
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
                            <td>{{ $req->user->name }}</td>
                            <td>{{ $req->created_at->format('M d, Y') }}</td>
                            <td class="text-end pe-3">
                                <form action="{{ route('page_requests.approve', $req->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-success me-1">Approve</button>
                                </form>
                                <form action="{{ route('page_requests.reject', $req->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif