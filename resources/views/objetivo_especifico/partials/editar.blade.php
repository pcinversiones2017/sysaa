<div class="col-lg-12" style="display: none" id="div-editar-objetivo-especifico">
    {!! Form::open(['method' => 'POST', 'route' => 'objetivo-especifico.actualizar', 'class' => 'form-horizontal']) !!}
    <input type="hidden" name="codObjEsp" id="codObjEsp">
    <div class="col-md-6" style="padding-right: 20px">
        <input type="hidden" name="codObjGen" value="{{$auditoria->objetivoGeneral->codObjGen}}">
        <input type="hidden" name="codPlanF" value="{{$auditoria->codPlanF}}">
        <div class="form-group">
            <label class=control-label">Detalle</label>
            {!! Form::textarea('nombre', null, ['class' => 'form-control', 'size' => '50x5', 'id' => 'nombre']) !!}
        </div>
    </div>

    <div class="col-md-6">
        {!! Field::text('materia', ['label' => 'Materia a examinar', 'id' => 'materia']) !!}
        <div class="form-group">
            <label class="control-label">Macroproceso</label>
            <select class="form-control m-b" name="codMacroP" id="macroproceso">
                <option>-- Seleccione --</option>
                @foreach($macroprocesos as $macroproceso)
                    <option value="{{$macroproceso->codMacroP}}">{{$macroproceso->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        Actualizar
    </button>
    {!! Form::close() !!}
</div>
