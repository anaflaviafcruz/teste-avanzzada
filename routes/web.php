<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthAdminController;
use App\Http\Controllers\Auth\AuthComumController;
use App\Http\Controllers\Comum\CategoriaController;
use App\Http\Controllers\Comum\MarcaController;
use App\Http\Controllers\Comum\ProdutoController;
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

//area do comum
Route::prefix('comum/')->name('comum.')->middleware(['auth:web'])->group(function () {
    
    Route::resource('categoria', CategoriaController::class)->only('index');
    Route::resource('marca', MarcaController::class)->only('index');
    Route::resource('produto', ProdutoController::class)->only('index');

});

//area do admin
Route::prefix('admin/')->name('admin.')->middleware(['auth:admin'])->group(function () {
    
    Route::resource('/user', UserController::class);

});

//auth do comum
Route::prefix('comum')->name('comum.')->group(function () {

    Route::get('/login', [AuthComumController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthComumController::class, 'login'])->name('login.post');
    Route::get('/logout', [AuthComumController::class, 'logout'])->name('logout');

});

//auth do admin
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AuthAdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthAdminController::class, 'login'])->name('login.post');
    Route::get('/logout', [AuthAdminController::class, 'logout'])->name('logout');

});
