<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DatosCompradorRequest extends Request
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
            'nombre' => 'required|min:3|max:45',
            'apellido' => 'required|min:3|max:45',
            'email' => 'required|email|between:5,150',
            'telefono' => 'required|min:3|max:45',
            'domicilio' => 'required|min:3|max:250',
            'localidad' => 'required|min:3|max:150',
            'provincia' => 'required|min:3|max:100'
        ];
    }
}
