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
      padding-bottom: 100px; /* give extra space for footer */

}

body,html{
    margin:0;
    padding:0;
     scroll-behavior: smooth;
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

                    <!-- EVENTS DROPDOWN START -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="eventsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Events
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="eventsDropdown">
                        <li><a class="dropdown-item" href="#youth">Youth Hangouts</a></li>
                        <li><a class="dropdown-item" href="#selfhelp">Self Help</a></li>
                        <li><a class="dropdown-item" href="#newyear">New Years</a></li>
                    </ul>
                </li>
                

                <!-- Add inside your navbar's <ul class="navbar-nav ms-auto"> -->

<!-- Groups Dropdown -->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="groupsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Groups
  </a>
  <ul class="dropdown-menu" aria-labelledby="groupsDropdown">
    <li><a class="dropdown-item" href="{{ route('groups.index') }}">VYG</a></li>
    <li><a class="dropdown-item" href="{{ route('groups.index') }}">Caleb</a></li>
    <li><a class="dropdown-item" href="{{ route('groups.index') }}">Soulwinners</a></li>
    <li><a class="dropdown-item" href="{{ route('groups.index') }}">Ushers</a></li>
  </ul>
</li>

<!-- Projects Dropdown -->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="projectsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Projects
  </a>
  <ul class="dropdown-menu" aria-labelledby="projectsDropdown">
    <li><a class="dropdown-item" href="#art-culture">Art & Culture</a></li>
    <li><a class="dropdown-item" href="#short-courses">Short Courses</a></li>
    <li><a class="dropdown-item" href="#sports">Sports</a></li>
    <li><a class="dropdown-item" href="#evangelism">Evangelism</a></li>
  </ul>
</li>

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

 


<!-- Events Section -->
<section id="events" class="py-5 bg-light">
    <div class="container">
        <h2>All Events</h2>
        <p>Explore our variety of spiritual and community-building events.</p>
    </div>
</section>

<!-- Youth Hangouts Section -->
<section id="youth" class="py-5">
    <div class="container">
        <h3>Youth Hangouts</h3>
        <p>Engage with fellow youth in fun, faith-filled activities and discussions.</p>
    </div>
</section>

<!-- Self Help Section -->
<section id="selfhelp" class="py-5 bg-light">
    <div class="container">
        <h3>Self Help Groups</h3>
        <p>Support and grow with others through empowerment, sharing, and development programs.</p>
    </div>
</section>

<!-- New Year Section -->
<section id="newyear" class="py-5">
    <div class="container">
        <h3>New Year Celebrations</h3>
        <p>Join us as we celebrate the beginning of a new year with faith, joy, and worship.</p>
    </div>
</section>

<!-- Fixed Footer with Column Layout -->
<footer class="bg-primary text-white py-3" style="position: ; bottom: 0; width: 100%; z-index: 1040;">
  <div class="container d-flex flex-column align-items-center gap-3 text-center">
    <div class="d-flex align-items-center gap-3">
      <img src="{{ asset('images/logo.jpg') }}" alt="Universal Church Logo" style="height: 50px; object-fit: contain;" />
      <small class="mb-0">&copy; {{ date('Y') }} Universal Church. All rights reserved.</small>
    </div>
    <div class="small">
      Sunday Service: 10:00 AM - 12:00 PM | Wednesday Fellowship: 6:00 PM - 8:00 PM <br />
      Contact: info@universalchurch.org | Phone: +256 700 000 000
    </div>
    <div class="d-flex gap-3 fs-4 justify-content-center flex-wrap">
      <a href="#" class="text-white" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="text-white" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
      <a href="#" class="text-white" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
      <a href="#" class="text-white" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
      <a href="#" class="text-white" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
      <a href="mailto:info@universalchurch.org" class="text-white" aria-label="Email"><i class="bi bi-envelope-fill"></i></a>
      <a href="tel:+256700000000" class="text-white" aria-label="Phone"><i class="bi bi-telephone-fill"></i></a>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
