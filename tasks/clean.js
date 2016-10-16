var gulp = require('gulp')
var del = require('del')

gulp.task('clean', (cb) => {
  return del('./public', cb)
})
