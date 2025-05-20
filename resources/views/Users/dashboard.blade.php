<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Dashboard</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            background: #f8f9fa;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .header {
            margin-bottom: 40px;
            text-align: center;
        }
        .header h1 {
            font-weight: 700;
            color: #0d6efd;
            display: inline-block;
            margin-left: 15px;
            vertical-align: middle;
        }
        .header img.logo {
            width: 60px;
            vertical-align: middle;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        .header .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            vertical-align: middle;
            margin-left: 15px;
            border: 2px solid #0d6efd;
        }
        .card {
            cursor: pointer;
            transition: transform 0.15s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
        }
        .card i {
            font-size: 3rem;
        }
    </style>
</head>
<body>
    <div class="header">
        <!-- Church Logo -->
        <img class="logo" src="{{ asset('images/logo.jpg') }}" alt="Universal Church Logo" />
        <h1>User Dashboard</h1>
        <!-- User Avatar Placeholder -->
        <img class="user-avatar" src="https://cdn-icons-png.flaticon.com/512/147/147144.png" alt="User Avatar" />
        <p class="lead text-secondary mt-2">Access your church profile and activities</p>
    </div>

     <!-- Flash Messages -->
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-x-circle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>


    <div class="container">
        <div class="row g-4">

            <!-- Profile Management -->
            <div class="col-md-4">
                <div class="card border-primary h-100" onclick="location.href='{{ route('user.profile.edit') }}'">
                    <div class="card-body text-center">
                        <i class="bi bi-person-circle text-primary"></i>
                        <h5 class="card-title mt-3">Profile Management</h5>
                        <p class="card-text">View and edit your personal profile and contacts.</p>
                        <button class="btn btn-outline-primary btn-sm">Edit Profile</button>
                    </div>
                </div>
            </div>

            <!-- Ministry Participation -->
            <div class="col-md-4">
                <div class="card border-success h-100" onclick="location.href='{{ route('user.ministries.index') }}'">
                    <div class="card-body text-center">
                        <i class="bi bi-diagram-3 text-success"></i>
                        <h5 class="card-title mt-3">Ministry Participation</h5>
                        <p class="card-text">Join ministries and view your roles/tasks.</p>
                        <button class="btn btn-outline-success btn-sm">View Ministries</button>
                    </div>
                </div>
            </div>

            <!-- Event Participation -->
            <div class="col-md-4">
                <div class="card border-info h-100" onclick="location.href='{{ route('user.events.index') }}'">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-check text-info"></i>
                        <h5 class="card-title mt-3">Event Participation</h5>
                        <p class="card-text">View upcoming events and RSVP to programs.</p>
                        <button class="btn btn-outline-info btn-sm">View Events</button>
                    </div>
                </div>
            </div>

            <!-- Announcements & Messages -->
            <div class="col-md-4">
                <div class="card border-warning h-100" onclick="location.href='{{ route('user.announcements.index') }}'">
                    <div class="card-body text-center">
                        <i class="bi bi-chat-text text-warning"></i>
                        <h5 class="card-title mt-3">Announcements & Messages</h5>
                        <p class="card-text">Receive announcements and notifications.</p>
                        <button class="btn btn-outline-warning btn-sm">View Messages</button>
                    </div>
                </div>
            </div>

            <!-- Feedback Submission -->
            <div class="col-md-4">
                <div class="card border-danger h-100" onclick="location.href='{{ route('user.feedback.create') }}'">
                    <div class="card-body text-center">
                        <i class="bi bi-pencil-square text-danger"></i>
                        <h5 class="card-title mt-3">Feedback Submission</h5>
                        <p class="card-text">Send questions, prayer requests, or suggestions.</p>
                        <button class="btn btn-outline-danger btn-sm">Submit Feedback</button>
                    </div>
                </div>
            </div>

            <!-- Spiritual Resources -->
            <div class="col-md-4">
                <div class="card border-secondary h-100" onclick="location.href='{{ route('user.resources.index') }}'">
                    <div class="card-body text-center">
                        <i class="bi bi-book-half text-secondary"></i>
                        <h5 class="card-title mt-3">Spiritual Resources</h5>
                        <p class="card-text">Access sermons, devotionals, newsletters, and Bible study.</p>
                        <button class="btn btn-outline-secondary btn-sm">View Resources</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
