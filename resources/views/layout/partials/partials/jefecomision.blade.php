    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="{{$activo?? ''}}">
                    <a href=""><i class="fa fa-cogs"></i> <span class="nav-label">Configuracion</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{$activo?? ''}}"><a href="{!! route('usuario.recuperar') !!}"><i class="fa fa-key"></i> Cambiar Contraseña</a></li>
                        <li class="{{$activo?? ''}}"><a href="{!! route('auditoria.listar') !!}"><i class="fa fa-key"></i> Aprobar Auditorias</a></li>
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