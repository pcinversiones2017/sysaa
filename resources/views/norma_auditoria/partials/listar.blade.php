
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>TIPO</th>
        <th>NÚMERO</th>
        <th>NOMBRE DE NORMATIVA</th>
        <th>FECHA DE VIGENCIA</th>
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

            </tr>
            <?php $i++ ?>
        @endforeach
    </tbody>
</table>
