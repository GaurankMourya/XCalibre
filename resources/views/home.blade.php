<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('/css/home.css') }}">
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

    <div class="intro">
        <h2>"Welcome to Feed A Mouth"</h2>
        <p>
            At "Feed A Mouth", we believe that no one should go hungry. Our mission is simple: to connect those
            who have extra food with individuals and communities in need. Whether you're an individual looking to donate
            surplus food or an organization that wants to contribute to fighting hunger, we're here to make it easy for
            you to give back.

            By working together, we can reduce food waste, support local communities, and ensure that everyone has
            access to nutritious meals. Join us in making a lasting impact and helping build a world where food is
            shared, not wasted.</p>
    </div>

    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="{{ asset('slide-img-5.jpg') }}" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src={{ asset('slide-img-1.jpg') }} style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src={{ asset('slide-img-3.jpg') }} style="width:100%">
        </div>
    </div>
    <div style="text-align:center; margin-top: 10px;">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <div class="home-content">
        <h2>How many people's sleep hungry each day ?</h2>
        <p>Around 22 crore (220 million) people in India live in hunger or face severe food insecurity. 
            Despite improvements, India ranks 105th out of 127 countries on the Global Hunger Index. Additionally, 74% of Indians cannot afford a healthy diet, 
            reflecting ongoing challenges in addressing hunger and food access.</p>

        <h2>Why is a Food Donation Website Needed?</h2>
        <ul style="list-style:square;">
            <li>Food Waste Reduction</li>
            <ul>
                <li style="color: #555;">1.3 billion tons of food is wasted globally every year.</li>
                <li style="color: #555;">A platform can help redirect surplus food from restaurants, events, and households to those in need.</li>
            </ul>
            <li>Hunger Alleviation</li>
            <ul>
                <li style="color: #555;">Millions of people struggle with hunger despite excess food being available.</li>
                <li style="color: #555;">A donation platform ensures food reaches people who need it the most.</li>
            </ul>
            <li>Seamless Coordination</li>
            <ul>
                <li style="color: #555;">A website can match food donors with nearby recipients based on location, availability, and urgency.</li>
                <li style="color: #555;">Real-time tracking ensures transparency and efficiency.</li>
            </ul>
            <li>Government & NGO Support</li>
            <ul>
                <li style="color: #555;">Many governments support and encourage food donation initiatives.</li>
                <li style="color: #555;">NGOs and food banks can coordinate donations better using the website.</li>
            </ul>
        </ul>
    </div>


    <div class="donation-methods">
        <div class="food">
            <img src="{{ asset('food.jpg') }}" alt="food">
            <a href="{{ route('donation') }}">Donate Food</a>
        </div>
        <div class="money">
            <img src="{{ asset('money.jpg') }}" alt="food">
            <a href="{{ route('razorpay') }}">Donate Money</a>
        </div>
    </div>

    <div class="work">
        <h1>How it works</h1>
        <div class="imgs">
            <img src="{{ asset('devices.png') }}" alt="1">
            <img src="{{ asset('boxes.png') }}" alt="2">
            <img src="{{ asset('stack_boxes.png') }}" alt="3">
        </div>
        <div class="cptn">
        <p>Access our desktop site or mobile app</p>
        <p>Share information about your donation</p>
        <p>A local volunteer picks it up</p>
        </div>
    </div>

    <footer>
        &copy;2025 Feed A Mouth
    </footer>

</body>
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2.5 seconds
    }

</script>

</html>