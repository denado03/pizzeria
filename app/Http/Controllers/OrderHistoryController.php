<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order_items = OrderItem::where('order_id', $order->id)->get();
        return view('orders.show', compact('order', 'order_items'));
    }
}
