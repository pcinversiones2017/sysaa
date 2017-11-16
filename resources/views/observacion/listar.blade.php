@extends('layout.admin')

@section('content')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {!! session('success') !!}          
    </div>
    @endif

    @if (session('danger'))
    <div class="alert alert-danger" role="alert">
        {!! session('danger') !!}           
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de Observaciones </h5>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-sm-3">
                            <a type="button" href="{!! url('auditor/desarrollo/listar') !!}" class="btn btn-outline btn-danger"> ATRAS</a>
                            <p>
                            
                        </div>
                    </div>
                    <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>DESCRIPCION</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($observacion as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{!! $row->descripcion !!}</td>
                                <td>
                                    <a href="{!! url('auditor/observacion/editar/'.$row->codObs) !!}" class="btn btn-primary btn-outline"><i class="fa fa-pencil"></i>  </a>
                                    <a href="{!! url('auditor/observacion/eliminar/'.$row->codObs) !!}" class="btn btn-danger btn-outline"><i class="fa fa-trash"></i>  </a>
                                    <a href="{!! url('auditor/observacion/archivo/crear/'.$row->codObs) !!}" class="btn btn-warning btn-outline"><i class="fa fa-upload"></i>  </a>
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

@stop