@extends('layout.admin')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {!! session('success') !!}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>CREAR NORMATIVA APLICABLE A LA ENTIDAD Y MATERIA(S) A EXAMINAR</h5>

                </div>
                <div class="ibox-content">
                    <div class="row">
                        {!! Form::open(['method' => 'POST', 'route' => 'normaAuditoria.guardar']) !!}
                        <div class="col-md-12">

                            <div class="col-md-3">
                                {!! Field::text('tipoNormativa') !!}

                            </div>

                            <div class="col-md-3">
                            {!! Field::text('numero') !!}
                            </div>


                            <div class="col-md-3">
                            <label class="">Marcoproceso</label>
                            {!! Form::select('codMacroP', $macroProcesos, null, ['class' => 'form-control'] ) !!}
                            </div>

                            <div class="col-md-3">
                            {!! Field::date('fecha', \Carbon\Carbon::now()) !!}
                            </div>
                            <div class="col-md-12">
                                {!! Field::textarea('nombre') !!}
                            </div>

                            <div class="col-md-12 " style="margin-top: 20px;">
                                <input type="submit" class="btn btn-primary btn-outline" value="REGISTRAR">
                                <a href="{!! route('normaAuditoria.listarAplica') !!}" class="btn btn-danger btn-outline">ATRAS</a>

                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop