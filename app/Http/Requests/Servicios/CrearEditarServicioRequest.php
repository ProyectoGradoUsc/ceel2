<?php

namespace App\Http\Requests\Servicios;

use Illuminate\Foundation\Http\FormRequest;

class CrearEditarServicioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codigo' => [
                'required',
                'max:20'],
            'nombre' => [
                'required',
                'max:50'
            ]
        ]; 
    }

    //JAP 28 oct 2018 , retorna los mensajes de error
    public function messages()
    {
        return [
            'codigo.required' => 'Campo vacio.Debe de escribir un código.',
            'codigo.max' => 'Texto muy largo.Debe de escribir un texto no mayor a 20 caracteres',
            'nombre.required' => 'Campo vacio.Debe de escribir un código.',
            'nombre.max' => 'Texto muy largo.Debe de escribir un texto no mayor a 50 caracteres'
        ];
    }
}
