@include('partials.alert')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-3">
                        <a type="button" href="{!! route('objetivo-especifico.crear', $auditoria->codPlanF) !!}" class="btn btn-sm btn-primary btn-outline"><i class="fa fa-plus"></i> CREAR OBJETIVO ESPECÍFICO</a>
                    </div>
                </div>

                <table class="table table-bordered" style="margin-top: 10px">
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
                            <td>
                                <a href="{{url('objetivo-especifico/mostrar')}}/{{$auditoria->codPlanF}}/{{$objetivoEsp->codObjEsp}}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i></a>
                                <a href="{{route('objetivo-especifico.editar', $objetivoEsp->codObjEsp) }}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-outline"><i class="fa fa-trash"></i></a>
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

