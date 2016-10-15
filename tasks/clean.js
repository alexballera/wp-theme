var gulp = require('gulp'),
del = require('del');

gulp.task('clean', (cb) => {
  return del('./public', cb)
})
