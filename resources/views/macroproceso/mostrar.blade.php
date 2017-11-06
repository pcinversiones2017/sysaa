@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>GENERAR PROCESOS</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="{!! route('macroproceso.listar') !!}">MACROPROCESO</a>
                                    </li>
                                    <li class="active">
                                        <strong>Crear procesos</strong>
                                    </li>
                                </ol>
                            </div>
                            {!! Field::text('MACROPROCESO', $macroproceso->nombre,['readonly' => 'true']) !!}
                        </div>
                        <div class="m-b-md">
                            {!! Form::open(['method' => 'POST', 'route' => 'procesoma.guardar']) !!}
                            <input type="hidden" value="{{$macroproceso->codMacroP}}" name="codMacroP">
                            <div class="col-md-12">
                                {!! Field::text('nombre', ['label' => 'PROCESO']) !!}
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
                                        <a href="#tab-1" data-toggle="tab">Procesos
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-10" class="tab-pane active">
                                        <div class="panel-body">
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
                                                            <a href="{!!  route('procesoma.mostrar', $procesoma->codProMA) !!}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i></a>
                                                            <a href="{!!  route('procesoma.editar', $procesoma->codProMA) !!}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i></a>
                                                            <a href="{!!  url('procesoma/eliminar/'.$macroproceso->codMacroP.'/'.$procesoma->codProMA)!!}" class="btn btn-danger btn-outline"><i class="fa fa-trash"></i></a>

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
