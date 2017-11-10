<?php

use Illuminate\Database\Seeder;

class EtapaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('etapa')->insert([
            'nombre' => '- ACREDITACIÓN E INSTALACIÓN DE LA COMISIÓN AUDITORA CGR / COMUNICACIÓN POR ESCRITO DEL INICIO DE LA AUDITORÍA AL TITULAR DE LA ENTIDAD POR LA COMISIÓN AUDITORA OCI.',
            'fecha_creado' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'PLANIFICACIÓN'
        ]);
        DB::table('etapa')->insert([
            'nombre' => '- COMPRENSIÓN DE LA ENTIDAD Y LA(S) MATERIA(S) A EXAMINAR, ESTABLECIENDO OBJETIVO(S) ESPECÍFICO(S) Y PROCEDIMIENTOS DE AUDITORÍA.',
            'fecha_creado' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'PLANIFICACIÓN'
        ]);
        DB::table('etapa')->insert([
            'nombre' => '- ELABORACIÓN Y APROBACIÓN DEL PLAN DE AUDITORÍA DEFINITIVO.',
            'fecha_creado' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'PLANIFICACIÓN'

        ]);
        DB::table('etapa')->insert([
            'nombre' => '- REGISTRO DEL PLAN DE AUDITORÍA DEFINITIVO.',
            'fecha_creado' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'PLANIFICACIÓN'
        ]);


        //tipo Ejecucion

        DB::table('etapa')->insert([
            'nombre' =>
                '- DEFINICIÓN DE LA MUESTRA DE AUDITORÍA
                 - DESARROLLO DE LOS PROCEDIMIENTOS DE AUDITORÍA.
                 - IDENTIFICACIÓN DE LAS DESVIACIONES DE CUMPLIMIENTO.
                 - ELABORACIÓN, DISCUSIÓN Y APROBACIÓN DE LA MATRIZ DE LAS DESVIACIONES DE CUMPLIMIENTO.
                 - ELABORACIÓN DE LAS DESVIACIONES DE CUMPLIMIENTO.
                 - COMUNICACIÓN DE LAS DESVIACIONES DE CUMPLIMIENTO Y EVALUACIÓN DE COMENTARIOS.
                 - REGISTRO DEL CIERRE DE LA EJECUCIÓN.
                ',
            'fecha_creado' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'EJECUCIÓN'
        ]);


        //tipo ELABORACIÓN DEL INFORME


        DB::table('etapa')->insert([
            'nombre' =>
                '- ELABORACIÓN DEL INFORME.
                 - REVISIÓN, APROBACIÓN Y COMUNICACIÓN.
                 - REGISTRO DEL INFORME.
                ',
            'fecha_creado' => now()->format('Y-m-d H:i:s'),
            'tipo' => 'ELABORACIÓN DEL INFORME'
        ]);

    }
}
