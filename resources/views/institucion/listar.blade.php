@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de planes </h5>
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
                        <!--
                      <a type="button" href="{{URL::to('plan/crear')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Crear Plan Anual</a>
                      -->
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Fecha creacion</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($instituciones as $institucione)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$institucione->nombreInstitucion}}</td>
                                <td>{{$institucione->fecha_creado}}</td>
                                <td>
                                    <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> Ver </a>
                                    <a href="{{URL::to('institucion/editar')}}/{{$institucione->codInstitucion}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection