<?php

use Illuminate\Database\Seeder;
use App\Models\TipoNormativa;


class tipoNormativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoNormativa::create(['nombre'=>'NORMATIVA APLICABLE A LA ENTIDAD Y MATERIA(S) A EXAMINAR','estado'=>'ACTIVO']);
        TipoNormativa::create(['nombre'=>'NORMATIVA QUE REGULA LA AUDITORÍA DE CUMPLIMIENTO','estado'=>'ACTIVO']);
    }
}
