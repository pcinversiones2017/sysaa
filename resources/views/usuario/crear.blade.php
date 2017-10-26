@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Crear Auditoria</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <form method="post" action="{!! route('usuario.registrar') !!}">
                        {{csrf_field()}}
                        <div class="col-md-6 b-r">
                            <div class="form-group"><label class="">Email</label>
                                <input type="text" class="form-control" name="nombrePlanF">
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="">Nombres</label>
                                <input type="text" class="form-control" name="tipoServicioCP">
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="">Materno</label>
                                <input type="text" class="form-control" name="organoCI">
                            </div>
                            <div class="hr-line-dashed"></div>



                        </div>
                        <div class="col-md-6 b-r">

                            <div class="form-group"><label class="">Contraseña</label>
                                <input type="password" class="form-control" name="codigoServicioCP">
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="">Paterno</label>
                                <input type="text" class="form-control" name="organoCI">
                            </div>
                            <div class="hr-line-dashed"></div>



                        </div>

                        

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@stop