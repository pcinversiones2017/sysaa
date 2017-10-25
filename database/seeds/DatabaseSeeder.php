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
        DB::table('etapa')->insert([
            'nombre' => 'ACREDITACIÓN E INSTALACIÓN DE LA COMISIÓN AUDITORA CGR / 
            COMUNICACIÓN POR ESCRITO DEL INICIO DE LA AUDITORÍA AL TITULAR DE 
            LA ENTIDAD POR LA COMISIÓN AUDITORA OCI.',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'PLANIFICACIÓN'
        ]);
        DB::table('etapa')->insert([
            'nombre' => 'COMPRENSIÓN DE LA ENTIDAD Y LA(S) MATERIA(S) A EXAMINAR,
            ESTABLECIENDO OBJETIVO(S) ESPECÍFICO(S) Y PROCEDIMIENTOS DE
            AUDITORÍA.',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'PLANIFICACIÓN'
        ]);
        DB::table('etapa')->insert([
            'nombre' => 'ELABORACIÓN Y APROBACIÓN DEL PLAN DE AUDITORÍA DEFINITIVO.',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'PLANIFICACIÓN'

        ]);
        DB::table('etapa')->insert([
            'nombre' => 'REGISTRO DEL PLAN DE AUDITORÍA DEFINITIVO.',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'PLANIFICACIÓN'
        ]);


 //tipo Ejecucion

        DB::table('etapa')->insert([
            'nombre' => 'DEFINICIÓN DE LA MUESTRA DE AUDITORÍA.',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'EJECUCIÓN'
        ]);
        DB::table('etapa')->insert([
            'nombre' => 'DESARROLLO DE LOS PROCEDIMIENTOS DE AUDITORÍA.',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'EJECUCIÓN'
        ]);

        DB::table('etapa')->insert([
            'nombre' => 'IDENTIFICACIÓN DE LAS DESVIACIONES DE CUMPLIMIENTO
             (ELABORACIÓN, DISCUSIÓN Y APROBACIÓN DE LA MATRIZ DE LAS DESVIACIONES DE
             CUMPLIMIENTO).',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'EJECUCIÓN'
        ]);
        DB::table('etapa')->insert([
            'nombre' => 'ELABORACIÓN DE LAS DESVIACIONES DE CUMPLIMIENTO.',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'EJECUCIÓN'
        ]);
        DB::table('etapa')->insert([
            'nombre' => 'COMUNICACIÓN DE LAS DESVIACIONES DE CUMPLIMIENTO Y EVALUACIÓN DE COMENTARIOS.',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'EJECUCIÓN'
        ]);
        DB::table('etapa')->insert([
            'nombre' => 'REGISTRO DEL CIERRE DE LA EJECUCIÓN.',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'EJECUCIÓN'

        ]);

        //tipo ELABORACIÓN DEL INFORME


        DB::table('etapa')->insert([
            'nombre' => 'ELABORACIÓN DEL INFORME.',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'ELABORACIÓN DEL INFORME'
        ]);
        DB::table('etapa')->insert([
            'nombre' => 'REVISIÓN, APROBACIÓN Y COMUNICACIÓN.',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'ELABORACIÓN DEL INFORME'
        ]);
        DB::table('etapa')->insert([
            'nombre' => 'REGISTRO DEL INFORME.',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'ELABORACIÓN DEL INFORME'
        ]);

    }
}
