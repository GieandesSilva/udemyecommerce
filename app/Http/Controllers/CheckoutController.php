<?php

namespace App\Http\Controllers;

use Mail;

use Cart;

use Stripe\Stripe;

use Stripe\Charge;

use Illuminate\Http\Request;

use Session;

class CheckoutController extends Controller
{
    //
    public function index()

    {
        if(Cart::content()->count() == 0)
        
        {

            Session::flash('info', 'Your cart is still empty. Do some shopping.');

            return redirect()->route('index');
        }

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

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect()->route('index');
        
    }
}
