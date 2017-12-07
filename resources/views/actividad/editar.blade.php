@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            EDITAR ACTIVIDAD
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['method' => 'POST', 'route' => 'actividad.actualizar']) !!}
                            <input type="hidden" value="{{$actividad->codProSP}}" name="codProSP">
                            <input type="hidden" value="{{$actividad->codAct}}" name="codAct">
                            {!! Field::text('responsable', $actividad->responsable, ['label' => 'Responsable']) !!}
                            {!! Field::textarea('nombre', $actividad->nombre, ['label' => 'Actividad']) !!}
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-outline" value=""><i class="fa fa-save"></i> ACTUALIZAR</button>

                                <a href="{{URL::to('procedimientosp/mostrar')}}/{{$actividad->codProSP}}"  class="btn btn-danger btn-outline">ATRAS</a>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>

        </div>
    </div>
@stop