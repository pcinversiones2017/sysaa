@extends('layout.admin')
@section('content')

    @if($macroprocesos->isEmpty())
        <div class="alert alert-danger  alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            TIENE QUE <a class="alert-link" href="{{ route('macroproceso.crear') }}">CREAR </a> MACROPROCESOS PARA QUE PUEDA CONTINUAR
        </div>
    @endif
<div class="row">
        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            CREAR OBJETIVO ESPECIFICO
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12 col-md-12">
                                <div class="row">
                                    {!! Form::open(['method' => 'POST', 'route' => 'objetivo-especifico.guardar', 'class' => 'form-horizontal']) !!}
                                    <input type="hidden" name="codObjGen" value="{{$auditoria->objetivoGeneral->codObjGen}}">
                                    <input type="hidden" name="codPlanF" value="{{$auditoria->codPlanF}}">
                                    <div class="col-lg-12 col-md-12">

                                        {!! Field::textarea('nombre', null, ['class' => 'form-control', 'size' => '50x5', 'label' => 'DETALLE']) !!}
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="control-label">MACROPROCESO</label>
                                            <select class="form-control m-b" name="codMacroP" id="codMacroP">
                                                <option>-- Seleccione --</option>
                                                @foreach($macroprocesos as $macroproceso)
                                                    <option value="{{$macroproceso->codMacroP}}">{{$macroproceso->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="control-label">PROCESOS</label>
                                            <div id="procesos">0</div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        {!! Field::text('materia', ['label' => 'MATERIAS A EXAMINAR']) !!}

                                        <div class="hr-line-dashed"></div>

                                        <div class="form-group">
                                            @if($macroprocesos->isNotEmpty())
                                                <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> REGISTRAR</button>
                                            @endif
                                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-outline">ATRAS</a>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>


                    {!! Form::close() !!}
        </div>
</div>
@endsection

@section('js-script')
<script type="text/javascript">
    $("#codMacroP").change(function(){
        var dato = $("#codMacroP").val();
        $.get("{!! url('procesoma/obtener-procesos/') !!}"+"/"+dato, function(data){
            $("#procesos").html('');
            $.each(data, function(key, element){
                $("#titulo").append("PROECSOS");
                $("#procesos").append("<ul><li>procesos: "+element.nombre+"</li></ul>");
                
            });
        });
    });
</script>

@stop

