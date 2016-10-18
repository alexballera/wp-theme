import gulp from 'gulp'
import sass from 'gulp-sass'
import sassGlob from 'gulp-sass-glob'
import autoprefixer from 'gulp-autoprefixer'
import cssnano from 'gulp-cssnano'
import plumber from 'gulp-plumber'

var onError = function(err) {
  notify.onError({
    title:    "Error",
    message:  "<%= error %>",
  })(err);
  this.emit('end');
};

var plumberOptions = {
  errorHandler: onError,
};

// Styles: Compila SASS ~> CSS
gulp.task('build:styles', ['loginCSS'], () => {
  var autoprefixerOptions = {
    browsers: ['last 2 versions'],
  };

  var sassOptions = {
    includePaths: [
    ],
    outputStyle: 'compressed'
  };
  return gulp.src('./src/styles/scss/style.scss')
    .pipe(sassGlob())
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(plumber(plumberOptions))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(cssnano())
    .pipe(gulp.dest('./public'))
})
gulp.task('loginCSS', () => {
  var autoprefixerOptions = {
    browsers: ['last 2 versions'],
  };

  var reloadOptions = {
    stream: true,
  };

  var sassOptions = {
    includePaths: [
    ],
    outputStyle: 'compressed'
  };
  return gulp.src('./src/login/custom-login.scss')
    .pipe(sassGlob())
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(plumber(plumberOptions))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(cssnano())
    .pipe(gulp.dest('./public/login'))
})
