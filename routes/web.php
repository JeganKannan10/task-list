<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('post.login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('post.register');


//Task Routes
Route::middleware(['auth'])->group(function () {
    //home route
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //task module
    Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('tasks/{task}', [TaskController::class, 'view'])->name('tasks.view');
    Route::get('task/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('tasks/{task}',[TaskController::class, 'update'])->name('tasks.update');
    Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::post('tasks/{task}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
});