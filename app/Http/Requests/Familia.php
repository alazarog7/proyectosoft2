<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Familia extends FormRequest
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
            'NOMBRE' => 'required|unique:TCPD_ITEM,NOMBRE|min:5'
        ];
    }
    public function messages()
    {
        return [
            'NOMBRE.unique'=>'El nombre ya existe',
            'NOMBRE.required'=>'Debe ingresar un nombre mayor a 5 caracteres',
        ];
    }
}
