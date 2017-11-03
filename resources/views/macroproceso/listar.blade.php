@extends('layout.admin')
@section('content')
    @if (session('success'))
    <div class="alert alert-success alert-dismissable">
        <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
        {!! session('success') !!}          
    </div>
    @endif

    @if (session('danger'))
    <div class="alert alert-danger alert-dismissable">
        <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
        {!! session('danger') !!}           
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de MacroProcesos </h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-3">
                            <a type="button" href="{{URL::to('macroproceso/crear')}}" class="btn btn-outline btn-primary">
                            Crear Macroproceso</a><p>
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
                        @foreach($macroprocesos as $n =>$macroproceso)
                            <tr>
                                <td align="middle">{{$n+1}}</td>
                                <td>{{$macroproceso->nombre}}</td>
                                <td>{{$macroproceso->fecha_creado}}</td>
                                <td>
                                    <a href="{{URL::to('macroproceso/mostrar')}}/{{$macroproceso->codMacroP}}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i>  </a>
                                    <a href="{{URL::to('macroproceso/editar')}}/{{$macroproceso->codMacroP}}" class="btn btn-primary btn-outline">
                                        <i class="fa fa-edit"></i>  </a>
                                    <a href="{{URL::to('macroproceso/eliminar')}}/{{$macroproceso->codMacroP}}" class="btn btn-danger btn-outline">
                                        <i class="fa fa-trash"></i>  </a>
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
