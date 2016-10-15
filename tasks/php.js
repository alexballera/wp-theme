var gulp = require('gulp');

gulp.task('build:php', () => {
  gulp.src('./src/**/*.php')
    .pipe(gulp.dest('./public'))
})
