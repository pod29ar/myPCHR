// declare
var browserify = require('browserify');
var gulp       = require('gulp');
var source     = require('vinyl-source-stream');
var watch      = require('gulp-watch');
var uglify     = require('gulp-uglify');
var rename     = require('gulp-rename');
var livereload = require('gulp-livereload');
var streamify  = require('gulp-streamify');
var compass    = require('gulp-compass');
var minifyCSS  = require('gulp-minify-css');
var minifyHTML = require('gulp-minify-html');

// dirs
var dirDev    = './assets/js/new-dev/';
var dirSass   = './assets/sass';
var dirView   = './application/views/';
var dirProd   = './assets/js/new-prod/';
var dirLanding = dirDev + 'landing/';


gulp.task('build-plugin', function () {
  // in dev.
  console.log("Compiling plugin..");

  return browserify('./assets/js/gulp-plugin.js').bundle()
    .pipe(source('plugin.js'))
    .pipe(gulp.dest(dirProd))
    .pipe(rename('plugin.min.js'))
    .pipe(streamify(uglify()))
    .pipe(gulp.dest(dirProd));
});

// Streamlined the build process to avoid race condition.
gulp.task('build', function () {
  console.log("Compiling browserify..");

	return browserify(dirLanding + 'main.js').bundle()
		.pipe(source('landing.js'))
		.pipe(gulp.dest(dirProd))
        .pipe(rename('landing.min.js'))
        .pipe(streamify(uglify()))
        .pipe(gulp.dest(dirProd))
        .pipe(livereload());
});

gulp.task('compass', function() {
  console.log("Compiling SASS..");

  gulp.src('./assets/sass/*.sass')
    .pipe(compass({
      css: './assets/css',
      sass: './assets/sass'
    }))
    .on('error', function(error) {
      console.log(error);
      this.emit('end');
    })
    .pipe(rename('dominos.css'))
    .pipe(minifyCSS())
    .pipe(rename('dominos.min.css'))
    .pipe(gulp.dest('./assets/css/'))
    .pipe(livereload());
});

gulp.task('minify-html', function() {
  var opts = {
    conditionals: true,
    spare:true,
    loose : true
  };
 
  return gulp.src('./dist/*/*.cshtml')
    .pipe(minifyHTML(opts))
    .pipe(gulp.dest('./Views/'));
});

// watch for changes
gulp.task('watch', function () {
    gulp.watch(dirDev + '*/*', ['build']);
    gulp.watch(dirSass + '*/*', ['compass']);
    gulp.watch(dirView + '*/*', ['build']);
});

// default task
gulp.task('default', ['build', 'minify', 'watch']);