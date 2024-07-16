<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;
use App\Models\Rating;
use App\Services\cartService;

class ProductPage extends Component
{
    public $slug;
    public $rating;

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

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    #[Layout('layouts.site')] 
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $category = $product->categories->first();
        $relatedProducts = $category ? $category->products->where('id', '!=', $product->id) : Product::inRandomOrder()->take(4)->where('id', '!=', $product->id)->get();
        $total = count($product->ratings);
        $grade5 = $product->ratings->where('rating', '=', '5')->count();
        $grade4 = $product->ratings->where('rating', '=', '4')->count();
        $grade3 = $product->ratings->where('rating', '=', '3')->count();
        $grade2 = $product->ratings->where('rating', '=', '2')->count();
        $grade1 = $product->ratings->where('rating', '=', '1')->count();

        return view('livewire.product-page', compact('product', 'relatedProducts', 'total', 'grade5', 'grade4', 'grade3', 'grade2', 'grade1'));
    }
}
