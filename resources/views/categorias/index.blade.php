<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Categorias
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-link-button href="{{  route('categorias.create') }}">
                        +Categoria
                    </x-link-button>
                    <br><br>
                    @if(count($categorias) > 0)
                        @php $total = 0;
                    @endphp
                    <hr>
                    @foreach ($categorias as $categoria)
                    <br><br>
                    <b>Categoria: {{ $categoria->nome }}</b>
                    <br><br>
                    @csrf
                    <hr>
                    </form>
                    @endforeach

                    @else
                    <p>Não existem categorias.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>