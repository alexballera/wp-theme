import gulp from 'gulp'

gulp.task('watch', () => {
  gulp.watch('./src/styles/scss/**/*.scss', ['build:styles'])
  gulp.watch('./src/js/main.js', ['build:scripts'])
  gulp.watch('./src/images/**/*.*', ['build:images'])
  gulp.watch('./src/**/*.php', ['build:php'])
})
