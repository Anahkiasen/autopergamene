/**
 * Modernizr polyfills
 */
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

/**
 * Polyfill for addEventListener
 */
window.addEvent = (function() {
  if (document.addEventListener) {
    return function(el, type, fn) {
      el.addEventListener(type, fn, false);
    };
  }

  return function(el, type, fn) {
    el.attachEvent("on" + type, function() {
      fn.call(el, window.event);
    });
  };
})();

/**
 * Polyfill for forEach
 */
if (!Array.prototype.forEach) {
  Array.prototype.forEach = function(fn, scope) {
    var item, _i, _ref, _results;
    _results = [];
    for (item = _i = 0, _ref = this.length; _i < _ref; item = _i += 1) {
      _results.push(fn.call(scope, this[item], item, this));
    }
    return _results;
  };
}

/**
 * Executes a foreach on a selector
 *
 * @param  {string}   elements      The selector
 * @param  {Function} callback
 */
this.foreach = function(elements, callback) {
  elements = document.querySelectorAll(elements);
  elements = Array.prototype.slice.call(elements, 0);

  return elements.forEach(callback);
};
