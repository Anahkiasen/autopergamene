<footer>

  <section>
    &copy; {{ date('Y') }} - autopergamene - Maxime Fabre
  </section>

  <section class="colophon">
    Ce site a été construit en PHP en utilisant {{ HTML::toBlank('http://laravel.com/', 'Laravel') }}.<br />
    Le design a été codé en {{ HTML::toBlank('http://sass-lang.com', 'Sass') }} avec {{ HTML::toBlank('http://compass-style.org/', 'Compass') }}
    et {{ HTML::toBlank('http://susy.oddbird.net/', 'Susy') }}.<br />
    Polices fournies par {{ HTML::toBlank('https://typekit.com/colophons/enr5hww', 'Typekit') }}
  </section>

  <section class='colophon'>
    Sources en {{ HTML::toBlank('https://github.com/Anahkiasen/autopergamene', 'libre consultation') }}
  </section>

</footer>