module.exports = {
	stylesheets: {
		files: {
			'application.css': [
				'components/normalize-css/normalize.css',
				'app/css/styles.css',
			],
			'article.css': [
				'components/rainbow/themes/tomorrow-night.css',
			],
		},
	},
	javascript: {
		files: {
			'application.js': [
				'app/js/scripts.js',
			],
			'modernizr.js': [
				'components/modernizr/modernizr.min.js',
				'app/js/polyfill.js',
			],
			'article.js': [
				'components/rainbow/js/rainbow.min.js',
				'components/rainbow/js/language/generic.js',
				'components/rainbow/js/language/php.js',
				'app/js/article.js',
			],
			'lazyload.js': [
				'components/jquery/jquery.min.js',
				'components/jquery.lazyload/jquery.lazyload.js',
				'app/js/modules/lazyload.js',
			],
			'affixed.js': [
				'components/jquery/jquery.min.js',
				'components/bootstrap/js/bootstrap-affix.js',
				'components/bootstrap/js/bootstrap-scrollspy.js',
				'app/js/modules/affixed.js',
			],
		},
	}
};