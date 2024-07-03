<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class WishController extends Controller
{
    public function wish()
    {

        return view('wish-page');

    }

    public function destroyWish(string $id)
    {
        $wish = Wishlist::find($id);
        $wish->delete();
       
        session()->flash('notif.success', 'Esse produto foi removido da sua lista de desejos!');
        return redirect()->route('wish-page');

    }
}
