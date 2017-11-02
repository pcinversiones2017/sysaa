@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de auditorias </h5>
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
                            <a type="button" href="{{URL::to('auditoria/crear')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Crear Auditoria</a>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Codigo del servicio de control</th>
                            <th>Tipo de codigo de servicio de control superior</th>
                            <th>Organo de control institucional</th>
                            <th>Entidad auditada</th>
                            <th>Tipo de demanda de control</th>
                            <th>Plan Anual</th>
                            <th>Acciones</th>
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
                                <td>
                                    <a href="{{URL::to('auditoria/mostrar')}}/{{$auditoria->codPlanF}}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i></a>
                                    <a href="{{URL::to('auditoria/editar')}}/{{$auditoria->codPlanF}}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i></a>
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