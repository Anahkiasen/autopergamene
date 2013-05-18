<!DOCTYPE html>
<html lang='fr'>
  <head>
    <title>
      @yield('title')
      Autopergamene
    </title>
    {{ HTML::favicon('app/img/favicon.jpg') }}
    {{ HTML::responsiveTags() }}

    {{ Basset::show('application.css') }}
    {{ Basset::show('modernizr.js') }}
    @yield('css')
  </head>
  <body>

    <a href='{{ URL::to('/') }}'>
      <header>
        <h1>Autopergamene</h1>
      </header>
    </a>

    @yield('navigation')
    @yield('layout')
    @yield('navigation')

    @include('footer')

    <script type="text/javascript" src="//use.typekit.net/enr5hww.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    {{ Basset::show('application.js') }}
    @yield('js')

    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-728496-9']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
  </body>
</html>