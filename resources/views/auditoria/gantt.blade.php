@extends('layout.admin')
@section('css-style')
    {!! Html::style('css/gantt.css') !!}
    {!! Html::style('css/plugins/alertifyjs/alertify.min.css') !!}
@stop
@section('content')


        <div class="panel panel-success">
            <div class="panel-heading">
                DIAGRAMA DE GANTT POR AUDITORIA
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-10">
                        <select id="select-auditoria" class="form-control" name="codPlanF" style="height: 21px;">
                            <option value="">--- Seleccione Auditoria ---</option>
                            @foreach($auditorias as $auditoria)
                            <option value="{{$auditoria->codPlanF}}">{{$auditoria->nombrePlanF}}</option>
                            @endforeach
                        </select>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="contain">
            <div class="gantt"></div>
        </div>




@stop

@section('js-script')
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    {!! Html::script('js/jquery.fn.gantt.js') !!}

<script>

$('#select-auditoria').on('change', function () {
    $.get(server + 'auditoria/diagrama-gantt/' + $(this).val()).done(function (data) {
        console.log(data);
        if(data.success){
            $(".gantt").gantt({
                source : data.data,
                navigate: "scroll",
                scale: "days",
                maxScale: "months",
                minScale: "days",
                itemsPerPage: 10,
                months	: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
                dow : ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                onItemClick: function(data) {
                    alertify.alert('Detalle Procedimiento', data);
                },
                onAddClick: function(dt, rowId) {
                    alert("Empty space clicked - add an item!");
                },
//                onRender: function() {
//                    if (window.console && typeof console.log === "function") {
//                        console.log("chart rendered");
//                    }
//                }
            });

        }else{
            alertify.alert('Mensaje', data.message)
                .set('labels', {ok:'Aceptar', cancel:'Cancelar'});

        }

//        $(".gantt").popover({
//            selector: ".bar",
//            title: "I'm a popover",
//            content: "Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Mauris blandit aliquet elit, eget tincidunt nibh",
//            trigger: "hover"
//        });
//
//        prettyPrint();
    });
});



</script>
@stop