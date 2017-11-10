    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="">
                    <a href=""><i class="fa fa-history"></i> <span class="nav-label">Auditoria</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li ><a href="{!! route('supervisor.auditoria.mostrar') !!}"> <i class="fa fa-list"></i> Mostrar</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href=""><i class="fa fa-cogs"></i> <span class="nav-label">Configuracion</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearPlan?? ''}}"><a href="{!! route('usuario.recuperar') !!}"><i class="fa fa-key"></i> Cambiar Contraseña</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>