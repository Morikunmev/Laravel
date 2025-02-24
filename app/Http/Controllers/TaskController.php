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
            'actionUrl' => route(name: 'tasks.store'),
            'submitButtonText' => 'Crear tarea'
        ]);
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        Task::created($request->validated());
        return redirect()->route('tasks.index');
    }
}
