@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>CREAR PLAN</h5>
                </div>
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'plan.guardar']) !!}

                    {!! Field::text('nombrePlan', ['label' => 'NOMBRE DEL PLAN ANUAL']) !!}
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-outline" value="REGISTRAR">
                        <a href="{!! route('plan.listar') !!}" class="btn btn-danger btn-outline">ATRAS</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop