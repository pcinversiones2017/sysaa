<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-3">
                        <a type="button" href="{!! route('objetivo-especifico.crear', $auditoria->codPlanF) !!}" class="btn btn-sm btn-success btn-outline"><i class="fa fa-pencil"></i> CREAR OBJETIVO ESPECÍFICO</a>
                    </div>
                </div>

                <table class="table table-striped table-bordered table-hover table-objetivo-especifico" style="margin-top: 10px">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Detalle</th>
                        <th>MacroProceso</th>
                        <th>Materia a examinar</th>
                        <th>Procesos</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ; ?>
                    @foreach($auditoria->objetivoGeneral->objetivosEspecificos as $objetivoEsp)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$objetivoEsp->nombre}}</td>
                            <td>{{$objetivoEsp->macroproceso->nombre}}</td>
                            <td>{{$objetivoEsp->materia}}</td>
                            <td><a href="{{route('macroproceso.mostrar', $objetivoEsp->macroproceso->codMacroP)}}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i></a></td>
                            <td class="tooltip-demo">
                                <a href="{{url('objetivo-especifico/mostrar')}}/{{$auditoria->codPlanF}}/{{$objetivoEsp->codObjEsp}}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Ver"><i class="fa fa-eye"></i></a>
                                <a href="{{route('objetivo-especifico.editar', $objetivoEsp->codObjEsp) }}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                <a href="{{route('objetivo-especifico.eliminar', $objetivoEsp->codObjEsp )}}" class="btn btn-danger btn-outline eliminar-objetivo-especifico" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></a>
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

@section('js-script')
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}
    <script>
        $('.eliminar-objetivo-especifico').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('Eliminar Objetivo Especifico', 'Esta seguro que desea eliminar este objetivo especifico, se borraran todo el contenido involucrado!!',
                function(){
                    window.location.href = data.attr('href');
                },
                function(){
                    alertify.error('Cancelado');
                }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.table-objetivo-especifico').DataTable({
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'excel', title: 'Lista Objetivos Especificos'},
                    {extend: 'pdf', title: 'Lista Objetivos Especificos'},

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
