<div class="panel-body">
    <div class="row">
        <div class="col-sm-3">
            <a type="button" href="{!! url('norma-auditoria/crear') !!}/{{$auditoria->codPlanF}}" class="btn btn-sm btn-success btn-outline"><i class="fa fa-pencil"></i> CREAR NORMATIVA</a>
        </div>
    </div>
    <br>
    <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>TIPO</th>
            <th>NÚMERO</th>
            <th>NOMBRE DE NORMATIVA</th>
            <th>MACROPROCESO</th>
            <th>FECHA DE VIGENCIA</th>
            <th style="text-align: center">ACCIONES</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1 ?>
        @foreach($auditoria->normativas as $normativa)
            <tr>
                <td>{{$i}}</td>
                <td>{{ strtoupper($normativa->tipoNormativa) }}</td>
                <td>{{$normativa->numero}}</td>
                <td>{{$normativa->nombre}}</td>
                <td>{{$normativa->macroproceso->nombre}}</td>
                <td>{{$normativa->fecha}}</td>
                {{--<td>--}}
                {{--@if(!empty($normativa->nombre_archivo))--}}
                {{--<a href="{{URL::to('norma-auditoria/archivo-descargar')}}/{{$normativa->codNormMacro}}"><i class="fa fa-file-text fa-2x" aria-hidden="true"></i></a>--}}
                {{--@endif--}}
                {{--</td>--}}
                <td width="15%" style="text-align: center">
                <a href="{{URL::to('norma-auditoria/editar')}}/{{$normativa->codNorm}}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                {{--@if(empty($normativa->nombre_archivo))--}}
                {{--<a href="{{URL::to('norma-auditoria/archivo-crear')}}/{{$normativa->codNormMacro}}" class="btn btn-info btn-outline" data-toggle="tooltip" data-placement="bottom" title="Adjuntar"><i class="fa fa-file"></i> </a>--}}
                {{--@endif--}}
                <a href="{{URL::to('norma-auditoria/eliminar')}}/{{$normativa->codNorm}}"  class="btn btn-danger btn-outline eliminar-normativa" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php $i++ ?>
        @endforeach
        </tbody>
    </table>
</div>