
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="">
                    <a href=""><i class="fa fa-history"></i> <span class="nav-label">Historial</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                       <li ><a href="{!! route('usuario.listar') !!}"> <i class="fa fa-users"></i> Lista de Usuarios</a></li>

                    </ul>
                </li>
                <li class="">
                    <a href="index-2.html"><i class="fa fa-cogs"></i> <span class="nav-label">Configuracion</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearPlan?? ''}}"><a href="{!! route('usuario.listar') !!}"><i class="fa fa-users"></i> Usuarios</a></li>
                        <li class="{{$crearPlan?? ''}}"><a href="{!! route('cargof.listar') !!}"> <i class="fa fa-briefcase"></i> Cargo Funcional</a></li>
                       <li ><a href="{!! route('institucion.listar') !!}"> <i class="fa fa-institution"></i> Ver Institucion</a></li>
                        <li ><a href="{!! route('institucion.listarSoftware') !!}"> <i class="fa fa-rebel"></i> Informacion del Software</a></li>
                    </ul>
                </li>
                @if(isset($crearPlan) || isset($listarPlan))
                <li class="active">
                @else
                <li class="">
                @endif
                    <a href="index-2.html"><i class="fa fa-tasks"></i> <span class="nav-label">Plan</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearPlan?? ''}}"><a href="{{URL::to('plan/crear')}}"><i class="fa fa-pencil"></i> Crear </a></li>
                        <li class="{{$listarPlan?? ''}}"><a href="{{URL::to('plan/listar')}}"><i class="fa fa-list-alt"></i> Listar </a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="index-2.html"><i class="fa fa-sitemap"></i> <span class="nav-label">Macroproceso</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearMacroproceso?? ''}}"><a href="{{URL::to('macroproceso/crear')}}"><i class="fa fa-pencil"></i> Crear </a></li>
                        <li class="{{$listarMacroproceso?? ''}}"><a href="{{URL::to('macroproceso/listar')}}"><i class="fa fa-list-alt"></i> Listar </a></li>
                    </ul>
                </li>

                <li class="">
                    <a href="index-2.html"><i class="fa fa-th-large"></i> <span class="nav-label">Auditoria</span>
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearAuditoria?? ''}}"><a href="{{URL::to('auditoria/crear')}}"><i class="fa fa-pencil"></i> Crear </a></li>
                        <li class="{{$listarAuditorias?? ''}}"><a href="{{URL::to('auditoria/listar')}}"><i class="fa fa-list-alt"></i> Listar </a></li>
                        <li class="{{$crearPlan?? ''}}"><a href="{!! route('asignarr.listar') !!}"> <i class="fa fa-paperclip"></i> Asignar Rol</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index-2.html"><i class="fa fa-tags"></i> <span class="nav-label">Cronograma y Plazos
                        </span>
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{{$crearCronograma??''}}"><a href="{{URL::to('cronograma/crear')}}"><i class="fa fa-pencil"></i> Crear </a></li>
                        <li class="{{$listarCronograma??''}}" ><a href="{{URL::to('cronograma/listar')}}"><i class="fa fa-list-alt"></i> Listar </a></li>
                    </ul>
                </li>
                    <li>
                        <a href="index-2.html"><i class="fa fa-star"></i> <span class="nav-label">Normativas</span>
                            <span class="fa arrow"></span></a>
                        <ul class="nav  collapse">
                            <li>
                                <a href="{{URL::to('norma-auditoria/listar')}}">
                                    <i class="fa fa fa-long-arrow-right fa-lg"></i>
                                    <span class="nav-label">Normativas aplicable a la entidad</span>
                                    <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="{{URL::to('norma-auditoria/crear')}}"><i class="fa fa-pencil"></i> 
                                            Crear norma aplicable </a>
                                        <a href="{{URL::to('norma-auditoria/listarAplica')}}"><i class="fa fa-list-alt"></i> Listar normas</a>
                                </ul>
                            </li>
                            <li>
                                <a href="{{URL::to('norma-auditoria/listar')}}">
                                    <i class="fa fa fa-long-arrow-right fa-lg"></i>
                                    <span class="nav-label">
                                        Normativas que regulan auditoria (*)</span>
                                    <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li class="{{$crearCronograma??''}}">
                                        <a href="{{URL::to('norma-auditoria/listar')}}"><i class="fa fa-list-alt"></i> listar
                                            (*)
                                        </a>
                                </ul>
                            </li>
                        </ul>
                    </li>
            </ul>

        </div>
    </nav>

<script>

</script>