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
            $answerCode = $respuesta->json();

            switch ($answerCode) {
                case '200':
                    return redirect()->route('MEjemplo')->with('alert',['Ingresado correctamente',''. $answerCode,'success']);
                    //return redirect()->back()->withInput()->with('alert',['Ingresado correctamente',''. $answerCode,'success']);
                    break;
                case '45000':
                    //return redirect()->route('MEjemplo')->with('alert',['Correo ya existente','No puede ingresar un correo ya existente'. $answerCode,'warning']);
                    return redirect()->back()->withInput()->with('alert',['Correo ya existente','No puede ingresar un correo ya existente'. $answerCode,'warning']);
                    break;
                    case '45001':
                        //return redirect()->route('MEjemplo')->with('alert',['Numero de celular ya existente','No puede ingresar un numero de telefono ya existente'. $answerCode,'warning']);
                        return redirect()->back()->withInput()->with('alert',['Numero de celular ya existente','No puede ingresar un numero de telefono ya existente'. $answerCode,'warning']);
                        break;
                default:
                    //return redirect()->route('MEjemplo')->with('alert', ['Error', ''. $answerCode, 'error']);
                    return redirect()->back()->withInput()->with('alert', ['Error', ''. $answerCode, 'error']);
                    break;
            }            //code...
        } catch (\Exception $th) {
            return redirect()->route('MEjemplo')->with('alert', ['Error', ''. $th->getMessage() ,'error']);
        }

        //return redirect()->route('MEjemplo')->with('alert',['Boton presionado',$request['nombre'],'error']);
    }
}
