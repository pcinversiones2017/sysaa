
	<div class="ibox-content">
		<h2> BIENVENIDO <strong>{!! Auth::user()->usuariorol->rol->nombre !!}</strong> : {!! Auth::user()->datos !!}</h2>
        <hr>
		<h3>PROCEDIMIENTOS</h3>
        <hr>
        <h3>
         TOTAL: <a class="btn btn-success m-r-sm">{!! $procedimiento->count() !!}</a>
		 ASIGNADOS: <a class="btn btn-danger m-r-sm">{!! $asignado->count() !!}</a> 
		 PENDIENTES: <a class="btn btn-warning m-r-sm">{!! $pendiente->count() !!}</a>
         APROBADOS: <a class="btn btn-primary m-r-sm">{!! $aprobado->count() !!}</a>
         RECHAZADOS: <a class="btn btn-danger m-r-sm">{!! $rechazado->count() !!}</a>
         FINALIZADOS: <a class="btn btn-primary m-r-sm">{!! $finalizado->count() !!}</a>
		</h3>
	</div>
	<div class="wrapper wrapper-content animated fadeInUp">
        <ul class="notes">
        	@foreach($procedimiento as $row)
            <li>
                <div>
                    <small>{!! $row->fecha_creado !!}</small>
                    <h4>{!! substr($row->justificacion,0,10) !!}...</h4>
                    <p>{!! substr($row->detalle,0,30) !!}...</p>
                    @if($row->codEst == App\Models\Estado::PENDIENTE)
                    <h3><a href="{!! url('auditor/procedimiento/mostrar/'.$row->codProc) !!}" data-toggle="tooltip" data-placement="top" title="Ver desarrollo de procedimiento creado"><i class="fa fa-eye "></i></a></h3>
                    @elseif($row->codEst == App\Models\Estado::NUEVO)
                    <h3><a href="{!! url('auditor/desarrollo/crear/'.$row->codProc) !!}" data-toggle="tooltip" data-placement="top" title="Crear desarrollo de procedimiento"><i class="fa fa-pencil "></i></a></h3>
                    @elseif($row->codEst == App\Models\Estado::APROBADO)
                    <a href="" class="btn btn-success btn-outline">APROBADO</a>
                    @else
                    <a href="" class="btn btn-danger btn-outline">FINALIZADO</a>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
    </div>
