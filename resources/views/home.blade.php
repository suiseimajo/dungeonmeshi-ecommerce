<x-header>
</x-header>
@if (Session::has('notif.success'))
    <div class="bg-primary mt-2 p-4">
        <span class="text-white">{{ Session::get('notif.success') }}</span>
    </div>
@endif
    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url('assets/images/marcille.jpg');">
        <div class="container">
            <h1 class="text-6xl text-white font-medium mb-4">
                Delicious in<br> Restaurant
            </h1>
            <br>
                <a href="#produtos" class="bg-primary border border-primary text-white px-8 py-3 font-medium 
                    rounded-md hover:bg-transparent hover:text-primary">Compre Agora</a>
            </div>
        </div>
    </div>
    <!-- ./banner -->

    <!-- features -->
    <div class="container py-16">
        <div class="w-10/12 grid grid-cols-1 md:grid-cols-2 gap-6 mx-auto justify-center">
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="assets/images/icons/delivery-van.svg" alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Frete Grátis</h4>
                    <p class="text-gray-500 text-sm">Para encomendas acima de R$80,00</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="assets/images/icons/service-hours.svg" alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Suporte 24 Horas</h4>
                    <p class="text-gray-500 text-sm">Suporte ao Cliente</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ./features -->

    <!-- categories -->
    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Compre por Categoria</h2>
        <div class="grid grid-cols-3 gap-3">
            @foreach ($categories as $category)
            <div class="relative rounded-sm overflow-hidden group">
                <img src="{{ Storage::url($category->imagem) }}" alt="category 1" class="h-full object-cover">
                <a href="#"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">{{$category->nome}}</a>
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="zoom">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="{{ route('category-page', $category->slug )}}"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view category">
                            <i class="fa-solid fa-arrow-pointer"></i>
                        </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- ./categories -->

    <!-- product -->
    <livewire:product-list :products="$products"/>
    <!-- ./product -->

    <!-- recommend -->
    <livewire:recommend-list :products="$products"/>     
    <!-- ./recommend -->

    <!-- footer -->
    <x-footer>
    </x-footer>    
    <!-- ./footer -->

    <!-- copyright -->
    <div class="bg-gray-800 py-4">
        <div class="container flex items-center justify-between">
            <p class="text-white">&copy; DungeonCommerce - All Right Reserved</p>
            <div>
                <img src="assets/images/methods.png" alt="methods" class="h-5">
            </div>
        </div>
    </div>
    <!-- ./copyright -->
</body>

</html>