@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            EDITAR PROCEDIMIENTO
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['method' => 'POST', 'route' => 'procedimientosp.actualizar']) !!}
                            <input type="hidden" value="{{$procedimientosp->codSubPro}}" name="codSubPro">
                            <input type="hidden" value="{{$procedimientosp->codProSP}}" name="codProSP">
                            {!! Field::text('nombre', $procedimientosp->nombre, ['label' => 'Nombre']) !!}
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-outline" value=""><i class="fa fa-save"></i> ACTUALIZAR</button>
                                <a href="{{URL::to('subproceso/mostrar')}}/{{$procedimientosp->subProceso->codSubPro}}"  class="btn btn-danger btn-outline">CANCELAR</a>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@stop