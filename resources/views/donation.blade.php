<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation</title>
    <link rel="stylesheet" href="{{ asset('/css/donation.css') }}">
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
                <a style="text-decoration: none; color: white; padding: 7px 15px;
                 border-radius: 10px; font-size: 1.5rem; background-color: darkolivegreen;" href="{{ route('profile') }}">
                    {{ Auth::user()->name }}
                </a>
            @endguest
        </div>
    </nav>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="donate-poster">
        <div class="poster-content">
            <div class="hdg">
                <h2>Food for the body,</h2>
                <h1>kindness for the soul!</h1>
            </div>
            <div class="para">
                <p>Giving one meal of your food won't make you weak, let's donate 1 day's food to needy,every week.</p>
            </div>
            <button><span>Donate now</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                </svg></button>
        </div>
        <div class="poster-img">
            <img src="{{ asset('poster.jpg') }}" alt="food image">
        </div>
    </div>

    <div class="donation-form">
            <img src="{{ asset('https://kishor-23.github.io/food-donate/img/delivery.gif') }}" alt="donation image">
        <div class="form">
        <h2 style="font-size: 2rem;">Donate Now</h2>
        <form action="{{ route('donation') }}" method="POST">
            @csrf
            <input type="text" name="name" value="{{ $user->name }}" placeholder="Name" readonly>
            <input type="text" name="food_type" placeholder="Food Type" required>
            <input type="number" name="food_qty" placeholder="Quantity" required>
            <input type="text" name="location" placeholder="Addtress" required>
            <button type="submit">Donate</button>
        </form>
        </div>
    </div>
</body>

</html>