module.exports = function(grunt) {

	// Load modules
	require('load-grunt-tasks')(grunt);

	/**
	 * Loads all available tasks options
	 *
	 * @param {String} folder
	 *
	 * @return {Object}
	 */
	function loadConfig(folder) {
		var glob   = require('glob');
		var path   = require('path');
		var key;

		glob.sync('**/*.js', {cwd: folder}).forEach(function(option) {
			key = path.basename(option, '.js');
			config[key] = require(folder + option);
		});
	}

	////////////////////////////////////////////////////////////////////
	//////////////////////////// CONFIGURATION /////////////////////////
	////////////////////////////////////////////////////////////////////

	var config = {
		app        : 'public/app',
		builds     : 'public/builds',
		components : 'public/components',
		tests      : '<%= app %>/tests',

		paths: {
			original: {
				css  : '<%= app %>/css',
				js   : '<%= app %>/js',
				sass : '<%= app %>/sass',
				img  : '<%= app %>/img',
				svg  : '<%= app %>/svg',
			},
			compiled: {
				css : '<%= builds %>/css',
				js  : '<%= builds %>/js',
				img : '<%= builds %>/img',
				svg : '<%= builds %>/svg',
			},
		},
	};

	// Load all tasks
	loadConfig('./.grunt/');
	grunt.initConfig(config);

	////////////////////////////////////////////////////////////////////
	/////////////////////////////// COMMANDS ///////////////////////////
	////////////////////////////////////////////////////////////////////

	grunt.registerTask('default', 'Build assets for local', [
		'css', 'js',
		'copy',
	]);

	grunt.registerTask('production', 'Build assets for production', [
		'copy',
		'concat',
		'cssmin',
		'uglify',
	]);

	grunt.registerTask('rebuild', 'Build assets from scratch', [
		'compass',
		'clean',
		'default',
	]);

	// By filetype
	////////////////////////////////////////////////////////////////////

	grunt.registerTask('js', 'Build scripts', [
		'jshint',
		'concat:js',
	]);

	grunt.registerTask('css', 'Build stylesheets', [
		'compass:compile',
		'csslint',
		'csscss',
		'concat:css'
	]);
};