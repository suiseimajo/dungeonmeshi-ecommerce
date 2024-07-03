<x-header>
</x-header>
<div>
    <div class="mx-auto container px-4 md:px-6 2xl:px-0 py-12 flex justify-center items-center">
    <div class="flex flex-col jusitfy-start items-start">
      <div class="mt-3">
        <h1 class="text-3xl lg:text-4xl tracking-tight font-semibold leading-8 lg:leading-9 text-gray-800 ">Lista de Desejos</h1>
      </div>
      <div class="mt-4">
        <p class="text-2xl tracking-tight leading-6 text-gray-600">#</p>
      </div>
        <div class="mt-10 lg:mt-12 grid grid-cols-1 lg:grid-cols-3 gap-x-8 gap-y-10 lg:gap-y-0">
          <div class="flex flex-col">
            <div class="relative mt-6">
              <img src="#" alt="product 1" class="w-full h-64 object-cover">
              <form method="post" action="#" class="p-6">
                @csrf
                @method('delete')
                  <button aria-label="close" class="top-4 right-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 absolute p-1.5 bg-gray-800 dark:bg-white dark:text-gray-800 text-white hover:text-gray-400">
                    <svg class="fil-current" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13 1L1 13" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                      <path d="M1 1L13 13" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </button>
              </form>
            </div>
            <div class="mt-6 flex justify-between items-center">
              <div class="flex justify-center items-center">
                <p class="tracking-tight text-2xl font-semibold leading-6 text-gray-800">#</p>
              </div>
              <div class="flex justify-center items-center">
                <button aria-label="show menu" onclick="handleClick1(true)" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 py-2.5 px-2 bg-gray-800 dark:bg-white dark:text-gray-800 text-white hover:text-gray-400 hover:bg-gray-200">
                  <svg id="chevronUp1" class="fill-stroke" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 5L5 1L1 5" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <svg id="chevronDown1" class="hidden fill-stroke" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </button>
              </div>
            </div>
            <div id="menu1" class="flex flex-col jusitfy-start items-start mt-12">
              <div>
                <p class="tracking-tight text-xs leading-3 text-gray-800">Categoria</p>
              </div>
              <div class="mt-2 h-12 overflow-auto w-full">
                <p><a href="#"  class="tracking-tight text-base font-medium leading-4 text-gray-800">#</p></a>
              </div>
              <div class="mt-6">
                <p class="tracking-tight text-base font-medium leading-4 text-gray-800">#</p>
              </div>
              <div class="flex jusitfy-between flex-col lg:flex-row items-center mt-10 w-full space-y-4 lg:space-y-0 lg:space-x-4 xl:space-x-8">
                <a href="#" class="w-full">
                  <button class="focus:outline-none focus:ring-gray-800 focus:ring-offset-2 focus:ring-2 text-gray-800 w-full tracking-tight py-4 text-lg leading-4 hover:bg-gray-300 hover:text-gray-800 dark:bg-transparent dark:border-gray dark:hover:bg-gray-800 bg-white border border-gray-800 dark:hover:text-white">Mais Informações</button>
                </a>
                <div class="w-full">
                  <button class="focus:outline-none focus:ring-gray-800 focus:ring-offset-2 focus:ring-2 text-white w-full tracking-tight py-4 text-lg leading-4 hover:bg-black bg-gray-800 border border-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">Adicionar ao Carrinho</button>
                </div>
              </div>
            </div>
          </div>
          <x-modal name="success-addtocart" focusable>
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Carrinho') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Produto adicionado ao carrinho!') }}
                </p>
                <div class="mt-6 flex justify-end">
                    <x-primary-button class="ms-3" x-on:click="$dispatch('close')">
                        {{ __('Ok!') }}
                    </x-primary-button>
                </div>
            </div>
        </x-modal>
        </div>
      </div>
    </div>
  </div>
</div>
<x-footer>
</x-footer>
