@extends('layouts.global')

@section('title')
  {{ $article->name }} - Les articles -
@stop

@section('css')
  {{ Basset::show('article.css') }}
@stop

@section('navigation')
  {{ HTML::homeLink() }}
  {{ HTML::backLink(URL::action('CategoriesController@category', $category->id), 'Retour à '.$category->name) }}
@stop

@section('layout')
  <section class='article @if($article->image) novel @endif'>
    <h1>{{ $article->name }}</h1>
    <article>
      {{ $article->content }}
      <blockquote>
        <strong>Publié le : {{ $article->creationDate }}</strong>
      </blockquote>
    </article>
  </section>
@stop

@section('js')
  {{ Basset::show('article.js') }}
@stop
