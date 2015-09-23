module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            dist: {
                src: [
                    'js/vvb/concat/*.js'
                ],
                dest: 'js/vvb/production.js',
            }
        },

        uglify: {
            build: {
                src: 'js/vvb/production.js',
                dest: 'js/vvb/production.min.js'
            }
        },

        sass: {
            dist: {
                 options: {
                     style: 'expanded'
                 },
                // files: {
                //     'css/build/global.css': 'css/global.scss'
                // }
                files: [{
                    expand: true,
                    cwd: 'css/vvb/scss',
                    src: ['*.scss'],
                    dest: 'css/vvb',
                    ext: '.css'
                }]
            }
        },

        cssmin: {
          minify: {
            expand: true,
            cwd: 'css/vvb/',
            src: ['*.css', '!*.min.css'],
            dest: 'css/vvb/',
            ext: '.min.css'
          }
        },

        watch: {
            options: {
                livereload: true,
            },
            scripts: {
                files: ['js/vvb/concat/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            },
            css: {
                files: ['css/vvb/scss/*.scss',
                        'css/vvb/scss/**/*.scss'
                       ],
                tasks: ['sass'],
                options: {
                    spawn: false,
                },
            },
            cssmin: {
                files: ['css/vvb/css/*'],
                tasks: ['cssmin'],
                options: {
                    spawn: false,
                },
            }
        }

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat', 'uglify','sass','cssmin','watch']);

};
