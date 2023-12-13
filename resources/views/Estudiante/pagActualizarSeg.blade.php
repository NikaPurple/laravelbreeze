@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página seguimiento</h1>
@endsection

@section('seccion')
    <form action="{{ route('Estudiante.xUpdateSeg', $xActAlumnos->id) }}" method="post" class="d-grid gap-2">
        @method('PUT') 
        @csrf

        @error('idEst')
            <div class="alert alert-danger">
                El código es requerido
            </div>
        @enderror

        @error('ofiAct')
            <div class="alert alert-danger">
                El oficio actual es requerido
            </div>
        @enderror
        
        <input type="text" name="idEst" placeholder="Código" value="{{ $xActAlumnos->idEst }}" class="form-control mb-2">
        <select name="traAct" placeholder="Trabajo actual" class="form-control mb-2">
            <option value="">Esta trabajando...</option>
            <option value="0" @if ($xActAlumnos->traAct == 0) {{ "SELECTED" }} @endif>SI (0) </option>
            <option value="1" @if ($xActAlumnos->traAct == 1) {{ "SELECTED" }} @endif>NO (1) </option>
        </select>
        <select name="ofiAct" class="form-control mb-2">
            <option value="">Seleccione su oficio actual...</option>
            <option value="0" @if ($xActAlumnos->ofiAct == 0) {{ "SELECTED" }} @endif> Sigo estudiando (0) </option>
            @for($i=0; $i < 7; $i++)
                <option value="{{$i}}" @if ($xActAlumnos->ofiAct==$i) {{ "SELECTED" }} @endif>{{$i}} CP</option>
            @endfor
        </select>
        <select name="satEst" placeholder="Grado de satisfacción" class="form-control mb-2">
            <option value="">Seleccione su grado de satisfacción...</option>
            <option value="0" @if ($xActAlumnos->satEst == 0) {{ "SELECTED" }} @endif> No estoy satisfecho (0) </option>
            <option value="1" @if ($xActAlumnos->satEst == 1) {{ "SELECTED" }} @endif> Regular (1) </option>
            <option value="2" @if ($xActAlumnos->satEst == 0) {{ "SELECTED" }} @endif> Bueno (2) </option>
            <option value="3" @if ($xActAlumnos->satEst == 1) {{ "SELECTED" }} @endif> Muy bueno (3) </option>
        </select>
        <input type="date" name="fecSeg" placeholder="Fecha de seguimiento"  value="{{ $xActAlumnos->fecSeg }}" class="form-control mb-2">
        <select name="estSeg" class="form-control mb-2">
            <option value="">Seleccione su estado...</option>
            <option value="1" @if ($xActAlumnos->estSeg == 1) {{ "SELECTED" }} @endif>Activo</option>
            <option value="0" @if ($xActAlumnos->estSeg == 0) {{ "SELECTED" }} @endif>Inactivo</option>
        </select>
        <button class="btn btn-warning" type="submit">Actualizar</button>
    </form>
@endsection