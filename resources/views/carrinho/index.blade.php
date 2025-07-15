<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Carrinho de Compras
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(session('success'))
                        <p class="text-green-500">{{ session('success') }}</p>
                    @endif

                    @if(count($carrinho) > 0)
                        @php $total = 0; @endphp

                        @foreach($carrinho as $id => $item)
                            @php
                                $subtotal = $item['preco'] * $item['quantidade'];
                                $total += $subtotal;
                            @endphp

                            <br><br>
                            <b>{{ $item['nome'] }}</b>
                            <br><br>
                            R$ {{ number_format($item['preco'], 2, ',', '.') }}
                            <br><br>
                            Quantidade: {{ $item['quantidade'] }}
                            <br><br>
                            Subtotal: R$ {{ number_format($subtotal, 2, ',', '.') }}
                            <br><br>
                            <img src="{{ asset('storage/' . $item['imagem']) }}" alt="Imagem do Produto" width="150">
                            <br><br>

                            <x-link-button href="{{ route('carrinho.remove', $id) }}">
                                Remover do Carrinho
                            </x-link-button>
                            @method('DELETE')

                            <hr>
                        @endforeach

                        <br><br>
                        <b>Total do Carrinho: R$ {{ number_format($total, 2, ',', '.') }}</b>

                    @else
                        <p>O carrinho está vazio.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
