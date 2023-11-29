<?php
///esto es un menu o controlador generado con php artisan make:controller PagesController
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estudiante;

class PagesController extends Controller
{
    public function fnIndex(){
        return view('welcome');
    }

    public function fnDetalle($id){
        $xDetAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnGaleria($numero=0){
        $valor = $numero;
        $otro = 25;

        return view('pagGaleria', compact('valor','otro'));
    }

    public function fnLista(){
        $xAlumnos = Estudiante::all(); //Datos de BD
        return view('paglista', compact('xAlumnos'));
    }
}        