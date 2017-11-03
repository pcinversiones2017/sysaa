<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');


        $this->call([

            EtapaTableSeeder::class,
            RolTableSeeder::class,
            UsuarioTableSeeder::class,
            CargoFuncionalTableSeeder::class,
            AsignacionTableSeeder::class,
            tipoNormativaSeeder::class,
            NormativaCSeeder::class,
            InstitucionTableSeeder::class,
            InfoSoftwareSeeder::class,
           // MacroprocesoSeeder::class,
            //ProcesomaSeeder::class,
            //SubprocesoSeeder::class,
            //ProcedimientospSeeder::class,
         //   ActividadesSeeder::class
            ]);

        factory('App\Models\Plan', 3)->create();
        //factory('App\Models\Auditoria', 5)->create();

        factory('App\Models\ObjetivoGeneral', 10)->create();
    /*
        factory('App\Models\Macroproceso', 5)->create();
        factory('App\Models\ObjetivoEspecifico', 5)->create();
        factory('App\Models\Procesoma', 5)->create();
        factory('App\Models\Subproceso', 10)->create();
        factory('App\Models\Procedimientosp', 10)->create();
        factory('App\Models\Actividad', 10)->create();
        factory('App\Models\Usuariorol', 5)->create();
        factory('App\Models\Procedimiento', 6)->create();
        factory('App\Models\Informe', 10)->create();
        factory('App\Models\Cronograma',65)->create();
        factory('App\Models\Normativac', 10)->create();
        factory('App\Models\NormativaMarcoproceso', 15)->create();
*/


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
