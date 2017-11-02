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
    ];
});

$factory->define(App\Models\Plan::class, function (Faker $faker) {

    return [
        'nombrePlan' => 'PLAN 2017',
    ];
});

$factory->define(App\Models\Auditoria::class, function (Faker $faker) {

    return [
        'nombrePlanF' => 'Auditoria'. $faker->numberBetween(1,5),
        'codigoServicioCP' => $faker->randomNumber().'-4669-2016-001',
        'tipoServicioCP' => 'AUDITORÍA DE CUMPLIMIENTO',
        'organoCI' => 'OCI – Z.R.N°XIII',
        'entidadAuditada' => 'ZONA REGISTRAL N°XIII SEDE TACNA',
        'origen' => 'LA AUDITORÍA DE CUMPLIMIENTO A LA ZONA REGISTRAL N°XIII SEDE TACNA, CORRRESPONDE A UN SERVICIO DE CONTROL POSTERIOR PROGRAMADO EN EL PLAN ANUAL DE CONTROL 2016 DEL ÓRGANO DE CONTROL INSTITUCIONAL, APROBADO MEDIANTE RESOLUCIÓN DE CONTRALORÍA N° 067-2016-CG DEL 15 DE FEBRERO DE 2016, REGISTRADO EN EL SISTEMA SCG, CON EL CÓDIGO N° 2-4669-2016-001. LA COMISIÓN AUDITORA COMUNICÓ EL INICIO DE LA AUDITORÍA CON EL OFICIO N° 021-2016/Z.R.N°XIII-OCI DE 1 DE ABRIL DE 2016.',
        'tipoDemanda' => $faker->paragraph(),
          $periodoInicio = $faker->date($format = 'Y-m-d'),
        'periodoIniPlanF' => $periodoInicio,
        $periodoFinPlanF = strtotime ( '+3 month' , strtotime ( $periodoInicio ) ),
        $periodoFinPlanF = date ( 'Y-m-d' , $periodoFinPlanF ),
        'periodoFinPlanF' => $periodoFinPlanF,
        'estadoAuditoria' => $faker->randomElement($array = array ('PENDIENTE','ACTIVO','TERMINADO')),

    ];
});




