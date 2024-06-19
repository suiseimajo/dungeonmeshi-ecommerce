<div>
    <x-slot name="title">
        Editar
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Editar Produto' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" wire:submit="update" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

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
                        
                        <div>
                            <x-input-label for="categories" value="Categorias" />
                            <select wire:model="selectedCategories" name="categories[]" class="block w-full mt-1 form-multiselect" multiple>
                                @foreach ($categories as $category)
                                    <option wire:key="category-{{ $category->id }}" value="{{ $category->id }}"> {{$category->nome }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                        <x-input-label for="descricao" value="Descrição" />
                        <textarea wire:model="descricao" name="descricao" class="resize rounded-md"></textarea>
                        </div>
                        
                        <div>
                            <x-input-label for="imagem" value="Imagem" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input wire:model="imagens" multiple type="file" id="imagens" name="imagens[]" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>
                            @if ($imagesSaved)
                            <div class="flex flex-row">
                                @foreach($imagesSaved as $key => $img)
                                <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-32">
                                    <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                        <img alt="upload preview" src="{{ isset($img->product_id) ? Storage::url($img->imagem) : $img->temporaryUrl() }}" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />

                                        <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                            <h1 class="flex-1"></h1>
                                            <div class="flex">
                                            <span class="p-1">
                                            </span>
                                            <p class="p-1 size text-xs"></p>
                                            <span wire:click="deleteImage({{$key}})" class="delete cursor-pointer ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                                <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                                </svg>
                                            </span>
                                            </div>
                                        </section>
                                    </article>
                                </li>
                                @endforeach
                            </div>
                            @endif

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
