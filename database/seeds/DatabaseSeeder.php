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
            NormativaSeeder::class,
            InstitucionTableSeeder::class,
            InfoSoftwareSeeder::class,
            EstadoTableSeeder::class,
           // MacroprocesoSeeder::class,
            //ProcesomaSeeder::class,
            //SubprocesoSeeder::class,
            //ProcedimientospSeeder::class,
         //   ActividadesSeeder::class
            ]);

//        factory(\App\Models\Plan::class, 3)->create()->each(function ($planes) {
//
//           factory(\App\Models\Auditoria::class, 2)->create(['codPlanA'=>$planes->codPlanA]);
//
//
//        });
//
//        factory(\App\Models\Auditoria::class)->create()->each(function ($auditorias) {
//
//            factory(\App\Models\ObjetivoGeneral::class)->create(['codPlanF'=>$auditorias->codPlanF]);
//
//
//        });
//
//        factory(\App\Models\ObjetivoGeneral::class)->create()->each(function ($objetivoGeneral) {
//
//            factory(\App\Models\ObjetivoEspecifico::class,3)->create(['codObjGen'=>$objetivoGeneral->codObjGen]);
//
//
//        });
//
//        factory(\App\Models\Macroproceso::class)->create()->each(function ($macroProcesos) {
//
//            factory(\App\Models\ObjetivoEspecifico::class)->create(['codMacroP'=>$macroProcesos->codMacroP]);
//
//
//        });


  //     factory('App\Models\Auditoria', 5)->create();

       // factory('App\Models\ObjetivoGeneral')->create();

        // factory('App\Models\Macroproceso', 5)->create();
     //   factory(\App\Models\ObjetivoGeneral::class, 5)->create()->each(function ($objetivoGeneral) {
            //create 5 posts for each user
       //     factory(\App\Models\ObjetivoEspecifico::class, 3)->create(['codObjGen'=>$objetivoGeneral->codObjGen]);
       // });

      /*
        factory(\App\Models\Auditoria::class, 4)->create()->each(function ($auditoria) {
            //create 5 posts for each user
            factory(\App\Models\Usuariorol::class, 3)->create(['codPlanF'=>$auditoria->codPlanF]);
        });
*/
        /*
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
    //    factory('App\Models\Plan', 2)->create();
//        factory('App\Models\Auditoria', 5)->create();
//        factory('App\Models\ObjetivoGeneral', 3)->create();
//        factory('App\Models\Macroproceso', 5)->create();
//        factory('App\Models\ObjetivoEspecifico', 5)->create();
//        factory('App\Models\Procesoma', 5)->create();
//        factory('App\Models\Subproceso', 10)->create();
//        factory('App\Models\Procedimientosp', 10)->create();
//        factory('App\Models\Actividad', 10)->create();
//        factory('App\Models\Usuariorol', 5)->create();
//        factory('App\Models\Procedimiento', 6)->create();
//        factory('App\Models\Informe', 10)->create();
//        factory('App\Models\Cronograma',65)->create();
//        factory('App\Models\Normativac', 10)->create();
//        factory('App\Models\NormativaMarcoproceso', 15)->create();



        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
