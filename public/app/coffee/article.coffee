for image in document.querySelectorAll('p a img')
  image.parentNode.classList.add 'image-wrap'

for image in document.querySelectorAll('img, div')
  image.removeAttribute('width')
  image.removeAttribute('height')
  image.removeAttribute('style')

for code in document.querySelectorAll('p.code')
  code.innerHTML = '<pre>' + code.innerHTML + '</pre>'

for pre in document.querySelectorAll('pre')
  content = pre.textContent
  Rainbow.color content, 'php', (highlighted) ->
    pre.innerHTML = highlighted