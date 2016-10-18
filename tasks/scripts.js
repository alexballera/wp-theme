import gulp from 'gulp'
import rename from 'gulp-rename'
import browserify from 'browserify'
import source from 'vinyl-source-stream'
import buffer from 'vinyl-buffer'
import uglify from 'gulp-uglify'
import babelify from 'babelify'

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
