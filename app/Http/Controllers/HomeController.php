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

        $products = Product::all();
        $categories = Category::all();

        return view('home', compact('products', 'categories'));

    }

    public function product(string $slug){
        $product = Product::where('slug', $slug)->first();

        return view('product-page', compact('product'));

    }
}
