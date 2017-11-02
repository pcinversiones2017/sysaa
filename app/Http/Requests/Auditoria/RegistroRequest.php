<?php

namespace App\Http\Requests\Auditoria;

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

        'nombrePlanF'               => 'required| min:5',
        'codigoServicioCP'          => 'required',
        'tipoServicioCP'            => 'required',
        'organoCI'                  => 'required',
        'origen'                    => 'required',
        'entidadAuditada'           => 'required',
        'tipoDemanda'               => 'required',
        //'fechaIniPlanF'     => 'required',
        //'fechaFinPlanF'     => 'required',
        //'periodoIniPlanF'   => 'required',
        //'periodoFinPlanF'   => 'required',
        'codPlanA'                  => 'required',
        'estadoAuditoria'           => 'pendiente',
        'nombreObjetivoGeneral'     => 'required'
        ];
    }
}
