<x-header>
</x-header>

    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Conta</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- account wrapper -->
    <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">

        <!-- sidebar -->
        <div class="col-span-3">
            <div class="px-4 py-3 shadow flex items-center gap-4">
                <div class="flex-grow pb-10">
                    <p class="text-gray-800 font-medium">Olá,</p>
                    <h4 class="text-gray-600">{{$user->name}}</h4>
                    <div class="max-w-xl">
                    </div>
                </div>
                <div class="flex-shrink-0 pr-3">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            @if (Session::has('notif.success'))
                <div class="bg-primary mt-2 p-4">
                    <span class="text-white">{{ Session::get('notif.success') }}</span>
                </div>
            @endif

            <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
                <div class="space-y-1 pl-8">
                    <a href="#" class="relative text-primary block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-address-card"></i>
                        </span>
                        Gerenciar Conta
                    </a>
                    <a href="{{route('usuarios.show', $user->id)}}" class="relative hover:text-primary block transition">
                        Informação de Perfil
                    </a>
                    <a href="{{route('usuarios.edit', $user->id)}}" class="relative hover:text-primary block capitalize transition">
                        Alterar Senha
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="#" class="relative hover:text-primary block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-solid fa-box-archive"></i>
                        </span>
                        Histórico
                    </a>
                    <a href="#" class="relative hover:text-primary block capitalize transition">
                        Meus Pedidos
                    </a>
                    <a href="#" class="relative hover:text-primary block capitalize transition">
                        Meus Cancelamentos
                    </a>
                    <a href="#" class="relative hover:text-primary block capitalize transition">
                        Minhas Avaliações
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="#" class="relative hover:text-primary block font-medium transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-credit-card"></i>
                        </span>
                        Métodos de Pagamento
                    </a>
                    <a href="#" class="relative hover:text-primary block capitalize transition">
                        Cupom
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="#" class="relative hover:text-primary block font-medium transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-heart"></i>
                        </span>
                        Lista de Desejos
                    </a>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="relative hover:text-primary block font-medium capitalize transition space-y-1 pl-8 pt-4">
                        <span class="absolute -left-8 top-4 pl-8 text-base">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </span>
                        {{ __('Sair') }}
                    </button>
                </form>
            </div>
        </div>
        <!-- ./sidebar -->

        <!-- info -->
        <div class="col-span-9 grid grid-cols-2 gap-4">

            <div class="flex items-center justify-between mb-4">
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
                <div class="flex items-center justify-betweeen mb-4">
                    <h3 class="font-medium text-gray-800 text-lg">Perfil Pessoal</h3>
                    <button type="submit" class="text-primary">Editar</a>
                </div>
                <div class="space-y-1">
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus />
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $user->email)" required autofocus />
                </div>
            </form>
            </div>

            <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-medium text-gray-800 text-lg">Endereço para envio</h3>
                    <a href="#" class="text-primary">Editar</a>
                </div>
                <div class="space-y-1">
                    <h4 class="text-gray-700 font-medium">John Doe</h4>
                    <p class="text-gray-800">Medan, North Sumatera</p>
                    <p class="text-gray-800">20371</p>
                    <p class="text-gray-800">0811 8877 988</p>
                </div>
            </div>
        </div>
        <!-- ./info -->

    </div>
    <!-- ./account wrapper -->

    <!-- footer -->
    <x-footer>
    </x-footer>
    <!-- ./footer -->

    <!-- copyright -->
    <div class="bg-gray-800 py-4">
        <div class="container flex items-center justify-between">
            <p class="text-white">&copy; TailCommerce - All Right Reserved</p>
            <div>
                <img src="../assets/images/methods.png" alt="methods" class="h-5">
            </div>
        </div>
    </div>
    <!-- ./copyright -->

</body>

</html>