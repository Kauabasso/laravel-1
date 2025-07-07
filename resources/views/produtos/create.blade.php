<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produto &raquo; Criar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" enctype="multipart/form-data" action="{{ route('produtos.store') }}">
                        @csrf

                        <!-- Nome -->
                        <div>
                            <x-input-label for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" required />
                        </div>

                        <!-- Preco -->
                        <div>
                            <x-input-label for="preco" :value="__('Preço')" />
                            <x-text-input id="preco" class="block mt-1 w-full" type="text" name="preco" required />
                        </div>

                        <!-- Descricao -->
                        <div>
                            <x-input-label for="descricao" :value="__('Descrição')" />
                            <textarea name="descricao" class="w-full dark:text-black">{{ old('descricao') }}</textarea>
                        </div>

                        <!-- Categoria -->
                        <div>
                            <x-input-label for="categoria_id" value="Categoria" />
                            <select name="categoria_id" id="categoria_id" class="block mt-1 w-full" required>
                                <option value="">Selecione uma categoria</option>
                                @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
                        </div>

                        <!-- Imagem -->
                        <div>
                            <x-input-label for="imagem" :value="__('Imagem')" />
                            <input type="file" name="imagem" accept="image/*" class="block mt-1">
                        </div>

                        <x-primary-button class="mt-4">Salvar</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>