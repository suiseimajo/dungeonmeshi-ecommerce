<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form id="delete-image" method="post" action="{{ route('profile.destroy-image') }}">
        @csrf
        @method('delete')
    </form>

    <form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex flex-col items-center sm:flex-row sm:space-y-0">
            <img id="image_preview" class="rounded-full w-28 h-28 border border-gray-200 p-1 object-cover ring-2 ring-indigo-300 dark:ring-indigo-500" src="{{ isset($user->imagem) ? Storage::url($user->imagem) : asset('assets/images/Default_pfp.svg.png') }}" alt="Bordered avatar">
            <div class="flex flex-col sm:ml-8">
                <label class="mb-2">
                    <span type="submit"
                        class="text-gray-800 font-medium py-0">
                        Alterar Foto
                    </span>
                    <input type="file" id="imagem" name="imagem" class="hidden"/>
                </label>
                <button form="delete-image" type="submit" class="text-gray-800 font-medium">
                    Deletar Foto
                </button>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Salvo.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    // create onchange event listener for featured_image input
    document.getElementById('imagem').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an image, create a preview in featured_image_preview
            document.getElementById('image_preview').src = URL.createObjectURL(file)
        }
    }
</script>
