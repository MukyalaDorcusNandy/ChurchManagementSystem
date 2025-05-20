<!DOCTYPE html>
<html>
<head>
    <title>Edit Announcement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h1>Edit Announcement</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                value="{{ old('title', $announcement->title) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea
                class="form-control"
                id="body"
                name="body"
                rows="5"
                required
            >{{ old('body', $announcement->body) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
