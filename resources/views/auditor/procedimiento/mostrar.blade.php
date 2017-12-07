@extends('layout.admin')

@section('content')
	
	@include('partials.alert')

	
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                Detalle del Desarrollo de Procedimiento {!! substr($procedimiento->justificacion,0,15) !!}...
            </div>
            <div class="panel-body">
                <div align="right" class="tooltip-demo">
                    <a href="{!! url('auditor/procedimiento/finalizar/'. $procedimiento->codProc) !!}" class="btn btn-success btn-outline" >FINALIZAR PROCEDIMIENTO</a>                        
                    <a href="{!! url('auditor/archivo/crear/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes) !!}" class="btn btn-warning btn-outline" data-toggle="tooltip" data-placement="bottom" title="Adjuntar documentos para el desarrollo"><i class="fa fa-upload"></i>  </a>
                    <a href="{!! url('auditor/archivo/listar/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes) !!}" class="btn btn-info btn-outline " data-toggle="tooltip" data-placement="bottom" title="Lista de documentos cargados"><i class="fa fa-paperclip"></i>  </a>
                    <a href="{!! url('auditor/desarrollo/editar/'. $procedimiento->codProc .'/' .$procedimiento->desarrollo->codDes)!!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar el desarrollo"><i class="fa fa-edit"></i></a>
                    <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline" data-toggle="tooltip" data-placement="bottom" title="Atras"><i class="fa fa-mail-reply"></i></a>
                </div>
                <hr>
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
                                <td class="tooltip-demo">
                                	<a href="{!! url('auditor/observacion/editar/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes .'/'. $row->codObs) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i>  </a>
                                    <a href="{!! url('auditor/observacion/eliminar/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes .'/'. $row->codObs) !!}" class="btn btn-danger btn-outline" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i>  </a>
                                    <a href="{!! url('auditor/observacion/archivo/crear/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes .'/'. $row->codObs) !!}" class="btn btn-warning btn-outline" data-toggle="tooltip" data-placement="bottom" title="Adjuntar documentos para la observacion"><i class="fa fa-upload"></i>  </a>
                                    <a href="{!! url('auditor/observacion/archivo/listar/'. $procedimiento->codProc .'/'. $procedimiento->desarrollo->codDes .'/'. $row->codObs) !!}" class="btn btn-info btn-outline" data-toggle="tooltip" data-placement="bottom" title="Lista de documentos cargados"><i class="fa fa-paperclip"></i>  </a>
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
</div>
    
@stop