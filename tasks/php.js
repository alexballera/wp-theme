var gulp = require('gulp');
// PHP
gulp.task('build:php', () => {
  gulp.src('./src/**/*.php')
    .pipe(gulp.dest('./public'))
})
