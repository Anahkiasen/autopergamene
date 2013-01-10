@extends('portfolio')

@section('content')
  <h1>Les Fleurs d'Avril</h1>

  <p>
    Ci-dessous des nouvelles écrites entre 2007 et 2010, toutes dans un registre plutôt sombre et un style ampoulé qui m'a souvent été reproché.
    Malgré cela ce portfolio ne serait complet si ces textes n'y étaient présents. Leur longueur varie, leur qualité aussi — mes compétences s'étant
    améliorées à mesure que j'écrivais.
  </p>

  <ul class='fixed nav'>
    @foreach($novels as $novel)
      <li>
        {{ HTML::to('#' .$novel->slug, $novel->name) }}
      </li>
    @endforeach
  </ul>

  <hr />

  @foreach($novels as $novel)
    <article class='novel-summary' id='{{ $novel->slug }}'>
      <h2>{{ $novel->name }}</h2>
      <figure class='cover' style='background-image: url({{ $novel->image }})'></figure>
      <p><strong>Publiée le :</strong> {{ $novel->created_at }}</p>
      <blockquote>{{ $novel->description }}</blockquote>
      {{ HTML::blockLink(route('novel', array('id' => $novel->id)), 'Lire la nouvelle') }}
    </article>
  @endforeach
@stop

@section('js')
  {{ Basset::show('affixed.js') }}
@stop