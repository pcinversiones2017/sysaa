<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-3">
                        <a type="button" href="{!! route('objetivo-especifico.crear', $auditoria->codPlanF) !!}" class="btn btn-sm btn-success btn-outline"><i class="fa fa-pencil"></i> CREAR OBJETIVO ESPECÍFICO</a>
                    </div>
                </div>
                <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-objetivo-especifico" style="margin-top: 10px">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>DETALLE</th>
                        <th>MACROPROCESO</th>
                        <th>PROCESOS</th>
                        <th>MATERIAS A EXAMINAR</th>
                        <th>ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ; ?>
                    @foreach($auditoria->objetivoGeneral->objetivosEspecificos as $objetivoEsp)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$objetivoEsp->nombre}}</td>
                            <td>{{$objetivoEsp->macroproceso->nombre}}</td>
                            <td class="tooltip-demo" style="text-align: center"><a href="{{route('macroproceso.mostrar', $objetivoEsp->macroproceso->codMacroP)}}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Ver"><i class="fa fa-eye"></i></a></td>
                            <td>{{$objetivoEsp->materia}}</td>
                            <td class="tooltip-demo" style="text-align: center">
                                <a href="{{url('objetivo-especifico/mostrar')}}/{{$auditoria->codPlanF}}/{{$objetivoEsp->codObjEsp}}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Agregar Procedimientos"><i class="fa fa-eye"></i></a>
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
</div>

<script>
        $(document).ready(function(){
            $('.table-objetivo-especifico').DataTable({
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

