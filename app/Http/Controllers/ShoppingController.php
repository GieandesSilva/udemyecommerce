<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;

use App\Product;


class ShoppingController extends Controller
{
    //
    public function cart()
    
    {
        
        return view('cart');
    }

    public function add_to_cart()

    {

        $request = request();

        $product = Product::find($request->product_id);

        $cartItem = Cart::add([

            'id' => $product->id,

            'name' => $product->name,

            'qty' => $request->qty,

            'price' => $product->price,
            
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        return redirect()->route('cart');
    }

    public function del_to_cart($id)

    {

        Cart::remove($id);

        return redirect()->back();
    }

    public function incr($id, $qty)
    
    {

        Cart::update($id, $qty + 1);

        return redirect()->back();
    }

    public function decr($id, $qty)
    
    {

        Cart::update($id, $qty - 1);

        return redirect()->back();
    }

}
