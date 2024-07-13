<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Rating;

class CreateReview extends Component
{
    public $rating;
    public $message;
    public $productId;

    public function saveRate($productId)
    {
        if (!auth()->check()) {
            return Redirect()->route('login');
        }

        else {
            $rate = new Rating;
            $rate->rating = $this->rating;
            $rate->product_id = $productId;
            $rate->user_id = auth()->id();
            $rate->review = $this->message;
            $rate->save();
            $this->reset();    
            $this->dispatch('open-modal', 'success-review'); 
        }
    }
    
    public function render()
    {
        return view('livewire.create-review');
    }
}
