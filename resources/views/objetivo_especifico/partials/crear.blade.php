<div class="col-lg-12" id="div-crear-objetivo-especifico">
    {!! Form::open(['method' => 'POST', 'route' => 'objetivo-especifico.guardar', 'class' => 'form-horizontal']) !!}

        <div class="col-md-6" style="padding-right: 20px">
            <input type="hidden" name="codObjGen" value="{{$auditoria->objetivoGeneral->codObjGen}}">
            <input type="hidden" name="codPlanF" value="{{$auditoria->codPlanF}}">
            <div class="form-group">
                <label class=control-label">Detalle</label>
                {!! Form::textarea('nombre', null, ['class' => 'form-control', 'size' => '50x5']) !!}
            </div>
        </div>

        <div class="col-md-6">
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
        </div>
    <button type="submit" class="btn btn-primary">
        Guardar
    </button>
    {!! Form::close() !!}
</div>


