<a class='block' data-show='.articles'>Voir les articles liés</a>

<section class='articles hidden'>
  @if(!$articles->isEmpty())
    @each('partials.articles-list.article-block', $articles, 'article')
  @endif
</section>
