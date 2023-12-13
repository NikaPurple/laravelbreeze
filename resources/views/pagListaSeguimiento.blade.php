@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Página de seguimiento - Evaluación 3 </h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-succes alert-dismissible fade show" role="alert">
            {{session('msj')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Estudiante.xRegistrarSeg') }}" method="post" class="d-grid gap-2">
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

        <input type="text" name="idEst" placeholder="Código" value="{{ old('idEst') }}" class="form-control mb-2">
        <select name="traAct" placeholder="Trabajo actual" class="form-control mb-2">
            <option value="">Esta trabajando...</option>
            <option value="0">SI</option>
            <option value="1">NO</option>
        </select>

        <select name="ofiAct" class="form-control mb-2">
            <option value="">Seleccione su oficio actual...</option>
            <option value="0">Sigo estudiando</option>
            @for($i=1; $i < 11; $i++)
                <option value="{{$i}}">{{$i}} CP</option>
            @endfor
        </select>

        <select name="satEst" placeholder="Grado de satisfacción" class="form-control mb-2">
            <option value="">Seleccione su grado de satisfacción...</option>
            <option value="0">No estoy satisfecho</option>
            <option value="1">Regular</option>
            <option value="2">Bueno</option>
            <option value="3">Muy bueno</option>
        </select>

        <input type="date" name="fecSeg" placeholder="Fecha de seguimiento"  value="{{ old('fecSeg') }}" class="form-control mb-2">

        <select name="estSeg" class="form-control mb-2">
            <option value="">Seleccione su estado...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        
        <button class="btn btn-primary btn-block" type="submit">Agregar</button>
    </form>

    <br>
    <div class="btn btn-dark fs-3 fw-bold d-grid">Seguimiento</div>
    <table class="table">
        <thead class="table-secondary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Oficio Actual</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($xAlumnos as $item)
            <tr>
                <th scope="row">{{ $item->id}}</th>
                <td> 
                    <a href="{{ route('Estudiante.xDetalleSeg', $item->id) }}">
                        {{ $item->ofiAct }}
                    </a>
                </td>
                <td>
                    <form action="{{ route('Estudiante.xEliminarSeg', $item->id) }}" method="pOST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">  X </button>
                    </form>
                    <a class="btn btn-warning btn-sm" href="{{ route('Estudiante.xActualizarSeg', $item->id) }}">
                        A
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection