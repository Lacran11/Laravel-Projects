@extends('layout.template')
@section('Titulo', 'API Plantillas')
@section('contenido')
<div>
    <div id="contImagenes" class="row row-cols-1 row-cols-md-5 g-5">
        @if (@isset($error))
            <p>No se pudo mostrar la informacion {{$error}}</p>
        @else
            @foreach ($data as $elementos)
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="{{$elementos['imagen_url']}}" alt="{{$elementos['id_carrusel']}}">
                    <div class="card-body">
                        <h2 class="card-title"></h2>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>

@endsection
