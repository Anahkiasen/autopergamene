@extends('portfolio')

@section('content')
  <h1>The Winter Throat</h1>

  <p>
    Quelques pistes que j'ai faites pendant mon temps libre — toutes partageant les mêmes influences, du drone au post-rock en passant par le noise ou l'ambient.<br />
    Restant un loisir ces pistes sont bien sûr loin d'être de qualité professionnelle mais reflètent quand même ce que j'ai voulu en faire : des morceaux assez cinématiques, où j'ai essayé d'une certaine manière de laisser les gens se créer leurs propres histoires en les écoutant.
  </p>
  <p>J'espère que vous aussi aurez le plaisir de vous imaginer ce que vous voulez en les écoutant.</p>

  @foreach($tracks as $track)
    <article>
      <h3>{{ $track->name }}</h3>
      <iframe width='100%' height='166' frameborder='no' src="{{ $track->soundcloud }}"></iframe>
      <dl>{{ $track->movements }}</dl>
    </article>
  @endforeach
@stop
