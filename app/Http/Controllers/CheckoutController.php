<?php

namespace App\Http\Controllers;

use Stripe\Stripe;

use Stripe\Charge;

use Illuminate\Http\Request;

use Session;

use Cart;

class CheckoutController extends Controller
{
    //
    public function index()

    {

        return view('checkout');
    }

    public function pay()

    {


        Stripe::setApiKey("sk_test_RfX4Q8zCwSHoejjUIL7AjsBS");

        $token = request()->stripeToken;

        $charge = Charge::create([

            "amount" => Cart::total() * 100,
            "currency" => "usd",
            "description" => "The Most Very Books",
            "source" => $token,

        ]);

        Session::flash('success', 'Purchcase successfully. Wait for our E-mail');

        Cart::destroy();

        return redirect()->route('index');
        
    }
}
