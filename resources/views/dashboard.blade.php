<x-app-layout>
    <x-slot name="title">
        Painel
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-gray-900">
                        <div class="mx-auto max-w-7xl">
                          <div class="grid grid-cols-1 gap-px bg-white/5 sm:grid-cols-2 lg:grid-cols-4">
                            <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                              <p class="text-sm font-medium leading-6 text-gray-400">Produtos</p>
                              <p class="mt-2 flex items-baseline gap-x-2">
                                <span class="text-4xl font-semibold tracking-tight text-white">{{ count($products) }}</span>
                              </p>
                            </div>
                            <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                              <p class="text-sm font-medium leading-6 text-gray-400">Categorias</p>
                              <p class="mt-2 flex items-baseline gap-x-2">
                                <span class="text-4xl font-semibold tracking-tight text-white">{{ count($categories) }}</span>
                              </p>
                            </div>
                            <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                              <p class="text-sm font-medium leading-6 text-gray-400">Usuários</p>
                              <p class="mt-2 flex items-baseline gap-x-2">
                                <span class="text-4xl font-semibold tracking-tight text-white">{{ count($users) }}</span>
                              </p>
                            </div>
                            <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                              <p class="text-sm font-medium leading-6 text-gray-400">Vendas</p>
                              <p class="mt-2 flex items-baseline gap-x-2">
                                <span class="text-4xl font-semibold tracking-tight text-white">98.5%</span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <main>    
      <div class="space-y-16 py-16 xl:space-y-20">
        <!-- Recent activity table -->
        <div>
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-white lg:mx-0 lg:max-w-none">Atividade Recente</h2>
          </div>
          <div class="mt-6 overflow-hidden border-t border-gray-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
              <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                <table class="w-full text-left">
                  <thead class="sr-only">
                    <tr>
                      <th>Amount</th>
                      <th class="hidden sm:table-cell">Client</th>
                      <th>More details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="text-sm leading-6 text-white">
                      <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                        <time datetime="2023-03-22">Hoje</time>
                        <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 dark:bg-blue-1200"></div>
                        <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 dark:bg-blue-1200"></div>
                      </th>
                    </tr>
                    <tr>
                      <td class="relative py-5 pr-6">
                        <div class="flex gap-x-6">
                          <svg class="hidden h-6 w-5 flex-none text-gray-400 sm:block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-.75-4.75a.75.75 0 001.5 0V8.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0L6.2 9.74a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" />
                          </svg>
                          <div class="flex-auto">
                            <div class="flex items-start gap-x-3">
                              <div class="text-sm font-medium leading-6 text-white"></div>
                              <div class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">Pago</div>
                            </div>
                            <div class="mt-1 text-xs leading-5 text-gray-500"></div>
                          </div>
                        </div>
                        <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></div>
                        <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
                      </td>
                      <td class="hidden py-5 pr-6 sm:table-cell">
                        <div class="text-sm leading-6 text-white"></div>
                        <div class="mt-1 text-xs leading-5 text-gray-500"></div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Recent client list-->
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
            <div class="flex items-center justify-between">
              <h2 class="text-base font-semibold leading-7 text-white">Clientes Recentes</h2>
              <a href="#" class="text-sm font-semibold leading-6 text-indigo-600 hover:text-indigo-500">View all<span class="sr-only">, clients</span></a>
            </div>
            <ul role="list" class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-3 xl:gap-x-8">
              <li class="overflow-hidden rounded-xl border border-gray-200">
                <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                  <div class="flex justify-between gap-x-4 py-3">
                    <dt class="text-white"></dt>
                    <dd class="text-white"><time datetime="2022-12-13"></time></dd>
                  </div>
                  <div class="flex justify-between gap-x-4 py-3">
                    <dt class="text-white"></dt>
                    <dd class="flex items-start gap-x-2">
                      <div class="font-medium text-white"></div>
                    </dd>
                  </div>
                </dl>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </main>
</x-app-layout>
