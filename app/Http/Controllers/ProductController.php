<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){

        $products = Product::with('type')->get();

        return view('admin.product.index', compact('products'));
    }

    public function create(Request $request)
    {
        $types = Type::all();
        return view('admin.product.create', compact('types'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'type_id' => ['required', 'exists:types,id'],
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'type_id' => $request->type_id
        ]);

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $types = Type::all();
        return view('admin.product.edit', compact('product', 'types'));
    }

    public function update(Product $product, UpdateRequest $request)
    {
        $data = $request->validated();
        $product->update($data);

        return redirect()->route('admin.products.index');

    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');

    }


}
