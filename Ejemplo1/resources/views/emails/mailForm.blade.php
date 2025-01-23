@extends('layout.template')
@section('Titulo', 'Ejempllo')
@section('contenido')
<h1>Nueva entrada</h1>

<h3>Nombre: {{$formData['nombre']}}</h3>
<h3>Apellido Paterno: {{$formData['apellidoPat']}}</h3>
<h3>Apellido Materno: {{$formData['apellidoMat']}}</h3>
<h3>Correo: {{$formData['correo']}}</h3>
<h3>Celular: {{$formData['celular']}}</h3>
@endsection
