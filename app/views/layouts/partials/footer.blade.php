<footer>

	{{ HTML::link('/', 'Français') }} - {{ HTML::link('en', 'English') }}<br>
	&copy; {{ date('Y') }} - autopergamene - Maxime Fabre
	<hr>

	<div class='footer-container'>
		<ul class='social'>
			@foreach ($services as $service)
				<li>
					<a target='_blank' href='{{ $service->link }}'>
						{{ $service->linkName }}/<span class='name'>anahkiasen</span>
					</a>
				</li>
			@endforeach
		</ul>

		<section class="colophon last">
			<p>
				{{ Lang::get('footer.built', array(
					'laravel' => HTML::linkBlank('http://laravel.com/', 'Laravel'),
					'sass'    => HTML::linkBlank('http://sass-lang.com', 'Sass'),
					'compass' => HTML::linkBlank('http://compass-style.org/', 'Compass'),
					'susy'    => HTML::linkBlank('http://susy.oddbird.net/', 'Susy'),
					'typekit' => HTML::linkBlank('https://typekit.com/colophons/enr5hww', 'Typekit'),
				)) }}
			</p>

			<p>
				<a target="_blank" href="https://github.com/Anahkiasen/autopergamene">{{ Lang::get('footer.open_source') }}</a>
			</p>
		</section>
	</div>

</footer>
