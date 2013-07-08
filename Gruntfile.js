/*global module:false*/
module.exports = function(grunt) {
  'use strict';

  // readOptionalJSON
  // by Ben Alman
  // https://gist.github.com/2876125
  function readOptionalJSON( filepath ) {
      var data = {};
      try {
          data = grunt.file.readJSON( filepath );
          grunt.verbose.write( "Reading " + filepath + "..." ).ok();
      } catch(e) {}
      return data;
  }

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    wpcss: {
      banner: '/*\n'+
              'Theme Name: <%= pkg.title || pkg.name %> \n'+
              'Theme URI: <%= pkg.homepage %> \n'+
              'Author: <%= pkg.author %>\n'+
              'Description: <%= pkg.description %> \n' +
              'Version: <%= pkg.version %> \n'+
              'Tags: <%= pkg.tags %> \n'+
              'Licence: <%= _.pluck(pkg.licenses, "type").join(", ") %>'+
              '\n\n'+
              '* This file does not contain any CSS \n'+
              '* Stylesheets are located in the "assets/css/" - directory \n'+
              '* Innovative ideas through Design & Technology @ Houndstooth http://madebyhoundstooth.com \n'+
              '*/'
    },
    meta: {
      banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
        '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
        '<%= pkg.homepage ? "* " + pkg.homepage + "\n" : "" %>' +
        '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
        ' Licensed <%= _.pluck(pkg.licenses, "type").join(", ") %> */'
    },
    paths: {
      src: 'src',
      dest: 'dist'
    },
    concat: {
      options: {
        separator: ';'
      },
      distScripts: {
        src: [
          '<%= paths.src %>/assets/js/app.js'
        ],
        dest: '<%= paths.src %>/assets/js/scripts.js'
      },
      wpcss: {
        options: {
          banner: '<%= wpcss.banner %>'
        },
        src: ['<%= wpcss.banner %>'],
        dest: '<%= paths.dest %>/style.css'
      }
    },
    compass: {
      dev: {
        options: {
          config: 'config/compass.rb'
        }
      }
    },
    copy: {
      scaffold: {
        files: [
          {expand: true, cwd: 'components/jquery/', src: 'jquery.min.js', dest: '<%= paths.src %>/assets/js/vendor/'},
          {expand: true, cwd: 'components/modernizr/', src: 'modernizr.js', dest: '<%= paths.src %>/assets/js/vendor/'},
        ]
      },
      dist: {
        files: [
          {expand: true, cwd: '<%= paths.src %>/', src: ['**/*.php'], dest: '<%= paths.dest %>/'},
          {expand: true, cwd: '<%= paths.src %>/font/', src: ['**'], dest: '<%= paths.dest %>/assets/font/'},
          {expand: true, cwd: '<%= paths.src %>/', src: ['*.png'], dest: '<%= paths.dest %>/'},
          {expand: true, cwd: '<%= paths.src %>/assets/img/', src: ['**'], dest: '<%= paths.dest %>/assets/img/'},
          {expand: true, cwd: '<%= paths.src %>/assets/font/', src: ['**'], dest: '<%= paths.dest %>/assets/font/'}
        ]
      }
    },
    jshint: {
      all: ['Gruntfile.js', '<%= paths.src %>/assets/js/app.js']
    },
    imagemin: {
      dist: {
        options: {
          optimizationLevel: 3
        },
        files: [
          {
            expand: true,
            cwd: '<%= paths.src %>/assets/img/',
            src: ['**/*.png'],
            dest: '<%= paths.dest %>/assets/img/'
          }
        ]
      },
      dev: {
        options: {
          optimizationLevel: 0
        },
        files: [
          {
            expand: true,
            cwd: '<%= paths.src %>/assets/img/',
            src: ['**/*.png'],
            dest: '<%= paths.dest %>/assets/img/'
          }
        ]
      }
    },
    mincss: {
      dist: {
        files: {
          "<%= paths.dest %>/assets/css/main.min.css": ["<%= paths.src %>/assets/css/main.css"]
        }
      }
    },
    uglify: {
      dist: {
        files: {
          '<%= paths.dest %>/assets/scripts/scripts.min.js': ['<%= paths.src %>/assets/js/scripts.js']
        }
      }
    },
    watch: {
      src: {
        files: ['<%= paths.src %>/assets/sass/**/*.scss'],
        tasks: ['dev']
      }
    }
  });

  // Load External Tasks
  grunt.loadTasks('tasks');

  // Load NPM tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-mincss');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  
  // Tasks to run
  grunt.registerTask('build', ['copy:dist', 'mincss:dist', 'concat', 'uglify:dist', 'wpversion']);
  grunt.registerTask('dev', ['compass', 'jshint']);
  grunt.registerTask('scaffold', ['copy:scaffold']);

};
