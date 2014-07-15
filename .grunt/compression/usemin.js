module.exports = {
	options: {
		blockReplacements: {
			css: function (block) {
				return '{{ HTML.style("' + block.dest + '") }}';
			},
			js: function (block) {
				return '{{ HTML.script("' + block.dest + '") }}';
			},
		},
	},

	html: 'app/views/**/*.twig',
};
