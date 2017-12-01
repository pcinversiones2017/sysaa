@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            BUSCAR RIESGO POR AUDITORIA
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            	{!! Form::open(['method' => 'POST', 'route' => 'riesgos.buscar']) !!}
                                <div class="col-xs-9 col-md-10 col-sm-9">
                                    {!! Form::select('auditoria', $auditoria, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE AUDITORIA']) !!}
                                </div>
                                <div class="col-xs-3 col-md-2 col-sm-3">
                                    {!! Form::submit('BUSCAR', ['class' => 'btn btn-success btn-outline']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection
