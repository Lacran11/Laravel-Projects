<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPUnit\Framework\returnSelf;

class FormularioAPI extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'nombre' => 'required|string|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚÑñ]{1,255}$/',
            'apellidoPat' => 'required|string|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚÑñ]{1,255}$/',
            'apellidoMat' => 'required|string|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚÑñ]{1,255}$/',
            'correo' => 'required|string|max:255|regex:/^[a-zA-Z0-9._@-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'celular' => 'required|string|max:255|regex:/^[0-9]{10}$/'
        ];
    }
    public function messages()
    {
        return[
            'nombre.required' => 'El nombre es mandatorio',
            'apellidoPat.required' => 'El Apellido paterno es mandatorio',
            'apellidoMat.required' => 'El Apellido materno es mandatorio',
            'correo.required' => 'El correo electronico es mandatorio',
            'celular.required' => 'El celular electronico es mandatorio',
            'nombre.regex' => 'El nombre es invalido',
            'apellidoPat.regex' => 'El Apellido paterno es invalido',
            'apellidoMat.regex' => 'El Apellido materno es invalido',
            'correo.regex' => 'El correo electronico es invalido',
            'celular.regex' => 'El celular es invalido',
        ];
    }
}
