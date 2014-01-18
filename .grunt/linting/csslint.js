module.exports = {
	dist: {
		options: {
			'adjoining-classes'          : false,
			'box-model'                  : false,
			'box-sizing'                 : false,
			'compatible-vendor-prefixes' : false,
			'display-property-grouping'  : false,
			'duplicate-properties'       : false,
			'floats'                     : false,
			'font-sizes'                 : false,
			'gradients'                  : false,
			'known-properties'           : false,
			'overqualified-elements'     : false,
			'qualified-headings'         : false,
			'star-property-hack'         : false,
			'text-indent'                : false,
			'unique-headings'            : false,
		},
		src: ['<%= paths.original.css %>/*']
	},
};