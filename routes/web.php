<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [TaskController::class, 'welcome'])->name('welcome');

    Route::get('/tasks/index', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::put('/tasks/create', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/tags', [\App\Http\Controllers\TagController::class, 'index'])->name('tags.index');
    Route::post('/tags', [\App\Http\Controllers\TagController::class, 'store'])->name('tags.store');
    Route::put('/tags/{tag}', [\App\Http\Controllers\TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [\App\Http\Controllers\TagController::class, 'destroy'])->name('tags.destroy');
});
