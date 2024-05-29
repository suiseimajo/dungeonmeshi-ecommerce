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
        $product = new Product;
        $product->nome = $request->input('nome');
        $product->preco = $request->input('preco');
        if ($request->hasFile('imagem')) {
            $filePath = Storage::disk('public')->put('images/produtos/imagens', request()->file('imagem'));
            $product->imagem = $filePath;
        }
        $product->save();
        session()->flash('notif.success', 'Produto criado com sucesso!');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    
    {
        
        $product = Product::find($id);
        return view('produtos.show', compact('product'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('produtos.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->nome = $request->input('nome');
        $product->preco = $request->input('preco');
        $product->preco_antigo = $request->input('preco_antigo') ?? '';
        $product->descricao = $request->input('descricao');

        if ($request->hasFile('imagem')) {
            // deletando a imagem

            // salvando a imagem numa pasta
           $filePath = Storage::disk('public')->put('images/produtos/imagens', request()->file('imagem'));
           $product->imagem = $filePath;
        }

        $product->update();
        $product->categories()->sync($request->input('categories'));

        session()->flash('notif.success', 'Produto editado com sucesso!');
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image);
        }
        $product->categories()->detach();
        $product->ratings()->delete();
        $product->images()->delete();
        $product->delete();

        session()->flash('notif.success', 'Produto deletado com sucesso!');
        return redirect()->route('produtos.index');

    }
}