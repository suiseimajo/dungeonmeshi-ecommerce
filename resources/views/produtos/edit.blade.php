<x-header>
</x-header>
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                        <form method="patch" action="{{ isset($product) ? route('produtos.update', $product->id) : route('produtos.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div>
                                <x-input-label for="nome" value="Nome" />
                                <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" :value="old('nome', $product->nome)" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                            </div>

                            <div>
                                <x-input-label for="preco" value="Preço" />
                                <x-text-input id="preco" name="preco" class="mt-1 block w-full" :value="old('preco', 'R$' . number_format($product->preco/100, 2, ',', '.'))" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('preco')" />
                            </div>

                            <div>
                                <x-input-label for="descricao" value="Descrição" />
                                <textarea name="descricao" class="resize rounded-md" :value="old('descricao', $product->descricao)" style="width: 100%; height: 256px;"></textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
                            </div>

                                <x-input-error class="mt-2" :messages="$errors->get('featured_image')" />
                            </div>

                            <div>
                            <x-input-label for="imagem" value="imagem" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input class="imagem" type="file" id="imagem" name="imagem" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>

                            <div class="flex flex-row">
                                <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-32">
                                    <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                        <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                            <h1 class="flex-1"></h1>
                                            <div class="flex">
                                            <span class="p-1">
                                            </span>
                                            <p class="p-1 size text-xs"></p>
                                            </div>
                                        </section>
                                    </article>
                                </li>
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