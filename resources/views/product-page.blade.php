    <!-- breadcrumb -->
<div>
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Prato</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6">
        <div>
            <img src="{{ Storage::url($product->imagem) }}" alt="product" class="w-full">
        </div>

        <div>
            <h2 class="text-3xl font-medium uppercase mb-2">{{$product->nome}}</h2>
            <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(150 avaliações)</div>
            </div>
            <div class="space-y-2">
                <p class="space-x-2">
                    @foreach ($product->categories as $category)
                        <span class="text-black font-semibold">Categoria: </span>
                        <span class="text-gray-600">{{$category->nome}}</span>
                    @endforeach
                </p>
            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-xl text-primary font-semibold">{{'R$' . number_format($product->preco/100, 2, ',', '.') }}</p>
            </div>

            <p class="mt-4 text-gray-600">{{$product->descricao}}</p>

            <div class="mt-4">
                <h3 class="text-sm text-gray-800 uppercase mb-1">Quantidade</h3>
                <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                    <div class="h-8 w-8 text-base flex items-center justify-center">4</div>
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
                </div>
            </div>

            <div class="mt-6 flex gap-3 border-b border-gray-200 pb-5 pt-5">
                <button wire:click="addToCart({{ $product->id }})"
                    class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition">
                    <i class="fa-solid fa-bag-shopping"></i> Carrinho
                </button>
                <button wire:click="saveWish('{{ $product->id }}')"
                    class="border border-gray-300 px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:text-primary transition">
                    <i class="fa-solid fa-heart"></i> <span class="text-gray">Lista de Desejos
                </button>
            </div>

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

            <div class="flex gap-3 mt-4">
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- ./product-detail -->

    <!-- related product -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Produtos Relacionados</h2>
        @if($relatedProducts->isEmpty())
            <div>
                <img src="{{ asset('assets/images/gbc.jpg') }}" alt="Nenhum produto relacionado" class="w-15 h-15 flex items-center justify-center">
                <p class="text-xl text-gray-800">Nenhum produto relacionado!</p>
            </div>
        @else
        <div class="grid grid-cols-4 gap-6">
        @foreach ($relatedProducts as $product)
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="{{ $product->images->first() ? Storage::url($product->images->first()->imagem) : asset('imagens/470.jpg') }}" alt="product 1" class="w-full">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4 h-56">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{ $product->nome }}</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">{{'R$' . number_format($product->preco/100, 2) }}</p>
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
                </div>
                <div class="px-2 pt-4 pb-2">
                    @foreach ($product->categories as $category)
                        <a href="{{ route('category-page', $category->slug) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$category->nome}}</a>
                    @endforeach
                </div>
                <button wire:click="addToCart('{{ $product->id }}')" class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Adicionar ao Carrinho</button>
                <button wire:click="removeFromCart('{{ $product->id }}')" class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Remover do Carrinho</button>
            </div>
        @endforeach
        </div>
        @endif
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
    <!-- ./related product -->

    <!-- footer -->
    <!-- ./footer -->

    <!-- copyright -->
    <div class="bg-gray-800 py-4">
        <div class="container flex items-center justify-between">
            <p class="text-white">&copy; TailCommerce - All Right Reserved</p>
            <div>
                <img src="../assets/images/methods.png" alt="methods" class="h-5">
            </div>
        </div>
    </div>
</div>
    <!-- ./copyright -->