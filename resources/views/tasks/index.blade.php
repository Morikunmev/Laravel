<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-light">
            Listado de tareas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">id</th>
                                <th scope="col" class="px-6 py-3">Nombre</th>
                                <th scope="col" class="px-6 py-3">Descripcion</th>
                                <th scope="col" class="px-6 py-3">Completada</th>
                                <th scope="col" class="px-6 py-3">Creado con fecha</th>
                                <th scope="col" class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr class="border-t-0 hover:bg-gray-100 dark:hover:bg-gray-800">
                                    <td class="px-6 py-3">
                                        {{ $task->id }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $task->name }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $task->description }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $task->completed ? 'Si' : 'No' }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $task->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-3">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                            Editar
                                        </a>
                                        @if ($task->completed)
                                            <a href="#', $task) }}" class="text-red-600 hover:text-red-900">
                                                Deshacer
                                            </a>
                                        @else
                                            <a href="#', $task) }}" class="text-green-600 hover:text-green-900">
                                                Completar
                                            </a>
                                        @endif
                                        <a href="#" class="text-red-600 hover:text-red-900">
                                            Eliminar
                                        </a>
                                </tr>
                            @endforeach

                            @if ($tasks->isEmpty())
                                <tr>
                                    <td colspan="4"
                                        class="border-t-0 px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        No hay tareas disponibles
                                    </td>
                                </tr>
                            @endif
                        </tbody>

                    </table>
                    <div class="p-4">
                        {{$tasks->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>