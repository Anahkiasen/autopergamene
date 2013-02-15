
# Hide and show blocks on click ------------------------------------ /

document.querySelectorAll('[data-show]').forEach (link) ->
  addEvent link, 'click', (link) ->
    block = document.querySelector link.target.getAttribute('data-show')
    block.classList.toggle 'open'