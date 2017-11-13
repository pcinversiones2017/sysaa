@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="panel panel-success">
        <div class="panel-heading">
            LISTA DE USUARIOS
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-3">
                    <a type="button" href="{!! route('usuario.crear') !!}" class="btn btn-outline btn-success"><i class="fa fa-pencil"></i> CREAR USUARIO</a>
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
                        <td style="text-align: center">
                            <a href="{!! url('usuario/usuario-editar/'.$row->codUsu) !!}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i>  </a>
                            <a href="{!! url('usuario/usuario-eliminar/'.$row->codUsu) !!}" class="btn btn-danger btn-outline"><i class="fa fa-trash"></i>  </a>
                            <a href="{!! url('historial/historial/'.$row->codUsu) !!}" class="btn btn-success btn-outline"><i class="fa fa-history"></i>  </a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection