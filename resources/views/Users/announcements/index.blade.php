<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Announcements & Upcoming Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h1>User Announcements & Upcoming Events</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <section class="mb-5">
        <h2>Announcements</h2>

        @if($announcements->count() > 0)
            <ul class="list-group">
                @foreach($announcements as $announcement)
                    <li class="list-group-item">
                        <h5>{{ $announcement->title }}</h5>
                        <p>{{ $announcement->content }}</p>
                        <small class="text-muted">Posted on: {{ $announcement->created_at->format('M d, Y') }}</small>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No announcements available at the moment.</p>
        @endif
    </section>

    <section>
        <h2>Upcoming Events</h2>

        @if($upcomingEvents->count() > 0)
            <ul class="list-group">
                @foreach($upcomingEvents as $event)
                    <li class="list-group-item">
                        <h5>{{ $event->name }}</h5>
                        <p>{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
                        <small class="text-muted">Date: {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</small>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No upcoming events at the moment.</p>
        @endif
    </section>
</div>
</body>
</html>
