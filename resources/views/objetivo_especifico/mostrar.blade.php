@extends('layout.admin')
@section('content')
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4>Objetivo Especifico : {{$objetivoEspecifico->nombre}}</h4>
    				<h4>Materias a examinar: {{$objetivoEspecifico->materia}}</h4>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{!! url('procedimiento/procedimiento-crear/'.$objetivoEspecifico->codObjEsp) !!}" class="btn btn-warning btn-outline">CREAR PROCEDIMIENTO</a>
                            <a href="{!! url('auditoria/mostrar/'.$objetivoEspecifico->codObjEsp) !!}" class="btn btn-danger btn-outline">ATRAS</a>
                        </div>
                    </div>
                </div>
                <br>
                @if (session('success'))
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    {!! session('success') !!}          
                </div>
                @endif
                @if (session('danger'))
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    {!! session('danger') !!}          
                </div>
                @endif
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>JUSTIFICACION</th>
                                            <th>DETALLE</th>
                                            <th>FECHA FIN</th>
                                            <th>ACCION</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php $i=1 ?>
                                        @foreach($procedimiento as $row)
                                        <tr>
                                            <td>{!! $i  !!}</td>
                                            <td>{!! $row->justificacion !!}</td>
                                            <td>{!! $row->detalle !!}</td>
                                            <td>{!! $row->fechafin !!}</td>
                                            <td>
                                                <a href="{!! url('procedimiento/procedimiento-eliminar/'.$row->codProc) !!}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar </a>
                                                <a href="{!! url('procedimiento/procedimiento-editar/'.$row->codProc.'/'.$objetivoEspecifico->codObjEsp) !!}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i> Editar </a>
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
        </div>
   	</div>
    


@stop