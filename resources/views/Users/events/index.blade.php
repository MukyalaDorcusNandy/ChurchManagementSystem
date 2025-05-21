<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Events Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4">Events Dashboard</h1>

    <!-- Search/Filter Form -->
    <form method="GET" action="{{ route('user.events.index') }}" class="mb-4">
        <div class="row g-2">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search events..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="ministry" class="form-select">
                    <option value="">All Ministries</option>
                    <option value="music" {{ request('ministry') == 'music' ? 'selected' : '' }}>Music Ministry</option>
                    <option value="outreach" {{ request('ministry') == 'outreach' ? 'selected' : '' }}>Outreach Ministry</option>
                    <option value="prayer" {{ request('ministry') == 'prayer' ? 'selected' : '' }}>Prayer Ministry</option>
                    <!-- Add others as needed -->
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </div>
    </form>

    <!-- Upcoming Events -->
    <section class="mb-5">
        <h2>Upcoming Events</h2>
        @if($upcomingEvents->isEmpty())
            <p>No upcoming events available.</p>
        @else
            <div class="list-group">
                @foreach($upcomingEvents as $event)
                    <div class="list-group-item mb-3 p-3 border rounded">
                        <h5>{{ $event->name }}</h5>
                        <p><strong>Date & Time:</strong> {{ $event->date->format('F j, Y, g:i A') }}</p>
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <p>{{ $event->description }}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('user.events.show', $event->id) }}" class="btn btn-sm btn-info">View Details</a>

                            @if(!$event->isRegisteredByUser(auth()->id()))
                                <form method="POST" action="{{ route('user.events.join', $event->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">RSVP / Join</button>
                                </form>
                            @else
                                <span class="badge bg-success">Registered</span>
                            @endif

                            <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode($event->name) }}&dates={{ $event->date->format('Ymd\THis\Z') }}/{{ $event->date->addHours(2)->format('Ymd\THis\Z') }}&details={{ urlencode($event->description) }}&location={{ urlencode($event->location) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                Add to Calendar
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <!-- Registered Events -->
    <section class="mb-5">
        <h2>Your Registered Events</h2>
        @if($registeredEvents->isEmpty())
            <p>You have not registered for any events.</p>
        @else
            <div class="list-group">
                @foreach($registeredEvents as $event)
                    <div class="list-group-item mb-3 p-3 border rounded">
                        <h5>{{ $event->name }}</h5>
                        <p><strong>Date & Time:</strong> {{ $event->date->format('F j, Y, g:i A') }}</p>
                        <p>Status: 
                            @if($event->pivot->status == 'confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @elseif($event->pivot->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending Approval</span>
                            @elseif($event->pivot->status == 'waitlisted')
                                <span class="badge bg-secondary">Waitlisted</span>
                            @else
                                <span class="badge bg-info">Registered</span>
                            @endif
                        </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('user.events.show', $event->id) }}" class="btn btn-sm btn-info">View Details</a>

                            <form method="POST" action="{{ route('user.events.cancel', $event->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Cancel Registration</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <!-- Past Events -->
    <section>
        <h2>Past Events Attended</h2>
        @if($pastEvents->isEmpty())
            <p>No past events found.</p>
        @else
            <div class="list-group">
                @foreach($pastEvents as $event)
                    <div class="list-group-item mb-3 p-3 border rounded">
                        <h5>{{ $event->name }}</h5>
                        <p><strong>Date Attended:</strong> {{ $event->date->format('F j, Y') }}</p>
                        <p>{{ $event->feedback ?? 'No feedback provided.' }}</p>
                        <a href="{{ route('user.events.show', $event->id) }}" class="btn btn-sm btn-info">View Details</a>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
