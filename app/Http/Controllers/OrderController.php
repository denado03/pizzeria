<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\OrderService;
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

        return view('orders.create', compact('cartProducts', 'total'));
    }

    public function store(Request $request, OrderService $orderService)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone_number' => ['required', 'regex:/^\+375(25|29|33|44)\d{7}$/'],
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*.name' => 'required|string|max:255',
            'products.*.description' => 'nullable|string|max:1000',
            'products.*.price' => 'required|numeric|min:0',
            'products.*.id' => 'required|integer|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $total = $request->total;
        $orderService->placeOrder($data, $total);

        return redirect()->route('catalog')->with('success', 'Заказ оформлен');

    }


}
