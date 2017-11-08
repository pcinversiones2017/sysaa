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
                    <h5>LISTA DE PLANES ANUALES </h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-3">
                            <a type="button" href="{{URL::to('auditoria/crear')}}" class="btn btn-sm btn-success btn-outline"><i class="fa fa-pencil"></i> CREAR AUDITORIA</a>
                        </div>
                    </div>
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
                            <td>{{$plan->nombrePlan}}</td>
                            <td>{{$plan->fecha_creado}}</td>
                            <td>
                                <a href="#" class="btn btn-success btn-outline"><i class="fa fa-eye"></i></a>
                                <a href="{{URL::to('plan/editar')}}/{{$plan->codPlanA}}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i></a>
                                <a href="{!!  route('plan.eliminar', $plan->codPlanA)!!}" class="btn btn-danger btn-outline eliminar-plan"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
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
        alertify.confirm('Eliminar Plan', 'Esta seguro que desea eliminar este plan, se borraran todas las Auditorias involucradas!',
            function(){
                window.location.href = data.attr('href');
            },
            function(){
                alertify.error('Cancelado');
            }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
    });
</script>
@stop