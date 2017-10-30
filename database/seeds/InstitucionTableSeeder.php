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
        Institucion::create(['nombreInstitucion'=>'Universidad Nacional de Huancavelica','estado'=>'1']);

    }
}
