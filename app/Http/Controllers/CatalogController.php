<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request){
        $products = Product::all();
        return view('catalog', compact('products'));
    }

}
