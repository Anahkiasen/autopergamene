<section class='about'>

  {{-- Header image --}}
  <aside></aside>

  {{-- About me --}}
  <article class='biography' itemscope itemtype='http://schema.org/Person'>

    {{-- Summary --}}
    <h2>
      <span itemprop='name'>Maxime Fabre</span>
      <small>{{ $age }} @lang('about.age')</small>
    </h2>
    <h3 itemprop='jobTitle'>Webdesigner - Webdeveloper</h3>
    <h4 itemprop='address'>Saint-Étienne, France</h4>

    {{-- Biography --}}
    <span class='block' data-show='.about-biography'>@lang('about.whois')</span>
    <section class='about-biography'>
      {{ Lang::get('about.biography', array(
        'work'      => $work,
        'stappler'  => HTML::linkBlank('http://www.stappler.fr/', 'Principe de Stappler'),
        'twitter'   => HTML::linkBlank('http://twitter.com/Anahkiasen', 'Twitter'),
        'github'    => HTML::linkBlank('http://github.com/Anahkiasen/', 'Github'),
        'bitbucket' => HTML::linkBlank('https://bitbucket.org/Anahkiasen', 'Bitbucket'),
      )) }}

      {{-- Details and links --}}
      <span class='block' data-show='.about-more'>@lang('about.informations')</span>
      <section class='about-more'>
        <article class='social'>
          <h3>@lang('about.findme')</h3>
          <ul>
            @foreach($services as $service)
              <li>
                @if (str_contains($service->link, '@'))
                  {{ HTML::image('app/svg/'.$service->icon, $service->name) }}
                  {{ HTML::mailto($service->link, $service->name) }}
                @else
                  {{ HTML::image('app/svg/'.$service->icon, $service->name) }}
                  {{ HTML::linkBlank($service->link, $service->name) }}
                @endif
              </li>
            @endforeach
          </ul>
        </article>
        <article>
          <h3>@lang('about.knowledge')</h3>
          <ul>
            <li>{{ implode('</li><li>', Lang::get('about.knowledge_of')) }}
          </ul>
        </article>
        <article>
          <h3>@lang('about.languages')</h3>
          <ul>
            <h4>Back-end</h4>
              <li>HTML5</li>
              <li>CSS3 – LESS/SASS</li>
              <li>Javascript – Coffeescript</li>
            <h4>Front-end</h4>
              <li>PHP 5.3+</li>
              <li>MySQL/SQLite, MongoDB (NoSQL)</li>
              <li>Ruby (bases)</li>
            <h4>Autre</h4>
              <li>bash/zsh</li>
              <li>ActionScript 2</li>
          </ul>
        </article>
        <article>
          <h3>@lang('about.with')</h3>
          <ul>
            <h4>@lang('about.frameworks')</h4>
              <li>Laravel 3/4</li>
              <li>Slim</li>
              <li>jQuery</li>
              <li>Backbone</li>
              <li>Bootstrap</li>
              <li>Wordpress</li>
            <h4>@lang('about.softwares')</h4>
              <li>Sublime Text 3</li>
              <li>Suite Adobe CS6</li>
              <li>Autodesk Maya</li>
              <li>Google Sketchup</li>
              <li>Sony Vegas</li>
          </ul>
        </article>
        <article>
          <h3>@lang('about.misc')</h3>
          <ul>
            <li>@lang('about.bts')</li>
            <li>@lang('about.license')</li>
            <li>@lang('about.languages')</li>
          </ul>
        </article>
      </section>
    </section>
  </article>
</section>
