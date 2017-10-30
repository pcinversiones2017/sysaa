@extends('layout.admin')

@section('css-style')
{!! Html::style('css/plugins/summernote/summernote.css') !!}
{!! Html::style('css/plugins/summernote/summernote-bs3.css') !!}
@stop

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de Asignaciones </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                	<label>Informe</label>
                	<textarea class="summernote" name="informe"></textarea>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js-script')

    <!-- Custom and plugin javascript -->
    {!! Html::script('js/inspinia.js') !!}
    {!! Html::script('js/plugins/pace/pace.min.js') !!}
    {!! Html::script('js/plugins/summernote/summernote.min.js') !!}
    <script>
        $(document).ready(function(){

            $('.summernote').summernote();

       });
    </script>
@stop