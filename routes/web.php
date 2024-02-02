<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/todos/index', [App\Http\Controllers\TodoController::class, 'index'])->name('index');



Route::get('/todos/create', [App\Http\Controllers\TodoController::class, 'create'])->name('create');



Route::post('/todos/store', [App\Http\Controllers\TodoController::class, 'store'])->name('store');


Route::get('/todos/show/{id}', [App\Http\Controllers\TodoController::class, 'show'])->name('show');


Route::get('todos/{id}/edit',[App\Http\Controllers\TodoController::class,'edit'])->name('edit');




Route::put('/todos/update', [App\Http\Controllers\TodoController::class, 'update'])->name('update');