module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		
		sass: {
			options: {
				includePaths: [
					'node_modules/foundation-sites/scss',
					'node_modules/motion-ui/src'
				]
			},
			dist: {
				options: {
					outputStyle: 'compressed',
					sourceMap: false,
				},
				files: {
				'style.css': 'scss/app.scss',
				'css/editor.css': 'scss/editor.scss'
				}
			}
		},
		watch: {
			grunt: {
				options: {
					reload: true
				},
				files: ['Gruntfile.js']
			},
			sass: {
				files: 'scss/**/*.scss',
				tasks: ['sass']
			}
		},
		concat: {
			options: {
				separator: ';'
			},
			script: {
				src: [	
						'node_modules/foundation-sites/dist/foundation.js',
						'node_modules/foundation-sites/dist/plugins/foundation.core.js',
						'node_modules/foundation-sites/dist/plugins/foundation.accordionMenu.js',
						'node_modules/foundation-sites/dist/plugins/foundation.responsiveToggle.js',
						'node_modules/foundation-sites/dist/plugins/foundation.sticky.js',
						'node_modules/foundation-sites/dist/plugins/foundation.orbit.js',
						'node_modules/foundation-sites/dist/plugins/foundation.reveal.js',
						'node_modules/foundation-sites/dist/plugins/foundation.util.box.js',
						'node_modules/foundation-sites/dist/plugins/foundation.util.nest.js',
						'node_modules/foundation-sites/dist/plugins/foundation.util.mediaQuery.js',
						'node_modules/foundation-sites/dist/plugins/foundation.util.keyboard.js',
						'node_modules/foundation-sites/dist/plugins/foundation.util.motion.js',
						'node_modules/foundation-sites/dist/plugins/foundation.util.triggers.js',
						'node_modules/foundation-sites/dist/plugins/foundation.util.timerAndImageLoader.js',
						'node_modules/foundation-sites/dist/plugins/foundation.util.touch.js'
					],
				dest: 'js/script.js'
			},
		},
		uglify: {
			dist: {
				files: {
					'js/script.min.js':['js/script.js']
				}
			}
		},
		compress: {
			main: {
				options: {
					archive: '<%= pkg.name %>-<%= pkg.version %>.zip'
				},
				files: [
					{src: ['*.php','style.css','LICENSE','css/*','js/*.min.js','img/*','fonts/*'], dest: '/'}
				]
			},
		}
	});
	
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-compress');
	
	grunt.registerTask('build', ['sass']);
	grunt.registerTask('buildJs', ['concat','uglify']) ;
	grunt.registerTask('package',['build','buildJs','compress']);
	grunt.registerTask('default', ['build','buildJs']);
}
