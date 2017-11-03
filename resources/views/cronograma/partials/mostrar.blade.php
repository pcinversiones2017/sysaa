<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">

                @if($auditoria->cronogramaGeneral->isEmpty())
                <div class="row">
                    <div class="col-sm-3">
                        <a type="button" href="{{url('cronograma/crear')}}" class="btn btn-sm btn-primary btn-outline"><i class="fa fa-plus"></i> CREAR CRONOGRAMA</a>
                    </div>
                </div>
                @endif
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
                            <td>{{$i}}</td>
                            <td>{!! $cronograma->etapa->nombre !!}</td>
                            <td>{!! $cronograma->etapa->tipo !!}</td>
                            <td width="10%">{!! $cronograma->fechaIni !!}</td>
                            <td width="10%">{!! $cronograma->fechaFin !!}</td>
                            <td>{!! $cronograma->dias_habiles !!}</td>
                        </tr>
                        <?php $i++ ?>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>