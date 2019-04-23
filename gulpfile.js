var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var gcmq = require('gulp-group-css-media-queries');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var jade = require('gulp-jade');
var sass = require('gulp-sass');
var cache = require('gulp-cache');


gulp.task('clearCache', function() {
    // Or, just call this for everything
    cache.clearAll();
});

// Static Server + Watching scss files
gulp.task('serve', ['sass', 'jade'], function(){

    browserSync.init({
        proxy: "positivoasaservice.local"
    });

    gulp.watch("sass/**/*.scss", ['sass']);
    // Reloads the browser whenever HTML or JS files change
    // gulp.watch("jade/**/*.jade", ['jade']);
    // gulp.watch('**/*.html').on('change', browserSync.reload);
    gulp.watch('**/*.php').on('change', browserSync.reload);
    gulp.watch('assets/js/**/*.js').on('change', browserSync.reload);

});

// gulp.task('jade', function() {
//   return gulp.src('jade/**/*.jade')
//     .pipe(jade({ pretty: true }))
//     .pipe(gulp.dest('./'))
//     .pipe(browserSync.reload({
//         stream: true
//     }))
// })

gulp.task('watch', function() {
  gulp.watch("sass/**/*.scss", ['sass']);
//   gulp.watch("jade/**/*.jade", ['jade']);
});

//Compile sass into CSS
gulp.task('sass', function() {
  return gulp.src("sass/**/*.scss") // Gets all files ending with .scss in app/scss
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
    }))
    .pipe(gcmq())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/css/'))
    .pipe(browserSync.reload({
        stream: true
    }))
});

gulp.task('default', ['serve']);
