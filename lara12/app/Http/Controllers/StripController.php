<?php

namespace App\Http\Controllers;

use Session;
Use Stripe;
use Illuminate\Http\Request;

class StripController extends Controller
{
    public function stripe()
    {
        return view('front-end.checkout.stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return redirect('/checkout/payment/confirm');
    }
}
