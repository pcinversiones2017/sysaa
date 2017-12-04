@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            EDITAR PROCESO
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['method' => 'POST', 'route' => 'procesoma.actualizar']) !!}
                            <input type="hidden" value="{{$procesoma->codMacroP}}" name="codMacroP">
                            <input type="hidden" value="{{$procesoma->codProMA}}" name="codProMA">
                            {!! Field::text('nombre', $procesoma->nombre, ['label' => 'Nombre']) !!}
                            {!! Field::textarea('riesgo', $procesoma->riesgo, ['label' => 'Riesgo']) !!}
                            <div class="form-group">
                                <label>PONDERACION</label>
                                <select name="ponderacion" class="form-control">
                                    <option value="ALTO" <?php if($procesoma->ponderacion == 'ALTO'){ echo 'selected'; } ?> >ALTO</option>
                                    <option value="MEDIO" <?php if($procesoma->ponderacion == 'MEDIO'){ echo 'selected'; } ?> >MEDIO</option>
                                    <option value="BAJO" <?php if($procesoma->ponderacion == 'BAJO'){ echo 'selected'; } ?> >BAJO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-outline" value=""><i class="fa fa-save"></i> ACTUALIZAR</button>
                                <a href="{{URL::to('macroproceso/mostrar')}}/{{$procesoma->macroproceso->codMacroP}}"  class="btn btn-danger btn-outline">CANCELAR</a>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
@stop