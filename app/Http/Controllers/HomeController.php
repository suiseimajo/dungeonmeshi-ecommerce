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
        $total = count($product->ratings);
        $grade5 = $product->ratings->where('rating', '=', '5')->count();
        $grade4 = $product->ratings->where('rating', '=', '4')->count();
        $grade3 = $product->ratings->where('rating', '=', '3')->count();
        $grade2 = $product->ratings->where('rating', '=', '2')->count();
        $grade1 = $product->ratings->where('rating', '=', '1')->count();

        return view('product-page', compact('product', 'relatedProducts', 'total', 'grade5', 'grade4', 'grade3', 'grade2', 'grade1'));

    }
}
