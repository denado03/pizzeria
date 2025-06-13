<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderStatus')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $statuses = OrderStatus::all();
        $order_items = OrderItem::where('order_id', $order->id)->get();
        return view('admin.orders.show', compact('order', 'order_items', 'statuses'));
    }

    public function update(Order $order, Request $request)
    {
        $status = $request->status;
        $delivery_time = $request->delivery_time;

        $order->update([
            'status_id' => $status,
            'delivery_time' => $delivery_time
        ]);

        return redirect()->route('admin.orders.show' , ['order' => $order->id])->with('success','Сохранено');
    }
}
