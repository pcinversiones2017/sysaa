
	<div class="ibox-content">
		<h2> BIENVENIDO <strong>{!! Auth::user()->usuariorol->rol->nombre !!}</strong> : {!! Auth::user()->datos !!}</h2>
		<h3>
		PROCEDIMIENTOS ASIGNADOS: <a class="btn btn-danger m-r-sm">{!! $procedimiento->count() !!}</a> 
		PROCEDIMIENTOS TERMINADOS: <a class="btn btn-primary m-r-sm">{!! $finalizado->count() !!}</a>
		PROCEDIMIENTOS PENDIENTES: <a class="btn btn-warning m-r-sm">{!! $procedimiento->count()-$finalizado->count() !!}</a>
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
                    @if(count($row->desarrollo) == 1 && $row->fecha_terminado == '')
                    <h3><a href="{!! url('auditor/procedimiento/mostrar/'.$row->codProc) !!}" data-toggle="tooltip" data-placement="top" title="Ver desarrollo de procedimiento creado"><i class="fa fa-eye "></i></a></h3>
                    @elseif($row->fecha_terminado == '')
                    <h3><a href="{!! url('auditor/desarrollo/crear/'.$row->codProc) !!}" data-toggle="tooltip" data-placement="top" title="Crear desarrollo de procedimiento"><i class="fa fa-pencil "></i></a></h3>
                    @else
                    <a href="" class="btn btn-danger btn-outline">CONCLUIDO</a>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
    </div>