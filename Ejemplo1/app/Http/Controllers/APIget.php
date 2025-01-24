<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

//use Illuminate\Support\Facades\Http;

class APIget extends Controller
{
    public function recuperarDatos(){

        $respuesta = Http::get('http://192.168.1.155/v4/Portal/ListaCarrusel');

        if ($respuesta->successful()) {

            $data = $respuesta->json();
            return view('APICarrusel', ['data' => $data]);
        }

    }
}
