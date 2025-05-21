<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>

    <h1>Edit Profile</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
        @csrf

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"><br>
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"><br>
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <br>

        <label for="profile_picture">Profile Picture:</label><br>
        @if($user->profile_picture)
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" width="120" height="120"><br>
        @endif
        <input type="file" id="profile_picture" name="profile_picture" accept="image/*"><br>
        @error('profile_picture')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <br>

        <button type="submit">Update Profile</button>
    </form>

</body>
</html>
