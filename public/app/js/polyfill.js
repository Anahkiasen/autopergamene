Modernizr.load([
	{
		test: Modernizr.classlist,
		nope: '../../components/classlist/classList.min.js'
	},
	{
		test: Modernizr.mediaqueries,
		nope: '../../components/respond/respond.min.js'
	}
]);

var addEvent = (function () {
	if (document.addEventListener) {
		return function (element, type, callback) {
			element.addEventListener(type, callback, false);
		};
	}

	return function (element, type, callback) {
		element.attachEvent('on' + type, function () {
			callback.call(element, window.event);
		});
	};
})();

if (!Array.prototype.forEach) {
	Array.prototype.forEach = function (callback, scope) {
		var length = this.length;
		var results = [];

		for (var i = 0; i < length; i++) {
			results.push(callback.call(scope, this[i], i, this));
		}

		return results;
	};
}

var foreach = function (elements, callback) {
	elements = document.querySelectorAll(elements);
	elements = Array.prototype.slice.call(elements, 0);

	return elements.forEach(callback);
};
