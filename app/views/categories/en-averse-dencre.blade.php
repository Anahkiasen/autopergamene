@extends('portfolio')

@section('content')
  <p>
    Un ensemble d'articles sur les sujets qui me passionnent : le web, la photographie, la musique, et j'en passe.<br />
    Tous sont trouvables dans leurs catégories respectives mais sont rassemblés ici. Ils proviennent à l'origine de mon
    {{{ HTML::toBlank('http://blogs.wefrag.com/Anahkiasen/', 'blog personnel') }}}.
  </p>
  <hr />

  <section class='articles'>
    @each('article-block', $articles, 'article')
  </section>
@stop

@section('js')
  {{{ Basset::show('affixed.js') }}}
@stop