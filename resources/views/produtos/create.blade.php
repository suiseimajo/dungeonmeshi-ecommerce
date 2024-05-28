<x-header>
</x-header>

<div>
    <x-slot name="title">
        Create
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Criar Produto' }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" wire:submit="store" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="nome" value="Nome" />
                            <x-text-input wire:model="nome" id="nome" name="nome" type="text" class="mt-1 block w-full" :value="old('nome')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="preco" value="Preço" />
                            <x-text-input wire:model="preco" id="preco" name="preco" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('preco')" />
                        </div>

                            <x-input-error class="mt-2" :messages="$errors->get('featured_image')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
</div>
<x-footer>
</x-footer>