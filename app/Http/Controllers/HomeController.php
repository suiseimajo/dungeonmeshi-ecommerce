<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get(); 
        $categories = Category::all(); 

        return view('home', compact('categories', 'products'));

    }

    public function category(string $slug){

        $categories = Category::all(); 
        $category = Category::where('slug', $slug)->first();
        return view('category-page', compact('category', 'categories')); 
        
    }

    public function product(string $slug){
        $product = Product::where('slug', $slug)->first();
        $category = $product->categories->first();
        $relatedProducts = $category ? $category->products->where('id', '!=', $product->id) : Product::inRandomOrder()->take(4)->where('id', '!=', $product->id)->get();

        return view('product-page', compact('product', 'relatedProducts'));

    }
}
