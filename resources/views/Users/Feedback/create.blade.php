<!DOCTYPE html>
<html>
<head>
    <title>Send Feedback</title>
</head>
<body>

<h2>Send Feedback</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('user.feedback.store') }}">
    @csrf
    <label for="message">Your Feedback:</label><br>
    <textarea id="message" name="message" rows="5" cols="50">{{ old('message') }}</textarea><br><br>

    <button type="submit">Send Feedback</button>
</form>

</body>
</html>
