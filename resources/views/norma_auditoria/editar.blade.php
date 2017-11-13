@extends('layout.admin')
@section('content')

    <div class="panel panel-success">
        <div class="panel-heading">
            EDITAR NORMATIVA APLICABLE A LA ENTIDAD Y MATERIA(S) A EXAMINAR
        </div>
        <div class="panel-body">
            {!! Form::open(['method' => 'POST', 'route' => 'norma-auditoria.actualizar']) !!}

            <input type="hidden" value="{{$normativa->codNorm}}" name="codNorm">
            <input type="hidden" value="{{$normativa->codMacroP}}" name="codMacroP">
            <div class="col-md-12">

                <div class="col-md-3">
                    {!! Field::text('tipoNormativa',$normativa->tipoNormativa) !!}

                </div>

                <div class="col-md-3">
                    {!! Field::text('numero',$normativa->numero) !!}
                </div>

                <div class="col-md-3">
                    <label class="">Marcoproceso</label>
                    {!! Form::select('codMacroP', $macroProcesos, null, ['class' => 'form-control'] ) !!}
                </div>

                <div class="col-md-3">
                    {!! Field::date('fecha',$normativa->fecha) !!}
                </div>
                <div class="col-md-12">
                    {!! Field::textarea('nombre', $normativa->nombre, ['rows' => 2]) !!}
                </div>
                @if(!empty($normativa->nombre_archivo))
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
                                <td><a href="{{URL::to('norma-auditoria/archivo-descargar')}}/{{$normativa->codNormMacro}}"><i class="fa fa-file-text fa-2x" aria-hidden="true"></i></a>
                                </td>
                                <td>{{$normativa->nombre_archivo}}</td>
                                <td><a href="{{URL::to('norma-auditoria/archivo-eliminar')}}/{{$normativa->codNormMacro}}" class="btn btn-danger btn-outline btn-sm"><i class="fa fa-trash"></i>ELIMINAR</a>

                            </tr>
                            </tbody>
                        </table>

                    </div>
                @endif
                <div class="col-md-6" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> ACTUALIZAR</button>
                    <a href="{!! route('norma-auditoria.listar-aplica') !!}" class="btn btn-danger btn-outline">ATRAS</a>

                </div>
            </div>
        </div>

    </div>


@stop