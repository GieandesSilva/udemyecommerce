<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

use App\Product;

class FrontEndController extends Controller
{
    //

    public function index()
    
    {

        $produtos = Product::orderBy('created_at', 'desc')->paginate(5);

        return view('index', ['products' => $produtos]);
    }

    public function single($id)

    {

        $product = Product::find($id);

        return view('single', ['product' => $product ]);
    }
}
