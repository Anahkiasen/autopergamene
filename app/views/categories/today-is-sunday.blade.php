@extends('portfolio')

@section('content')
  <p>
    Un ensemble de tableaux à tendances relativement sombres.
    Faits à l'époque sur le {{ HTML::linkBlank('http://store.steampowered.com/app/4000/', "Garry's Mod") }}, ils représentent en quelque sorte mes
    premiers pas dans la photographie dans laquelle je me lancerai quelques temps plus tards.
  </p>

  <hr />

  @foreach($tableaux as $tableau)
    <figure class='tableau'>
      <h2>{{ $tableau->name }}</h2>
      <div class='image-wrap'>
        {{ $tableau }}
      </div>
      <figcaption>
        <strong>Publiée le : {{ $tableau->created_at }}</strong>
      </figcaption>
    </figure>
  @endforeach
@stop

@section('js')
  {{ Basset::show('lazyload.js') }}
@stop