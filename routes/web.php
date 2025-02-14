<?php

use App\Http\Controllers\listController;
use App\Http\Controllers\taskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/login', function () {
    return view('login');
});

// Routes untuk ListController
Route::get('/list', [listController::class, "index"]);
Route::post('/list', [listController::class, 'store'])->name('list.store');
Route::delete('/list/{id}', [listController::class, 'destroy'])->name('list.destroy');
Route::put('/list/{id}', [listController::class, 'update'])->name('list.update');
Route::get('/list/{id}/edit', [listController::class, 'edit'])->name('list.edit');
Route::get('/list/create/{id}', [listController::class, 'create'])->name('list.create');
Route::get('/list/{id}', [listController::class, 'find']);

// Route::get('/task', function () {
    //     return view('task');
    // })->name('task.index');
    
// Routes untuk TaskController
Route::post('/task/store', [taskController::class, 'store']);
Route::post('/task/{id}/update', [taskController::class, 'update']);
Route::get('/task/{id}/edit', [taskController::class, 'edit']);
Route::delete('/task/{id}/delete', [taskController::class, 'destroy']);
Route::get('/task/{id}', [taskController::class, "task"]);



