var gulp = require('gulp'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify'),
  sass = require('gulp-sass');

gulp.task('watch', function () {
  var watcherSass = gulp.watch([
      'webroot/scss/core/*.scss',
      'webroot/scss/*.scss'
    ]),
    watcherJs = gulp.watch('webroot/js/modules/*.js');

  watcherSass.on('change', function () {
    gulp.start('sass');
  });

  watcherJs.on('change', function () {
    gulp.start('js');
  });
});

gulp.task('sass', function () {
  gulp.src([
    'webroot/scss/style.scss'
  ])
    .pipe(sass({outputStyle: 'compressed', sourceComments: false}))
    .pipe(gulp.dest('webroot/css'))
});

gulp.task('js', function () {
  gulp.src([
    'webroot/node_modules/jquery/dist/jquery.js',
    'webroot/node_modules/bootstrap/dist/js/bootstrap.js',
    'webroot/node_modules/jquery-validation/dist/jquery.validate.js',
    'webroot/node_modules/slick-carousel/slick/slick.js',
    'webroot/js/modules/script.js'
  ])
    .pipe(concat('app.js'))
    .pipe(gulp.dest('webroot/js'))
    .pipe(uglify())
    .pipe(concat('app.min.js'))
    .pipe(gulp.dest('webroot/js'))
});

gulp.task('default', function () {
  console.log('Gulp is running correctly !!!!!!');

  gulp.start('sass');
  gulp.start('js');
  gulp.start('watch');
});