<x-app-layout>
    <x-slot name="title">
        Show
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Show' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Nome' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $product->nome }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Preço' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ 'R$' . number_format($product->preco, 2) }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Imagem' }}
                        </h2>
                        <div class="flex">                
                                <img class="h-64 w-128" src="{{ Storage::url($product->imagem) }}" alt="{{ $product->nome }}" srcset="">
                        </div>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Criado' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $product->created_at }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Atualizado' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $product->updated_at }}
                        </p>
                    </div>
                    <a href="{{ route('produtos.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">VOLTAR</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>