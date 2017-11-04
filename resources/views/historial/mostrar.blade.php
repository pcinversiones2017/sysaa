<?php
use App\Models\Historial;
?>
@extends('layout.admin')

@section('content')
            <div class="row animated fadeInRight">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="text-center float-e-margins p-md">
                    <span>HISTORIAL DE NAVEGACION DEL USUARIO:  </span>
                    <a href="#" class="btn btn-outline btn-success" id="lightVersion">Ligero version</a>
                    <a href="#" class="btn btn-outline btn-success" id="darkVersion">Oscuro version</a>
                    <a href="#" class="btn btn-outline btn-success" id="leftVersion">Izquierda version</a>
                    </div>
                    <div class="ibox-content" id="ibox-content">

                        <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                            @foreach($historial as $row)
                            <div class="vertical-timeline-block">
                                @if($row->accion == Historial::LEER)
                                <div class="vertical-timeline-icon blue-bg">
                                    <i class="fa fa-eye"></i>
                                </div>
                                @elseif($row->accion == Historial::CREAR)
                                <div class="vertical-timeline-icon blue-bg">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                @elseif($row->accion == Historial::REGISTRAR)
                                <div class="vertical-timeline-icon navy-bg">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                @elseif($row->accion == Historial::EDITAR)
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-edit"></i>
                                </div>
                                @elseif($row->accion == Historial::ACTUALIZAR)
                                <div class="vertical-timeline-icon yellow-bg">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                @elseif($row->accion == Historial::ELIMINAR)
                                <div class="vertical-timeline-icon red-bg">
                                    <i class="fa fa-trash"></i>
                                </div>
                                @elseif($row->accion == Historial::INICIAR_SESION)
                                <div class="vertical-timeline-icon blue-bg">
                                    <i class="fa fa-sign-in"></i>
                                </div>
                                @elseif($row->accion == Historial::CERRAR_SESION)
                                <div class="vertical-timeline-icon red-bg">
                                    <i class="fa fa-sign-out"></i>
                                </div>
                                @endif

                                <div class="vertical-timeline-content">
                                    <h2>{!! $row->accion !!}</h2>
                                    <p><strong>{!! $row->mensaje !!}</strong></p>
                                    <span class="vertical-date">
                                        <small>{!! $row->fecha_creado !!}</small>
                                    </span>
                                </div>
                            </div>
                            @endforeach
                            
                    </div>
                </div>
            </div>
        </div>
        
@stop

@section('js-script')
{!! Html::script('js/plugins/peity/jquery.peity.min.js') !!}
{!! Html::script('js/demo/peity-demo.js') !!}
<script>
        $(document).ready(function(){

            $('#lightVersion').click(function(event) {
                event.preventDefault()
                $('#ibox-content').removeClass('ibox-content');
                $('#vertical-timeline').removeClass('dark-timeline');
                $('#vertical-timeline').addClass('light-timeline');
            });

            $('#darkVersion').click(function(event) {
                event.preventDefault()
                $('#ibox-content').addClass('ibox-content');
                $('#vertical-timeline').removeClass('light-timeline');
                $('#vertical-timeline').addClass('dark-timeline');
            });

            $('#leftVersion').click(function(event) {
                event.preventDefault()
                $('#vertical-timeline').toggleClass('center-orientation');
            });


        });
    </script>
@stop