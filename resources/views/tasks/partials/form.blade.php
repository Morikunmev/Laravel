<form action="{{$actionUrl}}" method="POST" class="max-w-sm mx-auto bg-white p-8 rounded-lg shadow-md">
    @csrf

    @method($method)
    <h2 class="text-2xl font-semibold mb-6 text-center">Login Form</h2>
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" name="name"
            class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
            value="{{old('name', $task->name)}}" />
        @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>

        @enderror
    </div>
    <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
            message</label>
        <textarea id="description" rows="4" name="description"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escribe tu tarea">{{old('description', $task->description)}}
        @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        
        </textarea>

    </div>
    <div class="flex items-center mb-6">
        <input id="completed" type="checkbox" name="completed" {{ old('completed', $task->completed) ? 'checked' : '' }} value="1">
        <label for="completed" class="text-sm font-medium text-gray-700">Completada?</label>

    </div>
    <button type="submit"
        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
        {{$submitButtonText}}
    </button>
</form>