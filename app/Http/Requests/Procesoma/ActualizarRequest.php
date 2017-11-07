<?php

namespace App\Http\Requests\Procesoma;

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
            'nombre'               => 'required| min:3',
        ];

    }

    public function messages()
    {
        return [
            'nombre.required'    => 'El nombre del proceso es requerido',
            'nombre.min'         => 'El nombre del proceso debe tener minimo :min caracteres'
        ];
    }
}
