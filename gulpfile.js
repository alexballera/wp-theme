var gulp = require('gulp'),
requireDir = require('require-dir')('./tasks');

// Instalar babel-preset-latest & gulp-sass-glob
// sudo npm install i -D babel-preset-latest babel-cli gulp-sass-glob

// Watch
gulp.task('watch', () => {
  gulp.watch('./src/styles/scss/**/*.scss', ['build:styles'])
  gulp.watch('./src/js/main.js', ['build:scripts'])
  gulp.watch('./src/images/**/*.*', ['build:images'])
  gulp.watch('./src/**/*.php', ['build:php'])
})

// Build
gulp.task('build', ['clean'], () => {
  gulp.start('build:styles', 'build:scripts', 'build:images', 'build:php')
})

// Default
gulp.task('default', ['build'], () => {
  gulp.start('copy', 'watch')
})
