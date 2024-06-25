<div>
    <!-- breadcrumb -->
    <x-shop>
        Busca
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
                <select wire:model.live="sorting" name="sort" id="sort"
                    class="w-44 text-sm text-gray-600 py-3 px-4 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary">
                    <option value="default">Padrão</option>
                    <option value="price-low-to-high">Menor Preço</option>
                    <option value="price-high-to-low">Maior Preço</option>
                    <option value="latest">Mais Recentes</option>
                    <option value="oldest">Mais Antigos</option>
                </select>
                    
                <div class="flex gap-2 ml-auto">
                    <div class="border border-primary w-10 h-9 flex items-center justify-center text-white bg-primary rounded cursor-pointer">
                        <i class="fa-solid fa-grip-vertical"></i>
                    </div>
                    <div
                        class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                        <i class="fa-solid fa-list"></i>
                    </div>
                </div>
            </div>
            <livewire:product-list :products="$results" :key="$results->pluck('id')->join('-')"/>
        </div>
        </div>
</div>