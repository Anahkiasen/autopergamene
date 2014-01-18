module.exports = {
	css: {
		files: {
			'<%= paths.compiled.css %>/application.css': [
				'<%= components %>/normalize-css/normalize.css',
				'<%= paths.original.css %>/styles.css',
			],
			'<%= paths.compiled.css %>/article.css': [
				'<%= components %>/rainbow/themes/tomorrow-night.css',
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
				'<%= components %>/jquery/jquery.min.js',
				'<%= components %>/jquery.lazyload/jquery.lazyload.js',
				'<%= paths.original.js %>/components/lazyload.js',
			],
			'<%= paths.compiled.js %>/affixed.js': [
				'<%= components %>/jquery/jquery.min.js',
				'<%= components %>/bootstrap/js/bootstrap-affix.js',
				'<%= components %>/bootstrap/js/bootstrap-scrollspy.js',
				'<%= paths.original.js %>/components/affixed.js',
			],
		},
	}
};