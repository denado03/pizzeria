<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(User $user, Request $request)
    {

        $user = auth()->user();

        $cartProducts = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        $total = 0;
        foreach($cartProducts as $item)
        {
            $total += $item->quantity * $item->product->price;
        }


        return view('cart', compact('cartProducts', 'total'));
    }

    public function addToCart(User $user, Product $product, Request $request)
    {
        $quantity = $request->quantity;
        $user = auth()->user();

        $existingItem = Cart::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if($existingItem)
        {
            $existingItem->quantity+=$quantity;
            $existingItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $quantity
            ]);
        }

        return redirect()->route('catalog');

    }

    public function delete(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index');
    }
}
