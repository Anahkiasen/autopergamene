// Generated by CoffeeScript 1.4.0
(function() {
  var URL, addEvent;

  URL = window.Glow.URL;

  Modernizr.load([
    {
      test: Modernizr.classlist,
      nope: URL.to_asset('components/classlist/classList.min.js')
    }
  ]);

  addEvent = (function() {
    if (document.addEventListener) {
      return function(el, type, fn) {
        return el.addEventListener(type, fn, false);
      };
    }
    return function(el, type, fn) {
      return el.attachEvent("on" + type, function() {
        return fn.call(el, window.event);
      });
    };
  })();

  if (!Array.prototype.forEach) {
    Array.prototype.forEach = function(fn, scope) {
      var i, len, _results;
      i = 0;
      len = this.length;
      _results = [];
      while (i < len) {
        fn.call(scope, this[i], i, this);
        _results.push(++i);
      }
      return _results;
    };
  }

  window.foreach = function(elements, callback) {
    elements = document.querySelectorAll(elements);
    elements = Array.prototype.slice.call(elements, 0);
    return elements.forEach(callback);
  };

}).call(this);
