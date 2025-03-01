<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
</head>

<body>
    <header style="height: 12vh; width: 99vw; top: 0; left: 0; position: relative; display: flex; align-items: center;">
        <img style="height: 100px; width: 100px;" src="{{ asset('favicon.ico') }}" alt="logo">
        <h1 style="margin-left: 10px; font-size: 2rem;">
            <span style="font-size: 4rem;color: darkolivegreen;">F</span>eed A <span
                style="font-size: 4rem;color: darkolivegreen;">M</span>outh
        </h1>
        <div class="links-routes">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('donation') }}">What We Do</a>
            <a href="{{ route('contact') }}">Contact Us</a>
            <a href="{{ route('about') }}">About Us</a>
        </div>
    </header>
    <a class="out" href="{{ route('logout') }}"><span>Log Out</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
            fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
            <path fill-rule="evenodd"
                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
        </svg> </a>

    <div class="profile">
        <div class="prf-info">
            <h1 style="font-size: 3rem;">Profile</h1>
            <p style="color: #555;"><span style="font-size: 1.25rem; color: #212121;">Name</span> -
                {{ Auth::user()->name }}
            </p>
            <p style="color: #555;"><span style="font-size: 1.25rem; color: #212121;">Email</span> -
                {{ Auth::user()->email }}
            </p>
        </div>
        <div class="prf-logo">
            <div class="logo-outr">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
            </div>
        </div>
    </div>

    <div class="histry">
        <h1>Donation History</h1>
        @if($donations->isEmpty())
        <p>No donations found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Food Type</th>
                    <th>Quantity</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $donation)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $donation->food_type }}</td>
                        <td>{{ $donation->food_qty }}</td>
                        <td>{{ $donation->location }}</td>
                        <td>{{ ucfirst($donation->status) }}</td>
                        <td>{{ $donation->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>

</body>

</html>