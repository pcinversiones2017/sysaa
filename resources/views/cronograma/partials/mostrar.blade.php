<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">

                <div class="row">
                    <div class="col-sm-3">

                        @if($auditoria->cronogramaGeneral->isEmpty())
                        <a type="button" href="{{url('cronograma/crear')}}" class="btn btn-sm btn-success btn-outline"><i class="fa fa-pencil"></i> CREAR CRONOGRAMA</a>
                        @else
                        <a type="button" href="{{url('cronograma/editar', $auditoria->codPlanF)}}" class="btn btn-sm btn-success btn-outline"><i class="fa fa-edit"></i> EDITAR CRONOGRAMA</a>
                        @endif
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ACTIVIDADES</th>
                        <th>ETAPA</th>
                        <th>FECHA INICIO</th>
                        <th>FECHA FIN</th>
                        <th>DÍAS HÁBILES</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                    @foreach($auditoria->cronogramaGeneral as $cronograma)
                        <tr>
                            <td style="vertical-align: middle" >{{$i}}</td>
                            <td>{!! nl2br($cronograma->etapa->nombre) !!}</td>
                            <td width="15%" style="vertical-align: middle; text-align: center">{!! $cronograma->etapa->tipo !!}</td>
                            <td width="15%" style="vertical-align: middle; text-align: center;">{!! $cronograma->fecha_ini !!}</td>
                            <td width="15%" style="vertical-align: middle; text-align: center">{!! $cronograma->fecha_fin !!}</td>
                            <td style="vertical-align: middle; text-align: center">{!! $cronograma->dias_habiles !!}</td>
                        </tr>
                        <?php $i++ ?>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>