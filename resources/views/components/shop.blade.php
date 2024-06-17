<div class="container mx-auto py-4 flex items-center gap-3">
        <a href="{{ route('home') }}" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <div class="title">
            {{ $slot }}
        </div>
</div>