@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'plan.actualizar']) !!}
                    <input type="hidden" value="{{$plan->codPlanA}}" name="codPlanA">
                    {!! Field::text('nombrePlan', $plan->nombrePlan, ['label' => 'NOMBRE DEL PLAN ANUAL']) !!}
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-outline" value="ACTUALIZAR">
                        <a href="{!! route()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop