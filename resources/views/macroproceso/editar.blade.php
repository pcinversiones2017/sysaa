@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            EDITAR MACROPROCESO
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['method' => 'POST', 'route' => 'macroproceso.actualizar']) !!}
                            <input type="hidden" value="{{$macroproceso->codMacroP}}" name="codMacroP">
                            {!! Field::text('nombre', $macroproceso->nombre, ['label' => 'Nombre']) !!}
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> ACTUALIZAR</button>
                                <a href="{!! route('macroproceso.listar') !!}" class="btn btn-danger btn-outline">ATRAS</a>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@stop