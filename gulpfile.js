'use strict';
var gulp = require('gulp');
var sass = require('gulp-sass');
sass.compiler = require('node-sass');

gulp.task('hello', function() {
  console.log('Hello ');
});

gulp.task('sass', function () {
  return gulp.src('sass/style.scss')
    .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('css/'));
});
 
gulp.task('watch', function() {
    gulp.watch('sass/*.scss', gulp.series('sass'));
});
