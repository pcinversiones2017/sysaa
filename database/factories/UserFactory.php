<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'nombres' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'paterno' => $faker->lastName,
        'materno' => $faker->lastName,
        'eliminado' => false,
    ];
});



    $factory->define(App\Models\Plan::class, function (Faker $faker) {

        return [
            'nombrePlan' => 'PLAN 2017 '.$faker->randomNumber(),
        ];
    });



    $factory->define(App\Models\Auditoria::class, function (Faker $faker) {

        $planes = \App\Models\Plan::pluck('codPlanA');
        $periodoInicio = $faker->date($format = 'Y-m-d');
        $periodoFinPlanF = strtotime('+3 month', strtotime($periodoInicio));
        $periodoFinPlanF = date('Y-m-d', $periodoFinPlanF);


        return [
            'nombrePlanF' => 'Auditoria ' . $faker->numberBetween(1, 5),
            'codigoServicioCP' => $faker->randomNumber() . '-4669-2016-001',
            'tipoServicioCP' => 'AUDITORÍA DE CUMPLIMIENTO',
            'organoCI' => 'OCI – Z.R.N°XIII',
            'entidadAuditada' => 'ZONA REGISTRAL N°XIII SEDE TACNA',
            'origen' => 'LA AUDITORÍA DE CUMPLIMIENTO A LA ZONA REGISTRAL N°XIII SEDE TACNA, CORRRESPONDE A UN SERVICIO DE CONTROL POSTERIOR PROGRAMADO EN EL PLAN ANUAL DE CONTROL 2016 DEL ÓRGANO DE CONTROL INSTITUCIONAL, APROBADO MEDIANTE RESOLUCIÓN DE CONTRALORÍA N° 067-2016-CG DEL 15 DE FEBRERO DE 2016, REGISTRADO EN EL SISTEMA SCG, CON EL CÓDIGO N° 2-4669-2016-001. LA COMISIÓN AUDITORA COMUNICÓ EL INICIO DE LA AUDITORÍA CON EL OFICIO N° 021-2016/Z.R.N°XIII-OCI DE 1 DE ABRIL DE 2016.',
            'tipoDemanda' => $faker->sentence($nbWords = 2, $variableNbWords = true),
           'periodoIniPlanF' => $periodoInicio,
             'periodoFinPlanF' => $periodoFinPlanF,
            'estadoAuditoria' => $faker->randomElement($array = array('PENDIENTE', 'ACTIVO', 'TERMINADO')),
            'codPlanA' => $planes->random(),
        ];
    });




    $factory->define(App\Models\ObjetivoGeneral::class, function (Faker $faker) {

        $auditorias = \App\Models\Auditoria::pluck('codPlanF');

        return [
            'nombre' => $faker->sentence($nbWords = 2, $variableNbWords = true),
            'codPlanF' => $auditorias->random(),
        ];
    });




    $factory->define(App\Models\Macroproceso::class, function (Faker $faker) {


        return [
            'Nombre' => 'Macroproceso ' . $faker->numberBetween(1, 5),
            'estado' => 'activo',
        ];
    });




    $factory->define(App\Models\ObjetivoEspecifico::class, function (Faker $faker) {

        $objetivoGeneral = \App\Models\ObjetivoGeneral::pluck('codObjGen');
        $macroProcesos = \App\Models\Macroproceso::pluck('codMacroP');

        return [
            'Nombre' => 'objetivo especifico ' . $faker->numberBetween(1, 5),
            'materia' => $faker->sentence($nbWords = 4, $variableNbWords = true),
            'codObjGen' => $objetivoGeneral->random(),
            'codMacroP' => $macroProcesos->random(),
        ];
    });




    $factory->define(App\Models\Procesoma::class, function (Faker $faker) {

        $macroProcesos = \App\Models\Macroproceso::pluck('codMacroP');

        return [
            'Nombre' => $faker->sentence($nbWords = 3, $variableNbWords = true),
            'estado' => 'activo',
            'codMacroP' => $macroProcesos->random(),

        ];
    });



    $factory->define(App\Models\Subproceso::class, function (Faker $faker) {

        $procesos_ma = \App\Models\Procesoma::pluck('codProMa');

        return [
            'Nombre' => $faker->sentence($nbWords = 2, $variableNbWords = true),
            'estado' => 'activo',
            'codProMa' => $procesos_ma->random(),

        ];
    });


    $factory->define(App\Models\Procedimientosp::class, function (Faker $faker) {

        $subprocesos = \App\Models\Subproceso::pluck('codSubPro');

        return [
            'Nombre' => $faker->sentence($nbWords = 3, $variableNbWords = true),
            'codSubPro' => $subprocesos->random(),

        ];
    });



    $factory->define(App\Models\Actividad::class, function (Faker $faker) {

        $procedimientosp = \App\Models\Procedimientosp::pluck('codProSP');

        return [
            'Responsable' => $faker->name(),
            'Nombre' => $faker->lastName(),
            'codProSP' => $procedimientosp->random(),

        ];
    });



    $factory->define(App\Models\Usuariorol::class, function (Faker $faker) {

        $users = \App\User::pluck('codUsu');
        $cargofuncional = \App\Models\ObjetivoEspecifico::pluck('codCarFun');
        $roles = \App\Models\Rol::pluck('codRol');


        return [
            'codUsu' => $users->random(),
            'codRol' => $roles->random(),
            'codCarFun' => $cargofuncional->random(),
            'estado' => 'activo'

        ];
    });



    $factory->define(App\Models\Procedimiento::class, function (Faker $faker) {

        $objetivoGeneral = \App\Models\ObjetivoGeneral::pluck('codObjGen');
        $objetivoespecifico = \App\Models\ObjetivoEspecifico::pluck('codObjEsp');
        $usuarioRol = \App\Models\Usuariorol::pluck('codUsuRol');

        return [
            'justificacion' => $faker->paragraph(),
            'detalle' => $faker->paragraph(),
            'fechafin' => $faker->date($format = 'Y-m-d'),
            'codObjEsp' => $objetivoespecifico->random(),
            'codObjGen' => $objetivoGeneral->random(),
            'codUsuRol' => $usuarioRol->random(),

        ];
    });


    $factory->define(App\Models\Informe::class, function (Faker $faker) {

        $procedimientos = \App\Models\Procedimiento::pluck('codProc');

        return [
            'informe' => $faker->paragraph(),
            'elaborado' => $faker->date($format = 'Y-m-d'),
            'revisado' => $faker->date($format = 'Y-m-d'),
            'supervisado' => $faker->date($format = 'Y-m-d'),
            'codProc' => $procedimientos->random(),

        ];
    });



    $factory->define(App\Models\Cronograma::class, function (Faker $faker) {

        $auditorias = \App\Models\Auditoria::pluck('codPlanF');
        $etapa = \App\Models\Etapa::pluck('codEtp');
        for ($j = 1; $j <= 13; $j++){
        return [
            'codEtp' => $j,
            $fechaIni = $faker->date($format = 'Y-m-d'),
            'fechaIni' => $fechaIni,
            $fechaFin = strtotime('+3 month', strtotime($fechaIni)),
            $fechaFin = date('Y-m-d', $fechaIni),
            'fechaFin' => $fechaFin,
            'codPlanf' => $auditorias->random(),
            'dias_habiles' => $faker->randomNumber(),

        ];
      }
    });


$factory->define(App\Models\NormativaMarcoproceso::class, function (Faker $faker) {

    $normativas = \App\Models\Normativac::pluck('codNorm');
    $macroProcesos =\App\Models\Macroproceso::pluck('codMacroP');

    return [
        'codNorm'  => $normativas->random(),
        'codMacroP' => $macroProcesos->random(),

    ];
});

$factory->define(App\Models\Normativac::class, function (Faker $faker) {

    $tipoNormativas = \App\Models\TipoNormativa::pluck('codTipNorm');

    return [
        'tipoNormativa'  => $faker->text(),
        'nombre' => $faker->paragraph(),
        'numero' =>  $faker->randomNumber(),
        'fecha' => $faker->date($format = 'Y-m-d'),
        'codTipNorm' => $tipoNormativas->random(),

    ];
});









