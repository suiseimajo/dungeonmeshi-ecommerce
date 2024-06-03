<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('produtos.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view('produtos.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Product;
        $products->nome = $request->input('nome');
        $products->preco = $request->input('preco');
        if ($request->hasFile('imagem')) {
            $filePath = Storage::disk('public')->put('images/produtos/imagens', request()->file('imagem'));
            $products->imagem = $filePath;
        }
        $products->save();
        session()->flash('notif.success', 'Produto criado com sucesso!');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    
    {
        
        $products = Product::find($id);
        return view('produtos.show', compact('products'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        return view('produtos.index', compact('products'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::find($id);
        $products->nome = $request->input('nome');
        $products->preco = $request->input('preco');
        $products->preco = $request->input('descricao');

        if ($request->hasFile('imagem')) {
            // deletando a imagem

            // salvando a imagem numa pasta
           $filePath = Storage::disk('public')->put('images/produtos/imagens', request()->file('imagem'));
           $products->imagem = $filePath;
        }

        $products->update();

        session()->flash('notif.success', 'Produto editado com sucesso!');
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::find($id);
        foreach ($products->images as $image) {
            Storage::disk('public')->delete($image);
        }
        $products->ratings()->delete();
        $products->images()->delete();
        $products->delete();

        session()->flash('notif.success', 'Produto deletado com sucesso!');
        return redirect()->route('produtos.index');

    }

    public function product($id)
    {

        $products = Product::findOrFail($id);
        return view('product-page', compact('products'));

    }
}