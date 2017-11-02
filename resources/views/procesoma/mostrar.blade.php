@extends('layout.admin')
@section('content')

    <div class="row">
        <div class="row wrapper border-bottom white-bg page-heading">

        </div>
        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>GENERAR PROCESOS</h5>
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
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="{!! route('macroproceso.listar') !!}">MACROPROCESO</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('macroproceso/mostrar')}}/{{$procesoma->codMacroP}}">PROCESO</a>
                                    </li>
                                    <li class="active">
                                        <strong>CREAR SUBPROCESO</strong>
                                    </li>
                                </ol>
                            </div>
                            {!! Field::text('MACROPROCESO', $procesoma->macroProceso->nombre,['readonly' => 'true']) !!}
                            {!! Field::text('PROCESO', $procesoma->nombre,['readonly' => 'true']) !!}
                        </div>
                        <div class="m-b-md">
                            {!! Form::open(['method' => 'POST', 'route' => 'subproceso.guardar']) !!}
                            <input type="hidden" value="{{$procesoma->codProMA}}" name="codProMA">
                            <div class="col-md-12">
                                {!! Field::text('nombre', ['label' => 'SUBPROCESO']) !!}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-outline" value="REGISTRAR">
                                    <a href="{{URL::to('macroproceso/listar')}}" class="btn btn-danger btn-outline">CANCELAR</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>

                        <div class="col-lg-12">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab-1" data-toggle="tab">SUBPROCESO
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-10" class="tab-pane active">
                                        <div class="panel-body">
                                            @if(session('success'))
                                                <div class="alert alert-success  alert-dismissable">
                                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                    <a class="alert-link" href="#">{{session('success')}}</a>.
                                                </div>
                                            @elseif(session('update'))
                                                <div class="alert alert-danger  alert-dismissable">
                                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                    <a class="alert-link" href="#">{{session('update')}}</a>.
                                                </div>
                                            @endif

                                            <table class="table table-bordered" style="margin-top: 10px">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th width="250px">Acciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($procesoma->subProceso as $n => $subproceso)
                                                    <tr>
                                                        <td align="middle">{{$n+1}}</td>
                                                        <td>{{$subproceso->nombre}}</td>
                                                        <td>
                                                            <a href="{{URL::to('subproceso/mostrar')}}/{{$subproceso->codSubPro}}" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Ver </a>
                                                            <a href="{{URL::to('subproceso/editar')}}/{{$subproceso->codSubPro}}" id="btnActualizar" class="btn btn-white btn-sm"><i class="fa fa-pencil" ></i> Editar </a>
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

@endsection
