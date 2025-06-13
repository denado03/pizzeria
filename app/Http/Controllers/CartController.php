<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Services\CartService;
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

    public function addToCart(Product $product, Request $request, CartService $cartService)
    {
        $quantity = $request->quantity;
        $user = auth()->user();
        $typeId = $product->type_id;

        $error = $cartService->addProductToCart($user, $product,  $quantity, $typeId);

        if ($error)
        {
            return redirect()->route('catalog')->with('error', $error);
        }
        return redirect()->route('catalog')->with('success', 'Товар добавлен в корзину');

    }
    public function delete(Cart $cart, Request $request)
    {
        $quantity = $request->quantity;
        $user = auth()->user();

        if ($quantity > $cart->quantity)
        {
            return redirect()->route('cart.index')->with('error', 'Нельзя удалять больше, чем есть в корзине');
        }
        if ($quantity < $cart->quantity)
        {
            $cart->quantity -= $quantity;
            $cart->save();
        } else
        {
            $cart->delete();

        }

        return redirect()->route('cart.index');
    }
}
