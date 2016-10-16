var gulp = require('gulp')
var rename = require('gulp-rename')
var browserify = require('browserify')
var source = require('vinyl-source-stream')
var buffer = require('vinyl-buffer')
var uglify = require('gulp-uglify')
var babelify = require('babelify')

// Scripts: todos los archivos JS concatenados en uno solo minificado
gulp.task('build:scripts', () => {
  var presets = {
    presets: 'latest'
  }
  return browserify('./src/js/main.js')
    .transform(babelify, {presets})
    .bundle().on('error', function (err) { console.error(err); })
    .pipe(source('main.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./public/js'))
})
