<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\StripeClient;


class CheckOutController extends Controller
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(env('stripe_secrit'));
    }


    function index()
    {
        return view('checkout');
    }


    function pay()
    {
        $checkout_session = $this->stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'T-shirt',
                            'description' => "dadawdawdawd",
                        ],
                        'unit_amount' => 20 * 100,
                    ],
                    'quantity' => 1,
                ],
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'هاتف',
                            'description' => "جيد جدا",
                            'images' => ['https://www.apple.com/v/iphone/home/bv/images/overview/select/iphone_14__cjgvgyn9cquu_xlarge.png']
                        ],
                        'unit_amount' => 150 * 100,
                    ],
                    'quantity' => 1,
                ],

            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        return redirect($checkout_session->url);
    }

    function success()
    {
        return 'pay success';
    }

    function cancel()
    {
        return 'pay cancel';
    }
}
