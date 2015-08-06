module.exports = (grunt) ->
  # Grunt time
  require('time-grunt')(grunt)

  grunt.initConfig
    pkg: grunt.file.readJSON('package.json')

    coffee:
      compile:
        expand: true
        cwd: 'src/coffee'
        src: '**/*.coffee'
        dest: 'src/js/coffee'
        ext: '.js'

    concat:
      dist:
        src: [
          # Foundation core
          'bower_components/foundation/js/foundation/foundation.js',

          # Foundation components
          'bower_components/foundation/js/foundation/foundation.offcanvas.js',
          'bower_components/foundation/js/foundation/foundation.topbar.js',

          # Theme JS
          'src/js/**/*.js'
        ]
        dest: 'assets/js/<%= pkg.name %>.js'
        options:
          separator: ';'

    copy:
      fontawesome_fonts:
        expand: true
        cwd: 'bower_components/fontawesome/fonts/'
        src: '**'
        flatten: true
        dest: 'assets/fonts/fontawesome/'
      fontawesome_scss:
        expand: true
        cwd: 'bower_components/fontawesome/scss/'
        src: '**'
        dest: 'src/scss/fontawesome/'
      foundationscripts:
        expand: true
        cwd: 'bower_components/foundation/js/vendor/'
        src: '**'
        flatten: true
        dest: 'assets/js/lib'

    cssmin:
      dist:
        files: [
          {
            expand: true
            cwd: 'assets/css'
            src: ['**/*.css', '!**/*.min.css']
            dest: 'assets/css'
            ext: '.min.css'
          }
        ]

    exec:
      bower:
        command: 'node_modules/bower/bin/bower install'

    sass:
      dist:
        files:
          'assets/css/<%= pkg.name %>.css': 'src/scss/main.scss'
          'assets/css/editor-style.css': 'src/scss/editor-style.scss'
      options:
        sourceMap: true
        includePaths: ['bower_components/foundation/scss']

    sass_globbing:
      dist:
        files:
          'src/scss/maps/_mixins.scss': 'src/scss/mixins/**/*.scss'
          'src/scss/maps/_components.scss': [
            'bower_components/foundation/scss/foundation.scss',
            'src/scss/components/**/*.scss'
          ]
          'src/scss/maps/_theme.scss': 'src/scss/theme/**/*.scss'
        options:
          useSingleQuotes: false

    'string-replace':
      fontawesome:
        files:
          'src/scss/fontawesome/_variables.scss': 'src/scss/fontawesome/_variables.scss'
        options:
          replacements: [
            {
              pattern: '../fonts',
              replacement: '../fonts/fontawesome'
            }
          ]

    uglify:
      dist:
        files:
          'assets/js/<%= pkg.name %>.min.js': ['<%= concat.dist.dest %>']

    watch:
      grunt:
        files: ['Gruntfile.coffee']

      coffee:
        files: [
          'src/coffee/**/*.coffee'
        ]
        tasks: ['coffee']

      css:
        files: [
          'src/scss/**/*.scss',
          '!src/scss/maps/**'
        ]
        tasks: ['sass_globbing', 'sass', 'cssmin']

      js:
        files: [
          'src/js/**/*.js'
        ]
        tasks: ['concat', 'uglify']

  grunt.loadNpmTasks 'grunt-contrib-coffee'
  grunt.loadNpmTasks 'grunt-contrib-concat'
  grunt.loadNpmTasks 'grunt-contrib-copy'
  grunt.loadNpmTasks 'grunt-contrib-cssmin'
  grunt.loadNpmTasks 'grunt-contrib-uglify'
  grunt.loadNpmTasks 'grunt-contrib-watch'
  grunt.loadNpmTasks 'grunt-exec'
  grunt.loadNpmTasks 'grunt-sass'
  grunt.loadNpmTasks 'grunt-sass-globbing'
  grunt.loadNpmTasks 'grunt-string-replace'

  grunt.registerTask 'build', [
    'exec',
    'copy',
    'string-replace',
    'sass_globbing',
    'sass',
    'cssmin',
    'coffee',
    'concat',
    'uglify'
  ]
  grunt.registerTask 'default', ['watch']
