<ul class='fixed nav'>
  @foreach($links as $link)
    <li>
      <a href="#{{ $link->id }}">{{ $link->name }}</a>
    </li>
  @endforeach
</ul>
<hr>
