<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;

use Session;

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

        Session::flash('success', 'Product Added to Cart.');        

        return redirect()->route('cart');
    }

    public function del_to_cart($id)

    {

        Cart::remove($id);

        Session::flash('success', 'Product Deleted to Cart.');        
                
        return redirect()->back();
    }

    public function incr($id, $qty)
    
    {

        Cart::update($id, $qty + 1);

        Session::flash('success', 'Quantity Updated Successfully.');                

        return redirect()->back();
    }

    public function decr($id, $qty)
    
    {

        Cart::update($id, $qty - 1);

        Session::flash('success', 'Quantity Updated Successfully.');                
        
        return redirect()->back();
    }

    public function rapid_add_to_cart($id)

    {

        $product = Product::find($id);


        $cartItem = Cart::add([

            'id' => $product->id,

            'name' => $product->name,

            'qty' => 1,

            'price' => $product->price,

        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        Session::flash('success', 'Product Added to Cart.');        
        
        return redirect()->route('cart');

    }

}
