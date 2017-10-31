<div class="row">
    <div class="col-md-3">
        <button class="btn btn-primary " onclick="mostrarModal();"> <i class="fa fa-plus"></i> Crear Objetivo Especifico
        </button>
    </div>
</div>
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
            <td><a href="#" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Ver </a></td>
            <td>
                <a href="{{url('objetivo-especifico/mostrar')}}/{{$objetivoEsp->codObjEsp}}" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Ver </a>
                <a href="#" id="editar_objetivo_especifico" data-codObjEsp="{{$objetivoEsp->codObjEsp}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a>
            </td>
        </tr>
        <?php $i++ ?>
    @endforeach
    </tbody>
</table>

@include('objetivo_especifico.modals.editar')
@section('js-script')
    <script>
        function mostrarModal()
        {
            $("#modal_crear_objetivo_especifico").modal();
        }

        $('#editar_objetivo_especifico').on('click', function () {
            var codObjEsp = $(this).attr('data-codObjEsp');
            $.get(server + '/objetivo-especifico/ajax-get-objetivo-especifico/' + codObjEsp, function (data) {
               console.log(data)
                $('#nombre').val(data.nombre);
                $('#materia').val(data.materia);
                $('#macroproceso').val(data.codMacroP);

            });
            $('#modal_editar_objetivo_especifico').modal();
        })
    </script>
@stop
