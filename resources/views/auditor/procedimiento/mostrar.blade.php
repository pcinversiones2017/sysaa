@extends('layout.admin')

@section('content')
	
	@include('partials.alert')

	
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Detalle del Desarrollo de Procedimiento {!! substr($procedimiento->justificacion,0,15) !!}...</h5>
                    <div class="ibox-tools">
                    <a href="{!! url('auditor/procedimiento/finalizar/'. $procedimiento->codProc) !!}" class="btn btn-success">FINALIZAR PROCEDIMIENTO</a>                        
                    <a href="{!! url('auditor/archivo/crear/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes) !!}" class="btn btn-primary "><i class="fa fa-upload"></i>  </a>
                    <a href="{!! url('auditor/archivo/listar/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes) !!}" class="btn btn-info "><i class="fa fa-paperclip"></i>  </a>
                    <a href="{!! url('auditor/desarrollo/editar/'. $procedimiento->codProc .'/' .$procedimiento->desarrollo->codDes)!!}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    <a href="{!! url()->previous() !!}" class="btn btn-danger"><i class="fa fa-mail-reply"></i></a>
                	</div>
                </div>
                <div class="ibox-content">
                	{!! $procedimiento->desarrollo->informe !!}
                	<hr>
                	<a href="{!! url('auditor/observacion/crear/'. $procedimiento->codProc .'/' .$procedimiento->desarrollo->codDes ) !!}" class="btn btn-success btn-outline">AGREGAR OBSERVACION</a>
                	<hr>
                	 <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Recomendacion</th>
                            <th>ACCION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($observacion as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{!! $row->titulo !!}</td>
                                <td>{!! substr($row->descripcion,0,20) !!}</td>
                                <td>{!! substr($row->recomendacion,0,20) !!}</td>
                                <td>
                                    <a href="{!! url('seguimiento/listar/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes .'/'. $row->codObs) !!}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i>  </a>
                                	<a href="{!! url('auditor/observacion/editar/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes .'/'. $row->codObs) !!}" class="btn btn-primary btn-outline"><i class="fa fa-pencil"></i>  </a>
                                    <a href="{!! url('auditor/observacion/eliminar/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes .'/'. $row->codObs) !!}" class="btn btn-danger btn-outline"><i class="fa fa-trash"></i>  </a>
                                    <a href="{!! url('auditor/observacion/archivo/crear/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes .'/'. $row->codObs) !!}" class="btn btn-warning btn-outline"><i class="fa fa-upload"></i>  </a>
                                    <a href="{!! url('auditor/observacion/archivo/listar/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes .'/'. $row->codObs) !!}" class="btn btn-info btn-outline"><i class="fa fa-paperclip"></i>  </a>
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