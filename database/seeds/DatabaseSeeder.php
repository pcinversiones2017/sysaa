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

        factory('App\Models\Plan', 2)->create();
        factory('App\Models\Auditoria', 10)->create();
        factory('App\Models\ObjetivoGeneral', 4)->create();
        factory('App\Models\Macroproceso', 10)->create();
        factory('App\Models\ObjetivoEspecifico', 10)->create();
        factory('App\Models\Procesoma', 10)->create();
        factory('App\Models\Subproceso', 15)->create();
        factory('App\Models\Procedimientosp', 15)->create();
        factory('App\Models\Actividad', 15)->create();
        factory('App\Models\Usuariorol', 15)->create();
        factory('App\Models\Procedimiento', 15)->create();
        factory('App\Models\Informe', 10)->create();
        factory('App\Models\Cronograma', 10)->create();
        factory('App\Models\NormativaMarcoproceso', 15)->create();
        factory('App\Models\Normativac', 10)->create();




        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
