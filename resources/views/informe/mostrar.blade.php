@extends('layout.admin')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a> <h5>Ver Informe </h5>
                </div>
                <div class="ibox-content">
                    {!! $informe->informe !!}
                </div>
            </div>
        </div>
    </div>
@stop
