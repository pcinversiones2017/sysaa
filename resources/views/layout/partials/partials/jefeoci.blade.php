
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="{{$usuario?? ''}} {{$activo?? ''}} {{$activoEditar?? ''}} {{$institucion?? ''}} {{$institucionn?? ''}} {{$software_a?? ''}} {{$people ?? ''}}">
                    <a href=""><i class="fa fa-cogs"></i> <span class="nav-label">Configuracion</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$people ?? ''}}"><a href="{!! route('persona.listar') !!}"><i class="fa fa-user-circle"></i> Datos Personales   </a></li>
                        <li class="{{$usuario ?? ''}} {{$activoEditar?? ''}}"><a href="{!! route('usuario.listar') !!}"><i class="fa fa-users"></i> Usuarios</a></li>
                        <li class="{{$institucion ?? ''}} {{$institucionn?? ''}}"><a href="{!! route('institucion.listar') !!}"> <i class="fa fa-institution"></i> Ver Institucion</a></li>
                        <li class="{{$activo ?? ''}}"><a href="{!! route('usuario.recuperar') !!}"><i class="fa fa-key"></i> Cambiar Contraseña</a></li>
                        <li class="{{$software_a ?? ''}}"><a href="{!! route('institucion.listarSoftware') !!}"> <i class="fa fa-rebel"></i> Informacion del Software</a></li>
                        <li><a target="_blank" href="{!! url('manuales_de_usuario_oci_comision_supervisor_integrante.zip') !!}"><i class="fa fa-file-pdf-o"></i>Manual de usuario</a></li>
                        <li><a target="_blank" href="{!! url('manual_del_sistema.pdf') !!}"><i class="fa fa-file-pdf-o"></i>Manual de sistema</a></li>
                    </ul>
                </li>
                <li class="header" style="text-align: center; padding: 10px; background: #1d3040; color: #ffffff"><span class="nav-label">ETAPAS DE AUDITORIA</span></li>
                <li class="{{$crearPlan?? ''}} {{$listarPlan?? ''}} {{$crearAuditoria?? ''}}">
                    <a href=""><i class="fa fa-tasks"></i> <span class="nav-label">Plan Anual</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearPlan?? ''}}"><a href="{{URL::to('plan/crear')}}"><i class="fa fa-pencil"></i> Crear </a></li>
                        <li class="{{$listarPlan?? ''}}"><a href="{{URL::to('plan/listar')}}"><i class="fa fa-list-alt"></i> Listar </a></li>
                    </ul>
                </li>

                <li class="header" style="text-align: center; padding : 10px; background: #1d3040; color: #ffffff"><span class="nav-label">PLANIFICACIÓN</span></li>
                <li class="{{$crearAuditoria?? ''}} {{$listarAuditoria??''}} {{$listarAuditoriaNoProgramadas ?? ''}} {{$gantt ?? ''}}">
                    <a href="#"><i class="fa fa-th-large"></i><span class="nav-label"> Auditoria </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
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

                <li class="{{$crearMacroproceso?? ''}} {{$listarMacroprocesos?? ''}} {{ $listarGeneral ?? ''}}">
                    <a href=""><i class="fa fa-sitemap"></i> <span class="nav-label">Macroproceso</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearMacroproceso?? ''}}"><a href="{{URL::to('macroproceso/crear')}}"><i class="fa fa-pencil"></i> Crear </a></li>
                        <li class="{{$listarMacroprocesos?? ''}}"><a href="{{URL::to('macroproceso/listar')}}"><i class="fa fa-list-alt"></i> Listar </a></li>
                        <li class="{{$listarGeneral?? ''}}"><a href="{!! route('macroproceso.general') !!}"><i class="fa fa-list-alt"></i> Listar General</a></li>
                    </ul>
                </li>
                <li class="{{$listarRiesgos?? ''}}">
                    <a href=""><i class="fa fa-free-code-camp"></i> <span class="nav-label">Riesgos</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$listarRiesgos?? ''}}"><a href="{{ route('riesgos.listar') }}"><i class="fa fa-list-alt"></i> Listar </a></li>
                    </ul>
                </li>

                <li class="header" style="text-align: center; padding : 10px; background: #1d3040; color: #ffffff"><span class="nav-label">EJECUCIÓN</span></li>


                <li class="{{$avance?? ''}}">
                    <a href=""><i class="fa fa-line-chart"></i> <span class="nav-label">Avance de Auditoria</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$avance?? ''}}"><a href="{{ route('avance.linea') }}"><i class="fa fa-list-alt"></i> Listar </a></li>
                    </ul>
                </li>

                <li class="header" style="text-align: center; padding : 10px; background: #1d3040; color: #ffffff"><span class="nav-label">ELABORACIÓN DE INFORME</span></li>


                <li class="{{$listarInforme ?? '' }} {{$listarInformeCorto ?? ''}}">
                    <a href=""><i class="fa fa-info"></i> <span class="nav-label">Informes</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$listarInforme ?? ''}}"><a href="{{ route('informe.listar') }}"><i class="fa fa-list-alt"></i> Informe Final </a></li>
                        <li class="{{$listarInformeCorto ?? ''}}"><a href="{{ route('informe.corto') }}"><i class="fa fa-list-alt"></i> Informe Corto </a></li>
                    </ul>
                </li>

                <li class="header" style="text-align: center; padding : 10px; background: #1d3040; color: #ffffff"><span class="nav-label">SEGUIMIENTO Y RECOMENDACIONES</span></li>

                <li class="{{$listarObservaciones ?? ''}}">
                    <a href=""><i class="fa fa-eercast"></i> <span class="nav-label">Seguimiento</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                       <li class="{{$listarObservaciones ?? ''}}"><a href="{!! route('observacion.listar') !!}"> <i class="fa fa-list"></i> Lista</a></li>
                       <li class="{{$listarSeguimiento ?? ''}}"><a href="{!! route('seguimiento.general') !!}"> <i class="fa fa-list"></i> Lista General</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </nav>

<script>

</script>