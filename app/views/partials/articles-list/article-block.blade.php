<article>
	<a href='{{ URL::action('ArticlesController@article', $article->slug) }}'>
		<h3>{{ $article->name }}</h3>
		<datetime class='relative'>{{ $article->relativeDate }}</datetime>
		<datetime class='absolute'>{{ $article->creationDate }}</datetime>
		<blockquote>{{ $article->summary }}</blockquote>
		@if ($article->tags)
			<p class='block-light'>
				<strong>tags :</strong> {{ $article->tags }}
			</p>
		@endif
	</a>
</article>
