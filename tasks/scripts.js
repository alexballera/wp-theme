var gulp = require('gulp'),
rename = require('gulp-rename'),
browserify = require('browserify'),
source = require('vinyl-source-stream'),
buffer = require('vinyl-buffer'),
uglify = require('gulp-uglify'),
babelify = require('babelify');

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
