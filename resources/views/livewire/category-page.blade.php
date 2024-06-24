<div>

    <!-- breadcrumb -->
<x-shop>
    Categorias
</x-shop>
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

 
        <!-- ./sidebar -->
        <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hiddenb hidden md:block">
            <div class="divide-y divide-gray-200 space-y-5">
                <div>
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Categorias</h3>
                    @foreach ($categories as $cat)
                    <div wire:key="{{ $cat->id }}" class="space-y-2">
                        <div class="flex items-center">
                            <a for="cat-1" href="{{ route('category-page', $cat->slug) }}" class="text-gray-600 ml-3 cusror-pointer">{{$cat->nome}}</a>
                            <div class="ml-auto text-gray-600 text-sm">{{$cat->products->count()}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <x-filter>
                </x-filter>

            </div>
        </div>
        <!-- products -->
        <div class="col-span-3">
            <div class="flex items-center mb-4">
                <select wire:model.live="sorting" name="sort" id="sort"
                    class="w-44 text-sm text-gray-600 py-3 px-4 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary">
                    <option value="default">Padrão</option>
                    <option value="price-low-to-high">Menor Preço</option>
                    <option value="price-high-to-low">Maior Preço</option>
                    <option value="latest">Mais Recentes</option>
                    <option value="oldest">Mais Antigos</option>
                </select>
            </div>
            <livewire:product-list :products="$category->products" :key="$category->products->pluck('id')->join('-')"/>
        </div>
</div>
