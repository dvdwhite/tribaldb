'use strict';
module.exports = function(grunt) {

	// load all tasks
	require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

    grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		watch: {
			files: ['css/scss/**/*.scss'],
			tasks: 'sass:dev',
			options: {
				livereload: true,
			},
            images: {
                files: ['assets/images/**/*.{png,jpg,gif}'],
                tasks: ['imagemin']
            }
		},

		sass: {
			dev: {
				options : {
				style : 'expanded'
				},
				files: {
				'style.css':'css/scss/style.scss',
				'custom-editor-style.css':'css/scss/custom-editor-style.scss'
				}
			},
			release: {
					options : {
					style : 'compressed'
				},
					files: {
					'style.css':'css/scss/style.scss',
					'custom-editor-style.css':'css/scss/custom-editor-style.scss'
					}
			}
		},

        // browserSync
        // browserSync: {
        //     dev: {
        //         bsFiles: {
        //             src : ['style.css', 'js/*.js', 'images/**/*.{png,jpg,jpeg,gif,webp,svg}']
        //         },
        //         options: {
        //             proxy: "localhost.umc.dev",
        //             watchTask: true
        //         }
        //     }
        // },

		autoprefixer: {
            options: {
				browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1', 'ie 9']
			},
			single_file: {
				src: 'style.css',
				dest: 'style.css'
			}
		},

		// csscomb: {
		//	options: {
  //               config: '.csscomb.json'
  //           },
  //           files: {
  //               'style.css': ['style.css'],
  //           }
		// },

		concat: {
			release: {
		        src: [
		            'js/dev/navigation.js',
		            'js/dev/retina.min.js',
		            'js/dev/jquery.flexslider.js',
		            'js/dev/slick.min.js',
		            'js/dev/jquery.stellar.js',
		            'js/dev/jquery.actual.min.js',
		            'js/dev/global.js'
		        ],
		    dest: 'js/prod/combined.min.js'
		    	}
		},

		// min javascript
		uglify: {
		    release: {
		        src: 'js/prod/combined.min.js',
		        dest: 'js/prod/combined.min.js'
		    }
		},

        // image optimization
        // imagemin: {
        //     dist: {
        //         options: {
        //             optimizationLevel: 7,
        //             progressive: true,
        //             interlaced: true
        //         },
        //         files: [{
        //             expand: true,
        //             cwd: 'images/',
        //             src: ['**/*.{png,jpg,gif,ico}'],
        //             dest: 'images/'
        //         }]
        //     }
        // },
//		gitpull: {
//			master: {
//				options: {
//
//					branch: 'master'
//				}
//
//			}
//		},
        // Add the git release version
		 version: {
			css: {
				options: {
					prefix: 'Version\: '
				},
				src: [ 'css/scss/style.scss' ],
				},
			php: {
				options: {
					prefix: '\@version\\s+'
				},
				src: [ 'functions.php' ],
			}
		}, 

		// Clean the build folder
		clean: {
				release: {
				src: ['build/']
			}
		},
		// Copy to build folder
		copy: {
			release: {
				expand: true,
				src: [
					'**',
					'!bower_components/**',
					'!bower.json',
					'!css/scss/**',
					'!Gruntfile.js',
					'!js/dev/**',
					'!node_modules/**',
					'!package.json',
					'!README.*',
					'!release/**',
					'!setup/**'
				],
				dest: 'build/'
			}
		},

		// Compress the build folder into an upload-ready zip file
		compress: {
			release: {
				options: {
					archive: 'release/<%= pkg.name %>-<%= pkg.version %>.zip'
					},
				cwd: 'build/',
				src: ['**/*'],
				dest: '<%= pkg.name %>/'
			}
		},
		// Commit, tag, and push the new version
//		gitadd: {
//			version: {
//				options: {
//					force: true
//				},
//				files: {
//					src: ['release/<%= pkg.name %>-<%= pkg.version %>.zip']
//				}
//			}
//		},
//		gitcommit: {
//			version: {
//				options: {
//					message: 'New version: <%= pkg.version %>'
//				},
//				files: {
//					src: ['css/scss/style.scss', 'functions.php', 'package.json', 'style.css', 'release/<%= pkg.name %>-<%= pkg.version %>.zip']
//				}
//			}
//		},
//		gittag: {
//			version: {
//				options: {
//					tag: '<%= pkg.version %>',
//					message: 'Tagging version <%= pkg.version %>'
//				}
//			}
//		},
//		gitpush: {
//			version: {
//				options: {
//					branch: 'master',
//					tags: true
//				}
//			}
//		}
		// https://www.npmjs.org/package/grunt-wp-i18n
		// makepot: {
		//     target: {
		//         options: {
		//             domainPath: '/languages/',    // Where to save the POT file.
		//             potFilename: '_s.pot',   // Name of the POT file.
		//             type: 'wp-theme'  // Type of project (wp-plugin or wp-theme).
		//         }
		//     }
		// }

	});

    grunt.registerTask( 'default', [
		'sass:dev',
		// Turn browserSync on as needed
		// 'browserSync', 
		'watch'
    ]);
    grunt.registerTask( 'build', [
		'sass:release',
		'autoprefixer',
		// 'csscomb',
		'concat:release',
		'uglify:release'
		
	]);
    grunt.registerTask( 'release', [
		'version',
		'sass:release',
		'autoprefixer',
		// 'csscomb',
		'concat:release',
		'uglify:release',
		// 'imagemin',
		'clean:release',
		'copy:release',
		'compress:release',
		// 'gitpull:master',
		//'gitadd:version',
		//'gitcommit:version',
		//'gittag:version',
		//'gitpush:version'
	]);

};