<!DOCTYPE html>
<html>
<head>
    <title>Reports & Analytics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4"><i class="bi bi-bar-chart-fill"></i> Reports & Analytics</h1>
        <p>Here you can view attendance, giving trends, and other analytics for your church.</p>

        {{-- Example Cards --}}
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Attendance Report</h5>
                        <p class="card-text">View weekly and monthly attendance statistics.</p>
                        <a href="#" class="btn btn-primary btn-sm">View Attendance</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Giving Trends</h5>
                        <p class="card-text">Analyze tithes and offerings over time.</p>
                        <a href="#" class="btn btn-primary btn-sm">View Giving</a>
                    </div>
                </div>
            </div>
        </div>

        <a href="/admin/dashboard" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Back to Dashboard</a>
    </div>
</body>
</html>
