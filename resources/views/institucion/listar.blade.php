@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="panel panel-success">
        <div class="panel-heading">
            DATOS DE LA INSTITUCIÓN
        </div>
        <div class="panel-body">
            <div>
                <a href="{{ url('institucion/editar/1') }}" class="btn btn-outline btn-success"><i class="fa fa-edit"></i> EDITAR</a>
            </div>

            <br>
            <table class="table table-bordered">
                <thead>

                </thead>
                <tbody>
                    <tr>
                        <td>NOMBRE DE LA INSTITUCIÓN</td>
                        <td>{{$institucionn->nombre}}</td>
                    </tr>
                    <tr>
                        <td>RUC</td>
                        <td>{{$institucionn->ruc}}</td>
                    </tr>
                    <tr>
                        <td>TELÉFONO</td>
                        <td>{{$institucionn->telefono}}</td>
                    </tr>
                    <tr>
                        <td>DIRECCIÓN</td>
                        <td>{{$institucionn->direccion}}</td>
                    </tr>
                    <tr>
                        <td>ORGANO DE CONTROL INSITUCIONAL</td>
                        <td>{{$institucionn->organo_control}}</td>
                    </tr>
                    <tr>
                        <td>DENOMINACIÓN DEL AÑO ACTUAL</td>
                        <td>{{$institucionn->denominacion_anio}}</td>
                    </tr>

                </tbody>
            </table>

        </div>

    </div>


@endsection