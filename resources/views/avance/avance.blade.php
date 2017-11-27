@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            BUSCAR AVANCE POR AUDITORIA
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            	{!! Form::open(['method' => 'POST', 'route' => 'avance.buscar']) !!}
                                <div class="col-sm-11">
                                    {!! Form::select('auditoria', $auditorias, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE AUDITORIA']) !!}
                                </div>
                                <div class="col-sm-1">
                                    {!! Form::submit('BUSCAR', ['class' => 'btn btn-primary btn-outline']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop