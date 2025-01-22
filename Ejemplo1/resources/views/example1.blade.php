
@extends('layout.template')
@section('Titulo', 'Ejempllo')
@section('contenido')
<div class="d-flex justify-content-center text-white" >
    <form class="w-25 m-3" action="{{route('Boton')}}" method="post">
        @csrf
        <div>
            <label class="form-label" for="">Inserta nombre</label>
            <input class="form-control"type="text" name="nombre" id="nombre"><br>
        </div>
        <div >
            <label class="form-label" for="">Inserta apellido paterno</label>
            <input class="form-control" type="text" name="apellidoPat" id="apellidoMat"><br>
        </div>
        <div >
            <label class="form-label" for="">Inserta apellido materno</label>
            <input class="form-control" type="text" name="apellidoMat" id="apellidoPat"><br>
        </div>
        <div >
            <label class="form-label" for="">Inserta correo electronico</label>
            <input class="form-control" type="text" name="correo" id="correo"><br>
        </div>
        <div >
            <label class="form-label" for="">Inserta numero de celular</label>
            <input class="form-control" type="text" name="celular" id="celular"><br>
        </div>
        <input type="submit" class="btn btn-outline-light">
    </form>

</div>
@endsection
