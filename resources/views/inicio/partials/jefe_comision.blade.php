@section('css-style')
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop
	<div class="ibox-content">
		<h2> BIENVENIDO <strong>{!! Auth::user()->usuariorol->rol->nombre !!}</strong> : {!! Auth::user()->datos !!}</h2>
	</div><hr>
	<div class="ibox-content">
		<h3> <strong> LISTADO DE PROCEDIMIENTOS </strong></h3>
		<hr>
			<table class="table table-bordered tabla-procedimientos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>OBJETIVO ESPECIFICO</th>
                        <th>JUSTIFICACION</th>
                        <th>DETALLE</th>
                        <th>F. TERMINADO</th>
                        <th>F. RECHAZADO</th>
                        <th>FECHA FIN</th>
                        <th>PERSONA</th>
                        <th>ESTADO</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                   	<?php $i=1 ?>
                    @foreach($procedimiento_general as $row)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{!! $row->objetivoespecifico->nombre !!}</td>
                        <td>{!! substr($row->justificacion,0,10) !!}</td>
                        <td>{!! substr($row->detalle,0,10) !!}</td>
                        <td>{!! $row->fecha_terminado !!}</td>
                        <td>{!! $row->fecha_rechazado !!}</td>
                        <td>{!! $row->fecha_fin !!}</td>
                        <td>{!! $row->nombres !!} {!! $row->paterno !!} {!! $row->materno !!}</td>
                        <td>
                            @if($row->codEst == 1)
                            <span class="label label-info">NUEVO</span>
                            @elseif($row->codEst == 2)
                            <span class="label label-warning">PENDIENTE</span>
                            @elseif($row->codEst == 3)
                            <span class="label label-primary">TERMINADO</span>
                            @elseif($row->codEst == 4)
                            <span class="label label-success">APROBADO</span>
                            @elseif($row->codEst == 5)
                            <span class="label label-danger">RECHAZADO</span>
                            @endif
                        </td>
                        <td>
                            @if($row->codEst == 3)
                        	<a href="{!! url('jefe-comision/procedimiento/aprobar/'.$row->codProc) !!}" class="btn btn-success btn-outline"><i class="fa fa-check"></i></a>
                        	<a href="{!! url('jefe-comision/procedimiento/rechazar/'.$row->codProc) !!}" class="btn btn-danger btn-outline"><i class="fa fa-remove"></i></a>
                            @elseif($row->codEst == 4)
                            <span class="label label-success">APROBADO</span>
                            @elseif($row->codEst == 1)
                            <a href="{!! url('auditor/desarrollo/crear/'.$row->codProc) !!}" class="btn btn-success btn-outline"><i class="fa fa-pencil"></i> </a>
                            @elseif($row->codEst == 2)
                            <span class="label label-warning">PENDIENTE</span>
                            @endif
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
	</div>

@section('js-script')
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}
    <script>
        $(document).ready(function(){
            $('.tabla-procedimientos').DataTable({
  				"ordering": false,
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'excel', title: 'Lista Auditorias'},
                    {extend: 'pdf', title: 'Lista Auditorias'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>
@stop