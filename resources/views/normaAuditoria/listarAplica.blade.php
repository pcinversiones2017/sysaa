@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>LISTA DE NORMATIVAS QUE REGULA LA AUDITORÍA DE CUMPLIMIENTO</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-3">
                            <a type="button" href="{!! url('norma-auditoria/crear') !!}" class="btn btn-sm btn-primary btn-outline"><i class="fa fa-plus"></i> CREAR NORMATIVA</a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>TIPO</th>
                            <th>NÚMERO</th>
                            <th>NOMBRE DE NORMATIVA</th>
                            <th>MARCO PROCESO</th>
                            <th>FECHA DE VIGENCIA</th>
                            <th>ARCHIVO</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($normativaMacroproceso as $normativaMacroproceso)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$normativaMacroproceso->Normativac->tipoNormativa}}</td>
                                <td>{{$normativaMacroproceso->Normativac->numero}}</td>
                                <td>{{$normativaMacroproceso->Normativac->nombre}}</td>
                                <td>{{$normativaMacroproceso->Macroproceso->nombre}}</td>
                                <td>{{$normativaMacroproceso->Normativac->fecha}}</td>
                                <td>
                                    @if(!empty($normativaMacroproceso->nombre_archivo))
                                    <a href="{{URL::to('norma-auditoria/archivo-descargar')}}/{{$normativaMacroproceso->codNormMacro}}"><i class="fa fa-file-text fa-2x" aria-hidden="true"></i></a>
                                    @endif
                                </td>
                                <td>
                                   <a href="{{URL::to('norma-auditoria/editar')}}/{{$normativaMacroproceso->codNormMacro}}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                    @if(empty($normativaMacroproceso->nombre_archivo))
                                    <a href="{{URL::to('norma-auditoria/archivo-crear')}}/{{$normativaMacroproceso->codNormMacro}}" class="btn btn-info btn-outline" data-toggle="tooltip" data-placement="bottom" title="Adjuntar"><i class="fa fa-file"></i> </a>
                                    @endif
                                    <a href="{{URL::to('norma-auditoria/eliminar')}}/{{$normativaMacroproceso->codNormMacro}}"  class="btn btn-danger btn-outline" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></a>
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
@endsection