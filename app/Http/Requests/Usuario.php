<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Usuario extends FormRequest
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
            'ROL'=>'required',
            'NOMBRE'=>'required|max:255',
            'APELLIDO'=>'required|max:255',
            'TELEFONO'=>'required|max:20',
            'EMAIL'=>'required|max:50',
            'USUARIO_ALIAS'=>'required|unique:TCPD_USUA,USUARIO_ALIAS|max:255',
            'PASSWORD'=>'required|max:255|min:3'
        ];
    }
    /**
     * Enviar mensajes
     *
     */
    public function messages()
    {
        return [
            'NOMBRE.required' => 'Debe ingresar el nombre',
            'APELLIDO.required'=>'Debe ingresar el apellido',
            'TELEFONO.required'=>'Debe ingresar el numero telefonico',
            'EMAIL.required'=>'Debe ingresar el email',
            'USUARIO_ALIAS.unique' => 'El nombre de usuario ya existe',
            'USUARIO_ALIAS.required'=>'Debe ingresar el nombre de usuario',
            'PASSWORD.required' => 'Debe ingresar un password',
            'PASSWORD.min' => 'El password debe contener al menos 3 caracteres'
        ];
    }
}
