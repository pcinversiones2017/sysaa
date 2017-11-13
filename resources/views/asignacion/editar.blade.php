@extends('layout.admin')
@section('content')
    <div class="alert alert-info  alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <a class="alert-link" href="#">Si desea cambiar de rol a Supervisor o Jefe de comisión, debe cambiar primero los roles de ellos a Integrante</a>.
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">
        EDITAR USUARIO ASIGNADO
        </div>
        <div class="panel-body">

            <div class="row">
                {!! Form::open(['method' => 'POST', 'route' => 'asignarr.actualizar']) !!}
                <input type="hidden" name="codUsuRol" value="{!! $usuarioRol->codUsuRol !!}">
                <div class="col-md-6 b-r">
                    {!!  Field::text('codUsu', $usuario->datos, ['label' => 'USUARIO', 'disabled' => 'disabled']) !!}
                    <div class="hr-line-dashed"></div>

                    <label>ROL</label>
                    {!! Form::select('rol', $rol, $usuarioRol->codRol,['class' => 'form-control']) !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::number('horasH', $usuarioRol->horasH, ['label' => 'HORAS HOMBRES']) !!}
                    <div class="hr-line-dashed"></div>
                    {!! Field::number('sueldo', $usuarioRol->sueldo, ['label' => 'SUELDO']) !!}
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> ACTUALIZAR</button>
                        <a href="{{url()->previous()}}" class="btn btn-danger btn-outline">ATRAS</a>
                    </div>
                    <div class="hr-line-dashed"></div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@stop