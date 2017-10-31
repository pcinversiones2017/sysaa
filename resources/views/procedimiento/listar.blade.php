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
                    <h5>Lista de usuarios </h5>
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
                            <a type="button" href="{!! route('usuario.crear') !!}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Crear Usuario</a>
                            <p>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Datos</th>
                            <th>Email</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($usuarios as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{!! $row->datos !!}</td>
                                <td>{!! $row->email !!}</td>
                                <td>
                                    <a href="{!! url('usuario/usuario-editar/'.$row->codUsu) !!}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a>
                                    <a href="{!! url('usuario/usuario-eliminar/'.$row->codUsu) !!}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar </a>
                                    <a href="{!! url('permiso/permiso/'.$row->codUsu) !!}" class="btn btn-primary btn-sm"><i class="fa fa-id-card"></i> Permisos </a>
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