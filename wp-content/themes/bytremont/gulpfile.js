// Sass configuration
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    util = require('gulp-util'),
    minify = require('gulp-minify'),
    base64 = require('gulp-base64'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    cssnano = require('gulp-cssnano');
var config = {
  production: !!util.env.production
};


gulp.task('sass', function() {
  gulp.src(['./@custom/sass/custom.scss'])
    .pipe(sass({
      sourceComments: true,
      outputStyle: 'expanded'
    }))
    .pipe(base64({
      maxImageSize: 8*1024, // bytes 
    }))
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(gulp.dest('@custom'))
    .pipe(rename({ extname: '.min.css' }))
    // .pipe(sass({outputStyle: 'compressed'}))
    // .pipe(cssnano())
    .pipe(gulp.dest('./@custom'));
});

gulp.task('js', function () {
  gulp.src(['js/base.min.js', 'js/bootstrap.min.js', './@custom/custom.js'])
    .pipe(concat('custom.min.js'))
    .pipe(uglify())
    // .pipe(rename('custom.min.js'))
    .pipe(gulp.dest('@custom'));
});

gulp.task('clean', function(cb) {
    del(['something/**'], cb);
});

// gulp.task('default', ['sass'], function() {
//     gulp.watch('**/*.scss', ['sass']);
// })

gulp.task('default', ['watcher']);

gulp.task('watcher',function(){
  gulp.watch(['@custom/sass/**/*.scss'], ['sass']);
  gulp.watch('@custom/custom.js', ['js']);
});