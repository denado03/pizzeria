<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

/**
 * Class OrderService.
 */
class OrderService
{
    public function placeOrder(array $data, $total): Order
    {
        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'email' => $data['email'],
            'total_price' => $total,
            'status_id' => 1,
        ]);

        foreach ($data['products'] as $product)
        {
            $order_item = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'description' => $product['description'],
                'product_name' => $product['name']
            ]);
        }

        Cart::where('user_id', Auth::id())->delete();
        return $order;
    }
}
