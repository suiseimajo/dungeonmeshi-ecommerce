<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {

        $products = Product::all();
        $categories = Category::all();
        $users = User::all();

        
        
        return view('dashboard', compact('products', 'categories', 'users'));
    }
}
