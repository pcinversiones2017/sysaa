<?php

namespace App\Http\Requests\CronogramaGeneral;
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
        $rules = [
            // put your static input fields here

        ];
        // your arrays can be done like this
        foreach($this->request->get('dias_habiles') as $key => $value)
        {
            $rules['dias_habiles.'.$key] = 'required'; // you can set rules for all the array items
        }

        return $rules;
    }
}
