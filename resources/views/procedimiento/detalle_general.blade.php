@extends('layout.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                	<div align="right">
                	<a href="javascript:imprSelec('historial')" class="btn btn-primary btn-outline">Imprimir</a>
                	<a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a>	
                	</div>
                	
                </div>
                <div class="ibox-content" id="historial">
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
@endsection

@section('js-script')
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js') !!}
    <script>

        function imprSelec(historial){
		  var ficha=document.getElementById(historial);
		  var ventimp=window.open(' ','popimpr');
		  ventimp.document.write(ficha.innerHTML);
		  ventimp.document.close();
		  ventimp.print();
		  ventimp.close();
		}

    </script>
@stop