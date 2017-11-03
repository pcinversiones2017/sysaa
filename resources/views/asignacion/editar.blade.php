@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Crear Usuario</h5>

            </div>
            <div class="ibox-content">
                <div class="row">
                    {!! Form::open(['method' => 'POST', 'route' => 'asignarr.actualizar']) !!}
                    @foreach($usuariorol as $row)
                        <input type="hidden" name="id" value="{!! $row->codUsuRol !!}">
                        <div class="col-md-6 b-r">
                            <label>USUARIO</label>
                            {!! Form::select('usuario',$usuario,$row->codUsu,['class' => 'form-control']) !!}
                            <div class="hr-line-dashed"></div>

                            <label>ROL</label>
                            {!! Form::select('rol',$rol,$row->codRol,['class' => 'form-control']) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('horasH', $row->horasH, ['label' => 'HORAS HOMBRES']) !!}
                            <div class="hr-line-dashed"></div>
                            {!! Field::text('sueldo', $row->sueldo, ['label' => 'SUELDO']) !!}
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-outline" value="ACTUALIZAR">
                                <a href="{{url()->previous()}}" class="btn btn-danger btn-outline">ATRAS</a>
                            </div>
                            <div class="hr-line-dashed"></div>

                        </div>
                    @endforeach
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>
@stop