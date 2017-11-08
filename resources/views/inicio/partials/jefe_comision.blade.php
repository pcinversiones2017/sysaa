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
                        <th>FECHA TERMINADO</th>
                        <th>FECHA FIN</th>
                        <th>PERSONA</th>
                        <th>ESTADO</th>
                    </tr>
                </thead>
                <tbody>
                   	<?php $i=1 ?>
                    @foreach($procedimiento_general as $row)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{!! $row->objetivoespecifico->nombre !!}</td>
                        <td>{!! $row->justificacion !!}</td>
                        <td>{!! $row->detalle !!}</td>
                        <td>{!! $row->fecha_terminado !!}</td>
                        <td>{!! $row->fecha_fin !!}</td>
                        <td>{!! $row->nombres !!} {!! $row->paterno !!} {!! $row->materno !!}</td>
                        <td>
                                
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