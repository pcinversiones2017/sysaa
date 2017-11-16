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
                            <td style="text-align: center"><a href="{{route('macroproceso.mostrar', $objetivoEsp->macroproceso->codMacroP)}}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i></a></td>
                            <td>{{$objetivoEsp->materia}}</td>
                            <td class="tooltip-demo" style="text-align: center">
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



