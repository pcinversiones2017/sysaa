@extends('layout.admin')

@section('content')
hola {!! Auth::user()->codUse !!}
@stop