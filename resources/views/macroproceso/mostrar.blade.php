@extends('layout.admin')
@section('content')

    <div class="row">
        <div class="row wrapper border-bottom white-bg page-heading">

        </div>
        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>Generar Procedimiento para: <strong>{{$macroproceso->nombre}}</strong></h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                                @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {!! session('success') !!}          
                                </div>
                                @endif
                            <div class="m-b-md">
                                {!! Form::open(['method' => 'POST', 'url' => 'procedimiento.registrar']) !!}
                                {!! Form::hidden('id', $macroproceso->codMacroP) !!}
                                {!! Field::text('proceso') !!}
                                {!! Form::submit('REGISTRAR',['class' => 'btn btn-primary btn-outline']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @if (session('danger'))
                    <div class="alert alert-danger" role="alert">
                    {!! session('danger') !!}           
                    </div>
                @endif
                <br>
                <div class="ibox-content">
                    <div class="row">
                            <div class="col-lg-12">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab-1" data-toggle="tab">Procesos
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
                                                    @foreach($macroproceso->procesoMA as $n => $procesoma)
                                                        <tr>
                                                            <td align="middle">{{$n+1}}</td>
                                                            <td>{{$procesoma->nombre}}</td>
                                                            <td>
                                                                <a href="{{URL::to('procesoma/mostrar')}}/{{$procesoma->codProMA}}" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Ver </a>
                                                                <a href="{{URL::to('procesoma/editar')}}/{{$procesoma->codProMA}}" id="btnActualizar" class="btn btn-white btn-sm"><i class="fa fa-pencil" ></i> Editar </a>
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
