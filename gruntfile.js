module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    watch: {
      sass: {
        files: [
          'css/scss/*.scss',
          'css/scss/partials/*.scss',
          'css/scss/vendor/*.scss',
        ],
        tasks: [
          'sass:dist'
        ],
        options: {
          spawn: false,
        },
      },
    },

    sass: {
      dist: {
        options: {
          style: 'compressed',
          sourcemap: 'auto'
        },
        files: {
          'style.css' : 'css/scss/main.scss',
        }
      }
    },

    concat: {
      scripts: {
        src: ['js/src/*.js', 'js/libraries/*.js'],
        dest: 'js/main.js'
      }
    },

    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'gruntfile.js',
        'js/src/*.js'
      ]
    },

    uglify: {
      js: {
        src: 'js/main.js',
        dest: 'js/main.js'
      }
    },

    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'images/src/',
          src: '**/*.{png,jpg,gif}',
          dest: 'images/'
        }]
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-newer');

  grunt.registerTask('default', ['sass', 'jshint']);
  grunt.registerTask('build', ['sass', 'concat:scripts', 'uglify', 'newer:imagemin']);
};