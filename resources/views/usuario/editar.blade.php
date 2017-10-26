@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Editar Auditoria</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form method="post" action="{{URL::to('auditoria/guardar')}}">
                            {{csrf_field()}}
                            <div class="col-md-6 b-r">
                                <div class="form-group"><label class="">Nombre de auditoria</label>
                                    <input type="text" class="form-control" name="nombrePlanF">
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="">Código del servicio de control posterior</label>
                                    <input type="text" class="form-control" name="codigoServicioCP">
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="">Tipo de servicio de control posterior</label>
                                    <input type="text" class="form-control" name="tipoServicioCP">
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="">Órgano de control institucional</label>
                                    <input type="text" class="form-control" name="organoCI">
                                </div>
                                <div class="hr-line-dashed"></div>



                            </div>

                            <div class="col-md-6">
                                <div class="form-group"><label class="">Entidad Auditada</label>
                                    <input type="text" class="form-control" name="entidadAuditada">
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="">Tipo de demanda de control (demanda autogenerada / demanda imprevisible)</label>
                                    <input type="text" class="form-control" name="tipoDemanda"> <span class="help-block m-b-none"></span>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="">Plan</label>
                                    <select class="form-control m-b" name="codPlanA">
                                        <option>-- Seleccione --</option>
                                        @foreach($planes as $plan)
                                            <option value="{{$plan->codPlanA}}">{{$plan->nombrePlan}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="hr-line-dashed"></div>


                            </div>

                            <div class="col-md-12">
                                <div class="form-group"><label class="">Origen</label>
                                    <textarea class="form-control" name="origen"></textarea>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop