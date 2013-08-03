@extends('layouts.global')

@section('title')
	{{ $category->name }} -
@stop

@section('navigation')
	{{ HTML::homeLink() }}
@stop

@section('layout')
	<section class='portfolio'>
		<h1>{{ $category->name }}</h1>
		@yield('content')
	</section>
@stop
