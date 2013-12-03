@extends('layouts.default')

@section('menu')
@include('main.menu')
@stop

@section('content')
@if(isset($content))
{{$content}}
@else
Нет данных
@endif
@stop