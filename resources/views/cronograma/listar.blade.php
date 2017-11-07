@extends('layout.admin')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {!! session('success') !!}
        </div>
    @endif
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
                            <a type="button" href="{{URL::to('cronograma/crear')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Crear Cronograma</a>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha fin</th>
                            <th>Plan Anual</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i=1 ?>
                        @foreach($auditorias as $auditoria)
                            @if(!empty($auditoria->fechaIniPlanF))
                              <tr>
                                <td>{{$i}}</td>
                                <td>{{$auditoria->nombrePlanF}}</td>
                                <td>{{$auditoria->fechaIniPlanF}}</td>
                                <td>{{$auditoria->fechaFinPlanF}}</td>
                                <td>{{$auditoria->planAnual->nombrePlan}}</td>
                                <td>
                                    <a href="{{URL::to('cronograma/mostrar')}}/{{$auditoria->codPlanF}}" class="btn btn-success btn-outline btn-outline"><i class="fa fa-eye"></i></a>
                                    <a href="{{URL::to('cronograma/editar')}}/{{$auditoria->codPlanF}}" class="btn btn-primary btn-outline btn-outline"><i class="fa fa-edit"></i></a>
                                    <a href="{{URL::to('cronograma/eliminar')}}/{{$auditoria->codPlanF}}" class="btn btn-danger btn-outline btn-outline"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            <?php $i++ ?>
                            @endif
                              @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection