<?php

use App\Http\Controllers\ProfileController;
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
}) -> name('xInicio');

////////////////////////AGREGUE////////////////////////

Route::get('/saludo', function () {
    return "Hola mundo soy Nika desde LARAVEL ...";
});

Route::get('/galeria/{numero}', function ($numero) {
    return "Codigo de foto: ".$numero;
}) -> where('numero','[0-9]+'); //corchetes expresiones regulares

Route::view('/galeria', 'pagGaleria', ['valor' => 15]) -> name('xGaleria');

Route::get('/lista', function () {
    return view('paglista');
}) -> name('xLista');

//////////////////////////////////////////////////////

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
