@extends('layouts.global')

@section('title')
  {{ $story->name }} -
@stop

@section('css')
  {{ Basset::show('article.css') }}
@stop

@section('navigation')
  {{ HTML::homeLink() }}
  {{ HTML::backLink(URL::route('category', array('slug' => $category->id)), 'Retour à '.$category->name) }}
@stop

@section('layout')
  <section class='novel'>
    <h1>{{ $story->name }}</h1>
    <figure class='cover' style='background-image: url({{ $story->image }})'></figure>
    @if ($story->content)
      <article>
        {{ $story->content }}
        <blockquote>
          <strong>Publié le : {{ $story->created_at }}</strong>
        </blockquote>
      </article>
    @else
      <div class='alert'>Cette nouvelle n'est pas encore lisible ici.</div>
    @endif
  </section>
@stop
