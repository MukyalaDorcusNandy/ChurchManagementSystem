<!DOCTYPE html>
<html>
<head>
    <title>Admin Ministries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">List of Ministries</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($ministries->count())
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ministries as $ministry)
                        <tr>
                            <td>{{ $ministry->id }}</td>
                            <td>{{ $ministry->name }}</td>
                            <td>{{ $ministry->description }}</td>
                            <td>{{ $ministry->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.ministries.edit', $ministry->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.ministries.destroy', $ministry->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this ministry?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">No ministries found.</p>
        @endif

        <a href="{{ route('admin.ministries.create') }}" class="btn btn-success mt-3">Add New Ministry</a>
    </div>
</body>
</html>
