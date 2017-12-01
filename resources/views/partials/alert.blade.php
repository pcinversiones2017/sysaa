@section('css-style')
    {!! Html::style('css/animate.css') !!}
@stop
@if (session('success'))
    <div id="alert-success" class="alert alert-success  alert-dismissable animated fadeInDownBig">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <a class="alert-link" href="#">{{session('success')}}</a>.
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger  alert-dismissable animated fadeInDownBig">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <a class="alert-link" href="#">{{session('danger')}}</a>.
    </div>
@endif
@if(session('update'))
<div class="alert alert-info  alert-dismissable animated fadeInDownBig">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <a class="alert-link" href="#">{{session('update')}}</a>.
</div>
@endif