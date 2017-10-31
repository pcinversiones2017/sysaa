<div class="modal fade" id="modal_crear_objetivo_especifico" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Crear Objetivo Especifico
                </h4>

            </div>

            {!! Form::open(['method' => 'POST', 'route' => 'objetivo-especifico.guardar', 'class' => 'form-horizontal']) !!}
                <div class="modal-body">

                    <div class="form-horizontal">
                        {{csrf_field()}}
                        <input type="hidden" name="codObjGen" value="{{$auditoria->objetivoGeneral->codObjGen}}">
                        <input type="hidden" name="codPlanF" value="{{$auditoria->codPlanF}}">

                        <div class="form-group">
                            <label  class="col-sm-2 control-label"
                                    for="inputEmail3">Detalle</label>
                            {!! Form::textarea('nombre', null, ['class' => 'form-control', 'size' => '50x5']) !!}
                        </div>

                        {!! Field::text('materia', ['label' => 'Materia a examinar']) !!}

                        <div class="form-group"><label class="col-sm-2">Macroproceso</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="codMacroP">
                                    <option>-- Seleccione --</option>
                                    @foreach($macroprocesos as $macroproceso)
                                        <option value="{{$macroproceso->codMacroP}}">{{$macroproceso->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>