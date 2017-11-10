    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="">
                    <a href=""><i class="fa fa-cogs"></i> <span class="nav-label">Configuracion</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearPlan?? ''}}"><a href="{!! route('usuario.listar') !!}"><i class="fa fa-users"></i> Usuarios</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href=""><i class="fa fa-history"></i> <span class="nav-label">Procedimientos</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                       <li ><a href="{!! route('auditor.procedimiento.listar') !!}"> <i class="fa fa-list"></i> Lista</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </nav>