<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $nome = '';
    public $preco = '';
    public $descricao = '';
    public $selectedCategories = [];
    public $imagens = [];
    public $imagesSaved = [];

    public function updatedImagens(){
        foreach ($this->imagens as $imagem) {
            array_push($this->imagesSaved, $imagem);
        }
    }

    public function deleteImage($id){
        array_splice($this->imagesSaved, $id, 1);
    }

    public function store()
    {
        $product = new Product;
        $product->nome = $this->nome;
        $product->slug = Str::slug($this->nome);
        $product->preco = $this->preco;
        $product->descricao = $this->descricao;
        $product->imagem = $this->imagem ?? 'default_image.png';
        $product->save();

        if ($this->imagesSaved) {
            foreach ($this->imagesSaved as $imagem) {
                $image = new Image;
                // salvando a imagem numa pasta
                $filePath = $imagem->store('images/produtos/imagens', 'public');
                $image->imagem = $filePath;
                $image->product_id = $product->id;
                $image->save();
            }
        }

        $product->categories()->attach($this->selectedCategories);

        session()->flash('notif.success', 'Produto criado com sucesso!');
        return redirect()->route('produtos.index');
    }

    #[Layout('layouts.app')] 
    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-product', compact('categories'));
    }
}
