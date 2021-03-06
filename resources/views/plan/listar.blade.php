@extends('layout.admin')
@section('css-style')
    {!! Html::style('css/plugins/alertifyjs/themes/default.css') !!}
    {!! Html::style('css/plugins/alertifyjs/alertify.min.css') !!}
@stop
@section('content')
    @include('partials.alert')
    <div class="row">
        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            LISTA DE PLANES ANUALES
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>FECHA CREACIÓN</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($planes as $plan)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td class="tooltip-demo">
                                            <h5>{{$plan->nombrePlan}}</h5>
                                            @if($plan->auditorias->isNotEmpty())
                                            <h5><strong>AUDITORIAS</strong></h5>
                                            <ul>
                                                @foreach($plan->auditorias as $auditoria)
                                                    <li style="padding-bottom: 10px">{{$auditoria->nombrePlanF}}  <label class="label label-default">{{$auditoria->tipoActividad}}</label>
                                                            <a class="pull-right" href="{{route('auditoria.editar', $auditoria->codPlanF)}}" data-toggle="tooltip" data-placement="bottom" title="Editar Auditoria"><i class="fa fa-edit"></i></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </td>
                                        <td>{{$plan->fecha_creado}}</td>
                                        <td width="15%" class="tooltip-demo">
                                            <a href="{!! route('auditoria.crear-auditoria-plan-anual', $plan->codPlanA) !!}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Agregar Auditorias"><i class="fa fa-pencil"></i></a>
                                            <a href="{{URL::to('plan/editar')}}/{{$plan->codPlanA}}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                            <a href="{!!  route('plan.eliminar', $plan->codPlanA)!!}" class="btn btn-danger btn-outline eliminar-plan" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></a>
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
    $('.eliminar-plan').on('click', function (e) {
        e.preventDefault();
        var data = $(this);
        alertify.confirm('ELIMINAR PLAN', '¿ESTA SEGURO QUE DESEA ELIMINAR ESTE PLAN?, SE BORRARAN TODAS LAS AUDITORIAS INVOLUCRADAS!',
            function(){
                window.location.href = data.attr('href');
            },
            function(){
                alertify.error('Cancelado');
            }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
    });
</script>
@stop