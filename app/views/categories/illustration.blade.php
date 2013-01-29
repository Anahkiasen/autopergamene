@extends('portfolio')

@section('content')
  <h1>Illustration</h1>

  <p>
    Sur cette page sont entreposées toutes les illustrations, dessins et consors que j'ai pu faire entre deux. Cela va de la peinture digitale au dessin au fusain, au rendu 3D en passant par l'illustration vectorielle.
  </p>
  <hr />

  @foreach ($supports as $support)
    @unless ($support->thumbnail)
      <?php continue; ?>
    @endunless
    <figure class='support'>
      <a href='{{ URL::route('support', array('id' => $support->id)) }}'>
        {{ $support->thumbnail->thumb($support->folder, $support->name) }}
        <figcaption>
          <h3>{{ $support->name }}</h3>
        </figcaption>
      </a>
    </figure>
  @endforeach
@stop