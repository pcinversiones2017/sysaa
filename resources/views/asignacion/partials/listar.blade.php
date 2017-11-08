<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-3">
                        <a type="button" href="{!! route('asignarr.crear', $auditoria->codPlanF) !!}" class="btn btn-sm btn-success btn-outline"><i class="fa fa-pencil"></i> CREAR ASIGNACIÓN</a>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>DATOS</th>
                        <th>CARGO FUNCIONAL</th>
                        <th>ROL</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                    @foreach($usuariorol as $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{!! $row->usuario->datos !!}</td>
                            <td>{!! $row->cargofuncional->nombre !!}</td>
                            <td>{!! $row->rol->nombre !!}</td>
                            <td class="tooltip-demo">
                                <a href="{!! url('asignar-rol/editar/' . $row->codUsuRol) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                <a href="{!! url('asignarrol/asignar-rol-eliminar/'.$row->codUsuRol) !!}" class="btn btn-danger btn-outline" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></a>
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
