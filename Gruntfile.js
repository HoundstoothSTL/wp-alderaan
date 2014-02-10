'use strict';

module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt);

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    dir: {
      src: "src",
      assets: "src/assets",
      js: "src/assets/js",
      scss: "src/assets/scss",
      css: "src/assets/css",
      font: "src/assets/font",
      img: "src/assets/img",
      dist: "dist"
    },

    sass: {
      options: {
        includePaths: ['bower_components/foundation/scss', require('node-bourbon').includePaths]
      },
      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          '<%= dir.css %>/app.css': '<%= dir.scss %>/app.scss'
        }
      }
    },

    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'src/assets/js/{,*/}*.js'
      ]
    },

    clean: {
      dist: {
        src: ['dist/*']
      },
    },

    copy: {
      scaffold: {
        files: [{
          expand: true,
          flatten: true,
          src: ['bower_components/jquery/jquery.js', 'bower_components/modernizr/modernizr.js', 'bower_components/foundation/js/foundation.js'],
          dest: 'src/assets/js/vendor/',
          filter: 'isFile'
        }, {
          expand: true,
          flatten: true,
          src: ['bower_components/font-awesome/fonts/**'],
          dest: 'src/assets/fonts/',
          filter: 'isFile'
        },
        {
          expand: true,
          flatten: true,
          src: ['bower_components/font-awesome/css/font-awesome.min.css'],
          dest: 'src/assets/css/',
          filter: 'isFile'
        }]

      },
      dist: {
        files: [{
          expand: true,
          cwd:'public/',
          src: ['css/**', 'js/**', 'img/**', 'fonts/**', '**/*.html', '!**/*.scss'],
          dest: 'dist/'
        }, {
          expand: true,
          flatten: true,
          src: ['bower_components/jquery/jquery.min.js', 'bower_components/modernizr/modernizr.js'],
          dest: 'dist/js/vendor/',
          filter: 'isFile'
        }, {
          expand: true,
          flatten: true,
          src: ['bower_components/foundation/js/foundation.min.js'],
          dest: 'dist/js/foundation/',
          filter: 'isFile'
        } , {
          expand: true,
          flatten: true,
          src: ['bower_components/font-awesome/fonts/**'],
          dest: 'dist/fonts/',
          filter: 'isFile'
        },
        {
          expand: true,
          flatten: true,
          src: ['bower_components/font-awesome/css/font-awesome.min.css'],
          dest: 'dist/css/',
          filter: 'isFile'
        }]
      },
    },

    useminPrepare: {
      html: 'src/*.html',
      options: {
        dest: 'dist'
      }
    },

    usemin: {
      html: ['dist/*.html'],
      css: ['dist/css/*.css'],
      options: {
        dirs: ['dist']
      }
    },

    watch: {
      grunt: {
        files: ['Gruntfile.js']
      },
      sass: {
        files: '<%= dir.scss %>/{,*/}*.scss',
        tasks: ['sass']
      },
      livereload: {
        files: ['./**/*.php', '<%= dir.js %>/{,*/}*.js', '<%= dir.css %>/{,*/}*.css', '<%= dir.img %>/{,*/}*.{jpg,gif,svg,jpeg,png}'],
        options: {
          livereload: true
        }
      }
    }

  });

  grunt.registerTask('scaffold', ['copy:scaffold']);
  grunt.registerTask('build', ['sass']);
  grunt.registerTask('default', ['build', 'watch']);
  grunt.registerTask('validate-js', ['jshint']);
  grunt.registerTask('publish', ['clean:dist', 'validate-js', 'useminPrepare', 'copy:dist', 'usemin']);

};