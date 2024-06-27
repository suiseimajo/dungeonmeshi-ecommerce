<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delicious in Restaurant</title>

    <link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- header -->
    <header class="py-4 shadow-sm bg-white">
        <div class="container flex items-center justify-between">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/senshipoint.webp') }}" alt="Logo" class="w-16 rounded">
            </a>

            <div class="w-full max-w-4xl relative flex">
            <form class="md:flex w-1/2 mx-auto flex-grow" action="{{ route('search-page') }}" method="GET">
                <div class="relative w-full">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" name="search" id="search"
                    class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none hidden md:flex"
                placeholder="busca">
                </div>
                <button
                    type="submit"
                    class="bg-primary border border-primary text-white px-8 rounded-r-md hover:bg-transparent hover:text-primary transition hidden md:flex items-center">
                    Busca
                </button>
            </form>
            </div>

            <div class="flex items-center space-x-4">
                <a href="#" class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <div class="text-xs leading-3">Lista de <br>Desejos</div>
                    <div
                        class="absolute right-0 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">
                        8</div>
                </a>
                <a href="{{route('cart')}}" class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div class="text-xs leading-3">Carrinho</div>
                    <div
                        class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">
                        2</div>
                </a>
            @if (Route::has('login'))
                @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center space-x-2 cursor-pointer">
                                <img class="h-12 w-12 rounded-full object-cover" src="{{ isset(Auth::user()->imagem) ? Storage::url(Auth::user()->imagem) : asset('assets/images/Default_pfp.svg.png') }}" alt="Bordered avatar">
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('Painel') }}
                            </x-dropdown-link>

                        
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
    
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Sair') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <a href="{{ route('profile.edit') }}" class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="text-xs leading-3">Conta</div>
                @endauth
            @endif
                </a>
            </div>
        </div>
    </header>
    <!-- navbar -->
    <nav class="bg-gray-800">
        <div class="container flex">
            <div class="px-8 py-4 bg-primary flex items-center cursor-pointer relative group">
                <span class="text-white">
                    <i class="fa-solid fa-bars"></i>
                </span>
                <span class="capitalize ml-2 text-white">Categorias</span>

                <!-- dropdown -->
                <div class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                    <a href="http://localhost:8000/bebidas" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <i class="fa-solid fa-wine-bottle text-rose-300"></i>
                        <span class="ml-6 text-gray-600 text-sm">Bebidas</span>
                    </a>
                    <a href="http://localhost:8000/carnes" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <i class="fa-solid fa-drumstick-bite text-rose-300"></i>
                        <span class="ml-6 text-gray-600 text-sm">Carnes</span>
                    </a>
                    <a href="http://localhost:8000/peixes" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <i class="fa-solid fa-fish-fins text-rose-300"></i>
                        <span class="ml-6 text-gray-600 text-sm">Peixes</span>
                    </a>
                    <a href="http://localhost:8000/doces" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <i class="fa-solid fa-ice-cream text-rose-300"></i>
                        <span class="ml-6 text-gray-600 text-sm">Doces</span>
                    </a>
                    <a href="http://localhost:8000/tortas" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <i class="fa-solid fa-cake-candles text-rose-300"></i>
                        <span class="ml-6 text-gray-600 text-sm">Tortas</span>
                    </a>
                    <a href="http://localhost:8000/outros" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <i class="fa-solid fa-utensils text-rose-300"></i>
                        <span class="ml-6 text-gray-600 text-sm">Outros</span>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-between flex-grow pl-12">
                <div class="flex items-center space-x-6 capitalize">
                    <a href="{{ route('home') }}" class="text-gray-200 hover:text-white transition">Início</a>
                    <a href="#produtos" class="text-gray-200 hover:text-white transition">Comprar</a>
                    <a href="{{ route('search-page') }}" class="text-gray-200 hover:text-white transition">Busca</a>
                    <a href="{{ route('about') }}" class="text-gray-200 hover:text-white transition">Sobre Nós</a>
                    <a href="{{ route('contact-page') }}" class="text-gray-200 hover:text-white transition">Contato</a>
                </div>
            @if(Auth::check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="profile" class="text-gray-200 hover:text-white transition" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                </form>
            @else
                <a href="profile" class="text-gray-200 hover:text-white transition">Entrar</a>
            @endif
            </div>
        </div>
    </nav>
    <!-- ./navbar -->
</body>