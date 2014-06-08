foreach('p a img', function (image) {
	image.parentNode.classList.add('image-wrap');
});

foreach('img, div', function (image) {
	image.removeAttribute('width');
	image.removeAttribute('height');
	image.removeAttribute('style');
});

foreach('p.code', function (code) {
	code.innerHTML = '<pre>' + code.innerHTML + '</pre>';
});

foreach('pre', function (pre) {
	var content = pre.textContent;

	Rainbow.color(content, 'php', function (highlighted) {
		pre.innerHTML = highlighted;
	});
});
