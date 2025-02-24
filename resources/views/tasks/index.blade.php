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
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <a href="{{ route('tasks.create') }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-700 border border-transparent rounded-md">
                                Nueva tarea
                            </a>
                        </div>
                    </div>
                </div>
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
                                    <a href="{{route('tasks.edit', $task)}}" class="text-indigo-600 hover:text-indigo-900">
                                        Editar
                                    </a>
                                    <form action="{{route('tasks.toggle', $task)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="{{$task->completed ? 'text-red-600 dark:text-red-500' : 'text-green-600 dark:text-green-500'}} hover:text-green-900">
                                            {{$task->completed ? 'Deshacer' : 'Completar'}}
                                        </button>
                                    </form>
                                    <form action="{{route('tasks.destroy', $task)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            Eliminar
                                        </button>

                                    </form>
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