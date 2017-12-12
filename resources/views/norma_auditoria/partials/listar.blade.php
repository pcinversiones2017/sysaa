<div class="table-responsive">
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>TIPO</th>
        <th>NÚMERO</th>
        <th>NOMBRE DE NORMATIVA</th>
        <th>FECHA DE VIGENCIA</th>
        <th>ACCIÓN</th>
    </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach($normativas as $normativa)
            <tr>
                <td>{{$i}}</td>
                <td>{{$normativa->tipoNormativa}}</td>
                <td>{{$normativa->numero}}</td>
                <td>{{$normativa->nombre}}</td>
                <td>{{$normativa->fecha}}</td>
                <td class="tooltip-demo">
                    <a href="{!! url('normativa/editar/' . $normativa->codNorm) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i>  </a>
                </td>
            </tr>
            <?php $i++ ?>
        @endforeach
    </tbody>
</table>
</div>
