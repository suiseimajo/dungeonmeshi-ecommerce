<div class="mt-10">
    <div class="card h-fit" id="form">
        <h2 class="mb-4 text-2xl font-bold dark:text-white">Envie sua avaliação</h2>
        <p class="mt-1 text-sm text-gray-600">Diga sua opinião sobre esse produto para outros consumidores:</p>
        <div class="flex items-center justify-center">
            <div class="flex gap-1 fa-3x">
                <label for="star1">
                    <input class="hidden" wire:model.live="rating" type="radio" id="star1" name="rating" value="1" />
                    <i class="cursor-pointer @if($rating >= 1 ) text-yellow-400 @endif fa-solid fa-star"></i>
                </label>
                <label for="star2">
                    <input class="hidden" wire:model.live="rating" type="radio" id="star2" name="rating" value="2" />
                    <i class="cursor-pointer @if($rating >= 2 ) text-yellow-400 @endif fa-solid fa-star"></i>
                </label>
                <label for="star3">
                    <input class="hidden" wire:model.live="rating" type="radio" id="star3" name="rating" value="3" />
                    <i class="cursor-pointer @if($rating >= 3 ) text-yellow-400 @endif fa-solid fa-star"></i>
                </label>
                <label for="star4">
                    <input class="hidden" wire:model.live="rating" type="radio" id="star4" name="rating" value="4" />
                    <i class="cursor-pointer @if($rating >= 4 ) text-yellow-400 @endif fa-solid fa-star"></i>
                </label>
                <label for="star5">
                    <input class="hidden" wire:model.live="rating" type="radio" id="star5" name="rating" value="5" />
                    <i class="cursor-pointer @if($rating >= 5 ) text-yellow-400 @endif fa-solid fa-star"></i>
                </label>
            </div>
        </div>
        <div class="mt-6 space-y-6">
            <div class="mb-6">
                <div class="mx-0 mb-1 sm:mb-4">
                    <label for="message" class="pb-1 text-xs uppercase tracking-wider"></label>
                    <textarea wire:model="message" id="message" name="message" cols="30" rows="5" placeholder="Escreva sua mensagem..." class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md dark:text-black sm:mb-0"></textarea>
                </div>
            </div>
            <div class="text-center">
                <button wire:click="saveRate({{$productId}})" class="w-full bg-blue-800 text-white px-6 py-3 font-xl rounded-md sm:mb-0">Enviar</button>
            </div>
        </div>
    </div>
    <x-modal name="success-review" focusable>
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Favoritos') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('A sua review foi salva com sucesso!') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-primary-button class="ms-3" x-on:click="$dispatch('close')">
                    {{ __('Ok!') }}
                </x-primary-button>
            </div>
        </div>
    </x-modal>
</div>
