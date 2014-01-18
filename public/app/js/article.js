/**
 * Apply .image-wrap class to images in articles
 */
foreach('p a img', function(image) {
	image.parentNode.classList.add('image-wrap');
});

/**
 * Remove Wordpress hardcoded size attributes
 */
foreach('img, div', function(image) {
	image.removeAttribute('width');
	image.removeAttribute('height');
	image.removeAttribute('style');
});

/**
 * Reformat code blocks
 */
foreach('p.code', function(code) {
	code.innerHTML = '<pre>' + code.innerHTML + '</pre>';
});

/**
 * Add syntax highlighting
 */
foreach('pre', function(pre) {
	var content = pre.textContent;

	Rainbow.color(content, 'php', function(highlighted) {
		pre.innerHTML = highlighted;
	});
});
