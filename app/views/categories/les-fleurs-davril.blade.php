@extends('layouts.portfolio')

@section('content')
  <p>
    Ci-dessous des nouvelles écrites entre 2007 et 2010, toutes dans un registre plutôt sombre et un style ampoulé qui m'a souvent été reproché.
    Malgré cela ce portfolio ne serait complet si ces textes n'y étaient présents. Leur longueur varie, leur qualité aussi — mes compétences s'étant
    améliorées à mesure que j'écrivais.
  </p>

  @include('partials.navigation', array('links' => $stories))

  @foreach($stories as $story)
    <article class='novel-summary' id='{{ $story->id }}'>
      <h2>{{ $story->name }}</h2>
      <figure class='cover' style='background-image: url({{ $story->image }})'></figure>
      <p><strong>Publiée le :</strong> {{ $story->created_at }}</p>
      <blockquote>{{ $story->description }}</blockquote>
      {{ HTML::blockLink(route('story', array('id' => $story->id)), 'Lire la nouvelle') }}
    </article>
  @endforeach
@stop

@section('js')
  {{ Basset::show('affixed.js') }}
@stop
