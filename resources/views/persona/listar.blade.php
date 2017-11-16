@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="panel panel-success">
        <div class="panel-heading">
            LISTA DE PERSONAS
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-3">
                    <a type="button" href="{!! route('persona.crear') !!}" class="btn btn-outline btn-success"><i class="fa fa-pencil"></i> CREAR PERSONA</a>
                    <p>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>NOMBRES</th>
                    <th>AP. PATERNO</th>
                    <th>AP. MATERNO</th>
                    <th>EMAIL</th>
                    <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($personas as $persona)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{!! $persona->nombres !!}</td>
                        <td>{!! $persona->paterno !!}</td>
                        <td>{!! $persona->materno !!}</td>
                        <td>{!! $persona->email !!}</td>
                        <td style="text-align: center">
                            <a href="{!! url('persona/editar/' . $persona->codPer) !!}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i>  </a>
                            <a href="{!! url('usuario/eliminar/' . $persona->codPer) !!}" class="btn btn-danger btn-outline"><i class="fa fa-trash"></i>  </a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection