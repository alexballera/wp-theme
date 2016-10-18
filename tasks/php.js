import gulp from 'gulp'

gulp.task('build:php', () => {
  gulp.src('./src/**/*.php')
    .pipe(gulp.dest('./public'))
})
