<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Post &raquo; Criar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" enctype="multipart/form-data" action="{{ route('posts.store') }}">
                        @csrf

                        <!-- Título -->
                        <div>
                            <x-input-label for="title" :value="__('Título')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required />
                        </div>

                        <!-- Conteúdo -->
                        <div>
                            <x-input-label for="content" :value="__('Conteúdo')" />
                            <textarea name="content" class="w-full dark:text-black">{{ old('content') }}</textarea>
                        </div>

                        <!-- Category -->
                        <div>
                            <x-input-label for="category_id" value="Category" />
                            <select name="category_id" id="category_id" class="block mt-1 w-full" required>
                                <option value="">Selecione uma category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nome }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <x-primary-button class="mt-4">Salvar</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>