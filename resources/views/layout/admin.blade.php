<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SYSAA</title>
    <link rel="shortcut icon" href="{{URL::to('img/favicon.ico')}}"  type="image/vnd.microsoft.icon" />

    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.css') !!}
    {!! Html::style('css/animate.css') !!}
    @yield('css-style')
    {!! Html::style('css/style.css') !!}


</head>

<body>
<div id="wrapper">
    @include('layout.partials.menu')
    <div id="page-wrapper" class="gray-bg">
        @include('layout.partials.header')
        <div class="wrapper wrapper-content">
            @yield('content')
        </div>
        @include('layout.partials.footer')
    </div>
</div>

{!! Html::script('js/jquery-3.1.1.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/plugins/metisMenu/jquery.metisMenu.js') !!}
{!! Html::script('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}
{!! Html::script('js/server.js') !!}
@yield('js-script')
{!! Html::script('js/inspinia.js') !!}
{!! Html::script('js/pace.min.js') !!}

</body>


</html>
