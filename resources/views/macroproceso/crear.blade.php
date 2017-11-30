@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            CREAR MACROPROCESO
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                {!! Form::open(['method' => 'POST', 'route' => 'macroproceso.guardar']) !!}
                                <div class="col-md-12">
                                    {!! Field::text('nombre', ['label' => 'Nombre']) !!}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> REGISTRAR</button>
                                        <a href="{!! route('macroproceso.listar') !!}" class="btn btn-danger btn-outline">CANCELAR</a>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>

        </div>
    </div>
@stop