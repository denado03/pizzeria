<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

/**
 * Class CartService.
 */
class CartService
{
    public function addProductToCart(User $user, Product $product, int $quantity, $typeId)
    {
        $itemWithSameType = Cart::where('user_id', $user->id)
            ->whereHas('product', function ($query) use ($typeId) {
                $query->where('type_id', $typeId);
            })
            ->with('product.type')
            ->get();

        $existingItem = Cart::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->with('product.type')
            ->first();

        $existingQuantity = 0;
        foreach ($itemWithSameType as $item)
        {
            $existingQuantity += $item->quantity;
        }

        if($existingItem)
        {
            if($existingItem->product->type->name == 'Пицца' &&  $existingQuantity + $quantity > 10)
            {
                return 'В корзине не может быть более 10 пицц';
            }

            if($existingItem->product->type->name == 'Напиток' &&  $existingQuantity + $quantity > 20)
            {
                return 'В корзине не может быть более 20 напитков';
            }

            $existingItem->quantity+=$quantity;
            $existingItem->save();

        } else {
            if($product->type->name == "Пицца" && $quantity > 10)
            {
                return 'В корзине не может быть более 10 пицц';
            }
            if($product->type->name == "Напиток" && $quantity > 20)
            {
                return 'В корзине не может быть более 20 напитков';
            }
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $quantity
            ]);
        }

        return null;
    }
}
