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
            //UsuarioTableSeeder::class,
            //CargoFuncionalTableSeeder::class,
            //AsignacionTableSeeder::class,
            tipoNormativaSeeder::class,
            NormativaCSeeder::class,
            ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
