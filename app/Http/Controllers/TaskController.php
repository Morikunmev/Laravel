<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Task; // Importación necesaria para usar Task

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::paginate(4); // Corrección en la paginación
        return view('tasks.index', compact('tasks'));
    }
}
