@extends('global')

@section('title')
  {{ $novel->name }} -
@stop

@section('css')
  {{ Basset::show('article.css') }}
@stop

@section('navigation')
  {{ HTML::homeLink() }}
  {{ HTML::backLink(route('category', array('slug' => $category->id)), 'Retour à '.$category->name) }}
@stop

@section('layout')
  <section class='novel'>
    <h1>{{ $novel->name }}</h1>
    <figure class='cover' style='background-image: url({{ $novel->image }})'></figure>
    @if ($novel->content)
      <article>
        {{ $novel->content }}
        <blockquote>
          <strong>Publié le : {{ $novel->created_at }}</strong>
        </blockquote>
      </article>
    @else
      <div class='alert'>Cette nouvelle n'est pas encore lisible ici.</div>
    @endif
  </section>
@stop