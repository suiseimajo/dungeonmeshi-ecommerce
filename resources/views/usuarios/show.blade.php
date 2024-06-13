<x-app-layout>
<section class="flex justify-center mt-60 text-lg ">
    <header>
        <h2 class="text-lg mt-16 mr-6 font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informação do Usuário') }}
        </h2>

    </header>

        <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0">
            <img id="image_preview" class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500" src="{{ isset($user->imagem) ? Storage::url($user->imagem) : asset('imagens/Default_pfp.svg.png') }}" alt="Bordered avatar">
            <div class="flex flex-col space-y-5 sm:ml-8">
            </div>
        </div>

        <div class="mt-8">
            <x-input-label for="name" :value="__('Nome')" />
            <p class="text-white">{{$user->name}}</p>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
            <x-input-label for="email" :value="__('Email')" />
            <p class="text-white">{{$user->email}}</p>
        </div>
</section>
</x-app-layout>
