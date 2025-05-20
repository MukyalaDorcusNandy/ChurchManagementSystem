<!DOCTYPE html>
<html>
<head>
    <title>Edit Ministry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Ministry</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.ministries.update', $ministry->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Ministry Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $ministry->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="4">{{ old('description', $ministry->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Ministry</button>
            <a href="{{ route('admin.ministries.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
