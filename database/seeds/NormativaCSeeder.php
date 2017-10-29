<?php

use Illuminate\Database\Seeder;
use App\Models\Normativac;

class NormativaCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Normativac::create(['tipoNormativa'=>'LEY'
            ,'nombre'=>'LEY ORGÁNICA DEL SISTEMA NACIONAL DE CONTROL Y LA CONTRALORÍA GENERAL DE LA REPÚBLICA'
            ,'numero'=>'27785'
            ,'fecha'=>'2002-07-24'
            ,'codTipNorm'=>'2'
        ]);
        Normativac::create(['tipoNormativa'=>'LEY'
            ,'nombre'=>'LEY DE CONTROL INTERNO DE LAS ENTIDADES DEL ESTADO'
            ,'numero'=>'28716'
            ,'fecha'=>'2006-03-27'
            ,'codTipNorm'=>'2'
        ]);
        Normativac::create(['tipoNormativa'=>'RESOLUCIÓN'
            ,'nombre'=>'NORMAS DE CONTROL INTERNO'
            ,'numero'=>'320-2006-CG'
            ,'fecha'=>'2006-04-11'
            ,'codTipNorm'=>'2'
        ]);
        Normativac::create(['tipoNormativa'=>'RESOLUCIÓN'
            ,'nombre'=>'NORMAS GENERALES DE CONTROL GUBERNAMENTAL'
            ,'numero'=>'273-2014-CG'
            ,'fecha'=>'2014-05-14'
            ,'codTipNorm'=>'2'
        ]);
        Normativac::create(['tipoNormativa'=>'RESOLUCIÓN'
            ,'nombre'=>'DIRECTIVA DE AUDITORÍA DE CUMPLIMIENTO'
            ,'numero'=>'320-2006-CG'
            ,'fecha'=>'2015-01-02'
            ,'codTipNorm'=>'2'
        ]);
        Normativac::create(['tipoNormativa'=>'RESOLUCIÓN'
            ,'nombre'=>'MANUAL DE AUDITORÍA DE CUMPLIMIENTO'
            ,'numero'=>'473-2014-CG'
            ,'fecha'=>'2015-01-02'
            ,'codTipNorm'=>'2'
        ]);


        Normativac::create(['tipoNormativa'=>'Ley'
            ,'nombre'=>'Creación del Sistema Nacional de los Registros Públicos y la Superintendencia de los Registros Públicos '
            ,'numero'=>'26366'
            ,'fecha'=>'1996-12-11'
            ,'codTipNorm'=>'1'
        ]);
        Normativac::create(['tipoNormativa'=>'Resolución Suprema'
            ,'nombre'=>'Aprueba el Reglamento de Organización y Funciones de la SUNARP'
            ,'numero'=>'012-2013-JUS'
            ,'fecha'=>'2013-10-14'
            ,'codTipNorm'=>'1'
        ]);
        Normativac::create(['tipoNormativa'=>'RESOLUCIÓN'
            ,'nombre'=>'Aprueba el Manual de Organización y Funciones'
            ,'numero'=>'235-2005-SUNARP/SN'
            ,'fecha'=>'2005-06-06'
            ,'codTipNorm'=>'1'
        ]);


    }
}
