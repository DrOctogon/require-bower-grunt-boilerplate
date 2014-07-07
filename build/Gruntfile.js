//////////////////////////////////////////////
// CSS & JS BUILD TOOL
// Written By Mason Berkshire
//////////////////////////////////////////////

module.exports = function(grunt) {
    grunt.registerTask('watch', [ 'watch' ]);
    grunt.initConfig({
        requirejs: {
            compile: {
                options: {
                    baseUrl: '../assets/js/',
                    mainConfigFile: '../assets/js/config.js',
                    name: 'main',  out: '../assets/js/dist/main.min.js',
                    findNestedDependencies: true
                }
            }
        },
        bower: {
            target: {
                rjsConfig: '../assets/js/config.js',
                options: {
                    transitive: true
                }
            }
        },
        less: {
            dev: {
                files: {'../assets/css/dist/app.css': '../assets/css/app.less'},
                options: {
                    livereload: true,
                    cleancss: false
                }
            },
            prod: {
                files: {'../assets/css/dist/app.min.css': '../assets/css/app.less'},
                options: {
                    livereload: true,
                    cleancss: true
                }
            }
        },
        qunit: {
            all: ['../tests/**/*.html']
        },
        watch: {
            requirejs: {
                files: ['../assets/js/**/*.js', '!../assets/js/dist**/*.js'],
                tasks: ['buildjs:requirejs']
            },
            bower: {
                files: ['bower_components/**/*'],
                tasks: ['bower:target']
            },
            css: {
                files: ['../assets/css/*.less' , '!../assets/css/dist**/*.css'],
                tasks: ['less:prod']
            },
           test: {
                files: ['../tests/*.js', '../tests/*.html'],
                all: ['../tests/**/*.html'],
                tasks: ['qunit:all']
            }
        }
    });
    grunt.loadNpmTasks('grunt-bower-requirejs');
    grunt.loadNpmTasks('grunt-contrib-requirejs');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-qunit');
    grunt.registerTask('test' , ['qunit:all']);
    grunt.registerTask('package', [ 'bower:target' ]);
    grunt.registerTask('buildjs', [ 'requirejs' ]);
    grunt.registerTask('dev', [ 'less:dev' ]);
    grunt.registerTask('prod', [ 'less:prod' ]);
};