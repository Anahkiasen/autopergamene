URL = window.Glow.URL

Modernizr.load [
  test: Modernizr.classlist
  nope: URL.to_asset 'components/classlist/classList.min.js'
]

# Legacy addEventListener ------------------------------------------ /

window.addEvent = (->
  if document.addEventListener
    return (el, type, fn) ->
      el.addEventListener type, fn, false
  (el, type, fn) ->
    el.attachEvent "on" + type, ->
      fn.call el, window.event
)()

# Array::forEach --------------------------------------------------- /

unless Array::forEach then Array::forEach = (fn, scope) ->
  for item in [0...@length] by 1
    fn.call(scope, this[item], item, this)

# Little helper function ------------------------------------------- /

@foreach = (elements, callback) ->
  elements = document.querySelectorAll elements
  elements = Array::slice.call elements, 0
  elements.forEach callback
