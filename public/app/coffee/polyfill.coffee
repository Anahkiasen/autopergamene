URL = window.Glow.URL

Modernizr.load [
  test: Modernizr.classlist
  nope: URL.to_asset 'components/classlist/classList.min.js'
]