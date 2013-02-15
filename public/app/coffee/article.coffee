foreach 'p a img', (image) ->
  image.parentNode.classList.add 'image-wrap'

foreach 'img, div', (image) ->
  image.removeAttribute('width')
  image.removeAttribute('height')
  image.removeAttribute('style')

foreach 'p.code', (code) ->
  code.innerHTML = '<pre>' + code.innerHTML + '</pre>'

foreach 'pre', (pre) ->
  content = pre.textContent
  Rainbow.color content, 'php', (highlighted) ->
    pre.innerHTML = highlighted