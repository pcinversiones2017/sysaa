@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>INFORMACION DEL SOFTWARE</h5>
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
        </div>

    </div>
@endsection