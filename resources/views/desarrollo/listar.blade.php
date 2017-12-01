@extends('layout.admin')

@section('content')
    @include('partials.alert')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de Desarrollo de Procedimiento </h5>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-sm-3">
                            <a type="button" href="{!! url('auditor/procedimiento/procedimientos-listar') !!}" class="btn btn-outline btn-danger"> ATRAS</a>
                            <p>
                            
                        </div>
                    </div>

                    <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>DESARROLLO DE PROCEDIMIENTO</th>
                            <th>JUSTIFICACION</th>
                            <th>ELABORADO</th>
                            <th>REVISADO</th>
                            <th>SUPERVISADO</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($desarrollo as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{!! $row->informe !!}</td>
                                <td>{!! $row->procedimiento->justificacion !!}</td>
                                <td>{!! $row->elaborado !!}</td>
                                <td>{!! $row->revisado !!}</td>
                                <td>{!! $row->supervisado !!}</td>
                                <td>
                                    <a href="{!! url('auditor/observacion/crear/'.$row->codDes) !!}" class="btn btn-success  btn-outline" data-toggle="tooltip" data-placement="bottom" title="Crear Observacion"><i class="fa fa-eye"></i>  </a>
                                    <a href="{!! url('auditor/desarrollo/editar/'.$row->codDes) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil"></i>  </a>
                                    <a href="{!! url('auditor/desarrollo/eliminar/'.$row->codDes) !!}" class="btn btn-danger btn-outline" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i>  </a>
                                    <a href="{!! url('auditor/archivo/crear/'.$row->codDes) !!}" class="btn btn-warning btn-outline" data-toggle="tooltip" data-placement="bottom" title="Adjuntar Documento"><i class="fa fa-upload"></i>  </a>
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