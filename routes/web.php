<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

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

// Route::get('/', function () {
//     return view('principal');
// });

Route::get('/', [ProductoController::class, 'index'])->name('home');
Route::get('/crear', [ProductoController::class, 'create' ])->name('create');
Route::get('/{producto}/edit', [ProductoController::class, 'edit' ])->name('edit');
Route::get('/{producto}/show', [ProductoController::class, 'show' ])->name('show');