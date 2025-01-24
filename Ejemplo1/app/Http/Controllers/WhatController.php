<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioAPI;
use App\Mail\mailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

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

            $apiSend =[
                'nombre' => $apidata['nombre'],
                'apellidoPat' => $apidata['apellidoPat'],
                'apellidoMat' => $apidata['apellidoMat'],
                'correo' => $apidata['correo'],
                'celular' => $apidata['celular'],
            ];
            $correoDest = $apidata['correoDestino'];

            $respuesta = Http::post('http://192.168.1.155/v4/Portal/insertUserPruebas',$apiSend);
            $answerCode = $respuesta->json();
            //dd($answerCode);
            switch ($answerCode) {
                case '200':
                    Mail::to($correoDest)->send(new mailController($apiSend));
                    return redirect()->route('MEjemplo')->with('alert',['Ingresado correctamente',''. $answerCode,'success']);

                    break;
                case '45000':

                    return redirect()->back()->withInput()->with('alert',['Correo ya existente','No puede ingresar un correo ya existente'. $answerCode,'warning']);
                    break;
                 case '45001':

                    return redirect()->route('MEjemplo')->withInput()->with('alert',['Numero de celular ya existente','No puede ingresar un numero de telefono ya existente'. $answerCode,'warning']);
                    break;
                default:

                    return redirect()->back()->withInput()->with('alert', ['Error', ''. $answerCode, 'error']);
                    break;
            }            //code...
        } catch (\Exception $th) {
            return redirect()->route('MEjemplo')->with('alert', ['Error', ''. $th->getMessage() ,'error']);
        }

    }
}
