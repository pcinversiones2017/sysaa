@extends('layout.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    EDITAR OBJETIVO ESPECÍFICO
                </div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'route' => 'objetivo-especifico.actualizar', 'class' => 'form-horizontal']) !!}
                    <input type="hidden" name="codObjEsp" value="{{$objetivoEspecifico->codObjEsp}}">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label class=control-label">Detalle</label>
                            {!! Form::textarea('nombre', $objetivoEspecifico->nombre, ['class' => 'form-control', 'size' => '50x5']) !!}
                        </div>
                        <div class="hr-line-dashed"></div>
                        {!! Field::text('materia', $objetivoEspecifico->materia, ['label' => 'Materia a examinar']) !!}

                        <div class="form-group">
                            <label class="control-label">Macroproceso</label>
                            <select class="form-control m-b" name="codMacroP">
                                <option>-- Seleccione --</option>
                                @foreach($macroprocesos as $macroproceso)
                                    <option value="{{$macroproceso->codMacroP}}" {{$macroproceso->codMacroP == $objetivoEspecifico->codMacroP ? 'selected' : ''}}>{{$macroproceso->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> ACTUALIZAR</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-outline">ATRAS</a>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
