@extends('portfolio')

@section('title')
  {{ $photoset->name }} -
@stop

@section('navigation')
  @parent
  {{ HTML::backLink('category/memorabilia', 'Retour aux albums') }}
@stop

@section('content')
  <section class='photoset'>
    <h1>{{ $photoset->name }}</h1>
    @foreach($photoset->photos as $key => $photo)
      <figure>
        <figcaption>
          @if ($photo->surname)
            <h2>{{ $photo->surname }}</h2>
          @endif
        </figcaption>
        <div class='image-wrap'>
          <h3>{{ $photo->index($key) }}</h3>
          {{ HTML::image($photo->medium_large, $photo->name) }}
        </div>
      </figure>
    @endforeach
  </section>
@stop
