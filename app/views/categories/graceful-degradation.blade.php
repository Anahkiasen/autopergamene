@extends('portfolio')

@section('content')
  <p>
    Un ensemble de projets ou librairies développées au fur et à mesure de mon travail.
    En majorité des bundles pour le framework {{{ HTML::toBlank('http://laravel.com', 'Laravel') }}}
    ou distribués via {{{ HTML::toBlank('http://getcomposer.org', 'Composer') }}}
  </p>
  <p>
    Tous sont en PHP — même si mes compétences s'étendent à d'autres langages, j'ai principalement
    eu l'occasion de créer des bundles pour Laravel. Le framework étant relativement jeune (même si ayant réussi à devenir un agent majeur en peu de temps) il y a énormément de vides à combler dans les plugins, ce qui m'a permis de mettre mon savoir-faire au travail.
  </p>
  <p>
    Étant très à cheval sur le fait de rester à jour quand on est webdévelopeur on webdesigner, tous réspectent autant que faire se peut
    les standards du {{{ HTML::toBlank('https://github.com/php-fig/fig-standards', 'PSR') }}} et tirent partie des dernières avancées en terme d'OOP (namespaces, magic methods, etc).
  </p>

  @include('articles-list')

  <h2>Les projets</h2>
  <p>Les liens pointent soit sur Github vers la source, soit vers le site du projet.</p>

  @foreach($repositories as $repository)
    @if($repository->master == 0 and !isset($title))
      <h2>{{ $title = 'Projets en collaboration' }}</h2>
      <p>
        Ci-dessous des projets que je n'ai pas initiés mais sur lesquels à force de contributions je suis passé collaborateur.
      </p>
    @endif

    <article class='repository'>
      <a href='{{ $repository->link }}' target='_blank'>
        <figure>
          <h3>{{ $repository->name }}</h3>
          <h4>{{ $repository->content }}</h4>
        </figure>
        <p><strong>tags :</strong> {{ $repository->tags }}</p>
      </a>
    </article>
  @endforeach
@stop
