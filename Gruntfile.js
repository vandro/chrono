/* global module */

module.exports = function (grunt) {

    grunt.initConfig({
        uglify: {
            options: {
                mangle: false
            },
            targets: {
                files: {
                    'web/build/js/main.js': ['app/assets/js/*.js']
                }
            }
        }, // uglify
        sass: {
            dist: {
                options: {style: 'compressed'},
                files: {
                    'web/build/css/style.css': 'app/assets/scss/*.scss'
                }
            }
        }, // sass
        watch: {
            dist: {
                files: [
                    'app/assets/js/**/*',
                    'app/assets/scss/**/*'
                ],
                tasks: ['uglify', 'sass']
            }
        } // watch
    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['uglify', 'sass']);
    grunt.registerTask('w', ['watch']);
};
