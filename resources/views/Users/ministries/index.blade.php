<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Ministries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4">My Ministries</h1>

    <!-- Ministries User Has Joined -->
    <div class="mb-5">
        <h3>Your Ministries</h3>
        @if($joinedMinistries->isEmpty())
            <p class="text-muted">You have not joined any ministries yet.</p>
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($joinedMinistries as $ministry)
                    <div class="col">
                        <div class="card h-100 border-primary">
                            <div class="card-body">
                                <h5 class="card-title">{{ $ministry->name }}</h5>
                                <p class="card-text">{{ $ministry->description }}</p>
                                <p><strong>Your Role:</strong> {{ $ministry->pivot->role ?? 'Member' }}</p>
                                <p><strong>Next Meeting:</strong> 
                                    @if($ministry->next_meeting)
                                        {{ $ministry->next_meeting->format('F j, Y, g:i A') }}
                                    @else
                                        <span class="text-muted">No upcoming meetings</span>
                                    @endif
                                </p>
                            </div>
                            <div class="card-footer text-end">
                                <a href="{{ route('user.ministries.show', $ministry->id) }}" class="btn btn-sm btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <hr />

    <!-- Ministries Available to Join -->
    <div>
        <h3>Explore Ministries</h3>
        @if($availableMinistries->isEmpty())
            <p class="text-muted">No ministries available to join right now.</p>

            <!-- Show example ministries if none available from DB -->
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                @php
                $exampleMinistries = [
                    [
                        'name' => 'Music Ministry',
                        'description' => 'Leads worship through singing, instruments, and organizing music events during services and special occasions.'
                    ],
                    [
                        'name' => 'Outreach Ministry',
                        'description' => 'Coordinates community outreach programs such as feeding the homeless, visiting the sick, and evangelism.'
                    ],
                    [
                        'name' => 'Prayer Ministry',
                        'description' => 'Dedicated to intercessory prayer for the church, community, and individual needs.'
                    ],
                    [
                        'name' => 'Children’s Ministry',
                        'description' => 'Provides age-appropriate Bible lessons, activities, and care for children during church services and special events.'
                    ],
                    [
                        'name' => 'Hospitality Ministry',
                        'description' => 'Welcomes visitors and church members, manages event logistics, and ensures a warm church environment.'
                    ],
                    [
                        'name' => 'Men’s Ministry',
                        'description' => 'Supports spiritual growth and fellowship among the men of the church through Bible studies, retreats, and service projects.'
                    ],
                    [
                        'name' => 'Women’s Ministry',
                        'description' => 'Empowers women through Bible study groups, mentorship, community service, and social events.'
                    ],
                ];
                @endphp

                @foreach ($exampleMinistries as $ministry)
                    <div class="col">
                        <div class="card h-100 border-secondary">
                            <div class="card-body">
                                <h5 class="card-title">{{ $ministry['name'] }}</h5>
                                <p class="card-text">{{ $ministry['description'] }}</p>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-sm btn-secondary" disabled>Request to Join</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($availableMinistries as $ministry)
                    <div class="col">
                        <div class="card h-100 border-success">
                            <div class="card-body">
                                <h5 class="card-title">{{ $ministry->name }}</h5>
                                <p class="card-text">{{ $ministry->description }}</p>
                                <p><strong>Meeting Time:</strong> 
                                    @if($ministry->meeting_time)
                                        {{ $ministry->meeting_time }}
                                    @else
                                        <span class="text-muted">Not specified</span>
                                    @endif
                                </p>
                            </div>
                            <div class="card-footer text-end">
                                <form action="{{ route('user.ministries.join', $ministry->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">Request to Join</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
