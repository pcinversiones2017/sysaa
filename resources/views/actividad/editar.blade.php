@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>EDITAR ACTIVIDAD</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    {!! Form::open(['method' => 'POST', 'route' => 'actividad.actualizar']) !!}
                    <input type="hidden" value="{{$actividad->codProSP}}" name="codProSP">
                    <input type="hidden" value="{{$actividad->codAct}}" name="codAct">
                    {!! Field::text('responsable', $actividad->responsable, ['label' => 'Responsable']) !!}
                    {!! Field::textarea('nombre', $actividad->nombre, ['label' => 'Actividad']) !!}
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-outline" value="ACTUALIZAR">
                        <a href="{{URL::to('procedimientosp/mostrar')}}/{{$actividad->codProSP}}"  class="btn btn-danger btn-outline">CANCELAR</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop