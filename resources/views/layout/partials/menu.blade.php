<?php 
use App\Models\Rol;
?>
<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <a data-toggle="dropdown" class="dropdown-toggle">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><a href="{!! url('/') !!}" >{!! Auth::user()->datos !!}</a></strong>
                             </span> <span class="text-muted text-xs block">{!! Auth::user()->usuariorol->rol->nombre !!} </span> </span> </a>
                    </div>
                    <div class="logo-element">
                        
                    </div>
                </li>

                @if(Auth::user()->usuariorol->rol->codRol == Rol::JEFE_OCI)
                @include('layout.partials.partials.jefeoci')
                @elseif(Auth::user()->usuariorol->rol->codRol == Rol::JEFE_DE_COMISION) 
                @include('layout.partials.partials.jefecomision')
                @elseif(Auth::user()->usuariorol->rol->codRol == Rol::INTEGRANTE) 
                @include('layout.partials.partials.auditor')
                @elseif(Auth::user()->usuariorol->rol->codRol == Rol::SUPERVISOR) 
                @include('layout.partials.partials.supervisor')
                @endif
                
            </ul>

        </div>
    </nav>

<script>

</script>