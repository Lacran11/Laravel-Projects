<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatController extends Controller
{
    public function mostrarEjemplo() {
        return view('example1');
     }
    //
    protected function validacion(){


    }
    public function GuardarEjemplo(FormularioAPI $request) {
        //dd($request);
        try {
            $apidata = $request->validated();
            $respuesta = Http::post('http://192.168.1.155/v4/Portal/insertUserPruebas',$apidata);
            //$answerCode = $respuesta->json();

            switch ($respuesta) {
                case '200':
                    return redirect()->route('MEjemplo')->with('alert',['Ingresado correctamente',''. $respuesta,'success']);
                    break;
                case '45000':
                    dd($respuesta);
                    break;
                case '45001':
                    dd($respuesta);
                        break;
                default:
                    return redirect()->route('MEjemplo')->with('alert', ['Error', ''. $respuesta, 'error']);
                    break;
            }            //code...
        } catch (\Exception $th) {
            return redirect()->route('MEjemplo')->with('alert', ['Error', ''. $th->getMessage() ,'error']);
        }

        //return redirect()->route('MEjemplo')->with('alert',['Boton presionado',$request['nombre'],'error']);
    }
}
