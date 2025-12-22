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
            min-width: 260px;
            max-width: 260px;
            min-height: 100vh;
            background: #2c3e50;
            /* Slightly softer dark blue */
            color: #fff;
            transition: all 0.3s;
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
        }

        .navbar {
            padding: 15px;
            background: #fff;
            border-bottom: 1px solid #dee2e6;
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
                <li class="{{ request()->routeIs('admin.announcements') ? 'active' : '' }}">
                    <a href="{{ route('admin.announcements') }}">
                        <span><i class="bi bi-megaphone nav-icon"></i> Announcement</span>
                        <i class="bi bi-pencil-square edit-badge"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1 text-secondary">Editor Panel</span>
                    <div class="ms-auto d-flex align-items-center">
                        <span class="me-3 d-none d-md-inline text-muted">Welcome, {{ explode(' ', auth()->user()->name)[0] }}</span>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
