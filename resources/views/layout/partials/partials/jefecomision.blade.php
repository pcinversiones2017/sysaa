    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="">
                    <a href=""><i class="fa fa-cogs"></i> <span class="nav-label">Configuracion</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$crearPlan?? ''}}"><a href="{!! route('usuario.recuperar') !!}"><i class="fa fa-key"></i> CAMBIAR CONTRASEÑA</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>