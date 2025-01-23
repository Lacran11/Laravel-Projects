
@extends('layout.template')
@section('Titulo', 'Ejempllo')
@section('contenido')
<div class="d-flex justify-content-center text-white" >
    <form class="w-25 m-3 needs-validation" id="formularioDatos" novalidate action="{{route('Boton')}}" method="post">
        @csrf
        <div>
            <label class="form-label" for="nombre">Inserta nombre</label>
            <input class="form-control"type="text" name="nombre" id="nombre" value="{{ old('nombre')}}" required><br>
            @error('nombre')
                <p >{{$message}}</p>
            @enderror
        </div>
        <div >
            <label class="form-label" for="">Inserta apellido paterno</label>
            <input class="form-control" type="text" name="apellidoPat" id="apellidoMat" value="{{ old('apellidoPat')}}" required><br>
            @error('apellidoPat')
                <p >{{$message}}</p>
            @enderror
        </div>
        <div >
            <label class="form-label" for="">Inserta apellido materno</label>
            <input class="form-control" type="text" name="apellidoMat" id="apellidoPat" value="{{ old('apellidoMat')}}" required><br>
            @error('apellidoMat')
                <p >{{$message}}</p>
            @enderror
        </div>
        <div >
            <label class="form-label" for="">Inserta correo electronico</label>
            <input class="form-control" type="email" name="correo" id="correo" value="{{ old('correo')}}" required><br>
            @error('correo')
                <p >{{$message}}</p>
            @enderror
        </div>
        <div >
            <label class="form-label" for="">Inserta numero de celular</label>
            <input class="form-control" type="text" name="celular" id="celular" value="{{ old('celular')}}" required><br>
            @error('celular')
                <p >{{$message}}</p>
            @enderror
        </div>
        <input type="submit" class="btn btn-outline-light">
    </form>

</div>
@endsection
