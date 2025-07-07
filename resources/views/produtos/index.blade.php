<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produtos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-link-button href="{{  route('produtos.create') }}">
                        +Produto
                    </x-link-button>
                    <br><br>

                    @if(count($produtos) > 0)
                    @php $total = 0;
                    @endphp
                    @foreach ($produtos as $produto)
                    <br><br>
                    <b>{{ $produto->nome }}</b>
                    <br><br>
                    {{ $produto->preco }}
                    <br> <br>
                    {{ $produto->descricao }}
                    <br><br>
                    <x-input-label for="categoria_id" value="Categoria" />
                    <select name="categoria_id" id="categoria_id" required class="block mt-1 w-full">
                        <option value="">Selecione uma categoria</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
                    <br><br>
                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do Produto">
                    <br>
                    @csrf
                    <br>
                    <x-link-button href="{{ route('carrinho.store', $produto->id) }}">
                        Adicionar no Carrinho
                    </x-link-button>
                    <hr>
                    </form>
                    @endforeach

                    @else
                    <p>Não há produtos.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>