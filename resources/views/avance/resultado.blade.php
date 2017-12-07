@extends('layout.admin')

@section('content')
	
	<div class="row">
        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            BUSCAR AVANCE POR AUDITORIA
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                {!! Form::open(['method' => 'POST', 'route' => 'avance.buscar']) !!}
                                <div class="col-sm-11 col-xs-9">
                                    {!! Form::select('auditoria', $auditorias, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE AUDITORIA']) !!}
                                </div>
                                <div class="col-sm-1 col-xs-3">
                                    {!! Form::submit('BUSCAR', ['class' => 'btn btn-success btn-outline']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            PROGRESO DE LA AUDITORIA: {!! $auditoria->nombrePlanF !!}
                        </div>
                        <div class="panel-body">
                        	<table class="table table-bordered">
                        		<tbody>
                        			<tr>
                        				<td><strong>PROCEDIMIENTOS GENERALES <span class="label label-danger pull-right"> NO APROBADOS </span></strong> </td>
                        				<td>{!! $totalobjesp !!}</td>
                        			</tr>
                        			<tr>
                        				<td><strong>PROCEDIMIENTOS ESPECIFICOS <span class="label label-danger pull-right"> NO APROBADOS</span></strong> </td>
                        				<td>{!! $totalobjgen !!}</td>
                        			</tr>
                        		</tbody>
                        	</table>
                        	<table class="table table-bordered">
                        		<tbody>
                        			<tr>
                        				<td><strong>PROCEDIMIENTOS GENERALES <span class="label label-primary pull-right">  APROBADOS </span></strong> </td>
                        				<td>{!! $totalobjespaprobado !!}</td>
                        			</tr>
                        			<tr>
                        				<td><strong>PROCEDIMIENTOS ESPECIFICOS <span class="label label-primary pull-right">  APROBADOS</span></strong> </td>
                        				<td>{!! $totalobjgenaprobado !!}</td>
                        			</tr>
                        		</tbody>
                        	</table>
                        	<hr>
                            @if($totalobjespaprobado == 0 && $totalobjgenaprobado == 0 && $totalobjesp == 0 && $totalobjgen == 0)
                            @else
                        	<h3 align="center"><strong>PROGRESO DE AVANCE DE LA AUDITORIA</strong></h3>
                            <div class="progress progress-striped active">
	                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($totalobjespaprobado + $totalobjgenaprobado)/($totalobjesp + $totalobjgen + $totalobjespaprobado + $totalobjgenaprobado))*100 ; ?>%">
	                                <span class="sr-only"><?php echo (($totalobjespaprobado + $totalobjgenaprobado)/($totalobjesp + $totalobjgen + $totalobjespaprobado + $totalobjgenaprobado))*100 ; ?></span>
	                            </div>
                            </div>
                            <h2 align="center"><strong><?php echo round((($totalobjespaprobado + $totalobjgenaprobado)/($totalobjesp + $totalobjgen + $totalobjespaprobado + $totalobjgenaprobado))*100,2) ; ?> %</strong></h2>
                            @endif
                        </div>

                    </div>

                </div>
    </div>
@stop