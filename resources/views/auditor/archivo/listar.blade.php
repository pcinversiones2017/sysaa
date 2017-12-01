@extends('layout.admin')
@section('content')

    @include('partials.alert')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
        <div class="panel-heading">
            LISTA DE DOCUMENTOS CARGADOS
        </div>
        <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-9">
                            <a type="button" href="{!! url('auditor/observacion/archivo/crear/'.$codProc.'/'.$codDes.'/'.$codObs) !!}" class="btn btn-outline btn-primary"><i class="fa fa-plus"></i> CARGAR ARCHIVO</a>
                            <a type="button" href="{!! url('auditor/procedimiento/mostrar/'.$codProc) !!}" class="btn btn-outline btn-danger"> REGRESAR DESARROLLO</a>
                            <p>
                            
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($archivos as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{!! $row->nombre !!}</td>
                                <td>
                                    <a href="{!! url('auditor/observacion/archivo/eliminar/'.$row->codArc) !!}" class="btn btn-danger btn-outline" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i>  </a>
                                    <a href="{!! url('auditor/observacion/archivo/descargar/'.$row->codArc) !!}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Descargar"><i class="fa fa-cloud-download"></i>  </a>
                                </td>
                            </tr>
                        <?php $i++ ?>
                        @endforeach
                        </tbody>
                    </table>

            </div>
        </div>

    </div>
@endsection