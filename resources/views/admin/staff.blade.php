@extends('layout.app')

@section('title', 'Staff Management')

@section('content')
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold text-dark">Staff Management</h2>
            <p class="text-muted">Manage system access for Moderators and Editors.</p>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="bi bi-plus-lg me-2"></i>Add Staff
            </button>
        </div>
    </div>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- DESKTOP VIEW: Table (Hidden on small screens) --}}
    <div class="card border-0 shadow-sm d-none d-md-block">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="ps-4 fw-bold">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle me-2 bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        {{ $user->name }}
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role === 'admin')
                                        <span class="badge bg-danger">Admin</span>
                                    @elseif($user->role === 'moderator')
                                        <span class="badge bg-warning text-dark">Moderator</span>
                                    @else
                                        <span class="badge bg-info">Editor</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-sm btn-outline-primary me-1" 
                                            onclick="editUser({{ $user }})"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editUserModal">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" 
                                            onclick="deleteUser({{ $user->id }})"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteUserModal">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        
                        @if($users->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No other staff members found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MOBILE VIEW: Cards (Visible only on small screens) --}}
    <div class="d-md-none">
        @foreach($users as $user)
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="d-flex align-items-center">
                            <div class="avatar-circle me-2 bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">{{ $user->name }}</h6>
                                <small class="text-muted">{{ $user->email }}</small>
                            </div>
                        </div>
                        <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : ($user->role === 'moderator' ? 'bg-warning text-dark' : 'bg-info') }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-outline-primary w-50" 
                                onclick="editUser({{ $user }})"
                                data-bs-toggle="modal" 
                                data-bs-target="#editUserModal">
                            <i class="bi bi-pencil me-1"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger w-50"
                                onclick="deleteUser({{ $user->id }})"
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteUserModal">
                            <i class="bi bi-trash me-1"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

        @if($users->isEmpty())
            <div class="text-center text-muted py-5">
                <i class="bi bi-people fs-1 d-block mb-2"></i>
                No other staff members found.
            </div>
        @endif
    </div>
</div>

{{-- 1. Create User Modal --}}
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.users.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add New Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select">  
                        <option value="editor">Editor</option>
                        <option value="moderator">Moderator</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>
</div>

{{-- 2. Edit User Modal --}}
<div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="editUserForm" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Staff Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit_user_id">
                
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" id="edit_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" id="edit_email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" id="edit_role" class="form-select">
                        <option value="editor">Editor</option>
                        <option value="moderator">Moderator</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted small">Leave blank to keep current password</label>
                    <input type="password" name="password" class="form-control" placeholder="New Password (Optional)">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

{{-- 3. Delete Confirmation Modal --}}
<div class="modal fade" id="deleteUserModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <form id="deleteUserForm" method="POST" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this user? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Helper function to populate Edit Modal
    function editUser(user) {
        // Set form action dynamically
        // Ensure you have a named route: Route::put('/admin/users/{user}', ...)->name('admin.users.update');
        const form = document.getElementById('editUserForm');
        form.action = `/admin/users/${user.id}/update`; 
        
        // Populate fields
        document.getElementById('edit_name').value = user.name;
        document.getElementById('edit_email').value = user.email;
        document.getElementById('edit_role').value = user.role;
    }

    // Helper function to populate Delete Modal
    function deleteUser(userId) {
        const form = document.getElementById('deleteUserForm');
        // Ensure you have a named route: Route::delete('/admin/users/{user}', ...)->name('admin.users.destroy');
        form.action = `/admin/users/${userId}`;
    }
</script>
@endsection