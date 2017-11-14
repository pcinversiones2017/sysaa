    @foreach($procedimiento as $row)
        @if((strtotime($row->fecha_fin) - strtotime(date('Y-m-d')))/86400 == 3 && $row->fecha_terminado == '')
        <div class="alert alert-info  alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <a class="alert-link" href="#">HOLA {!! Auth::user()->datos !!} BIENVENIDO TE QUEDAN 3 DIAS PARA QUE ACABE TU PROCEDIMIENTO {!! substr($row->justificacion,0,25) !!}</a>...
        </div>
        @elseif((strtotime($row->fecha_fin) - strtotime(date('Y-m-d')))/86400 == 2 && $row->fecha_terminado == '')
        <div class="alert alert-warning  alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <a class="alert-link" href="#">HOLA {!! Auth::user()->datos !!} BIENVENIDO TE QUEDAN 2 DIAS PARA QUE ACABE TU PROCEDIMIENTO {!! substr($row->justificacion,0,25) !!}</a>...
        </div>
        @elseif((strtotime($row->fecha_fin) - strtotime(date('Y-m-d')))/86400 == 1 && $row->fecha_terminado == '')
        <div class="alert alert-danger  alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <a class="alert-link" href="#">HOLA {!! Auth::user()->datos !!} BIENVENIDO TE QUEDAN 1 DIA PARA QUE ACABE TU PROCEDIMIENTO {!! substr($row->justificacion,0,25) !!}</a>...
        </div>
        @elseif((strtotime($row->fecha_fin) - strtotime(date('Y-m-d')))/86400 == 0 && $row->fecha_terminado == '')
        <div class="alert alert-danger  alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <a class="alert-link" href="#">HOLA {!! Auth::user()->datos !!} BIENVENIDO HOY DÍA VENCE LA FECHA DE TU PROCEDIMIENTO {!! substr($row->justificacion,0,25) !!}</a>...
        </div>
        @elseif((strtotime($row->fecha_fin) - strtotime(date('Y-m-d')))/86400 < 0 && $row->fecha_terminado == '')
            <div class="alert alert-danger  alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <a class="alert-link" href="#">HOLA {!! Auth::user()->datos !!} BIENVENIDO USTED TIENE <?php echo abs((strtotime($row->fecha_fin) - strtotime(date('Y-m-d')))/86400); ?> DÍAS DE RETRASO DEL PROCEDIMIENTO {!! substr($row->justificacion,0,25) !!}</a>...
        </div>
        @endif
    @endforeach