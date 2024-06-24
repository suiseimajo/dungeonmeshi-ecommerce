<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Category;
use App\Models\Product;


class CategoryPage extends Component
{
    public $categories;
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
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->categories =  Category::all();
    }
    public function render()
    {
        [$sortField, $direction] = match($this->sorting){
            self::PRICE_HIGH_TO_LOW => ['preco', 'desc'],
            self::PRICE_LOW_TO_HIGH  => ['preco', 'asc'],
            self::LATEST=> ['created_at', 'desc'],
            self::OLDEST=> ['created_at', 'asc'],
            self::DEFAULT => ['created_at', 'desc']
        };

        $category = Category::where('slug', $this->slug)
                    ->with([
                        'products' => function($query) use ($sortField, $direction) {
                            $query
                            ->when(!empty($this->min), function($query) {
                                $query->where('preco', '>=', $this->min);
                            })
                            ->when(!empty($this->max), function($query) {
                                $query->where('preco', '<=', $this->max);
                            })
                            ->orderBy($sortField, $direction);
                        }])->first();
        return view('livewire.category-page', compact('category'));
    }
}
