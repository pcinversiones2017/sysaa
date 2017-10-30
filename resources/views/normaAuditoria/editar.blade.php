@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>CREAR NORMATIVA APLICABLE A LA ENTIDAD Y MATERIA(S) A EXAMINAR</h5>

                </div>
                <div class="ibox-content">
                    <div class="row">

                        {!! Form::open(['method' => 'POST', 'route' => 'normaAuditoria.actualizar']) !!}
                       <input type="hidden" value="{{$normativaMacroproceso->codNormMacro}}" name="codNormMacro">
                        <input type="hidden" value="{{$normativaMacroproceso->codNorm}}" name="codNorm">
                        <input type="hidden" value="{{$normativaMacroproceso->codMacroP}}" name="codMacroP">
                        <div class="col-md-12">

                            <div class="col-md-3">
                                {!! Field::text('tipoNormativa',$normativaMacroproceso->Normativac->tipoNormativa) !!}

                            </div>

                            <div class="col-md-2">
                                {!! Field::text('numero',$normativaMacroproceso->Normativac->numero) !!}
                            </div>

                            <div class="col-md-3">
                                {!! Field::text('nombre',$normativaMacroproceso->Normativac->nombre) !!}
                            </div>
                            <div class="col-md-3">
                                <label class="">Marcoproceso</label>
                                {!! Form::select('codMacroP', $macroProcesos, null, ['class' => 'form-control'] ) !!}
                            </div>

                            <div class="col-md-2">
                                {!! Field::date('fecha',$normativaMacroproceso->Normativac->fecha) !!}
                            </div>
                            <div class="col-md-2" style="margin-top: 20px;">
                                <input type="submit" class="btn btn-primary btn-outline" value="ACTUALIZAR">
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop