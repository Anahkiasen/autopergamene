module.exports = {
	dist: {
		files: [
			{
				expand : true,
				src    : ['**'],
				cwd    : '<%= paths.original.img %>',
				dest   : '<%= paths.compiled.img %>'
			},
			{
				expand : true,
				src    : ['**'],
				cwd    : '<%= paths.original.svg %>',
				dest   : '<%= paths.compiled.svg %>'
			},
		]
	}
};