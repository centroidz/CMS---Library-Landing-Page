<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Admin - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">


    <style>
        body {
            overflow-x: hidden;
            background-color: #f4f6f9;
        }

        #wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            position: fixed;
            left: 0;
            top: 0;
            min-width: 260px;
            max-width: 260px;
            min-height: 100vh;
            background: #2c3e50;
            /* Slightly softer dark blue */
            color: #fff;
            transition: all 0.3s;
            z-index: 1050;
        }

        @media (max-width: 991px) {
            #sidebar {
                transform: translateX(-100%);
            }

            #sidebar.show {
                transform: translateX(0);
            }
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #1a252f;
            text-align: center;
            font-weight: bold;
        }

        #sidebar ul.components {
            padding: 20px 0;
        }

        #sidebar ul li a {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #bdc3c7;
            text-decoration: none;
            transition: 0.2s;
        }

        #sidebar ul li a:hover {
            color: #fff;
            background: #34495e;
        }

        #sidebar ul li.active>a {
            color: #fff;
            background: #3498db;
            border-left: 4px solid #fff;
        }

        /* Icon styling */
        .nav-icon {
            width: 25px;
        }

        .edit-badge {
            font-size: 0.75rem;
            color: #f1c40f;
            opacity: 0.8;
        }

        #content {
            width: 100%;
            padding-left: 260px;
        }

        @media (max-width: 991px) {
            #content {
                padding-left: 0;
            }
        }

        .navbar {
            padding: 15px;
            background: #fff;
            border-bottom: 1px solid #dee2e6;
        }

        #sidebarBackdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            display: none;
        }
    </style>
</head>

<body>

    <div id="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <span class="fs-4">LIBRARY ADMIN</span>
            </div>


            <ul class="list-unstyled components">

                <li class="{{ request()->routeIs('admin.profile.edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.profile.edit') }}">
                        <span><i class="bi bi-person-circle nav-icon"></i> Profile Settings</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <span><i class="bi bi-speedometer2 nav-icon"></i> Dashboard</span>
                    </a>
                </li>

                <hr class="mx-3 my-2" style="border-color: rgba(255,255,255,0.1);">

                <li class="{{ request()->routeIs('admin.landing-page') ? 'active' : '' }}">
                    <a href="{{ route('admin.landing-page') }}">
                        <span><i class="bi bi-browser-safari nav-icon"></i> Landing Page</span>
                        <i class="bi bi-pencil-square edit-badge"></i>
                    </a>
                </li>
                @if (Auth::user()->role === 'admin')
                    <li class="{{ request()->routeIs('admin.staff') ? 'active' : '' }}">
                        <a href="{{ route('admin.staff') }}">
                            <span><i class="bi bi-person-badge nav-icon"></i> Staff Management</span>
                            <i class="bi bi-pencil-square edit-badge"></i>
                        </a>
                    </li>
                @endif
                <li class="{{ request()->routeIs('admin.staff-page') ? 'active' : '' }}">
                    <a href="{{ route('admin.staff-page') }}">
                        <span><i class="bi bi-megaphone nav-icon"></i> Staff Page</span>
                        <i class="bi bi-pencil-square edit-badge"></i>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.announcements') ? 'active' : '' }}">
                    <a href="{{ route('admin.announcements') }}">
                        <span><i class="bi bi-megaphone nav-icon"></i> Announcement</span>
                        <i class="bi bi-pencil-square edit-badge"></i>
                    </a>
                </li>

            </ul>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm"
                style="position: sticky; top: 0; z-index: 1050;">
                <div class="container-fluid">
                    <button class="btn btn-outline-secondary d-lg-none me-2" id="sidebarToggle"><i
                            class="bi bi-list"></i></button>
                    <span class="navbar-brand mb-0 h1 text-secondary">{{ ucfirst(auth()->user()->role) }} Panel</span>
                    <div class="ms-auto d-flex align-items-center">
                        <span class="me-3 d-none d-md-inline text-muted">Welcome,
                            {{ explode(' ', auth()->user()->name)[0] }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

            <div class="container-fluid p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <div id="sidebarBackdrop" class="d-lg-none"></div>

    <div class="modal fade" id="unauthorizedModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="unauth-title">403 – Access Denied</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="unauth-body">
                    <p>You don’t have permission to access this section!</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" id="btn-ok-access" data-bs-dismiss="modal">OK</button>
                    <button class="btn btn-primary d-none" id="btn-request-access">Send Request</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('click', function (e) {
            const link = e.target.closest('[data-protected]');
            if (!link) return;

            e.preventDefault();

            // Show unauthorized modal immediately
            new bootstrap.Modal(
                document.getElementById('unauthorizedModal')
            ).show();
        });

        // Variable to hold the data user TRIED to submit
        let pendingSubmission = null;

        document.addEventListener('submit', function (e) {
            const form = e.target.closest('.role-protected-form');
            if (!form) return;

            const button = form.querySelector('[type="submit"][data-role]');
            if (!button) return;

            const role = button.dataset.role;

            // Allowed roles logic
            let allowedRoles = ['admin'];
            if (form.action.includes('pages/store')) {
                // Technically we block editor here so we can show the special modal
                // If you want Editor to pass standard check, add 'editor' here.
                // But we want to trigger the modal, so we leave it as 'admin' only for now.
                allowedRoles = ['admin', 'moderator'];
            }

            if (!allowedRoles.includes(role)) {
                e.preventDefault();

                const modalEl = document.getElementById('unauthorizedModal');
                const bsModal = new bootstrap.Modal(modalEl);

                // CHECK: Is this a "Create Page" attempt?
                const titleInput = form.querySelector('input[name="title"]');

                if (titleInput && form.action.includes('pages/store')) {
                    // It is a Create Page attempt. Customize the modal!
                    document.getElementById('unauth-title').innerText = "Permission Required";
                    document.getElementById('unauth-body').innerHTML = `
                    <p>Editors cannot create pages directly.</p>
                    <p>Would you like to request the Admin to create <strong>"${titleInput.value}"</strong>?</p>
                `;

                    // Show the Request Button, Hide the OK button
                    document.getElementById('btn-request-access').classList.remove('d-none');
                    document.getElementById('btn-ok-access').classList.add('d-none');

                    // Store the title to submit later
                    pendingSubmission = titleInput.value;
                } else {
                    // Standard Unauthorized message
                    document.getElementById('unauth-title').innerText = "403 – Access Denied";
                    document.getElementById('unauth-body').innerHTML = "<p>You don’t have permission to access this section!</p>";
                    document.getElementById('btn-request-access').classList.add('d-none');
                    document.getElementById('btn-ok-access').classList.remove('d-none');
                }

                bsModal.show();
                return false;
            }

            // Delete Confirmation Logic (Existing)
            // if (form.action.includes('pages/') && form.method.toLowerCase() === 'post' &&
            //     form.querySelector('[name="_method"][value="DELETE"]')) {
            //     return confirm('Are you sure you want to delete this page?');
            // }

            return true;
        });

        // Handle the "Request Approval" click
        document.getElementById('btn-request-access').addEventListener('click', function () {
            if (!pendingSubmission) return;

            const btn = this;
            btn.disabled = true;
            btn.innerText = "Sending...";

            fetch("{{ route('page_requests.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ title: pendingSubmission })
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message || 'Request sent!');
                    location.reload(); // Reload to clear modal state
                })
                .catch(err => {
                    console.error(err);
                    console.log(err);
                    alert('Something went wrong.');
                    btn.disabled = false;
                    btn.innerText = "Request Approval";
                });
        });

        // Sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('sidebarBackdrop');
        const toggleBtn = document.getElementById('sidebarToggle');

        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('show');
            backdrop.style.display = sidebar.classList.contains('show') ? 'block' : 'none';
        });

        backdrop.addEventListener('click', function () {
            sidebar.classList.remove('show');
            backdrop.style.display = 'none';
        });

        // Close sidebar when clicking a link
        sidebar.addEventListener('click', function (e) {
            if (e.target.tagName === 'A') {
                sidebar.classList.remove('show');
                backdrop.style.display = 'none';
            }
        });





    </script>



    <script>

        document.querySelectorAll('.editor-link').forEach(link => {
            link.addEventListener('click', function (e) {
                // Check if screen width is less than 1024px
                if (window.innerWidth < 1024) {
                    e.preventDefault(); // Stop the page from navigating

                    const url = this.getAttribute('href');
                    const modalElement = document.getElementById('mobileWarningModal');
                    const continueBtn = document.getElementById('continueToEditor');

                    // Set the URL to the "Continue" button inside the modal
                    continueBtn.setAttribute('href', url);

                    // Show the Bootstrap Modal
                    const mobileModal = new bootstrap.Modal(modalElement);
                    mobileModal.show();
                }
            });
        });


        //delete page
        document.addEventListener('DOMContentLoaded', function () {
            const deleteModal = document.getElementById('deleteConfirmModal');

            deleteModal.addEventListener('show.bs.modal', function (event) {
                // Button that triggered the modal
                const button = event.relatedTarget;

                // Extract info from data-attributes
                const url = button.getAttribute('data-url');
                const title = button.getAttribute('data-title');

                // Update the modal's content
                const form = deleteModal.querySelector('#deletePageForm');
                const displayTitle = deleteModal.querySelector('#pageTitleDisplay');

                form.setAttribute('action', url);
                displayTitle.textContent = title;
            });
        });

    </script>

</body>

</html>