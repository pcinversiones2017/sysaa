@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="panel panel-success">
        <div class="panel-heading">
            LISTA DE USUARIOS
        </div>
        <div class="panel-body">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>USUARIO</th>
                    <th>DATOS</th>
                    <th>AUDITORIA</th>
                    <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($usuarios as $row)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{!! $row->username !!}</td>
                        <td>{!! $row->datos !!}</td>
                        <td>{!! $row->usuariorol->auditoria->nombrePlanF ?? '' !!}</td>
                        <td style="text-align: center">
                            <a href="{!! url('usuario/usuario-editar/'.$row->codUsu) !!}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i>  </a>
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