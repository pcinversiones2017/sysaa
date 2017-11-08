@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	@include('partials.alert')
		<div class="ibox float-e-margins">
		@if(Auth::user()->usuariorol->rol->nombre == 'AUDITOR')
			@include('inicio.partials.auditor')
		@endif
	</div>
</div>
@stop