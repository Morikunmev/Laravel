<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Task; // Importación necesaria para usar Task
use App\Http\Requests\TaskRequest; // Importación necesaria para usar TaskRequest

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::latest('id')->paginate(perPage: 5);
        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        return view('tasks.create', [
            'task' => new Task(),
            'method' => 'POST',
            'actionUrl' => route(name: 'tasks.store'),
            'submitButtonText' => 'Crear tarea'
        ]);
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        Task::created($request->validated());
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit', [
            'task' => $task,
            'method' => 'PUT',
            'actionUrl' => route(name: 'tasks.update', parameters: $task),
            'submitButtonText' => 'Actualizar tarea'
        ]);
    }

    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        $task->update($request->validated());
        return redirect()->route('tasks.index');
    }
    public function toggle(Task $task): RedirectResponse
    {
        $task->update([
            'completed' => !$task->completed,

        ]);
        return redirect()->route('tasks.index');
    }
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
