<div class="pt-4">
    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Preço</h3>
    <div class="mt-4 flex items-center">
        <input wire:model.live="min" type="text" name="min" id="min"
            class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
            placeholder="min">
        <span class="mx-3 text-gray-500">-</span>
        <input wire:model.live="max" type="text" name="max" id="max"
            class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
            placeholder="max">
    </div>
</div>