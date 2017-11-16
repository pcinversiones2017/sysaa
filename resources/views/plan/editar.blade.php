@extends('layout.admin')
@section('content')

    <div class="panel panel-success">
        <div class="panel-heading">
            EDITAR PLAN
        </div>
        <div class="panel-body">
            {!! Form::open(['method' => 'POST', 'route' => 'plan.actualizar']) !!}
            <input type="hidden" value="{{$plan->codPlanA}}" name="codPlanA">
            {!! Field::text('nombrePlan', $plan->nombrePlan, ['label' => 'NOMBRE DEL PLAN ANUAL']) !!}
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> ACTUALIZAR</button>
                <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
@stop