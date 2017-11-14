@extends('layout.admin')
@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            ASIGNACIÓN DE COMISIÓN
        </div>
        <div class="panel-body">
            <div class="row">
                {!! Form::open(['method' => 'POST', 'route' => 'asignarr.registrar']) !!}

                <div class="col-md-6 b-r">
                    <input type="hidden" value="{{$codPlanF}}" name="codPlanF">
                    <label>USUARIO</label>
                    <select class="form-control" name="codUsu" >
                        @foreach($usuario as $usu)
                            <option value="{{$usu->codUsu}}">{{$usu->nombres}} {{ $usu->activo ? ' - activo' : ''}}</option>
                        @endforeach
                    </select>
                    {{--{!! Form::select('usuario', $usuario, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE']) !!}--}}
                    <div class="hr-line-dashed"></div>

                    <label>ROL</label>
                    {!! Form::select('rol', $rol, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE']) !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::number('horasH', ['label' => 'HORAS HOMBRES']) !!}
                    {!! Field::number('sueldo', ['label' => 'SUELDO']) !!}
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> REGISTRAR</button>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-outline">ATRAS</a>
                    </div>
                    <div class="hr-line-dashed"></div>

                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div>



@stop