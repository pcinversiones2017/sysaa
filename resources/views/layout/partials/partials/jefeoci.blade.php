
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="{{$usuario?? ''}} {{$activo?? ''}} {{$activoEditar?? ''}} {{$institucion?? ''}} {{$software_a?? ''}} {{$people ?? ''}}">
                    <a href=""><i class="fa fa-cogs"></i> <span class="nav-label">Configuracion</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$people ?? ''}}"><a href="{!! route('persona.listar') !!}"><i class="fa fa-user-circle"></i> Datos Personales   </a></li>
                        <li class="{{$usuario ?? ''}} {{$activoEditar?? ''}}"><a href="{!! route('usuario.listar') !!}"><i class="fa fa-users"></i> Usuarios</a></li>
                        <li class="{{$institucion ?? ''}}"><a href="{!! route('institucion.listar') !!}"> <i class="fa fa-institution"></i> Ver Institucion</a></li>
                        <li class="{{$activo ?? ''}}"><a href="{!! route('usuario.recuperar') !!}"><i class="fa fa-key"></i> Cambiar Contraseña</a></li>
                        <li class="{{$software_a ?? ''}}"><a href="{!! route('institucion.listarSoftware') !!}"> <i class="fa fa-rebel"></i> Informacion del Software</a></li>
                    </ul>
                </li>
                <li class="header" style="padding: 5px 25px 5px 40px; background: #1d3040; color: #a7b1c2"><span class="nav-label">ETAPAS DE AUDITORIA</span></li>
                <li class="{{$crearPlan?? ''}} {{$listarPlan?? ''}} {{$crearAuditoria?? ''}} {{$listarAuditoria??''}} {{$listarAuditoriaNoProgramadas ?? ''}} {{$gantt ?? ''}}">
                    <a href=""><i class="fa fa-tasks"></i> <span class="nav-label">Plan</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearPlan?? ''}}"><a href="{{URL::to('plan/crear')}}"><i class="fa fa-pencil"></i> Crear </a></li>
                        <li class="{{$listarPlan?? ''}}"><a href="{{URL::to('plan/listar')}}"><i class="fa fa-list-alt"></i> Listar </a></li>
                        <li class="{{$crearAuditoria?? ''}} {{$listarAuditoria??''}} {{$listarAuditoriaNoProgramadas ?? ''}} {{$gantt ?? ''}}">
                            <a href="#"><i class="fa fa-th-large"></i> Auditoria <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li class="{{$listarAuditoria??''}}">
                                    <a href="{{URL::to('auditoria/listar')}}"><i class="fa fa-list-alt"></i> Programadas </a>
                                </li>
                                <li class="{{$listarAuditoriaNoProgramadas??''}}">
                                    <a href="{{URL::to('auditoria/listar-no-programadas')}}"><i class="fa fa-list-alt"></i> No Programadas </a>
                                </li>
                                <li class="{{$gantt??''}}">
                                    <a href="{{URL::to('auditoria/gantt')}}"><i class="fa fa-bar-chart"></i> Diagrama de Gantt </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="{{$crearMacroproceso?? ''}} {{$listarMacroprocesos?? ''}}">
                    <a href=""><i class="fa fa-sitemap"></i> <span class="nav-label">Macroproceso</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearMacroproceso?? ''}}"><a href="{{URL::to('macroproceso/crear')}}"><i class="fa fa-pencil"></i> Crear </a></li>
                        <li class="{{$listarMacroprocesos?? ''}}"><a href="{{URL::to('macroproceso/listar')}}"><i class="fa fa-list-alt"></i> Listar </a></li>
                    </ul>
                </li>
                <li class="{{$listarRiesgos?? ''}}">
                    <a href=""><i class="fa fa-free-code-camp"></i> <span class="nav-label">Riesgos</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$listarRiesgos?? ''}}"><a href="{{ route('riesgos.listar') }}"><i class="fa fa-list-alt"></i> Listar </a></li>
                    </ul>
                </li>
                <li class="{{$avance?? ''}}">
                    <a href=""><i class="fa fa-line-chart"></i> <span class="nav-label">Avance de Auditoria</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$avance?? ''}}"><a href="{{ route('avance.linea') }}"><i class="fa fa-list-alt"></i> Listar </a></li>
                    </ul>
                </li>
                <li class="{{$listarInforme ?? ''}}">
                    <a href=""><i class="fa fa-tasks"></i> <span class="nav-label">Informe Final</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$listarInforme ?? ''}}"><a href="{{ route('informe.listar') }}"><i class="fa fa-list-alt"></i> Listar </a></li>
                    </ul>
                </li>
                <li class="{{$listarObservaciones ?? ''}}">
                    <a href=""><i class="fa fa-eercast"></i> <span class="nav-label">Seguimiento</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                       <li class="{{$listarObservaciones ?? ''}}"><a href="{!! route('observacion.listar') !!}"> <i class="fa fa-list"></i> Lista</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </nav>

<script>

</script>