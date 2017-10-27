@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Crear Usuario</h5>

            </div>
            <div class="ibox-content">
                <div class="row">
                    <form method="post" action="{!! route('usuario.actualizar') !!}">
                        @foreach($usuario as $row)
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{!! $row->codUsu!!}">
                        <div class="col-md-6 b-r">
                            <div class="form-group"><label class="">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="{!! $row->email !!}">
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="">Nombres</label>
                                <input type="text" class="form-control" name="nombres" value="{!! $row->nombres !!}">
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="">Materno</label>
                                <input type="text" class="form-control" name="materno" value="{!! $row->materno !!}">
                            </div>
                            <div class="hr-line-dashed"></div>



                        </div>
                        <div class="col-md-6 b-r">

                            <div class="form-group"><label class="">Contraseña</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="">Paterno</label>
                                <input type="text" class="form-control" name="paterno" value="{!! $row->paterno !!}">
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-outline" value="ACTUALIZAR">
                                <a href="{!! route('usuario.listar') !!}" class="btn btn-danger btn-outline">ATRAS</a>
                            </div>
                            <div class="hr-line-dashed"></div>

                        </div>

                        @endforeach
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@stop