
# Hide and show blocks on click ------------------------------------ /

foreach '[data-show]', (link) ->
  addEvent link, 'click', (link) ->
    block = document.querySelector link.target.getAttribute('data-show')
    block.classList.toggle 'open'