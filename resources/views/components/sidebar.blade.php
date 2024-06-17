<!-- ./sidebar -->
<div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hiddenb hidden md:block">
    <div class="divide-y divide-gray-200 space-y-5">
        <div>
            <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Categorias</h3>
            {{ $slot}}
        </div>

        <div class="pt-4">
            <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Preço</h3>
            <div class="mt-4 flex items-center">
                {{ $prices }}
            </div>
        </div>
    </div>
</div>