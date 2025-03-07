<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/razorpay', function () {
    return view('razorpay');
})->name('razorpay');

Route::post('/create-payment', [PaymentController::class, 'createPayment']);
Route::get('/payment-success', function () {
    return "Payment Successful";
});

Route::get('/payment-failed', function () {
    return "Payment Failed";
});

Route::get('/payment', function () {
    return view('payment');
});

Route::post('/create-payment', [PaymentController::class, 'handlePayment']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/donate', function () {
    if (Auth::check()) {
        return view('dashboard');
    }
    return redirect('/login')->with('error', 'You must be logged in to access the dashboard.');
})->name('dashboard');

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');


Route::get('/donate', [DonationController::class, 'showDonationForm']); // Show the donation form
Route::post('/donate', [DonationController::class, 'store'])->name('donation'); // Store donation data
Route::get('/donations', [DonationController::class, 'showDonations']); // Show all donations
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::get('/profile', [DonationController::class, 'showProfile'])->name('profile');