<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categorias.index', compact('categories'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->nome = $request->input('nome');
        $category->slug = Str::slug($request->input('nome'));

        if ($request->hasFile('imagem')) {
            // salvando a imagem numa pasta
           $filePath = Storage::disk('public')->put('images/categorias/imagens', request()->file('imagem'));
           $category->imagem = $filePath;
        }

        $category->save();

        session()->flash('notif.success', 'Categoria criada com sucesso!');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */

     public function show(string $slug)
    {

        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->first();
        return view('categorias.show', compact('category', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('categorias.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->nome = $request->input('nome');
        $category->slug = Str::slug($request->input('nome'));

        if ($request->hasFile('imagem')) {
            // deletando a imagem
            Storage::disk('public')->delete($category->imagem);

            // salvando a imagem numa pasta
           $filePath = Storage::disk('public')->put('images/categorias/imagens', request()->file('imagem'));
           $category->imagem = $filePath;
        }

        $category->update();

        session()->flash('notif.success', 'Categoria editada com sucesso!');
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        Storage::disk('public')->delete($category->imagem);
        $category->delete();
       
        session()->flash('notif.success', 'Categoria deletada com sucesso!');
        return redirect()->route('categorias.index');
    }

    public function category(string $slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('category-page', compact('category'));
    }
}
