<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get Involved - Food Donation</title>
    <link rel="stylesheet" href="{{ asset('/css/about.css') }}">
</head>

<body>

    <!-- <header>
    <h1>Get Involved with Food Donation</h1>
    <p>Together, we can make a difference in the fight against hunger.</p>
</header> -->

    <nav>
        <div class="nav-logo">
            <img style="height: 100%;" src="{{ asset('favicon.ico') }}" alt="logo">
            <h1 style="margin-left: 10px; font-size: 2rem;">
                <span style="font-size: 4rem;color: darkolivegreen;">F</span>eed A <span
                    style="font-size: 4rem;color: darkolivegreen;">M</span>outh
            </h1>
        </div>
        <div class="links-routes">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('donation') }}">What We Do</a>
            <a href="{{ route('contact') }}">Contact Us</a>
            <a href="{{ route('about') }}">About Us</a>
        </div>
        <div class="user-profile">
            @guest
                <a href="{{ route('login') }}" style="text-decoration: none; color: white; padding: 7px 15px; border-radius: 10px; 
                font-size: 1.5rem; background-color: darkolivegreen;">Login</a>
            @else
                <a style="text-decoration: none; color: white; padding: 7px 15px; border-radius: 10px; 
                    font-size: 1.5rem; background-color: darkolivegreen;" href="{{ route('profile') }}">
                    {{ Auth::user()->name }}
                </a>
            @endguest
        </div>
    </nav>

    <div class="content" id="get-involved">
        <h2>How You Can Make a Difference</h2>
        <div class="get-involved">
            <div class="involved-card">
                <h3>Donate Money</h3>
                <p>Your donation can help us buy essential food supplies, pay for transportation, and support our
                    efforts to help more communities in need.</p>
                <a href="{{ route('razorpay') }}" class="cta-button">Donate Now</a>
            </div>
            <div class="involved-card">
                <h3>Donate Food</h3>
                <p>We accept food donations ranging from non-perishable items to fresh produce. Your contribution can
                    feed thousands of families.</p>
                <a href="{{ route('donation') }}" class="cta-button">Donate Food</a>
            </div>
            <div class="involved-card">
                <h3>Volunteer</h3>
                <p>Your time can make a big difference. Join our volunteer network to help us sort, package, and
                    distribute food donations.</p>
                <a href="#" class="cta-button">Become a Volunteer</a>
            </div>
        </div>
    </div>

    <div class="statistics" id="statistics">
        <h3>Food Donation Statistics</h3>
        <p>Each year, over 1.3 billion tons of food are wasted globally. At the same time, over 820 million people are
            going hungry.</p>
        <p>Your donation can make an impact on both these issues, helping reduce food waste and providing meals to those
            who need it most.</p>
    </div>

    <div class="mission" id="mission">
        <h3>Our Mission</h3>
        <p>Our mission is simple: reduce food waste and provide meals to people who need them most. We strive to create
            a world where no one has to go hungry while food is thrown away. We rely on the generosity of our community
            to make this mission a reality.</p>
    </div>

    <div class="content" id="contact">
        <h2>Contact Us</h2>
        <form>
            <input type="text" placeholder="Your Name" required>
            <input type="email" placeholder="Your Email" required>
            <textarea placeholder="Your Message" required></textarea>
            <input type="submit" value="Send Message">
        </form>
    </div>

    <footer>
        <p>&copy; 2025 Food Donation | All Rights Reserved.</p>
        <p>Follow us on <a href="#">Facebook</a> | <a href="#">Twitter</a> | <a href="#">Instagram</a></p>
    </footer>

</body>

</html>