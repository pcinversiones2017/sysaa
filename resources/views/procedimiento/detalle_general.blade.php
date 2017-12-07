@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div align="right">
                    <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a>    
                    </div>
                    </div>
                    <div class="panel-body">
                	@if(empty($procedimiento->objetivogeneral))
                    <h5> OBJETIVO ESPECIFICO : {!! $procedimiento->objetivoespecifico->nombre !!}</h5>
                	@else
                    <h5> OBJETIVO GENERAL: {!! $procedimiento->objetivogeneral->nombre !!}</h5>
                	@endif 
                	<hr>
                	<div class="row">
                		<div class="col-md-12">
                			<label>Justificacion</label><br>
                			{!! $procedimiento->justificacion !!}
                		</div>
                		<div class="col-md-12">
                			<label>Detalle</label><br>
                			{!! $procedimiento->detalle !!}
                		</div>
                	</div>
                	<hr>
                	<div class="row">
                		<div class="col-md-12">
                			<label>Desarrollo</label><br>
                			{!! $procedimiento->desarrollo->informe !!}
                		</div>
                	</div>
                	<hr>
                	<div class="row">
                		<div class="col-md-12">
                			<label>Observaciones</label><br>
                			@if(empty($procedimiento->desarrollo->observacion))
                			No hay observaciones
                			@else
	                			@foreach($procedimiento->desarrollo->observacion  as $row)
	                			<strong>Titulo: </strong>{!! $row->titulo !!}<br>
	                			<strong>Descripcion: </strong>{!! $row->descripcion !!}<br>
	                			<strong>Recomendacion: </strong>{!! $row->recomendacion !!}<br><br>
	                			@endforeach
	                		@endif
                		</div>
                	</div>
                	<hr>
                	<div class="row">
                		<div class="col-md-12">
                			<label>Seguimiento</label><br>
                			@if(empty($procedimiento->desarrollo->observacion))
                			No hay seguimiento
                			@else
                			@foreach($procedimiento->desarrollo->observacion  as $row)
                				@foreach($row->seguimiento as $seg)
                					<strong>Acciones: </strong>{!! $seg->acciones !!}<br>
                					<strong>Evaluacion: </strong>{!! $seg->evaluacion !!}<br>
                					<strong>Estado: </strong>{!! $seg->estado !!}<br><br>
                				@endforeach
                			@endforeach
	                		@endif
                		</div>
                	</div>
                	<div id="editor"></div>

                </div>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection
