<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){

        $products = Product::with('type')->get();

        return view('admin.product.index', compact('products'));
    }

    public function store(Request $request)
    {

    }


}
