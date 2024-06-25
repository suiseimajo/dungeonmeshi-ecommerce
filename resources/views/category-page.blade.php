<x-header>
</x-header>

    <!-- breadcrumb -->
    <!-- ./breadcrumb -->

    <!-- shop wrapper -->
    <div class="container grid mx-auto md:grid-cols-4 grid-cols-2 gap-6 pt-4 pb-16 items-start">
        <!-- sidebar -->
        <!-- drawer init and toggle -->
        <div class="text-center md:hidden" >
            <button
                class="text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block md:hidden"
                type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                aria-controls="drawer-example">
                <ion-icon name="grid-outline"></ion-icon>
            </button>
        </div>
        
        <x-sidebar>
            <div class="space-y-2">
            @foreach ($categories as $cat)
                <div class="flex items-center">
                    <a for="cat-1" href="{{ $cat->id }}" class="text-gray-600 ml-3 cusror-pointer">{{ $cat->nome }}</a>
                    <div class="ml-auto text-gray-600 text-sm">{{$cat->products->count()}}</div>
                </div>
            @endforeach
            </div>
                <x-slot name="prices">
                    <input type="text" name="min" id="min"
                        class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                        placeholder="min">
                    <span class="mx-3 text-gray-500">-</span>
                    <input type="text" name="max" id="max"
                        class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                        placeholder="max">
                </x-slot>
        </x-sidebar>

        <!-- products -->
        <div class="col-span-3">
            <div class="flex items-center mb-4">
                <select name="sort" id="sort"
                    class="w-44 text-sm text-gray-600 py-3 px-4 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary">
                    <option value="">Default sorting</option>
                    <option value="price-low-to-high">Price low to high</option>
                    <option value="price-high-to-low">Price high to low</option>
                    <option value="latest">Latest product</option>
                </select>

                <div class="flex gap-2 ml-auto">
                    <div
                        class="border border-primary w-10 h-9 flex items-center justify-center text-white bg-primary rounded cursor-pointer">
                        <i class="fa-solid fa-grip-vertical"></i>
                    </div>
                    <div
                        class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                        <i class="fa-solid fa-list"></i>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 grid-cols-2 gap-6">
            @foreach ($category->products as $product)
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="{{ $product->images->first() ? Storage::url($product->images->first()->imagem) : asset('imagens/470.jpg') }}" alt="{{$product->nome}}" class="w-full">
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
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{$product->nome}}</h4>
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
                            <div class="text-xs text-gray-500 ml-3">(10000)</div>
                        </div>
                    </div>
                    <div class="px-2 pt-4 pb-2">
                        @foreach ($product->categories as $category)
                            <a href="{{ route('category-page', $category->slug) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$category->nome}}</a>
                        @endforeach
                    </div>
                    <a href="{{ route('product-page', $product->slug) }}"
                        class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Adicionar ao Carrinho</a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
<x-footer>
</x-footer>
