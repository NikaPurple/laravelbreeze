<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Seguimiento;


class PagesController extends Controller
{
    public function fnIndex(){
        return view('welcome');
    }

    public function fnRegistrar(Request $request){

        //return $request->all();         //Prueba de "token" y datos recibidos

        $request -> validate([
            'codEst' => 'required',
            'nomEst' => 'required',
            'apeEst' => 'required',
            'fnaEst' => 'required',
            'turnMat' => 'required',
            'semMat' => 'required',
            'estMat' => 'required'
        ]);

        $nuevoEstudiante = new Estudiante;
        
        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turnMat = $request->turnMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;
        
        $nuevoEstudiante->save();
        
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }

    public function fnEstActualizar($id){                   //Paso 1
        $xActAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id){        //Paso 2
        //return $request->all();         //Prueba de "token" y datos recibidos
        $xUpdateAlumnos = Estudiante::findOrFail($id);

        $xUpdateAlumnos->codEst = $request->codEst;
        $xUpdateAlumnos->nomEst = $request->nomEst;
        $xUpdateAlumnos->apeEst = $request->apeEst;
        $xUpdateAlumnos->fnaEst = $request->fnaEst;
        $xUpdateAlumnos->turnMat = $request->turnMat;
        $xUpdateAlumnos->semMat = $request->semMat;
        $xUpdateAlumnos->estMat = $request->estMat;
        
        $xUpdateAlumnos->save();
        
        //$xAlumnos = Estudiante1::all();                        //Datos de BD
        //return view('pagLista', compact('xAlumnos'));          //Pasar a pagLista
        return back()->with('msj','Se actualizó con éxito...');  //Regresar con msj
    }

    public function fnEliminar(Request $request, $id){
        $deleteAlumno = Estudiante::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj','Se elimino con éxito...');
    }

    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnLista(){
        $xAlumnos = Estudiante::all();              //Todos los datos
        //$xAlumnos = Estudiante::paginate(4);
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnGaleria($numero=0){
        $valor = $numero;
        $otro  = 25;
        return view('pagGaleria', compact('valor','otro'));
    }

    public function fnSeguimiento(){
        $xAlumnos = Seguimiento::all();              //Todos los datos
        //$xAlumnos = Seguimiento::paginate(4);
        return view('pagListaSeguimiento', compact('xAlumnos'));
    }

    public function fnEstDetaSeg($id){
        $xDetAlumnos = Seguimiento::findOrFail($id);
        return view('Estudiante.pagDetalleSeg', compact('xDetAlumnos'));
    }

    public function fnRegistrarSeg(Request $request){

        //return $request->all();         //Prueba de "token" y datos recibidos

        $request -> validate([
            'idEst' => 'required',
            'traAct' => 'required',
            'ofiAct' => 'required',
            'satEst' => 'required',
            'fecSeg' => 'required',
            'estSeg' => 'required',
        ]);

        $nuevoSeguimiento = new Seguimiento;
        
        $nuevoSeguimiento->idEst = $request->idEst;
        $nuevoSeguimiento->traAct = $request->traAct;
        $nuevoSeguimiento->ofiAct = $request->ofiAct;
        $nuevoSeguimiento->satEst = $request->satEst;
        $nuevoSeguimiento->fecSeg = $request->fecSeg;
        $nuevoSeguimiento->estSeg = $request->estSeg;
        
        $nuevoSeguimiento->save();
        
        //$xAlumnos = Seguimiento::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }

    public function fnEstActualizarSeg($id){                   //Paso 1
        $xActAlumnos = Seguimiento::findOrFail($id);
        return view('Estudiante.pagActualizarSeg', compact('xActAlumnos'));
    }

    public function fnUpdateSeg(Request $request, $id){        //Paso 2
        //return $request->all();         //Prueba de "token" y datos recibidos
        $xUpdateAlumnos = Seguimiento::findOrFail($id);

        $xUpdateAlumnos->idEst = $request->idEst;
        $xUpdateAlumnos->traAct = $request->traAct;
        $xUpdateAlumnos->ofiAct = $request->ofiAct;
        $xUpdateAlumnos->satEst = $request->satEst;
        $xUpdateAlumnos->fecSeg = $request->fecSeg;
        $xUpdateAlumnos->estSeg = $request->estSeg;
        
        $xUpdateAlumnos->save();
        
        //$xAlumnos = Seguimiento::all();                        //Datos de BD
        //return view('pagLista', compact('xAlumnos'));          //Pasar a pagLista
        return back()->with('msj','Se actualizó con éxito...');  //Regresar con msj
    }

    public function fnEliminarSeg(Request $request, $id){
        $deleteAlumno = Seguimiento::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj','Se elimino con éxito...');
    }

}