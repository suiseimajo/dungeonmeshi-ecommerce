<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Services\cartService;
use App\Models\Rating;



class RecommendList extends Component
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

    public function saveWish($productId)
    {  
        if (!auth()->check()) {
            return Redirect()->route('login'); 
        }
        if (auth()->user()->favorites->contains('id', $productId)) {
            $this->dispatch('open-modal', 'already-exists');
        }
        else {
        $wish = new Wishlist;
        $wish->product_id = $productId;
        $wish->user_id = auth()->id();
        $wish->save();    

        $this->dispatch('open-modal', 'success-favorite'); 
        }
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

    public function saveRate($productId)
    {
        if (!auth()->check()) {
            return Redirect()->route('login');
        }

        else {
            $rate = new Rating;
            $rate->rating = $this->rating;
            $rate->product_id = $productId;
            $rate->review = ' ';
            $rate->user_id = auth()->id();
            $rate->save();    
            $this->dispatch('open-modal', 'success-rated'); 
        }
    }
    
    public function render()
    {
        return view('livewire.recommend-list');
    }

}
