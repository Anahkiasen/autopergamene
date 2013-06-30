<footer>

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
          Ce site a été construit en PHP en utilisant {{ HTML::linkBlank('http://laravel.com/', 'Laravel') }}<br>
          Le design a été codé en {{ HTML::linkBlank('http://sass-lang.com', 'Sass') }} avec {{ HTML::linkBlank('http://compass-style.org/', 'Compass') }}
          et {{ HTML::linkBlank('http://susy.oddbird.net/', 'Susy') }}<br>
          Polices fournies par {{ HTML::linkBlank('https://typekit.com/colophons/enr5hww', 'Typekit') }}
        </p>

        <p>
          Sources en {{ HTML::linkBlank('https://github.com/Anahkiasen/autopergamene', 'libre consultation') }}
        </p>
      </section>
  </div>

</footer>
