<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

//PORTADA
Route::get('/', [PagesController::class, 'fnIndex']) -> name('xIndex');

//REGISTRAR
Route::post('/', [PagesController::class, 'fnRegistrar']) -> name('Estudiante.xRegistrar');
Route::post('/', [PagesController::class, 'fnRegistrarSeg']) -> name('Estudiante.xRegistrarSeg');

//DETALLE
Route::get( '/detalle/{id}', [PagesController::class, 'fnEstDetalle'] )->name('Estudiante.xDetalle');
Route::get( '/seguimiento/{id}', [PagesController::class, 'fnEstDetaSeg'] )->name('Estudiante.xDetalleSeg');

//PAGINAS
Route::get('/galeria/{numero?}', [PagesController::class, 'fnGaleria']) -> where('numero','[0-9]+') -> name('xGaleria');
Route::get('/lista', [PagesController::class, 'fnLista']) -> name('xLista');
Route::get('/seguimiento', [PagesController::class, 'fnSeguimiento']) -> name('xSeguimiento');

//ADICIONALES LISTA
Route::get('/actualizar/{id}', [PagesController::class, 'fnEstActualizar']) -> name('Estudiante.xActualizar');
Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdate']) -> name('Estudiante.xUpdate');

Route::delete('/eleminar/{id}', [PagesController::class, 'fnEliminar']) -> name('Estudiante.xEliminar');

//ADICIONALES SEGUIMIENTO
Route::get('/actualizar/{id}', [PagesController::class, 'fnEstActualizarSeg']) -> name('Estudiante.xActualizarSeg');
Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdateSeg']) -> name('Estudiante.xUpdateSeg');

Route::delete('/eleminar/{id}', [PagesController::class, 'fnEliminar']) -> name('Estudiante.xEliminarSeg');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () { 
        return view('dashboard');
    })->name('dashboard');
});

?> 