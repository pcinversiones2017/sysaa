<?php

namespace App\Http\Requests\Procedimiento;

use Illuminate\Foundation\Http\FormRequest;

class ValidarRequest extends FormRequest
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
            'justificacion' => 'required|min:3',
            'detalle'       => 'required|min:3',
            'fechafin'      => 'required'
        ];
    }
}
