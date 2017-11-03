@extends('layout.admin')
@section('content')
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4>Objetivo Especifico</h4>
                    <p>{{$objetivoEspecifico->nombre}}</p>
                    <br>
    				<h4>Materias a examinar </h4>
                    <p>{{$objetivoEspecifico->materia}}</p>

                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{!! url('procedimiento/procedimiento-crear/' . $codPlanF . '/' . $codObjEsp) !!}" class="btn btn-primary btn-outline">CREAR PROCEDIMIENTO</a>
                            <a href="{!! url('auditoria/mostrar/'.$codPlanF) !!}" class="btn btn-danger btn-outline">ATRAS</a>
                        </div>
                    </div>
                </div>
                <br>
                @include('partials.alert')
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>DATOS</th>
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
                                            <td>{!! $i !!}</td>
                                            <td width="10%">{!! $row->paterno !!} {!! $row->materno !!} {!! $row->nombres !!}</td>
                                            <td>{!! $row->justificacion !!}</td>
                                            <td>{!! $row->detalle !!}</td>
                                            <td width="10%">{!! $row->fechafin !!}</td>
                                            <td class="center-block">
                                                <a href="{!! url('procedimiento/procedimiento-eliminar/'.$row->codProc) !!}" class="btn btn-danger btn-outline"><i class="fa fa-trash"></i>  </a>
                                                <a href="{!! url('procedimiento/procedimiento-editar/'.$codPlanF.'/'.$objetivoEspecifico->codObjEsp.'/'.$row->codProc) !!}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i>  </a>
                                                <a href="{!! url('informe/informe-crear/'.$codPlanF.'/'.$codObjEsp.'/'.$row->codProc) !!}" class="btn btn-warning btn-outline"><i class="fa fa-folder-open"></i>  </a>
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