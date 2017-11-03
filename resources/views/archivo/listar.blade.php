@extends('layout.admin')
@section('content')

    @if (session('success'))
    <div class="alert alert-success alert-dismissable">
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
                    <h5>Lista de Archivos Cargado </h5>
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
                        <div class="col-sm-9">
                            <a type="button" href="{!! url('archivo/archivo-crear/'.$codPlanF.'/'.$codObjEsp.'/'.$codProc.'/'.$codInf) !!}" class="btn btn-outline btn-primary"><i class="fa fa-plus"></i> CARGAR ARCHIVO</a>
                            <a type="button" href="{!! url('informe/informe/'.$codPlanF.'/'.$codObjEsp.'/'.$codProc) !!}" class="btn btn-outline btn-danger"> REGRESAR INFORME</a>
                            <p>
                            
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($archivos as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{!! $row->nombre !!}</td>
                                <td>
                                    <a href="{!! url('archivo/archivo-eliminar/'.$row->codArc) !!}" class="btn btn-danger btn-outline"><i class="fa fa-trash"></i>  </a>
                                    <a href="{!! url('archivo/archivo-descargar/'.$row->codArc) !!}" class="btn btn-success btn-outline"><i class="fa fa-cloud-download"></i>  </a>
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