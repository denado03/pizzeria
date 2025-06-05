<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
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


        return view('order', compact('cartProducts', 'total'));
    }
}
