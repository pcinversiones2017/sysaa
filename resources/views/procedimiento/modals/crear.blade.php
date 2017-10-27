<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog"
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
            <form class="form-horizontal" role="form" method="post" action="{{URL::to('objetivo-especifico/guardar')}}">
                <!-- Modal Body -->

                <div class="modal-body">

                    <div class="form-horizontal">
                        {{csrf_field()}}
                        <input type="hidden" name="codObjGen" value="{{$auditoria->objetivoGeneral->codObjGen}}">
                        <input type="hidden" name="codPlanF" value="{{$auditoria->codPlanF}}">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label"
                                    for="inputEmail3">Detalle</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="nombre"> </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"
                                   for="materia" >Materia a examinar </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="materia" name="materia" />
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2">Macroproceso</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="codMacroP">
                                    <option>-- Seleccione --</option>
                                    @foreach($auditoria->macroprocesos as $macroproceso)
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