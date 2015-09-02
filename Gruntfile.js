module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		
		sass: {
			options: {
				includePaths: ['bower_components/foundation/scss']
			},
			dist: {
				options: {
					outputStyle: 'compressed',
					sourceMap: false,
				},
				files: {
				'css/style.css': 'scss/app.scss',
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
				src: [	'bower_components/foundation/js/foundation/foundation.js',
						'bower_components/foundation/js/foundation/foundation.topbar.js',
						'bower_components/foundation/js/foundation/foundation.orbit.js',
						'bower_components/foundation/js/foundation/foundation.reveal.js'
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
		}
	});
	
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-concat');
	
	grunt.registerTask('build', ['sass']);
	grunt.registerTask('buildJs', ['concat','uglify']) ;
	grunt.registerTask('default', ['build','buildJs','watch']);
}
