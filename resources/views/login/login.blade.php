<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | INICIAR SESION</title>

    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.css') !!}
    {!! Html::style('css/animate.css') !!}
    {!! Html::style('css/style.css') !!}

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"></h1>

            </div>
            <h3>SYSAA</h3>
            <p>Sistema de auditoria academica
            </p>
            <p>Iniciar Sesion</p>
            {!! Form::open(['method' => 'POST', 'url' => 'iniciar-sesion']) !!}
                {!! Field::text('email') !!}
                {!! Field::password('password') !!}
                <button type="submit" class="btn btn-primary block full-width m-b">INGRESAR</button>
            {!! Form::close() !!}

            @if (session('danger'))
            <div class="alert alert-danger" role="alert">
                {!! session('danger') !!}           
            </div>
            @endif
            <p class="m-t"> <small>SYSAA <?php echo date("Y"); ?></small> </p>
        </div>
    </div>

    {!! Html::script('js/jquery-3.1.1.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}

</body>


</html>
