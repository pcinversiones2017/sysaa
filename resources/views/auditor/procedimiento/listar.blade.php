@extends('layout.admin')
@section('content')

    @if (session('success'))
    <div class="alert alert-success" role="alert">
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
                    <h5>Lista de Procedimientos </h5>
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

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Justificacion</th>
                            <th>detalle</th>
                            <th>fecha fin</th>
                            <th>Objetivo Especifico</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($procedimiento as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{!! $row->justificacion !!}</td>
                                <td>{!! $row->detalle !!}</td>
                                <td>{!! $row->fechafin !!}</td>
                                <td>{!! $row->objetivoespecifico->nombre !!}</td>
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