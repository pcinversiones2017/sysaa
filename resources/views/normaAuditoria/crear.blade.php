@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>CREAR NORMATIVA APLICABLE A LA ENTIDAD Y MATERIA(S) A EXAMINAR</h5>

                </div>
                <div class="ibox-content">
                    <div class="row">
                        {!! Form::open(['method' => 'POST', 'route' => 'usuario.registrar']) !!}
                        <div class="col-md-12">

                            <div class="col-md-3">
                            {!! Field::text('tipoNormativa') !!}

                            </div>
                            <div class="col-md-3">
                            {!! Field::number('numero') !!}
                            </div>

                            <div class="col-md-3">
                            {!! Field::text('nombre') !!}
                            </div>

                            <div class="col-md-2">
                            {!! Field::date('fecha', \Carbon\Carbon::now()) !!}
                            </div>
                            <div class="col-md-">
                                {!! Field::date('fecha', \Carbon\Carbon::now()) !!}
                            </div>



                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop