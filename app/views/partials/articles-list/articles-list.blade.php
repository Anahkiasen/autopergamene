<a class='block' data-show='.articles'>Voir les articles liés</a>

<section class='articles hidden'>
  @if($category->articles)
    @each('article-block', $category->articles, 'article')
  @endif
</section>
