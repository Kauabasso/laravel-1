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
                    <hr>
                    @foreach ($produtos as $produto)
                        <br><br>
                        <b>{{ $produto->nome }}</b>
                        <br><br>
                        {{ $produto->preco }}
                        <br> <br>
                        {{ $produto->descricao }}
                        <br><br>
                        <!-- {{ $produto->categoria }} -->
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>