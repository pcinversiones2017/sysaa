<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 15/11/17
 * Time: 11:00 AM
 */
use Illuminate\Database\Seeder;
use App\Models\EstadoAuditoria;

class EstadoAuditoriaTableSeed extends Seeder
{
    public function run()
    {
        EstadoAuditoria::create(['nombre' => 'PENDIENTE', 'label' => 'warning']);
        EstadoAuditoria::create(['nombre' => 'PENDIENTE DE APROBACIÓN', 'label' => 'plain']);
        EstadoAuditoria::create(['nombre' => 'EN PROCESO', 'label' => 'information']);
        EstadoAuditoria::create(['nombre' => ' FINALIZADO', 'label' => 'primary']);
    }
}