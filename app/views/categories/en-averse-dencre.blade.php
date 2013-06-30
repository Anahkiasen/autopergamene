@extends('layouts.portfolio')

@section('content')
  <p>
    Un ensemble d'articles sur les sujets qui me passionnent : le web, la photographie, la musique, et j'en passe.<br />
    Tous sont trouvables dans leurs catégories respectives mais sont rassemblés ici. Ils proviennent à l'origine de mon
    {{ HTML::linkBlank('http://blogs.wefrag.com/Anahkiasen/', 'blog personnel') }}.
  </p>
  {{ HTML::blockLink('http://blogs.wefrag.com/Anahkiasen/', 'Accéder au blog "Out through the winter throat"', array('target' => '_blank')) }}
  <hr />

  <section class='articles'>
    @each('partials.articles-list.article-block', $articles, 'article')
  </section>
@stop

@section('js')
  {{ Basset::show('affixed.js') }}
@stop
