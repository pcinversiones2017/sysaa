<?php

use Illuminate\Database\Seeder;
use App\Models\Normativa;

class NormativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Normativa::create(['tipoNormativa'=>'LEY'
            ,'nombre'=>'LEY ORGÁNICA DEL SISTEMA NACIONAL DE CONTROL Y LA CONTRALORÍA GENERAL DE LA REPÚBLICA'
            ,'numero'=>'27785'
            ,'fecha'=>'2002-07-24'
            ,'codTipNorm'=>'2'
        ]);
        Normativa::create(['tipoNormativa'=>'LEY'
            ,'nombre'=>'LEY DE CONTROL INTERNO DE LAS ENTIDADES DEL ESTADO'
            ,'numero'=>'28716'
            ,'fecha'=>'2006-03-27'
            ,'codTipNorm'=>'2'
        ]);
        Normativa::create(['tipoNormativa'=>'RESOLUCIÓN'
            ,'nombre'=>'NORMAS DE CONTROL INTERNO'
            ,'numero'=>'320-2006-CG'
            ,'fecha'=>'2006-04-11'
            ,'codTipNorm'=>'2'
        ]);
        Normativa::create(['tipoNormativa'=>'RESOLUCIÓN'
            ,'nombre'=>'NORMAS GENERALES DE CONTROL GUBERNAMENTAL'
            ,'numero'=>'273-2014-CG'
            ,'fecha'=>'2014-05-14'
            ,'codTipNorm'=>'2'
        ]);
        Normativa::create(['tipoNormativa'=>'RESOLUCIÓN'
            ,'nombre'=>'DIRECTIVA DE AUDITORÍA DE CUMPLIMIENTO'
            ,'numero'=>'320-2006-CG'
            ,'fecha'=>'2015-01-02'
            ,'codTipNorm'=>'2'
        ]);
        Normativa::create(['tipoNormativa'=>'RESOLUCIÓN'
            ,'nombre'=>'MANUAL DE AUDITORÍA DE CUMPLIMIENTO'
            ,'numero'=>'473-2014-CG'
            ,'fecha'=>'2015-01-02'
            ,'codTipNorm'=>'2'
        ]);

    }
}
