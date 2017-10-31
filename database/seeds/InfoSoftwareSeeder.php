<?php

use Illuminate\Database\Seeder;

class InfoSoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Info_Software::create(['nombre_software' => 'Sistema de auditoria academica',
            'version_software'=>'version 1.0']);
    }
}
