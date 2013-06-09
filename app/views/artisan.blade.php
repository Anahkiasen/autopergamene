<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Artisan</title>
    {{ HTML::favicon('app/img/favicon.jpg') }}
    <link href="{{ URL::asset('components/bootstrap/docs/assets/css/bootstrap.css') }}" type="text/css" rel="stylesheet">
  </head>
  <body style='padding: 2rem'>
    <blockquote>
      {{ $results }}
    </blockquote>
  </body>
</html>
