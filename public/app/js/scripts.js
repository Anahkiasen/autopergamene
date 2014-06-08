foreach('[data-show]', function (link) {
	addEvent(link, 'click', function (link) {
		var block = document.querySelector(link.target.getAttribute('data-show'));

		block.classList.toggle('open');
	});
});
