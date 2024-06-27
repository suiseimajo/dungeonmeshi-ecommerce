<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class cartService {

    public function addToCart(int $productId): array
    {
        
        // get data from session (this equals Session::get(), use empty array as default)
        $shoppingCart = session('shoppingCart', []);
    
        if (isset($shoppingCart[$productId]))
        {
            // product is already in shopping cart, increment the amount
            $shoppingCart[$productId]['amount'] += 1;
        }
        else
        {
            // fetch the product and add 1 to the shopping cart
            $product = Product::find($productId);
            $shoppingCart[$productId] = [
                'productId' => $productId,
                'amount'    => 1,
                'price'     => $product->preco,
                'name'      => $product->nome,
                'category'  => $product->categories,
                'image'     => $product->images->first() ? Storage::url($product->images->first()->imagem) : asset('imagens/470.jpg')
            ];
        }
    
        // update the session data (this equals Session::put() )
        session(['shoppingCart' => $shoppingCart]);

        return $shoppingCart;
    }

    public function removeFromCart(int $productId): array | null
    {
    $shoppingCart = session('shoppingCart', []);

    if (!isset($shoppingCart[$productId]))
    {
        // should not happen, and should throw an error.
        return null;
    }
    else
    {
        if ($shoppingCart[$productId]['amount'] == 1){
            unset($shoppingCart[$productId]);
        }
        else
        {
            $shoppingCart[$productId]['amount'] -= 1;
        }
    }

    session(['shoppingCart' => $shoppingCart]);
    return $shoppingCart;
    }

    public function updateAmount(int $productId, int $amount): array | null
    {
    $shoppingCart = session('shoppingCart', []);

    if (!isset($shoppingCart[$productId]))
    {
        // should not happen, and should throw an error.
        return null;
    }
    else
    {
        $shoppingCart[$productId]['amount'] = $amount;
    }

    session(['shoppingCart' => $shoppingCart]);
    return $shoppingCart;
    }

    
}
