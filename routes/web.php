<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
Configuracion de rutas de acceso al sistema
|
*/

// Route::view('/','index')->name('home');
Route::get('/',[PageController::class, 'home'])->name('home');
Route::get('curso/{course:slug}',[PageController::class, 'course'])->name('course');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
