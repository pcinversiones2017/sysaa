<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="">
                    <a href="index-2.html"><i class="fa fa-th-large"></i> <span class="nav-label">Configuracion</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearPlan?? ''}}"><a href="{!! route('usuario.listar') !!}">Usuarios</a></li>
                        <li class="{{$crearPlan?? ''}}"><a href="{!! route('cargof.listar') !!}">Cargo Funcional</a></li>
                    </ul>
                </li>
                @if(isset($crearPlan) || isset($listarPlan))
                <li class="active">
                @else
                <li class="">
                @endif
                    <a href="index-2.html"><i class="fa fa-th-large"></i> <span class="nav-label">Plan</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearPlan?? ''}}"><a href="{{URL::to('plan/crear')}}">Crear Plan</a></li>
                        <li class="{{$listarPlan?? ''}}"><a href="{{URL::to('plan/listar')}}">Listar Planes</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="index-2.html"><i class="fa fa-th-large"></i> <span class="nav-label">Macroproceso</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearMacroproceso?? ''}}"><a href="{{URL::to('macroproceso/crear')}}">Crear Macroproceso</a></li>
                        <li class="{{$listarMacroproceso?? ''}}"><a href="{{URL::to('macroproceso/listar')}}">Listar Macroproceso</a></li>
                    </ul>
                </li>
                 <li class="">
                    <a href="index-2.html"><i class="fa fa-th-large"></i> <span class="nav-label">Tipo Normativa</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$creartipoNormativa?? ''}}"><a href="{{URL::to('tipo_normativa/crear')}}">Crear Tipo de Normativa</a></li>
                        <li class="{{$listartipoNormativa?? ''}}"><a href="{{URL::to('tipo_normativa/listar')}}">Listar Tipo de Normativa</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="index-2.html"><i class="fa fa-th-large"></i> <span class="nav-label">ProcesoMA</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearProcesoma?? ''}}"><a href="{{URL::to('procesoma/crear')}}">Crear ProcesoMA</a></li>
                        <li class="{{$listarProcesoma?? ''}}"><a href="{{URL::to('procesoma/listar')}}">Listar ProcesoMA</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="index-2.html"><i class="fa fa-th-large"></i> <span class="nav-label">Auditoria</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearAuditoria?? ''}}"><a href="{{URL::to('auditoria/crear')}}">Crear Auditoria</a></li>
                        <li class="{{$listarAuditorias?? ''}}"><a href="{{URL::to('auditoria/listar')}}">Listar Auditorias</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Cronograma y Plazos</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{{$crearCronograma??''}}"><a href="{{URL::to('cronograma/crear')}}">Crear cronograma</a></li>
                        <li class="{{$listarCronograma??''}}" ><a href="{{URL::to('cronograma/listar')}}">Listar Cronogamas</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </nav>

<script>

</script>