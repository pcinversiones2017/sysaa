<?php

namespace App\Http\Requests\Actividad;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarRequest extends FormRequest
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
            'responsable'          => 'required'

        ];

    }

    public function messages()
    {
        return [
            'nombre.required'    => 'El detalle de actividad es requerido',
            'nombre.min'         => 'El detalle de actividad debe tener minimo :min caracteres'
        ];
    }
}
