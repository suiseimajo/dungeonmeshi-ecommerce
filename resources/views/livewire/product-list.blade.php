<!-- new arrival -->
<div>
    <div class="container pb-16">
        <h2 id="produtos" class="text-2xl font-medium text-gray-800 uppercase mb-6">novos pratos</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach ($products->sortByDesc('created_at') as $product)
            <div wire:key="{{ $product->id }}" class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="{{ $product->images->first() ? Storage::url($product->images->first()->imagem) : asset('imagens/470.jpg') }}" alt="{{$product->nome}}" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <button wire:click="openModal('{{ $product->id }}')"
                        class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                        title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
            
                <div class="pt-4 pb-3 px-4">
                    <a href="{{ route('product-page', $product->slug )}}">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{$product->nome}}</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">{{'R$' . number_format($product->preco/100, 2, ',', '.') }}</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                    <div class="px-2 pt-4 pb-2">
                        @foreach ($product->categories as $category)
                            <a href="{{ route('category-page', $category->slug) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$category->nome}}</a>
                        @endforeach
                    </div>
                </div>
                <a href="#"class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Adicionar ao Carrinho</a>
            </div>
        @endforeach
        </div>
        <div id="modal"
            class="{{$visible ? '' : 'hidden'}} fixed top-0 left-0 z-80 
                    w-screen h-screen bg-black/70 flex 
                    justify-center items-center">
            <!-- The close button -->
            <a class="fixed z-90 top-6 right-8 
                text-white text-5xl font-bold" 
            href="javascript:void(0)"
            wire:click="closeModal">
                ×
            </a>

            <img src="{{ Storage::url($image) }}" alt="product 1" class="max-w-[800px] max-h-[600px] object-cover">
        </div>
    </div>
<!-- ./new arrival -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">recomendações da casa</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($products->shuffle()->take(4) as $product)
            <div wire:key="{{ $product->id }}" class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="{{ $product->images->first() ? Storage::url($product->images->first()->imagem) : asset('imagens/470.jpg') }}" alt="{{$product->nome}}" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <button wire:click="openModal('{{ $product->id }}')"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{$product->nome}}</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">{{'R$' . number_format($product->preco/100, 2, ',', '.') }}</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                    <div class="px-2 pt-4 pb-2">
                        @foreach ($product->categories as $category)
                            <a href="{{ route('category-page', $category->slug) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$category->nome}}</a>
                        @endforeach
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Adicionar ao Carrinho</a>
            </div>
            @endforeach
            </div>
            <div id="modal"
                class="{{$visible ? '' : 'hidden'}} fixed top-0 left-0 z-80 
                        w-screen h-screen bg-black/70 flex 
                        justify-center items-center">
                <!-- The close button -->
                <a class="fixed z-90 top-6 right-8 
                    text-white text-5xl font-bold" 
                href="javascript:void(0)"
                wire:click="closeModal">
                    ×
                </a>

                <img src="{{ Storage::url($image) }}" alt="product 1" class="max-w-[800px] max-h-[600px] object-cover">
            </div>
        </div>
    </div>
</div>