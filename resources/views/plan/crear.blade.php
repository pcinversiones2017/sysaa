@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            CREAR PLAN ANUAL
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['method' => 'POST', 'route' => 'plan.guardar']) !!}

                            {!! Field::text('nombrePlan', ['label' => 'NOMBRE DEL PLAN ANUAL']) !!}
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-outline" value="REGISTRAR">
                                <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>

                </div>
    </div>
@stop