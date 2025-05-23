<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Universal Church Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <style>
   
   .navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1030;
}

nav{
    margin-bottom:0;
    padding-bottom:0;
}
body {
    padding-top: 70px; /* Prevent content from hiding under navbar */
}

body,html{
    margin:0;
    padding:0;
}


.hero {
    position: relative;
    background: url('{{ asset("images/church-bg.jpg") }}') no-repeat center center;
    background-size:cover;
    height: 100vh;
    width: 100%;
    color: white;
    text-shadow: 1px 1px 3px black;
    padding:0;
    overflow: hidden;

    display: flex;
    align-items: center;
    justify-content: center;
    text-align:center;
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.1); /*Adjust brightness */
    z-index: 1;
}

.hero .container {
    position: relative;
    z-index: 2; /* Bring text above the overlay */
}


      .feature-icon {
            font-size: 2rem;
            color: #0d6efd;
        }
        footer {
            background: #0d6efd;
            color: white;
        }
        .nav-link {
            color: white !important;
        }
        /* Logo image styling */
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/logo.jpg') }}" alt="Universal Church Logo" />
            Universal Church
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="#hero" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('Users.register') }}" class="nav-link">Register</a></li>
                <li class="nav-item"><a href="{{ route('Users.login') }}" class="nav-link">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
 <section id="hero" class="hero text-center">
    <div class="container">
        <h1 class="display-4">Welcome to Universal Church Portal</h1>
        <p class="lead">“For where two or three gather in my name, there am I with them.” – Matthew 18:20</p>
        <a href="{{ route('Users.register') }}" class="btn btn-light btn-lg m-2">Join Us</a>
        <a href="{{ route('Users.login') }}" class="btn btn-outline-light btn-lg m-2">Already a Member? Login</a>
    </div>
</section>


</section>

<!-- About Section -->
<section id="about" class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>About Universal Church</h2>
                <p>
                    Universal Church is a community-driven spiritual family committed to spreading the love of God, 
                    fostering growth, and empowering believers. We provide various services including Sunday worship, 
                    weekly fellowships, community outreach, and pastoral support.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/church-about.jpg') }}" class="img-fluid rounded shadow" alt="Church Community" />
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5 text-center">
    <div class="container">
        <h2 class="mb-4">What You Can Do</h2>
        <div class="row g-4">
            @foreach ([
                ['Member Registration', 'bi-person-plus'],
                ['View Church Events', 'bi-calendar-event'],
                ['Pastor/Leader Dashboard', 'bi-speedometer2'],
                ['Prayer Requests', 'bi-chat-heart'],
                ['Tithing & Donations', 'bi-cash-stack']
            ] as [$feature, $icon])
            <div class="col-md-4">
                <div class="p-4 bg-light rounded shadow-sm">
                    <i class="bi {{ $icon }} feature-icon mb-3"></i>
                    <h5>{{ $feature }}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonial/Scripture Section -->
<section class="bg-light py-5">
    <div class="container text-center">
        <blockquote class="blockquote">
            <p class="mb-0">“I can do all things through Christ who strengthens me.”</p>
            <footer class="blockquote-footer">Philippians 4:13</footer>
        </blockquote>
    </div>
</section>

<!-- Footer -->
<footer class="py-4">
    <div class="container text-center">
        <p>&copy; {{ date('Y') }} Universal Church. All rights reserved.</p>
        <p>
            Sunday Service: 10:00 AM - 12:00 PM | Wednesday Fellowship: 6:00 PM - 8:00 PM <br />
            Contact: info@universalchurch.org | Phone: +256 700 000 000
        </p>
        <p>
            <a href="#" class="text-white me-2">Facebook</a> |
            <a href="#" class="text-white mx-2">Instagram</a> |
            <a href="#" class="text-white ms-2">YouTube</a>
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
