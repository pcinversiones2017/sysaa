@extends('layout.admin')

@section('css-style')
{!! Html::style('https://summernote.org/bower_components/summernote/dist/summernote.css') !!}
@stop

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
            <div class="panel-heading">
                <strong> EDITAR INFORME </strong>
            </div>
            <div class="panel-body">
                {!! Form::open(['method' => 'POST', 'route' => 'informe.actualizar']) !!}
                @foreach($informe as $row)
                {!! Form::hidden('codInf',$row->codInf) !!}
                {!! Field::textarea('informe', $row->informe, ['class' => 'summernote']) !!}
                @endforeach
                {!! Form::button("<i class='fa fa-save'></i> ACTUALIZAR", ['class' => 'btn btn-success btn-outline', 'type' => 'submit']) !!}
                <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a>
                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>
@stop

@section('js-script')

    {!! Html::script('https://summernote.org/bower_components/summernote/dist/summernote.js') !!}
    <script>
        $(document).ready(function(){

            $('.summernote').summernote({
                height: 450,
            });

       });
    </script>
@endsection