<x-app-layout>
<div>
    <x-slot name="title">
        Users
    </x-slot>
    <x-slot name="header">
    </x-slot>
    <div class="bg-gray-900">
        <div class="mx-auto max-w-7xl">
          <div class="bg-gray-900 py-10">
            <div class="px-4 sm:px-6 lg:px-8">
              <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                  <a href="{{ route('usuarios.create') }}" class="block rounded-md bg-indigo-500 px-3 py-2 text-centertext-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Adicionar Usuário</a>
                </div>
              </div>
              <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-700">
                      <thead>
                        <tr>
                          <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Usuário</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Avatar</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Email</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Ação</th>
                        </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-800">
                    @foreach ($users as $user)
                        <tr>
                          <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{$user->name}}
                          <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300"><img src="{{ isset($user->imagem) ? Storage::url($user->imagem) : asset('imagens/Default_pfp.svg.png') }}" alt="product 1" class="w-20 h-20 object-cover"></td>
                          <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{$user->email}}
                          <td class="relative whitespace-nowrap py-4 pl-100 pr-4 text-sm font-medium sm:pr-0">
                            <a href="{{route('usuarios.show', $user->id)}}" class="text-indigo-400 hover:text-indigo-300 mr-2">Exibir<span class="sr-only">Exibir</span></a>
                            <a href="{{route('usuarios.edit', $user->id)}}" class="text-indigo-400 hover:text-indigo-300 mr-2">Editar<span class="sr-only">Editar</span></a>
                            <form method="post" action="#" class="inline">
                              @csrf
                              @method('delete')
                              <button type="submit" class="text-indigo-400 hover:text-indigo-300 ml-4">Deletar<span class="sr-only">Deletar</span></button>
                          </form>
                          </td>
                        </tr>
                    @endforeach
                        <!-- More people... -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</x-app-layout>
