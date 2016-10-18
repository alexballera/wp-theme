import gulp from 'gulp'

gulp.task('copy', () => {
  gulp.src('./src/styles/fonts/fonts-mfizz/**/*.*')
    .pipe(gulp.dest('./public/fonts/fonts-mfizz'))
  gulp.src('./src/styles/fonts/fonts-flexslides/**/*.*')
    .pipe(gulp.dest('./public/fonts/fonts-flexslides'))
  gulp.src('./src/styles/fonts/fonts/**/*.*') // Comentar si se va a usar el cdnjs
    .pipe(gulp.dest('./public/fonts/fonts')) // Comentar si se va a usar el cdnjs
  gulp.src('./src/videos/**/*.*')
    .pipe(gulp.dest('./public/videos'))
})
