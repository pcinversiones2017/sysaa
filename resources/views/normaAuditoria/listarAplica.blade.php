@extends('layout.admin')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {!! session('success') !!}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>LISTA DE NORMATIVAS QUE REGULA LA AUDITORÍA DE CUMPLIMIENTO</h5>
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


                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>TIPO</th>
                            <th>NÚMERO</th>
                            <th>NOMBRE DE NORMATIVA</th>
                            <th>FECHA DE VIGENCIA</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($normasCAuditoria as $normaCAuditoria)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$normaCAuditoria->tipoNormativa}}</td>
                                <td>{{$normaCAuditoria->numero}}</td>
                                <td>{{$normaCAuditoria->nombre}}</td>
                                <td>{{$normaCAuditoria->fecha}}</td>
                                <td>
                                    <a href="{{URL::to('normaAuditoria/editar')}}/{{$normaCAuditoria->codNorm}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a>

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