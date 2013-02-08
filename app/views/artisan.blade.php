<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Artisan</title>
    {{{ HTML::favicon('app/img/favicon.jpg') }}}
    {{{ HTML::style('components/bootstrap/docs/assets/css/bootstrap.css') }}}
  </head>
  <body style='padding: 2rem'>
    <blockquote>
      {{ $results }}
    </blockquote>
  </body>
</html>