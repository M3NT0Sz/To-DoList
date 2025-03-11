<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/admin/users/create', [UserController::class, 'store'])->name('users.store');
Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/admin/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/admin/users/edit/{user}', [UserController::class, 'editUser'])->name('users.editUser');