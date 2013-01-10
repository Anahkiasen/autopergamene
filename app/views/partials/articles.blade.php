<a class='block' data-show='.articles'>Voir les articles liés</a>

<section class='articles'>
  @if($category->articles)
    @foreach($category->articles as $article)
      <article>
        <a href='{{ URL::to_route('article', array($category->slug, $article->id)) }}'>
          <h3>{{ $article->name }}</h3>
          <h4>{{ $article->created_at }}</h4>
          <blockquote>{{ $article->summary }}</blockquote>
        </a>
      </article>
    @endforeach
  @endif
</section>

<hr />