@extends('layout.admin')

@section('content')
hola  {!! Auth::user()->nombres !!} {!! Auth::user()->codUsu !!} {!! Auth::user()->usuariorol->rol->nombre !!}
@stop