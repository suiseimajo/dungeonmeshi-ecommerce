<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;


class SearchPage extends Component
{
    #[Url] 
    public $search = '';
    public $slug;
    public $sorting = 'default';
    public int $min;
    public int $max;

    public const PRICE_HIGH_TO_LOW = 'price-high-to-low';
    public const PRICE_LOW_TO_HIGH = 'price-low-to-high';
    public const LATEST = 'latest';
    public const OLDEST = 'oldest';
    public const DEFAULT = 'default';

    public function sortingOptions (): array
    {
        return [
            self::PRICE_HIGH_TO_LOW => 'price-high-to-low',
            self::PRICE_LOW_TO_HIGH  => 'price-low-to-high',
            self::LATEST=> 'latest',
            self::OLDEST=> 'oldest',
            self::DEFAULT       => 'default'
        ];
    }

    #[Layout('layouts.site')] 
    public function render()
    {

        [$sortField, $direction] = match($this->sorting){
            self::PRICE_HIGH_TO_LOW => ['preco', 'desc'],
            self::PRICE_LOW_TO_HIGH  => ['preco', 'asc'],
            self::LATEST=> ['created_at', 'desc'],
            self::OLDEST=> ['created_at', 'asc'],
            self::DEFAULT => ['created_at', 'desc']
        };
        $search = $this->search;
        $results = Product::where('nome', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('categories', function ($query) use ($search) {
                        $query->where('nome', 'LIKE', '%'.$search.'%')
                              ->orWhere('slug', 'LIKE', '%'.$search.'%');
                    })
                    ->when(!empty($this->min), function($query) {
                        $query->where('preco', '>=', $this->min);
                    })
                    ->when(!empty($this->max), function($query) {
                        $query->where('preco', '<=', $this->max);
                    })
                    ->orderBy($sortField, $direction)
                    ->get();
        $categories = Category::whereHas('products', function ($query) use ($results) {
            $query->whereIn('product_id', $results->pluck('id'));
        })->get();

        return view('livewire.search-page', compact('categories', 'results'));
    }
}
