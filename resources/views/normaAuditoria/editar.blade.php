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

                            <div class="col-md-3">
                                {!! Field::text('numero',$normativaMacroproceso->Normativac->numero) !!}
                            </div>

                            <div class="col-md-3">
                                <label class="">Marcoproceso</label>
                                {!! Form::select('codMacroP', $macroProcesos, null, ['class' => 'form-control'] ) !!}
                            </div>

                            <div class="col-md-3">
                                {!! Field::date('fecha',$normativaMacroproceso->Normativac->fecha) !!}
                            </div>
                            <div class="col-md-12">
                                {!! Field::textarea('nombre') !!}
                            </div>
                            @if(!empty($normativaMacroproceso->nombre_archivo))
                            <div class="row">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ruta</th>
                                        <th>Archivo</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                      <tr>
                                            <td><a href="{{URL::to('norma-auditoria/archivo-descargar')}}/{{$normativaMacroproceso->codNormMacro}}"><i class="fa fa-file-text fa-2x" aria-hidden="true"></i></a>
                                            </td>
                                            <td>{{$normativaMacroproceso->nombre_archivo}}</td>
                                          <td><a href="{{URL::to('norma-auditoria/archivo-eliminar')}}/{{$normativaMacroproceso->codNormMacro}}" class="btn btn-danger btn-outline btn-sm"><i class="fa fa-trash"></i>ELIMINAR</a>

                                      </tr>
                                    </tbody>
                                </table>

                            </div>
                            @endif
                            <div class="col-md-2" style="margin-top: 20px;">
                                <input type="submit" class="btn btn-primary btn-outline" value="ACTUALIZAR">
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