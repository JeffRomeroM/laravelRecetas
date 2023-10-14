<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;


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
// Route::get('/recetas', 'RecetaController@Index');
Route::get('/recetas', [RecetaController::class, 'Index'])->name('recetas.index');
Route::get('/recetas/create', [RecetaController::class, 'Create'])->name('recetas.create');
Route::post('/recetas', [RecetaController::class, 'Store'])->name('recetas.store');
Auth::routes();




