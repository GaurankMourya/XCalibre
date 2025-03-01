<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        Log::info('Payment Request:', $request->all());

        $razorpayKey = "rzp_test_W5CsXpgJgi8Mjg"; // Use your actual Razorpay Key
        $razorpaySecret = "jjDKcDqVtZ8Di2wHWBYLnmlg"; // Use your actual Razorpay Secret

        $amount = $request->input('payAmount');
        $note = "Payment of Rs. " . $amount;

        // Call Razorpay API
        $response = Http::withBasicAuth($razorpayKey, $razorpaySecret)->post('https://api.razorpay.com/v1/orders', [
            'amount' => $amount * 100,
            'currency' => 'INR',
            'receipt' => uniqid(),
            'payment_capture' => 1
        ]);

        $orderData = $response->json();

        // Log API Response
        Log::info('Razorpay API Response:', $orderData);

        if (isset($orderData['id'])) {
            return response()->json([
                'res' => 'success',
                'razorpay_order_id' => $orderData['id'],
                'razorpay_key' => $razorpayKey
            ]);
        } else {
            Log::error("Razorpay Error: " . json_encode($orderData));
            return response()->json(['res' => 'error', 'message' => 'Error creating order'], 500);
        }
    }
}