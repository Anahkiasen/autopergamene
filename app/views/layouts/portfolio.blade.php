@extends('global')

@section('title')
  {{ $category->name }} -
@stop

@section('navigation')
  {{ HTML::homeLink() }}
@stop

@section('layout')
  <section class='portfolio'>
    @yield('content')
  </section>
@stop
