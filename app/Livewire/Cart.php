<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\cartService;
use App\Models\Product;
use App\Models\Order;

class Cart extends Component
{
    public $amount = [];
    #[Layout('layouts.site')] 

    public function mount()
    {
        $products = session('shoppingCart');
        $products = collect($products)->map(function ($item) {
            return (object) $item;
        });
        foreach($products as $key => $product){
            $this->amount[$key] = $product->amount;        
        }
    }

    public function render()
    {
        $products = session('shoppingCart');
        $products = collect($products)->map(function ($item) {
            return (object) $item;
        });
        $subtotal = $products->sum(function ($product) {
            return $product->price*$product->amount;
        });
        $taxes = $subtotal*0.10;
        $total = $subtotal+$taxes+5.00;
        return view('livewire.cart', compact('products', 'subtotal', 'taxes', 'total'));
    }

    public function removeFromCart($productId)
    {
        $cartService = new cartService;
        $cartService->removeFromCart($productId);
    }

    public function changeAmount($productId)
    {
        $cartService = new cartService;
        $amount = $this->amount[$productId];
        $cartService->updateAmount($productId, $amount);
    }

    public function buyOrder($total){
        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->pay_amount = $total;
        $order->amount = array_sum($this->amount);
        $order->save();
        foreach($this->amount as $productId => $amount){
            $product = Product::find($productId);
            $order->products()->attach($productId, ['pay_amount' => $product->preco*$amount, 'amount' => $amount]);
        }
        $this->dispatch('open-modal', 'success-buy');
        session()->forget('shoppingCart');
    }
}
