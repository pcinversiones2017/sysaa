@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Crear Actividades:</h5>
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
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <h2 class="text-info">Macroproceso:</h2>
                                <h3>{{$procedimientosp->subProceso->procesoMA->macroProceso->nombre}}</h3>
                                <h2 class="text-info">Proceso:</h2>
                                <h3>{{$procedimientosp->subProceso->procesoMA->nombre}}</h3>
                                <h2 class="text-info">Subproceso:</h2>
                                <h3>{{$procedimientosp->subProceso->nombre}}</h3>
                                <h2 class="text-info">Procedimientos:</h2>
                                <h3>{{$procedimientosp->nombre}}</h3>
                            </div>
                        </div>

                            <div class="col-lg-12">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab-1" data-toggle="tab">Actividades
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-10" class="tab-pane active">
                                            <div class="panel-body">
                                                <div class="m-b-md">
                                                    <a type="button" id="#agregarProceso" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModalHorizontal">
                                                        <i class="fa fa-plus">
                                                        </i> Crear Actividades</a>
                                                </div>
                                                <table class="table table-bordered" style="margin-top: 10px">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Responsable</th>
                                                        <th>Actividad</th>
                                                        <th width="180px">Acciones</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($procedimientosp->actividadeS as $n => $actividades)
                                                        <tr>
                                                            <td align="middle">{{$n+1}}</td>
                                                            <td>{{$actividades->responsable}}</td>
                                                            <td>{{$actividades->nombre}}</td>
                                                            <td>
                                                                <a href="{{URL::to('procedimientosp/mostrar')}}/{{$actividades->codAct}}" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Ver </a>
                                                                <a href="" class="btn btn-white btn-sm" id="btnActualizar"><i class="fa fa-pencil">
                                                                    </i> Editar </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Crear Subproceso
                    </h4>
                </div>
                <form class="form-horizontal" role="form" method="post" action="{{URL::to('actividad/guardar')}}">
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="form-horizontal">
                            {{csrf_field()}}
                            <input type="hidden" name="codProSP" value="{{$procedimientosp->codProSP}}">
                            <div class="form-group">
                                <label  class="col-sm-2 control-label"
                                        for="inputEmail3">Responsable</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="responsable"> </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label"
                                        for="inputEmail3">Actividad</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="nombre"> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary" id="guardar">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
