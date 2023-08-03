<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

//Rotas que o usuário só pode acessar se estiver logado usando o middleware auth:
/* posso definir o middleware('auth') pra cada rota ou posso fazer pra um grupo de rotas: */
Route::middleware(['auth'])->group(function(){
    
    //Route::get('/', [HomeController::class, 'index'] )->middleware('auth')->name('home'); pra cada rota
    Route::get('/', [HomeController::class, 'index'] )->name('home');
    Route::get('/task', [TaskController::class, 'index'])->name('task.view');
    Route::get('/task/new', [TaskController::class, 'create'])->name('task.crate');
    Route::post('/task/create_action', [TaskController::class, 'create_action'])->name('task.create_action');
    Route::get('/task/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/task/edit_action', [TaskController::class, 'edit_action' ])->name('task.edit_action');
    Route::get('/task/delete', [TaskController::class, 'delete'])->name('task.delete');
    Route::post('/task/update', [TaskController::class, 'update'])->name('task.update');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
}); // coloquei auth dentro de um array, pois posso querer usar mais de um.


//Rotas livres para acesso:
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login',[AuthController::class, 'login_action'])->name('user.login_action');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register',[AuthController::class, 'register_action'])->name('user.register_action');




