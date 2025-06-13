<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $status = OrderStatus::where('id', $order->status_id);
        $order_items = OrderItem::where('order_id', $order->id)->get();
        return view('orders.show', compact('order', 'order_items', 'status'));
    }
}
