<button type="button" wire:click="saveRate('{{$product->id}}')" wire:confirm="Avaliar esse produto?">
    <label for="star1">
        <input class="hidden" wire:model.live="rating" type="radio" id="star1" name="rating" value="1" />
        <i class="cursor-pointer @if($product->ratings->avg('rating') >= 1) text-yellow-400 @endif fa-solid fa-star"></i>
    </label>
    <label for="star2">
        <input class="hidden" wire:model.live="rating" type="radio" id="star2" name="rating" value="2" />
        <i class="cursor-pointer @if($product->ratings->avg('rating') >= 2) text-yellow-400 @endif fa-solid fa-star"></i>
    </label>
    <label for="star3">
        <input class="hidden" wire:model.live="rating" type="radio" id="star3" name="rating" value="3" />
        <i class="cursor-pointer @if($product->ratings->avg('rating') >= 3) text-yellow-400 @endif fa-solid fa-star"></i>
    </label>
    <label for="star4">
        <input class="hidden" wire:model.live="rating" type="radio" id="star4" name="rating" value="4" />
        <i class="cursor-pointer @if($product->ratings->avg('rating') >= 4) text-yellow-400 @endif fa-solid fa-star"></i>
    </label>
    <label for="star5">
        <input class="hidden" wire:model.live="rating" type="radio" id="star5" name="rating" value="5" />
        <i class="cursor-pointer @if($product->ratings->avg('rating') >= 5) text-yellow-400 @endif fa-solid fa-star"></i>
    </label>
</button>