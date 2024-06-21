<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
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
        $product->slug = Str::slug($request->input('nome'));
        $product->preco = $request->input('preco');
        $product->descricao = $request->input('descricao');
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
    public function show(string $slug)
    
    {
        
        $product = Product::find($slug);
        return view('produtos.show', compact('product'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $product = Product::find($slug);
        return view('produtos.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $preco = preg_replace("/[^0-9]/", "", $request->input('preco'));
        $product = Product::find($id);
        $product->nome = $request->input('nome');
        $product->preco = $preco;
        $product->descricao = $request->input('descricao');

        if ($request->hasFile('imagem')) {
            // deletando a imagem

            // salvando a imagem numa pasta
           $filePath = Storage::disk('public')->put('images/produtos/imagens', request()->file('imagem'));
           $product->imagem = $filePath;
        }

        $product->update();

        session()->flash('notif.success', 'Produto editado com sucesso!');
        return redirect()->route('home');
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
        $product->images()->delete();
        $product->delete();      
        session()->flash('notif.success', 'Produto deletado com sucesso!');
        return redirect()->route('produtos.index');

    }

    public function product(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $category = $product->categories->first();
        $relatedProducts = $category ? $category->products->where('id', '!=', $product->id) : Product::inRandomOrder()->take(4)->where('id', '!=', $product->id)->get();
        

        return view('product-page', compact('product', 'relatedProducts'));
    }

    public function search (Request $request)

    {
        
        $search = $request->input('search');
        $results = Product::where('nome', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('categories', function ($query) use ($search) {
                        $query->where('nome', 'LIKE', '%'.$search.'%')
                              ->orWhere('slug', 'LIKE', '%'.$search.'%');
                    })
                    ->get();
        $categories = Category::whereHas('products', function ($query) use ($results) {
            $query->whereIn('product_id', $results->pluck('id'));
        })->get();
        return view('search', compact('categories', 'results'));
    }
}