<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/razorpay.css') }}">
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

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="billing_name" id="billing_name"
                                placeholder="Enter name" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="billing_email" id="billing_email"
                                placeholder="Enter email" required="">
                        </div>

                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" class="form-control" name="billing_mobile" id="billing_mobile"
                                min-length="10" max-length="10" placeholder="Enter Mobile Number" required=""
                                autofocus="">
                        </div>

                        <div class="form-group">
                            <label>Payment Amount</label>
                            <input type="text" class="form-control" name="payAmount" id="payAmount" value="100"
                                placeholder="Enter Amount" required="" autofocus="">
                        </div>

                        <!-- submit button -->
                        <button id="PayNow" class="btn btn-success btn-lg btn-block">Submit & Pay</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#PayNow').click(function (e) {
                e.preventDefault();

                let billing_name = $('#billing_name').val();
                let billing_mobile = $('#billing_mobile').val();
                let billing_email = $('#billing_email').val();
                let payAmount = $('#payAmount').val();

                if (!billing_name || !billing_mobile || !billing_email || !payAmount) {
                    alert("Please fill in all fields");
                    return;
                }

                $.ajax({
                    type: 'POST',
                    url: '/create-payment',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        billing_name: billing_name,
                        billing_mobile: billing_mobile,
                        billing_email: billing_email,
                        payAmount: payAmount
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log("Server Response:", data);
                        if (data.res === 'success') {
                            var options = {
                                "key": data.razorpay_key,
                                "amount": data.amount * 100,
                                "currency": "INR",
                                "name": "Feed A Mouth",
                                "description": "Donation",
                                "order_id": data.razorpay_order_id,
                                "handler": function (response) {
                                    window.location.href = "/payment-success?payment_id=" + response.razorpay_payment_id;
                                },
                                "prefill": {
                                    "name": billing_name,
                                    "email": billing_email,
                                    "contact": billing_mobile
                                },
                                "theme": {
                                    "color": "#3399cc"
                                }
                            };
                            var rzp = new Razorpay(options);
                            rzp.open();
                        } else {
                            alert("Payment Failed: " + data.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log("AJAX Error Response:", xhr.responseText);
                        alert("Payment Failed! Check console for details.");
                    }
                });

            });
        });
    </script>
</body>

</html>