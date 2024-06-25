<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;



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
    
    public function render()
    {
        return view('livewire.recommend-list');
    }

}
