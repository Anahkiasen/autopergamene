document.querySelectorAll('p a img').forEach (image) ->
  image.parentNode.classList.add 'image-wrap'

document.querySelectorAll('img, div').forEach (image) ->
  image.removeAttribute('width')
  image.removeAttribute('height')
  image.removeAttribute('style')

document.querySelectorAll('p.code').forEach (code) ->
  code.innerHTML = '<pre>' + code.innerHTML + '</pre>'

document.querySelectorAll('pre').forEach (pre) ->
  content = pre.textContent
  Rainbow.color content, 'php', (highlighted) ->
    pre.innerHTML = highlighted