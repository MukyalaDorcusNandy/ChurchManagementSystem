<!DOCTYPE html>
<html>
<head>
    <title>View Announcement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h1>{{ $announcement->title }}</h1>
    <p class="text-muted">Published on {{ $announcement->created_at->format('F j, Y, g:i a') }}</p>

    <div class="mb-4">
        {!! nl2br(e($announcement->body)) !!}
    </div>

    <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">Back to Announcements</a>
    <a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="btn btn-primary">Edit Announcement</a>
</div>
</body>
</html>
