@extends('portfolio')

@section('content')
  <section class='memorabilia'>
    <p>
      J'ai commencé à faire de la photographie il y a quelques temsp déjà. Ma raison était alors purement préventive — j'allais entrer en école de
      communication visuelle et m'étais dit que la photographie en serait un prérequis. Mes premières images étaient de ce qui m'entouraient — objets et personnes —
    </p>

    @include('articles-list')

    @foreach ($collections as $collection)
      <article class='collection'>
        <h2>{{ $collection->name }}</h2>
        @if ($collection->description)
          <p>{{ $collection->description }}</p>
        @endif

        @foreach ($collection->photosets as $photoset)
          <figure class='photoset--list'>
            <a href='{{ URL::route('photoset', array('id' => $photoset->slug)) }}'>
              {{{ HTML::image($photoset->thumbnail->large_square, $photoset->name) }}}
              <figcaption>
                <h3>{{ $photoset->name }}</h3>
                <h4>{{ $photoset->created_at }}</h4>
              </figcaption>
            </a>
          </figure>
        @endforeach
      </article>
    @endforeach
  </section>
@stop
