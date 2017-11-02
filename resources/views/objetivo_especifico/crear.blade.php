@extends('layout.admin')
@section('content')

<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Crear Objetivo Específico </h5>

                </div>
                <div class="ibox-content">
                    <div class="row">
                        {!! Form::open(['method' => 'POST', 'route' => 'objetivo-especifico.guardar', 'class' => 'form-horizontal']) !!}
                        <input type="hidden" name="codObjGen" value="{{$auditoria->objetivoGeneral->codObjGen}}">
                        <input type="hidden" name="codPlanF" value="{{$auditoria->codPlanF}}">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label class=control-label">Detalle</label>
                            {!! Form::textarea('nombre', null, ['class' => 'form-control', 'size' => '50x5']) !!}
                            </div>
                            <div class="hr-line-dashed"></div>
                            {!! Field::text('materia', ['label' => 'Materia a examinar']) !!}

                            <div class="form-group">
                                <label class="control-label">Macroproceso</label>
                                <select class="form-control m-b" name="codMacroP">
                                    <option>-- Seleccione --</option>
                                    @foreach($macroprocesos as $macroproceso)
                                        <option value="{{$macroproceso->codMacroP}}">{{$macroproceso->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-outline" value="REGISTRAR">
                                <a href="{{ url()->previous() }}" class="btn btn-danger btn-outline">ATRAS</a>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </div>



                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
</div>
@endsection

