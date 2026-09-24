<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::resource('tasks', TaskController::class);

Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])
    ->name('tasks.complete');

Route::patch('/tasks/{task}/pending', [TaskController::class, 'pending'])
    ->name('tasks.pending');