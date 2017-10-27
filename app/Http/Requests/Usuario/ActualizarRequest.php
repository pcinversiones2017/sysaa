<?php

namespace App\Http\Requests\Usuario;

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
            return [
            'email'     => 'required|email|unique:usuarios',
            'nombres'   => 'required|min:3',
            'paterno'   => 'required|min:3',
            'materno'   => 'required|min:3'
        ];
        ];
    }
}
