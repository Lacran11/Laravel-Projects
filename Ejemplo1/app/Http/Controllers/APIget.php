<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

//use Illuminate\Support\Facades\Http;

class APIget extends Controller
{
    public function recuperarDatos(){

        $API_URL = env('API_ENDPOINT_CARRUSEL');
        $respuesta = Http::get($API_URL);

        if ($respuesta->successful()) {

            $data = $respuesta->json();
            return view('APICarrusel', ['data' => $data]);
        }

    }
}
