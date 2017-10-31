
<div class="col-lg-12">
    <br>
    @include('partials.alert')
    <div class="table-responsive">
        <table class="table table-bordered" style="margin-top: 10px">
            <thead>
            <tr>
                <th>#</th>
                <th>Detalle</th>
                <th>MacroProceso</th>
                <th>Materia a examinar</th>
                <th>Procesos</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1 ; ?>
            @foreach($auditoria->objetivoGeneral->objetivosEspecificos as $objetivoEsp)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$objetivoEsp->nombre}}</td>
                    <td>{{$objetivoEsp->macroproceso->nombre}}</td>
                    <td>{{$objetivoEsp->materia}}</td>
                    <td><a href="#" class="btn btn-white btn-sm"><i class="fa fa-eye"></i></a></td>
                    <td>
                        <a href="{{url('objetivo-especifico/mostrar')}}/{{$objetivoEsp->codObjEsp}}" class="btn btn-white"><i class="fa fa-eye"></i></a>
                        <a data-codObjEsp="{{$objetivoEsp->codObjEsp}}" class="btn btn-white editar_objetivo_especifico"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
                <?php $i++ ?>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
@section('js-script')
    <script>

        $('.editar_objetivo_especifico').on('click', function () {
            $('#div-crear-objetivo-especifico').hide();
            var codObjEsp = $(this).attr('data-codObjEsp');
            $.get(server + '/objetivo-especifico/ajax-get-objetivo-especifico/' + codObjEsp, function (data) {
               console.log(data);
                $('#nombre').val(data.nombre);
                $('#materia').val(data.materia);
                $('#macroproceso').val(data.codMacroP);
                $('#codObjEsp').val(codObjEsp);
                $('#div-editar-objetivo-especifico').show();
            });

        })
    </script>
@stop
