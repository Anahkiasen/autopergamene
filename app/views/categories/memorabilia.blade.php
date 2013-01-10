@extends('portfolio')

@section('content')
  <section class='memorabilia'>
    <h1>Memorabilia</h1>

    <p>
      J'ai commencé à faire de la photographie il y a quelques temsp déjà. Ma raison était alors purement préventive — j'allais entrer en école de
      communication visuelle et m'étais dit que la photographie en serait un prérequis. Mes premières images étaient de ce qui m'entouraient — objets et personnes —
    </p>

    @include('partials.articles')

    <h2>Les albums</h2>

    @foreach($photosets as $photoset)
      <figure class='collection'>
        <a href='{{ URL::route('photoset', array('id' => $photoset->slug)) }}'>
          {{ $photoset->thumbnail }}
          <figcaption>
            <h3>{{ $photoset->name }}</h3>
            <h4>{{ $photoset->date_of_creation }}</h4>
          </figcaption>
        </a>
      </figure>
    @endforeach
  </section>
@stop
