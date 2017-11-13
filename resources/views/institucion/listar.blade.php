@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="panel panel-success">
        <div class="panel-heading">
            DATOS DE LA INSTITUCIÓN
        </div>
        <div class="panel-body">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>RUC</th>
                    <th>TELEFONO</th>
                    <th>DIRECCIÓN</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$institucionn->nombre}}</td>
                        <td>{{$institucionn->ruc}}</td>
                        <td>{{$institucionn->telefono}}</td>
                        <td>{{$institucionn->direccion}}</td>
                        <td>
                            <a href="{{URL::to('institucion/editar')}}/{{$institucionn->codInstitucion}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>


@endsection