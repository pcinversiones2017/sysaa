@extends('layout.admin')
@section('css-style')
    {!! Html::style('css/plugins/alertifyjs/themes/default.css') !!}
    {!! Html::style('css/plugins/alertifyjs/alertify.min.css') !!}
@stop
@section('content')
    @include('partials.alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>LISTA DE AUDITORIAS </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-sm-3">
                            <a type="button" href="{{URL::to('auditoria/crear')}}" class="btn btn-sm btn-primary btn-outline"><i class="fa fa-plus"></i> CREAR AUDITORIA</a>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>CODIGO DEL SERVICIO DE CONTROL</th>
                            <th>TIPO DE CODIGO DEL SC SUPERIOR</th>
                            <th>ORGANO DEL CONTROL INSTITUCIONAL</th>
                            <th>ENTIDAD AUDITADA</th>
                            <th>TIPO DE DEMANDA DE CONTROL</th>
                            <th>PLAN ANUAL</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($auditorias as $auditoria)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$auditoria->nombrePlanF}}</td>
                                <td>{{$auditoria->codigoServicioCP}}</td>
                                <td>{{$auditoria->tipoServicioCP}}</td>
                                <td>{{$auditoria->organoCI}}</td>
                                <td>{{$auditoria->entidadAuditada}}</td>
                                <td>{{$auditoria->tipoDemanda}}</td>
                                <td>{{$auditoria->planAnual->nombrePlan}}</td>
                                <td width="15%" class="tooltip-demo">
                                    <a href="{{URL::to('auditoria/mostrar')}}/{{$auditoria->codPlanF}}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Ver"><i class="fa fa-eye"></i></a>
                                    <a href="{{URL::to('auditoria/editar')}}/{{$auditoria->codPlanF}}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                    <a href="{!! route('auditoria.eliminar', $auditoria->codPlanF) !!}" class="btn btn-danger btn-outline eliminar-auditoria" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $i++ ?>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('js-script')
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    <script>
        $('.eliminar-auditoria').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('Eliminar Auditoria', 'Esta seguro que desea eliminar este auditoria, se borraran todo el contenido involucrado!!',
                function(){
                    window.location.href = data.attr('href');
                },
                function(){
                    alertify.error('Cancelado');
                }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
        });
    </script>
@stop