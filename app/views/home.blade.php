@extends('layout')

@section('title')
  Portfolio de Maxime Fabre -
@stop

@section('content')
  @include('about')
  <hr>
  @include('categories')
@stop
