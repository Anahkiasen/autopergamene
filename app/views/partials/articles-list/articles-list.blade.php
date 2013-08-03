<a class='block' data-show='.articles'>@lang('global.see_articles')</a>

<section class='articles hidden'>
	@if(!$articles->isEmpty())
		@each('partials.articles-list.article-block', $articles, 'article')
	@endif
</section>
