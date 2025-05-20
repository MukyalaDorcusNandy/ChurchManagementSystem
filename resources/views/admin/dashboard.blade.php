<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #212529;
            color: white;
            padding: 15px;
            position: fixed;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #0d6efd;
        }

        .sidebar .admin-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .content {
            margin-left: 250px;
            width: 100%;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="admin-title">Pastor Admin Panel</div>
        <a href="{{ route('admin.dashboard') }}"><i class="bi bi-house"></i> Dashboard</a>
        <a href="{{ route('admin.members.index') }}"><i class="bi bi-people-fill"></i> Members</a>
        <a href="{{ route('admin.ministries.index') }}"><i class="bi bi-building"></i> Ministries</a>
        <a href="{{ route('admin.events.index') }}"><i class="bi bi-calendar-event"></i> Events</a>
        <a href="{{ route('admin.announcements.index') }}"><i class="bi bi-megaphone"></i> Announcements</a>
        <a href="{{ route('admin.reports.index') }}"><i class="bi bi-bar-chart-fill"></i> Reports</a>
        <a href="{{ route('admin.settings.index') }}"><i class="bi bi-gear-fill"></i> Settings</a>
        <a href="{{ route('admin.support.index') }}"><i class="bi bi-chat-dots-fill"></i> Support</a>
    </div>

    <!-- Main Content -->
    <div class="content">

        <!-- Header with Logo -->
        <div class="dashboard-header d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('images/logo.jpg') }}" alt="Universal Logo" style="width: 80px; height: 80px;" />
                <div>
                    <h1>Universal Church - Admin Dashboard</h1>
                    <p>Welcome, {{ Auth::user()->name }} ({{ Auth::user()->role ?? 'Admin' }})</p>
                </div>
            </div>

            <div class="d-flex gap-3">
                <a href="{{ route('admin.notifications') }}" class="btn btn-light position-relative">
                    <i class="bi bi-bell-fill text-primary"></i>
                    <span class="badge rounded-pill bg-danger position-absolute top-0 start-100">3</span>
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-danger"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
            </div>
        </div>

        <!-- Dashboard Grid -->
        <div class="container mt-3">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-primary h-100" onclick="location.href='{{ route('admin.members.index') }}'">
                        <div class="card-body text-center">
                            <i class="bi bi-people-fill text-primary"></i>
                            <h5 class="card-title mt-3">Member Management</h5>
                            <p>View, approve, reject or suspend members.</p>
                            <button class="btn btn-outline-primary btn-sm">Go to Members</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-success h-100" onclick="location.href='{{ route('admin.ministries.index') }}'">
                        <div class="card-body text-center">
                            <i class="bi bi-building text-success"></i>
                            <h5 class="card-title mt-3">Ministries & Departments</h5>
                            <p>Create, edit, assign leaders or delete ministries.</p>
                            <button class="btn btn-outline-success btn-sm">Manage Ministries</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-info h-100" onclick="location.href='{{ route('admin.events.index') }}'">
                        <div class="card-body text-center">
                            <i class="bi bi-calendar-event text-info"></i>
                            <h5 class="card-title mt-3">Events & Programs</h5>
                            <p>Schedule events and notify members.</p>
                            <button class="btn btn-outline-info btn-sm">View Events</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
