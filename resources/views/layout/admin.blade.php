<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SYSAA</title>

    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.css') !!}
    {!! Html::style('css/animate.css') !!}
    {!! Html::style('css/style.css') !!}

    @yield('css-style')

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

<<<<<<< HEAD
{!! Html::script('js/jquery-3.1.1.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/plugins/metisMenu/jquery.metisMenu.js') !!}
{!! Html::script('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}
=======
<!-- Mainly scripts -->
<script src="{{URL::to('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{URL::to('js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{URL::to('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{URL::to('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
>>>>>>> 13a6b4a402c1f8bc747af98417005f1b8c9a97b9

@yield('js-script')

{!! Html::script('js/inspinia.js') !!}
</body>

</html>
