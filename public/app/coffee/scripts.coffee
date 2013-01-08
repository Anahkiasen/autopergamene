# Legacy addEventListener ------------------------------------------ /

addEvent = (->
  if document.addEventListener
    return (el, type, fn) ->
      el.addEventListener type, fn, false
  (el, type, fn) ->
    el.attachEvent "on" + type, ->
      fn.call el, window.event
)()

# Hide and show blocks on click ------------------------------------ /

for link in document.querySelectorAll '[data-show]'
  addEvent link, 'click', (link) ->
    block = document.querySelector link.target.getAttribute('data-show')
    block.classList.toggle 'open'