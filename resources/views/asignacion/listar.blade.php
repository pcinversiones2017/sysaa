@extends('layout.admin')
@section('content')

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {!! session('success') !!}          
    </div>
    @endif

    @if (session('danger'))
    <div class="alert alert-danger" role="alert">
        {!! session('danger') !!}           
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de Asignaciones </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-sm-3">
                            <a type="button" href="{!! route('asignarr.crear') !!}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Crear Asignacion</a>
                            <p>
                            
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
                                <td>
                                    <a href="{!! url('asignarrol/asignar-rol-editar/'.$row->codUsuRol) !!}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a>
                                    <a href="{!! url('asignarrol/asignar-rol-eliminar/'.$row->codUsuRol) !!}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar </a>
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