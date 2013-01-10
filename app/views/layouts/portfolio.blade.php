@extends('global')

@section('title')
  {{ $category->name }} -
@stop

@section('navigation')
  {{ HTML::homeLink("Revenir à l'accueil", array('class' => 'back')) }}
@stop

@section('layout')
  <section class='portfolio'>
    @yield('content')
  </section>
@stop
