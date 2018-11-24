<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Item extends FormRequest
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
            'CODIGO_ACTIVO'=>'required',
            'NOMBRE'=>'required',
            'IP'=>'required|ip',
            'CODIGO_SAF'=>'required',
            'PASSWORD'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'CODIGO_ACTIVO.required'=>'Llenar el campo',
            'NOMBRE.required'=>'Lelnar el campo',
            'IP.required'=>'Llenar el campo',
            'IP.ip'=>'Debe ser IP',
            'CODIGO_SAF.required'=>'Llenar el campo',
            'PASSWORD'=>'Llenar el campo',
        ];
    }
}
