<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\cartService;



class ProductList extends Component
{
    public $products;

    public bool $visible = false;
    public $image;

    public function openModal($id)
    {
        $this->image = Product::find($id)->imagem;
        $this->visible = true;
    }

    public function closeModal()
    {
        $this->visible = false;
    }

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
    
    public function render()
    {
        return view('livewire.product-list');
    }

}
