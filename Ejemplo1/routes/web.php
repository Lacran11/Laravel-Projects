<?php

use App\Http\Controllers\APIget;
use App\Http\Controllers\WhatController;
use Illuminate\Support\Facades\Route;

Route::get('/carusel',[APIget::class, 'recuperarDatos']) ->name('carusel');
Route::get('/',[WhatController::class, 'mostrarEjemplo']) ->name('MEjemplo');
Route::post('/guardar',[WhatController::class, 'GuardarEjemplo']) ->name('Boton');

//Route::get('');
