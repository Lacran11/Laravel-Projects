<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatController extends Controller
{
    public function mostrarEjemplo() {
        return view('example1');
     }
    //

    public function GuardarEjemplo(Request $request) {
        try {
            $respuesta = Http::post('http://192.168.1.155/v4/Portal/insertUserPruebas',$request);
            $answerCode = $respuesta->json();
            switch ($answerCode) {
                case '200':
                    return redirect()->route('MEjemplo')->with('alert',['Ingresado correctamente',''. $answerCode,'success']);
                    break;
                case '45000':
                    # code...
                    break;
                    case '45001':

                        break;
                default:
                    return redirect()->route('MEjemplo')->with('alert', ['Error', ''. $answerCode, 'error']);
                    break;
            }            //code...
        } catch (\Exception $th) {
            return redirect()->route('MEjemplo')->with('alert', ['Error', ''. $th->getMessage() ,'error']);
        }

        //return redirect()->route('MEjemplo')->with('alert',['Boton presionado',$request['nombre'],'error']);
    }
}
