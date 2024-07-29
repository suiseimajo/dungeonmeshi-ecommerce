<x-app-layout>
    <div class="h-full bg-gray-900">
        <x-slot name="title">
            Edit
        </x-slot>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Editar Usuário' }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                    <form method="post" action="{{ route('usuarios.update', $users->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                              <div class="space-y-12">
                                <div class="border-b border-white/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-white">Perfil</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-400">Essas informações serão exibidas publicamente, portanto, tome cuidado com o que você compartilha.</p>
    
                                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                        <label for="name" class="block text-sm font-medium leading-6 text-white">Nome</label>
                                            <div class="mt-2">
                                                <div class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                                    <input type="text" wire:model="name" name="name" id="name" autocomplete="name" class="flex-1 border-0 bg-transparent py-1.5 pl-1 text-white focus:ring-0 sm:text-sm sm:leading-6" placeholder="Miorine Rembran">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-4">
                                            <label for="email" class="block text-sm font-medium leading-6 text-white">Email</label>
                                            <div class="mt-2">
                                                <div class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                                <input wire:model="email" type="email" name="email" id="email" autocomplete="email" class="flex-1 border-0 bg-transparent py-1.5 pl-1 text-white focus:ring-0 sm:text-sm sm:leading-6" placeholder="miorine@tomato.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-4">
                                            <label for="password" class="block text-sm font-medium leading-6 text-white">Senha</label>
                                            <div class="mt-2">
                                                <div class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                                <input wire:model="password" type="password" name="password" id="password" autocomplete="password" class="flex-1 border-0 bg-transparent py-1.5 pl-1 text-white focus:ring-0 sm:text-sm sm:leading-6" required>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="text-red-900">{{ $errors->first('password') }}</span>
                                                @endif 
                                            </div>
                                            <div class="sm:col-span-4">
                                                <label for="password_confirmation" class="block text-sm font-medium leading-6 text-white">Confirmar Senha</label>
                                                <div class="mt-2">
                                                    <div class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                                    <input wire:model="password_confirmation" type="password" name="password_confirmation" id="password_confirmation" autocomplete="password_confirmation" class="flex-1 border-0 bg-transparent py-1.5 pl-1 text-white focus:ring-0 sm:text-sm sm:leading-6" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>          
                                <div class="mt-6 flex items-center justify-start gap-x-6">
                                    <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Salvar</button>
                                    <button type="button" class="text-sm font-semibold leading-6 text-white">Cancelar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>