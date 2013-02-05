<a class='block' data-show='.articles'>Voir les articles liés</a>

<section class='articles'>
  @if($category->articles)
    @foreach($category->articles as $article)
      <article>
        <a href='{{ $article->link }}'>
          <h3>{{ $article->name }}</h3>
          <datetime>{{ $article->created_at }}</datetime>
          <blockquote>{{ $article->summary }}</blockquote>
          @if ($article->tags)
            <p class='block-light'>
              <strong>tags :</strong> {{ $article->tags }}
            </p>
          @endif
        </a>
      </article>
    @endforeach
  @endif
</section>

<hr />