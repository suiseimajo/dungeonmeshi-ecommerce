<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;
use App\Services\cartService;

class Wishlist extends Component
{

    public function addToCart($productId)
    {

        if (!auth()->check()) {
            return Redirect()->route('login'); 
        }
        else {
        $cartService = new cartService;
        $cartService->addToCart($productId);

        $this->dispatch('open-modal', 'success-addtocart'); 
        }
    }

    public function removeFromCart($productId)
    {

        if (!auth()->check()) {
            return Redirect()->route('login'); 
        }
        else {
        $cartService = new cartService;
        $cartService->removeFromCart($productId);

        $this->dispatch('open-modal', 'success-removefromcart');
        }
    }

    #[Layout('layouts.site')] 
    public function render()
    {
        return view('wish-page');
    }
}
