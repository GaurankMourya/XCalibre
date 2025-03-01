<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us - Food Donation</title>
    <link rel="stylesheet" href="{{ asset('/css/contact.css') }}">
</head>

<body>
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

    <div class="content">
        <h2>Contact Form</h2>
        <form action="#">
            <input type="text" placeholder="Your Name" required>
            <input type="email" placeholder="Your Email" required>
            <textarea placeholder="Your Message" required></textarea>
            <input type="submit" value="Send Message">
        </form>
    </div>

    <div class="contact-info">
        <h3>Our Location</h3>
        <p>Food Donation Organization</p>
        <p>123 Donation St, Cityville, State, 12345</p>
        <p>Email: contact@fooddonation.org</p>
        <p>Phone: (123) 456-7890</p>
    </div>

    <div class="map">
        <h3>Our Location on Google Maps</h3>
        <!-- Google Map Embed -->
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.489260313925!2d-122.08573078468108!3d37.42199977982533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fba4cfcb61f69%3A0xd78f42657a539ff4!2sGoogleplex!5e0!3m2!1sen!2sus!4v1597739353887!5m2!1sen!2sus"
            width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>
    </div>

    <footer>
        <p>&copy; 2025 Food Donation | All Rights Reserved.</p>
        <p>Follow us on <a href="#">Facebook</a> | <a href="#">Twitter</a> | <a href="#">Instagram</a></p>
    </footer>

</body>

</html>