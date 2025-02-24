<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-light">
            Crear una nueva tarea
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('tasks.index') }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-700 border border-transparent rounded-md">
                            Volver al listado
                        </a>
                    </div>
                    @include('tasks.partials.form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>