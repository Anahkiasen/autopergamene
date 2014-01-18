module.exports = {
	options: {
		followOutput: true,
	},

	core: {
		options: {
			excludeGroup: 'Routes',
		}
	},

	coverage: {
		options: {
			excludeGroup: 'Routes',
			coverageText: '<%= tests %>/_coverage.txt',
			coverageHtml: '<%= tests %>/_coverage'
		}
	},

	all: {
	},
};