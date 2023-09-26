<?php

use App\Http\Controllers\KonyvtaController;
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

Route::get('/api/books', [KonyvtaController::class, 'index']);
Route::get('/api/books/{id}', [KonyvtaController::class, 'show']);
Route::post('/api/books', [KonyvtaController::class, 'store']);
Route::put('/api/books/{id}', [KonyvtaController::class, 'update']);
Route::delete('/api/books/{id}', [KonyvtaController::class, 'destroy']);

/* View utvonal */

Route::get('/book/list', [KonyvtaController::class, 'listView']);
Route::get('/book/edit', [KonyvtaController::class, 'editView']);
Route::get('/book/view', [KonyvtaController::class, 'newView']);
