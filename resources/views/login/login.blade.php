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

    <div class="middle-box text-center loginscreen animated fadeInDown ">
        <div>
            <div>

                <h1 class="logo-name">
                    <img src="{{url('img/logo.png')}}" width="130px">
                </h1>

            </div>
            <div class="login-box well">
                <h3>SYSAA</h3>
                <p>Sistema de auditoria academica
                </p>
                <p>Iniciar Sesion</p>
                {!! Form::open(['method' => 'POST', 'url' => 'iniciar-sesion']) !!}
                {!! Field::text('username') !!}
                {!! Field::password('password') !!}
                {!! Form::submit('INGRESAR', ['class' => 'btn btn-success block full-width m-b']) !!}
                {!! Form::close() !!}

                @if (session('danger'))
                    <div class="alert alert-danger" role="alert">
                        {!! session('danger') !!}
                    </div>
                @endif
                <p class="m-t"> <small>SYSAA <?php echo date("Y"); ?></small> </p>
            </div>
        </div>
    </div>

    {!! Html::script('js/jquery-3.1.1.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}

</body>


</html>
