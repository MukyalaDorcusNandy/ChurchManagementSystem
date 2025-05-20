<!DOCTYPE html>
<html>
<head>
    <title>Create Ministry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Create New Ministry</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.ministries.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Ministry Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Create Ministry</button>
            <a href="{{ route('admin.ministries.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
