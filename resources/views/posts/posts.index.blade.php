<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-link-button href="{{  route('posts.create') }}">
                        +Posts
                    </x-link-button>
                    <br><br>

                    @if(count($posts) > 0)
                    @php $total = 0;
                    @endphp
                    @foreach ($posts as $post)
                    <br><br>
                    <b>{{ $post->title }}</b>
                    <br><br>
                    {{ $post->content }}
                    <br><br>
                    <x-input-label for="categoria_id" value="Category" />
                    <select name="categoria_id" id="categoria_id" required class="block mt-1 w-full">
                        <option value="">Selecione uma categoria</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nome }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    <br><br>
                    @method('DELETE')
                    @csrf
                    <br>
                    <x-link-button href="{{ route('produtos.apagar', $produto->id) }}">
                        Apagar Post
                    </x-link-button>
                    <br>
                    <br>
                    <hr>
                    </form>
                    @endforeach
                    @else
                    <p>Não há Posts.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>