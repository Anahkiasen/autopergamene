<nav class='categories'>
  <h2>Portfolio</h2>

  @foreach($categories as $category)
    <figure>
      <a href='{{ $category->link }}' @if($category->isExternal()) target='_blank' @endif>
        {{ $category->thumb }}
        <figcaption>
          <h3>{{ $category->name }}</h3>
          <h4>{{ $category->description }}</h4>
        </figcaption>
      </a>
    </figure>
  @endforeach
</nav>
