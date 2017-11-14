<?php

use Illuminate\Database\Seeder;
use App\Models\Institucion;


class InstitucionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Institucion::create(['nombre'=>'UNIVERSIDAD NACIONAL DE HUANCAVELICA','estado'=>'1']);

    }
}
