<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

use App\Product;

use Session;

class ProductsController extends Controller
{

    public function __construct()

    {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('created_at', 'desc')->paginate(5);

        return view('products.index', ['products' => $products ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [

            'name' => 'required',

            'image' => 'required|image',

            'price' => 'required',

            'description' => 'required',
            
        ]);

        $product = new Product;
        
        $product_image = $request->image;

        $product_image_new_name = time() . $product_image->getClientOriginalName();

        $product_image->move('images/uploads/products/', $product_image_new_name);
        
        $product->name = $request->name;

        $product->price = $request->price;
        
        $product->description = $request->description;

        $product->image = 'images/uploads/products/'. $product_image_new_name;
        
        $product->save();

        Session::flash('success', 'Product Created Successfully.');

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = product::find($id);

        $this->validate($request, [

            'name' => 'required',

            'price' => 'required',

            'description' => 'required',
            
        ]);

        
        if($request->hasFile('image'))
        
        {
            
            $product_image = $request->image;
            
            $product_image_new_name = time() . $product_image->getClientOriginalName();
            
            $product_image->move('images/uploads/products/', $product_image_new_name);
            
            $product->image = 'images/uploads/products/'. $product_image_new_name;
            
            $product->save();
        }
        
        $product->name = $request->name;
    
        $product->price = $request->price;
    
        $product->description = $request->description;

        $product->save();

        Session::flash('success', 'Product Updated Sucessfully.');

        return redirect()->route('products.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        
        if(file_exists($product->image))
        {

            unlink($product->image);
        }

        $product->delete();

        Session::flash('success', 'Product Deleted Sucessfully.');

        return redirect()->back();

    }
}
