<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class EditProduct extends Component
{
    use WithFileUploads;

    public Product $product;
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
        $imageDeleted = $this->imagesSaved[$id];
        array_splice($this->imagesSaved, $id, 1);
        if(isset($imageDeleted->product_id)){
            Image::find($imageDeleted->id)->delete();
        }
    }

    public function mount($id)
    {
        $this->product = Product::find($id);
        $this->nome = $this->product->nome;
        $this->preco = $this->product->preco;
        $this->preco_antigo = $this->product->preco_antigo;
        $this->descricao = $this->product->descricao;
        $this->selectedCategories = $this->product->categories->pluck('id'); 
        $this->imagesSaved = $this->product->images->all();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        $product = $this->product;
        $product->nome = $this->nome;
        $product->preco = $this->preco;
        $product->descricao = $this->descricao;

        if ($this->imagesSaved) {
            foreach ($this->imagesSaved as $imagem) {
                $image = new Image;
                if(!isset($imagem->product_id)){
                    // salvando a imagem numa pasta
                    $filePath = $imagem->store('images/produtos/imagens', 'public');
                    $image->imagem = $filePath;
                    $image->product_id = $product->id;
                    $image->save();
                }
            }
        }

        $product->update();
        $product->categories()->sync($this->selectedCategories);

        session()->flash('notif.success', 'Produto editado com sucesso!');
        return redirect()->route('produtos.index');
    }

    #[Layout('layouts.app')] 
    public function render()
    {
        $categories = Category::all();
        return view('livewire.edit-product', compact('categories'));
    }

}
