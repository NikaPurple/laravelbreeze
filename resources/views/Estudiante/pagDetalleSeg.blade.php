@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página lista</h1>
@endsection

@section('seccion')
    <h3> Detalle estudiante </h3>
    <p> Id:                         {{ $xDetAlumnos->id }} </p>
    <p> Código:                     {{ $xDetAlumnos->idEst }} </p>
    <p> Trabajo actual:             {{ $xDetAlumnos->traAct }} </p>
    <p> Oficio actual:              {{ $xDetAlumnos->ofiAct }} </p>
    <p> Grado de satisfacción:      {{ $xDetAlumnos->satEst }} </p>
    <p> Fecha de seguimiento:       {{ $xDetAlumnos->fecSeg }} </p> 
    <p> Estado de seguimiento:      {{ $xDetAlumnos->estSeg }} </p>
@endsection

 