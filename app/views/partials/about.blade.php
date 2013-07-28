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
      <p>
        Je travaille dans le web depuis bientôt {{ $work }} ans au <span itemprop='worksFor'>{{ HTML::linkBlank('http://www.stappler.fr/', 'Principe de Stappler') }}</span>.
        J'y ai fait mes premières incursions avec à peine quelques connaissances personnelles, puis de projet en projet c'est devenu ma passion. J'embrasse aujourd'hui la scène du web et tout ce qu'elle a de standards et d'enjeux – qu'il s'agisse des technologies et langages front-end (<strong>HTML5</strong>, <strong>CSS</strong> ou <strong>Javascript</strong>) ou back-end (<strong>PHP</strong>, <strong>Ruby</strong> avec maîtrise de l'<strong>OOP</strong> et de divers frameworks).
      </p>
      <p>
        Je suis sérieux, passionné, et au courant des derniers mouvements d'un domaine changeant au jour-le-jour. Ce, via les nombreux designers et developpeurs influents que je suis activement sur des réseaux sociaux comme {{ HTML::linkBlank('http://twitter.com/Anahkiasen', 'Twitter') }}.<br>
        Je cherche à comprendre plutôt qu'à recopier&nbsp;; je ne cherche pas à faire simplement mon travail, je cherche à le faire <em>bien</em>.
      </p>
      <p>
        Plongé jusqu'au cou dans l'univers de l'<strong>open-source</strong>, j'ai moi-même de nombreux projets et librairies disponibles sur des sites majeurs comme {{ HTML::linkBlank('http://github.com/Anahkiasen/', 'Github') }} ou {{ HTML::linkBlank('https://bitbucket.org/Anahkiasen', 'Bitbucket') }}. Cette proximité me permet de participer activement au développement des outils que j'emploie, de les améliorer, ou d'en créer de nouveaux.
      </p>

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
          <h3>@lang('about.languages')</h3>
          <ul>
            <li>HTML5</li>
            <li>CSS3 – LESS et SASS</li>
            <li>Javascript – Coffeescript</li>
            <li>PHP 5.4+, MySQL/SQLite, MongoDB</li>
            <li>ActionScript 2</li>
          </ul>
        </article>
        <article>
          <h3>@lang('about.softwares')</h3>
          <ul>
            <li>Sublime Text</li>
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
          </ul>
        </article>
      </section>
    </section>
  </article>
</section>
