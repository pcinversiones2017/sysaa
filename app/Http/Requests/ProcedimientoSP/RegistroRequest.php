<?php

namespace App\Http\Requests\ProcedimientoSP;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
            'nombre'               => 'required| min:5',
        ];

    }

    public function messages()
    {
        return [
            'nombre.required'    => 'El nombre del procedimiento es requerido',
            'nombre.min'         => 'El nombre del procedimiento debe tener minimo :min caracteres'
        ];
    }
}
