@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Asignar </h5>

            </div>
            <div class="ibox-content">
                <div class="row">
                    {!! Form::open(['method' => 'POST', 'route' => 'asignarr.registrar']) !!}

                        <div class="col-md-6 b-r">
                            <input type="hidden" value="{{$codPlanF}}" name="codPlanF">
                            <label>USUARIO</label>
                            <select class="form-control">
                            @foreach($usuario as $usu)
                                <option value="{{$usu->codUsu}}">{{$usu->nombres}} {{ $usu->activo ? ' - activo' : ''}}</option>
                            @endforeach
                            </select>
                            {{--{!! Form::select('usuario', $usuario, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE']) !!}--}}
                            <div class="hr-line-dashed"></div>

                            <label>ROL</label>
                            {!! Form::select('rol', $rol, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE']) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('horasH', ['label' => 'HORAS HOMBRES']) !!}
                            {!! Field::text('sueldo', ['label' => 'SUELDO']) !!}
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-outline" value="REGISTRAR">
                                <a href="{{ url()->previous() }}" class="btn btn-danger btn-outline">ATRAS</a>
                            </div>
                            <div class="hr-line-dashed"></div>

                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>
@stop