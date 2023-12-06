@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Página lista </h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-succes alert-dismissible fade show" role="alert">
            {{session('msj')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif
    <form action="{{ route('Estudiante.xRegistrar') }}" method="POST">
        @csrf

        @error('codEst')
            <div class="alert alert-danger">
                El codigo requerido
            </div>
        @enderror

        @error('nomEst')
            <div class="alert alert-danger">
                El nombre requerido
            </div>
        @enderror

        @if($errors ->has('apeEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                E1 <strong>apellido</strong>es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        @endif

        <input type="text" name="codEst" placeholder="Código" class="form-control mb-2">
        <input type="text" name="nomEst" placeholder="Nombres" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellidos" class="form-control mb-2">
        <input type="date" name="fnaEst" placeholder="Fecha Nac." class="form-control mb-2">
        <select name="turMat" class="form-control mb-2">
            <option name="">Seleccione...</option>
            <option name="1">Turno Día</option>
            <option name="2">Turno Noche</option>
            <option name="3">Turno Tarde</option>
        </select>
        <select name="semMat" class="form-control mb-2">
            <option name="">Seleccione...</option>
            @for($i=1; $i < 7; $i++)
                <option name="{{$i}}">Semestre {{$i}}</option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
            <option name="">Seleccione...</option>
            <option name="0">Inactivo</option>
            <option name="1">Activo</option>
        </select>
        <button class="btn btn-primary btn-block" type="submit">Agregar</button>
    </form>    
    
    <h3> Lista </h3>
    <table class="table">
        <thead class="table-secondary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Código</th>
                <th scope="col">Apellidos y Nombres</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($xAlumnos as $item)
            <tr>
                <th scope="row">{{ $item->id}}</th>
                <td>{{ $item->codEst }}</td>
                <td>
                    <a href="{{ route('Estudiante.xDetalle', $item->id) }}">
                        {{ $item->apeEst }}, {{ $item->nomEst }}
                    </a>
                <td>A-----X</td>
            </tr>
            @endforeach
        </tbody>
    </table>
           
    
@endsection