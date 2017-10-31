<?php

namespace App\Http\Requests\Normativa;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarRequest extends FormRequest
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
            'tipoNormativa'   => 'required|min:3',
            'numero'   => 'required|min:3',
            'nombre'   => 'required|min:3',


        ];
    }
}
