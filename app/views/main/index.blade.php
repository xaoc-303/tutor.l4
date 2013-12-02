@extends('layouts.default')

@section('menu')
{{ View::make('main.menu')->render() }}
@stop

@section('content')
@if(isset($content))
{{$content}}
@else
Нет данных
@endif
@stop