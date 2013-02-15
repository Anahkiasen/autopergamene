URL = window.Glow.URL

Modernizr.load [
  test: Modernizr.classlist
  nope: URL.to_asset 'components/classlist/classList.min.js'
]

# Legacy addEventListener ------------------------------------------ /

addEvent = (->
  if document.addEventListener
    return (el, type, fn) ->
      el.addEventListener type, fn, false
  (el, type, fn) ->
    el.attachEvent "on" + type, ->
      fn.call el, window.event
)()

# Array::forEach --------------------------------------------------- /

unless Array::forEach
  Array::forEach = (fn, scope) ->
    i = 0
    len = @length

    while i < len
      fn.call scope, this[i], i, this
      ++i