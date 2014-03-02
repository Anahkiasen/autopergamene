module.exports = {
	css: {
		files: {
			'<%= paths.compiled.css %>/application.css': [
				'<%= components %>/normalize-css/normalize.css',
				'<%= components %>/rainbow/themes/tomorrow-night.css',
				'<%= paths.original.css %>/**/*.css',
			],
		},
	},
	js: {
		files: {
			'<%= paths.compiled.js %>/application.js': [
				'<%= paths.original.js %>/scripts.js',
			],
			'<%= paths.compiled.js %>/modernizr.js': [
				'<%= components %>/modernizr/modernizr.min.js',
				'<%= paths.original.js %>/polyfill.js',
			],
			'<%= paths.compiled.js %>/article.js': [
				'<%= components %>/rainbow/js/rainbow.min.js',
				'<%= components %>/rainbow/js/language/generic.js',
				'<%= components %>/rainbow/js/language/php.js',
				'<%= paths.original.js %>/article.js',
			],
			'<%= paths.compiled.js %>/lazyload.js': [
				'<%= paths.components.jquery %>',
				'<%= components %>/jquery.lazyload/jquery.lazyload.js',
				'<%= paths.original.js %>/components/lazyload.js',
			],
			'<%= paths.compiled.js %>/affixed.js': [
				'<%= paths.components.jquery %>',
				'<%= components %>/bootstrap/js/affix.js',
				'<%= components %>/bootstrap/js/scrollspy.js',
				'<%= paths.original.js %>/components/affixed.js',
			],
		},
	}
};