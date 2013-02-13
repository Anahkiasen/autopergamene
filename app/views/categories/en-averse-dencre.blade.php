@extends('portfolio')

@section('content')
  <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>

  @include('navigation', array('links' => $categoriesList))

  @foreach ($categoriesList as $categoryBlock)
    <h2 id="{{ $categoryBlock->id }}">{{ $categoryBlock->name }}</h2>
    <section class='articles'>
      @each('article-block', $categoryBlock->articles, 'article')
    </section>
  @endforeach
@stop

@section('js')
  {{{ Basset::show('affixed.js') }}}
@stop