<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">

                <div class="row">
                    <div class="col-sm-3">

                        @if($auditoria->cronogramaGeneral->isEmpty())
                        <a type="button" href="{{url('cronograma/crear', $auditoria->codPlanF )}}" class="btn btn-sm btn-success btn-outline"><i class="fa fa-pencil"></i> CREAR CRONOGRAMA</a>
                        @else
                        <a type="button" href="{{url('cronograma/editar', $auditoria->codPlanF)}}" class="btn btn-sm btn-success btn-outline"><i class="fa fa-edit"></i> EDITAR CRONOGRAMA</a>
                        @endif
                    </div>
                </div>

                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>ACTIVIDADES</th>
                        <th>FECHA INICIO</th>
                        <th>FECHA FIN</th>
                        <th>DÍAS HÁBILES</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $aux = '' ?>
                    @foreach($auditoria->cronogramaGeneral as $cronograma)
                        @if($cronograma->etapa->tipo != $aux)
                            <tr><td>
                                    <label class="has-success">{{$cronograma->etapa->tipo}}</label>
                                </td>
                                @if($cronograma->etapa->tipo == \App\Models\Etapa::PLANIFICACION)
                                    <td style="text-align: center"><label class="has-success">{!! $auditoria->cronogramaGeneral[0]->fecha_ini ?? '' !!}</label></td>
                                    <td style="text-align: center"><label class="has-success">{!! $auditoria->cronogramaGeneral[3]->fecha_fin ?? '' !!}</label></td>
                                @elseif($cronograma->etapa->tipo == \App\Models\Etapa::EJECUCION)
                                    <td style="text-align: center"><label class="has-success">{!! $auditoria->cronogramaGeneral[4]->fecha_ini ?? '' !!}</label></td>
                                    <td style="text-align: center"><label class="has-success">{!! $auditoria->cronogramaGeneral[4]->fecha_fin ?? '' !!}</label></td>
                                @else
                                    <td style="text-align: center"><label class="has-success">{!! $auditoria->cronogramaGeneral[5]->fecha_ini ?? '' !!}</label></td>
                                    <td style="text-align: center"><label class="has-success">{!! $auditoria->cronogramaGeneral[5]->fecha_fin ?? '' !!}</label></td>
                                @endif
                                <td></td>
                            </tr>
                            <?php $aux = $cronograma->etapa->tipo?>
                        @endif
                        <tr>
                            <td>{!! nl2br($cronograma->etapa->nombre) !!}</td>
                            <td width="15%" style="vertical-align: middle; text-align: center;">{!! $cronograma->fecha_ini !!}</td>
                            <td width="15%" style="vertical-align: middle; text-align: center">{!! $cronograma->fecha_fin !!}</td>
                            <td style="vertical-align: middle; text-align: center">{!! $cronograma->dias_habiles !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>