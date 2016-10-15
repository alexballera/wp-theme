var gulp = require('gulp'),
del = require('del');
// Clean
gulp.task('clean', (cb) => {
  return del('./public', cb)
})
