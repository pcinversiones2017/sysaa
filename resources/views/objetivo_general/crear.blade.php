@extends('layout.admin')
@section('content')

<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            CREAR OBJETIVO GENERAL
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12 col-md-12">
                                <div class="row">
                                    {!! Form::open(['method' => 'POST', 'route' => 'objetivo-general.guardar', 'class' => 'form-horizontal']) !!}
                                    <input type="hidden" name="codPlanF" value="{{$codPlanF}}">
                                    <input type="hidden" name="codObjGen" value="{{$codObjGen}}">
                                    <div class="col-lg-12 col-md-12">

                                        {!! Field::textarea('nombre', null, ['class' => 'form-control', 'size' => '50x5', 'label' => 'DETALLE']) !!}

                                        <div class="hr-line-dashed"></div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success btn-outline" value="REGISTRAR">
                                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-outline">ATRAS</a>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
</div>
@endsection

