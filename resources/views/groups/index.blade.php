<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Church Groups</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        body {
            padding-top: 30px; /* space for fixed navbar */
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        /* Navbar brand image */
        .navbar-brand img {
            height: 30px;
            margin-right: 8px;
            border-radius: 4px;
        }
        /* Fullscreen video container */

        .navbar-brand img {
    height: 30px;
    margin-right: 10px;
    border-radius: 6px;
    transition: transform 0.3s ease;
}

.navbar-brand img:hover {
    transform: scale(1.1);
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

#vyg-video-wrapper video {
  animation: fadeIn 2s ease forwards;
}

#vyg-images-row img {
  animation: fadeIn 2s ease forwards;
}

        #vyg-video-wrapper {
            position: relative;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }
        /* Video fills container and covers */
        #vyg-video-wrapper video {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(1.2);
            z-index: 1;
        }
        /* Overlay to darken video for text readability */
        #vyg-video-wrapper::after {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
    background-color: rgba(0, 0, 0, 0.1); /*Adjust brightness */
            z-index: 2;
        }
        /* Content below video */
        #vyg-content-container {
            max-width: 900px;
            margin: 3rem auto 6rem;
            padding: 0 15px;
            text-align: center;
        }
        #vyg-content-container h2 {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            color: #0d6efd; /* Bootstrap primary blue */
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        #vyg-content-container p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 2.5rem;
        }
        /* Flex container for images */
        #vyg-images-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
        }
        #vyg-images-row img {
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }
        #vyg-images-row img:hover {
            transform: scale(1.05);
        }
        /* Large image */
        .img-large {
            max-width: 600px;
            width: 100%;
            height: auto;
        }
        /* Small icon */
        .img-small {
            max-width: 120px;
            width: 100%;
            height: auto;
        }
        /* Other sections inside container with spacing */
        section + section {
            margin-top: 5rem;
        }
        /* Headings for other sections */
        section h2 {
            font-weight: 600;
            color: #0d6efd;
            margin-bottom: 1rem;
            text-align: center;
        }
        section p {
            max-width: 720px;
            margin: 0 auto 2rem;
            font-size: 1.1rem;
            color: #444;
            text-align: center;
        }
        /* Images in other sections */
        .rounded.shadow {
            border-radius: 12px !important;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15) !important;
            transition: transform 0.3s ease;
        }
        .rounded.shadow:hover {
            transform: scale(1.03);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/logo.jpg') }}" alt="Universal Church Logo" />
            Universal Church
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="groupsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Groups
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="groupsDropdown">
                        <li><a class="dropdown-item" href="#vyg">VYG</a></li>
                        <li><a class="dropdown-item" href="#caleb">Caleb</a></li>
                        <li><a class="dropdown-item" href="#soulwinners">Soulwinners</a></li>
                        <li><a class="dropdown-item" href="#ushers">Ushers</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Fullscreen Video Section -->
<section id="vyg">
    <div id="vyg-video-wrapper" aria-label="Victory Youth Group video promo">
        <video autoplay loop muted playsinline controls>
            <source src="{{ asset('videos/vyg-pro.mp4') }}" type="video/mp4" />
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="container my-5 p-4 rounded shadow" style="max-width: 1000px; background: #fff;">
  <div class="row align-items-center">
    <!-- Text Content on Left -->
    <div class="col-md-7">
      <h2 class="text-primary fw-bold mb-3" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.1);">
        Victory Youth Group (VYG)
      </h2>
      <p class="lead text-secondary mb-4">
        VYG, standing for Victory Youth Group, is a vibrant community of youths here at Universal Church. Youths aged between 15 and 35 are warmly welcomed to join.
      </p>
      <p style="color:#555; line-height:1.6;">
        In VYG, youths learn many important life values such as the fear of God, serving God faithfully, and walking in His ways. We also provide support to help youths overcome addictions like prostitution and drug abuse. Respect and hard work are core principles we teach every youth who joins.
      </p>
      <p style="color:#555; line-height:1.6;">
        We have many exciting projects that youths actively engage in. VYG hangouts are held every Sunday after the main service, where youths compete in fun activities like music, dance, drama, and sports.
      </p>
      <p style="color:#555; line-height:1.6;">
        Additionally, every month, youths from various branches come together to meet and fellowship at the main branch in Nakasero. This is a great opportunity to build friendships and strengthen our faith as one community.
      </p>
    </div>

    <!-- Images on Right -->
    <div class="col-md-5 d-flex flex-column gap-3">
      <img src="{{ asset('images/vyg-photo.jpg') }}" alt="VYG Activity" class="img-fluid rounded shadow" style="border-radius: 12px; box-shadow: 0 8px 16px rgba(0,0,0,0.15); transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" />
      
      <img src="{{ asset('images/whatsapp1.jpg') }}" alt="WhatsApp Icon" class="img-fluid rounded shadow" style="max-width: 390px; border-radius: 12px; box-shadow: 0 6px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease; align-self: center;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" />
    </div>
  </div>
</div>

    </div>
</section>

<!-- Other Sections inside container -->
<div class="container my-5" id="caleb">
  <h2 class="text-success fw-bold mb-4" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">
    Caleb Group
  </h2>
  <p class="lead text-secondary" style="font-size: 1.2rem; line-height: 1.6;">
    The Caleb Group is a special ministry within the Universal Church that focuses on elderly members aged 45 and above. 
    Inspired by the biblical character Caleb—who remained strong and faithful even in old age—this group encourages 
    seniors to continue serving God with zeal, wisdom, and strength.
  </p>
  <p style="font-size: 1.1rem; color: #444; line-height: 1.6;">
    Members of the Caleb Group actively participate in various uplifting and productive activities designed to keep 
    them engaged both spiritually and socially. Some of their popular initiatives include baking projects, 
    handicrafts, and community outreach. These activities help them stay connected, valued, and vibrant within 
    the body of Christ.
  </p>
  <p style="font-size: 1.1rem; color: #444; line-height: 1.6;">
    Through regular meetings, fellowship, and service opportunities, the Caleb Group provides a nurturing space 
    for seniors to share life experiences, mentor the younger generation, and deepen their relationship with God. 
    It’s a beautiful example of how age is not a barrier to spiritual growth and contribution in the church.
  </p>
</div>


    <!-- Soulwinners Section -->
    <section id="soulwinners">
     <section id="soulwinners" class="my-5">
     <div class="container" style="max-width: 900px;">
    <h2 class="text-primary fw-semibold mb-4" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">
      Soulwinners
    </h2>
    <p class="lead text-secondary mb-3" style="font-size: 1.2rem; line-height: 1.5; max-width: 720px;">
      Dedicated to evangelism and outreach, bringing people to Christ.
    </p>
    <p style="font-size: 1.1rem; color: #444; line-height: 1.6; max-width: 720px; margin-bottom: 2rem;">
      Soul winners are people who go door to door saving souls. Here at Universal Church, we have a group of people who actively engage in evangelism, sharing the word of God — especially to those who are new or "green" in their faith.
    </p>

    <div class="row g-3">
      <div class="col-md-6">
        <img src="{{ asset('images/soulwinners1.jpg') }}" alt="Soulwinners Outreach 1" 
             class="img-fluid rounded shadow" 
             style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; transition: transform 0.3s ease;"
             onmouseover="this.style.transform='scale(1.05)'" 
             onmouseout="this.style.transform='scale(1)'" />
      </div>
      <div class="col-md-6">
        <img src="{{ asset('images/soulwinners2.jpg') }}" alt="Soulwinners Outreach 2" 
             class="img-fluid rounded shadow" 
             style="width: 100%; height: 400px; object-fit: cover; border-radius: 30px; transition: transform 0.3s ease;"
             onmouseover="this.style.transform='scale(1.05)'" 
             onmouseout="this.style.transform='scale(1)'" />
      </div>
    </div>
  </div>
</section>

    </section>

    <!-- Ushers Section -->
 <!-- Ushers Ministry Section -->
<section id="ushers" class="container my-5">
  <h2 class="text-primary fw-bold mb-4" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">
    Ushers Ministry
  </h2>

  <div class="row align-items-center">
    <!-- Image -->
    <div class="col-md-5 mb-4 mb-md-0">
      <img src="{{ asset('images/whatsapp4.jpg') }}" alt="Ushers Ministry" class="img-fluid rounded shadow" />
    </div>

    <!-- Description -->
    <div class="col-md-7">
      <p class="lead text-secondary" style="font-size: 1.2rem; line-height: 1.6;">
        The Ushers Ministry plays a crucial role in ensuring that every worship service and church event is conducted in a warm, welcoming, and well-organized atmosphere. As the first point of contact, ushers serve as ambassadors of Christ, extending love, kindness, and hospitality to all who walk through the church doors.
      </p>

      <p style="font-size: 1.1rem; color: #444; line-height: 1.6;">
        Their responsibilities go beyond simply showing people to their seats. Ushers assist in maintaining order during services, guiding latecomers, distributing church materials like bulletins, Bibles, envelopes, and ensuring smooth collection of offerings. They are also trained to respond to emergencies with calmness and discretion, working closely with other ministries to provide a seamless worship experience.
      </p>

      <p style="font-size: 1.1rem; color: #444; line-height: 1.6;">
        Serving as an usher is both an honor and a spiritual duty. It requires humility, alertness, excellent interpersonal skills, and a heart for service. Through their ministry, ushers help set the tone for worship and reflect the love and order of God to everyone who enters the sanctuary.
      </p>

      <a href="#join-ushers" class="btn btn-outline-primary mt-3">
        Join the Ushers Ministry
      </a>
    </div>
  </div>
</section>

<!-- Testimony Section -->
<section class="container my-5">
  <h3 class="text-success fw-bold mb-3">Testimony from an Usher</h3>
  <blockquote class="blockquote text-muted border-start border-4 ps-3" style="font-style: italic;">
    “Serving as an usher has transformed my spiritual life. Welcoming people into God’s presence each Sunday has deepened my sense of humility and purpose.
     I’ve learned to serve with love and grace, and I’ve found a family in this ministry.”
    <footer class="blockquote-footer mt-2">Sarah K., Senior Usher</footer>
  </blockquote>
</section>

<!-- Leader Bio Section -->
<section class="container my-5">
  <h3 class="text-info fw-bold mb-3">Meet the Ushers Ministry Leader</h3>
  <div class="d-flex align-items-start gap-3">
    <img src="{{ asset('images/leader.jpg') }}" alt="Leader Photo" class="rounded-circle shadow" width="100" height="100" />
    <div>
      <h5 class="mb-1">Brother James Mwangi</h5>
      <p class="mb-0 text-muted">
        James has been leading the Ushers Ministry for over 5 years with a passion for excellence and service. Under his guidance, the ministry has grown in structure and impact, embodying the values of hospitality and order in God's house.
      </p>
    </div>
  </div>
</section>

<!-- Join Form Section -->
<section id="join-ushers" class="container my-5">
  <h3 class="text-primary fw-bold mb-4">Join the Ushers Ministry</h3>
  <form class="row g-3">
    <div class="col-md-6">
      <label for="fullName" class="form-label">Full Name</label>
      <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" required>
    </div>
    <div class="col-md-6">
      <label for="email" class="form-label">Email Address</label>
      <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
    </div>
    <div class="col-md-6">
      <label for="phone" class="form-label">Phone Number</label>
      <input type="tel" class="form-control" id="phone" placeholder="e.g. +256 700 000000" required>
    </div>
    <div class="col-md-6">
      <label for="availability" class="form-label">Availability</label>
      <select class="form-select" id="availability" required>
        <option value="">Select one</option>
        <option value="sundays">Sundays Only</option>
        <option value="weekdays">Weekdays & Sundays</option>
        <option value="events">Special Events Only</option>
      </select>
    </div>
    <div class="col-12">
      <label for="message" class="form-label">Why do you want to join?</label>
      <textarea class="form-control" id="message" rows="4" placeholder="Share your interest or calling to serve..." required></textarea>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Submit Application</button>
    </div>
  </form>
</section>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
