<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\TaskController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/tasks',[TaskController::class,'index']);