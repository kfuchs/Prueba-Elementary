module.exports = function(grunt) {
    
    // Initialize the grunt configuration
    grunt.initConfig({

        cssmin: {
          add_banner: {
            options: {
              banner: '/* My minified css file */'
            },
            files: {
                './public/css/main.css': 
                [
                    './app/assets/components/bower/jquery-ui/themes/redmond/jquery-ui.css',
                    './app/assets/components/bower/bootstrap/dist/css/bootstrap.css',
                    './app/assets/components/bower/font-awesome/css/font-awesome.css',
                    './app/assets/components/bower/datatables/media/css/jquery.dataTables.css',
                    './app/assets/components/bower/toastr/toastr.css',
                    './app/assets/css/custom.css',
                    './app/assets/css/style.css'
                ]
            }
          }
        },
        // JS file concatenation
          concat: {
            options: {
              separator: ';',
            },
            dist: {
              src: [
                './app/assets/components/bower/jquery/jquery.js',
                './app/assets/components/bower/jquery-ui/jquery-ui.js',
                './app/assets/components/bower/bootstrap/dist/js/bootstrap.js',
                './app/assets/components/bower/jquery-nicescroll/jquery.nicescroll.js',
                './app/assets/components/bower/jquery.easing/js/jquery.easing.js',
                './app/assets/components/bower/datatables/media/js/jquery.dataTables.js',
                './app/assets/components/bower/highcharts/highcharts.js',
                './app/assets/components/bower/highcharts/highcharts-more.js',
                './app/assets/components/bower/highcharts/modules/exporting.js',
                './app/assets/components/bower/toastr/toastr.js',
                './app/assets/components/bower/pusher/dist/pusher.js',
                './app/assets/js/custom.js',
                './app/assets/js/script.js'

              ],
              dest: './public/js/main.js',
            },
          },

        // copy ressources such as fonts, files, images, required by assets to the public directory
        copy : {
            fonts: {
                expand: true,
                cwd : './app/assets/components/bower/bootstrap/dist/fonts/',
                src: ['*'],
                dest: './public/fonts/'
            },
            js : {
                expand: true,
                cwd : './app/assets/components/bower/modernizr/',
                src: ['modernizr.js'],
                dest: './public/assets/js/'  
            }
        },

        // JS file obfuscation
        uglify: {
            dist: {
                files: {
                  './public/js/main.js' : './public/js/main.js'
                }
            }
        },

        // run PHP unit tests
        phpunit: {
            classes: {
                dir: 'app/tests/'
            },
            options: {
                bin: 'vendor/bin/phpunit',
                colors: true
            }
        },

        // automatically run tasks when changing JS, LESS or PHP files
        watch: {
            js: {
                files: ['./app/assets/js/*.*'],
                tasks: ['concat'],
                options: {
                    livereload: true
                }
            },
            cssmin: {
                files: ['./app/assets/css/**/*.css'],
                tasks: ['cssmin'],
                options: {
                    livereload: true
                }
            },
            less: {
                files: ['./app/assets/less/*.*'],
                tasks: ['less'],
                options: {
                    livereload: true
                }
            },
            php: {
                files: [
                    'app/views/*.php'
                ],
                options: {
                    livereload: true
                }
            }         
        }
    });

    // Load grunt plugins
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-phpunit');
    
    // Set the default task
    grunt.registerTask('default', ['watch']);

    grunt.registerTask('live', ['cssmin', 'concat', 'watch']);

    grunt.registerTask('build', ['cssmin', 'concat', 'uglify', 'copy', 'watch']);

};