<section class='about'>

  {{-- Header image --}}
  <aside></aside>

  {{-- About me -}}
  <article class='biography'>

    {{-- Summary --}}
    <h2>
      Maxime Fabre
      <span>{{ $age }} ans</span>
    </h2>
    <h3>Webdesigner - Webdeveloper</h3>
    <h4>Nice, France</h4>

    {{-- Biography --}}
    <span class='block' data-show='.about-biography'>Qui je suis ?</span>
    <section class='about-biography'>
      <p>
        Je travaille dans le web depuis bientôt {{ $work }} ans au {{ HTML::toBlank('http://www.stappler.fr/', 'Principe de Stappler') }}.
        J'y ai fait mes premières incursions avec à peine quelques connaissances personnelles, puis de projet en projet c'est devenu ma passion. J'embrasse aujourd'hui la scène du web et tout ce qu'elle a de standards et d'enjeux – qu'il s'agisse des technologies et langages front-end (<strong>HTML5</strong>, <strong>CSS</strong> ou <strong>Javascript</strong>) ou back-end (<strong>PHP</strong>, <strong>Ruby</strong> avec maîtrise de l'<strong>OOP</strong> et de divers frameworks).
      </p>
      <p>
        Je suis sérieux, passioné, et au courant des derniers mouvements d'un domaine changeant au jour-le-jour. Ce via les nombreux designers et developpeurs influents que je suis activement sur des réseaux sociaux comme {{ HTML::toBlank('http://twitter.com/Anahkiasen', 'Twitter') }}.<br />
        Je cherche à comprendre plutôt qu'à recopier&nbsp;; je ne cherche pas à faire simplement mon travail, je cherche à le faire <em>bien</em>.
      </p>
      <p>
        Plongé jusqu'au cou dans l'univers de l'<strong>open-source</strong>, j'ai moi-même de nombreux projets et librairies disponibles sur des sites majeurs comme {{ HTML::toBlank('http://github.com/Anahkiasen/', 'Github') }} ou {{ HTML::toBlank('https://bitbucket.org/Anahkiasen', 'Bitbucket') }}. Cette proximité me permet de participer activement au dévelopement des outils que j'emploie, de les améliorer, ou d'en créer de nouveaux.
      </p>

      {{-- Details and links --}}
      <span class='block' data-show='.about-more'>Informations complémentaires</span>
      <section class='about-more'>
        <article class='social'>
          <h3>Me trouver</h3>
          <ul>
            @foreach($social as $service)
              <li>
                {{ HTML::image('app/svg/'.$service->icon, $service->name) }} {{ HTML::toBlank($service->link, $service->name) }}
              </li>
            @endforeach
          </ul>
        </article>
        <article>
          <h3>Langages employés</h3>
          <ul>
            <li>HTML5</li>
            <li>CSS3 – LESS et SASS</li>
            <li>Javascript – Coffeescript</li>
            <li>PHP 5.4+ et SQL/SQLite</li>
            <li>ActionScript 2</li>
          </ul>
        </article>
        <article>
          <h3>Logiciels maîtrisés</h3>
          <ul>
            <li>Sublime Text</li>
            <li>Suite Adobe CS6</li>
            <li>Autodesk Maya</li>
            <li>Google Sketchup</li>
            <li>Sony Vegas</li>
          </ul>
        </article>
        <article>
          <h3>Autres informations</h3>
          <ul>
            <li>Diplômé d'un BTS en communication visuelle</li>
            <li>Détenteur du permis B</li>
          </ul>
        </article>
      </section>
    </section>
  </article>
</section>
