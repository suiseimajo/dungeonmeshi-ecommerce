<!-- new arrival -->
<div class="h-full w-full object-cover">
    <div class="container pb-16">
        <h2 id="produtos" class="text-2xl font-medium text-gray-800 uppercase mb-6">novos pratos</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div wire:key="{{ $product->id }}" class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="{{ $product->images->first() ? Storage::url($product->images->first()->imagem) : asset('imagens/470.jpg') }}" alt="{{$product->nome}}" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <button wire:click="openModal('{{ $product->id }}')"
                        class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                        title="Visualizar Produto">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <button
                        wire:click="saveWish('{{ $product->id }}')"
                        class="{{auth()->user()?->favorites->contains('id', $product->id) ? 'text-red-800' : 'text-white'}} text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                        title="Adicionar a Lista de Desejos">
                        <i class="fa-solid fa-heart"></i>
                    </button>
                    </div>
                </div>
            
                <div class="pt-4 pb-3 px-4 h-56">
                    <a href="{{ route('product-page', $product->slug )}}">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{$product->nome}}</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">{{'R$' . number_format($product->preco/100, 2, ',', '.') }}</p>
                    </div>
                    <div class="flex items-center">
                <div class="flex gap-1 fa-1x">
                    <label>
                        <i class="@if($product->ratings->avg('rating') >= 1 ) text-yellow-400 @endif fa-solid fa-star"></i>
                    </label>
                    <label>
                        <i class="@if($product->ratings->avg('rating') >= 2 ) text-yellow-400 @endif fa-solid fa-star"></i>
                    </label>
                    <label>
                        <i class="@if($product->ratings->avg('rating') >= 3 ) text-yellow-400 @endif fa-solid fa-star"></i>
                    </label>
                    <label>
                        <i class="@if($product->ratings->avg('rating') >= 4 ) text-yellow-400 @endif fa-solid fa-star"></i>
                    </label>
                    <label>
                        <i class="@if($product->ratings->avg('rating') >= 5 ) text-yellow-400 @endif fa-solid fa-star"></i>
                    </label>
                </div>
                <div class="text-xs text-gray-500 ml-3">{{count($product->ratings)}}</div>
            </div>
                    <div class="px-2 pt-4 pb-2">
                        @foreach ($product->categories as $category)
                            <a href="{{ route('category-page', $category->slug) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$category->nome}}</a>
                        @endforeach
                    </div>
                </div>
            @if(!isset(session('shoppingCart', [])[$product->id]))
                <button wire:click.once="addToCart('{{ $product->id }}')" class="block w-full py-1 mt-8 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Adicionar ao Carrinho</button>
            @else
                <button wire:click.once="removeFromCart('{{ $product->id }}')" class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Remover do Carrinho</button>
            @endif
            </div>
        @endforeach
        <x-modal name="success-favorite" focusable>
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Lista de Desejos') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Produto adicionado a sua lista de desejos!') }}
                </p>
                <div class="mt-6 flex justify-end">
                    <x-primary-button class="ms-3" x-on:click="$dispatch('close')">
                        {{ __('Ok!') }}
                    </x-primary-button>
                </div>
            </div>
        </x-modal>
        <x-modal name="success-rated" focusable>
            <div class="p-6">
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Produto avaliado com sucesso!') }}
                </p>
                <div class="mt-6 flex justify-end">
                    <x-primary-button class="ms-3" x-on:click="$dispatch('close')">
                        {{ __('Ok!') }}
                    </x-primary-button>
                </div>
            </div>
        </x-modal>
        <x-modal name="success-addtocart" focusable>
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Carrinho') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Produto adicionado ao carrinho!') }}
                </p>
                <div class="mt-6 flex justify-end">
                    <x-primary-button class="ms-3" x-on:click="$dispatch('close')">
                        {{ __('Ok!') }}
                    </x-primary-button>
                </div>
            </div>
        </x-modal>
        <x-modal name="success-removefromcart" focusable>
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Carrinho') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Produto removido do carrinho!') }}
                </p>
                <div class="mt-6 flex justify-end">
                    <x-primary-button class="ms-3" x-on:click="$dispatch('close')">
                        {{ __('Ok!') }}
                    </x-primary-button>
                </div>
            </div>
        </x-modal>
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