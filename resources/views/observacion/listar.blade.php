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
                    <h5>Lista de Desarrollo de Procedimiento </h5>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-sm-3">
                            <a type="button" href="" class="btn btn-outline btn-danger"> ATRAS</a>
                            <p>
                            
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>INFORME</th>
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
                                    <a href="{!! url('auditor/desarrollo/editar/'.$row->codDes) !!}" class="btn btn-success  btn-outline"><i class="fa fa-eye"></i>  </a>
                                    <a href="{!! url('auditor/desarrollo/editar/'.$row->codDes) !!}" class="btn btn-primary btn-outline"><i class="fa fa-pencil"></i>  </a>
                                    <a href="{!! url('auditor/desarrollo/eliminar/'.$row->codDes) !!}" class="btn btn-danger btn-outline"><i class="fa fa-trash"></i>  </a>
                                    <a href="{!! url('auditor/archivo/crear/'.$row->codDes) !!}" class="btn btn-warning btn-outline"><i class="fa fa-upload"></i>  </a>
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