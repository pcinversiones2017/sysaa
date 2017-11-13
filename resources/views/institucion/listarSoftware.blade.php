@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="panel panel-success">
        <div class="panel-heading">
            INFORMACIÓN DEL SOFTWARE
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Version</th>
                    <th>Fecha creacion</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($software as $software)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$software->nombre_software}}</td>
                        <td>{{$software->version_software}}</td>
                        <td>{{$software->fecha_creado}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection