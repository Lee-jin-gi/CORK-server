var gulp = require('gulp'),
    sass = require('gulp-sass');  //https://github.com/dlmanning/gulp-sass
    concat = require('gulp-concat');
    minifycss = require('gulp-minify-css'); // deprecated
    cleanCSS  = require('gulp-clean-css');
    livereload = require('gulp-livereload');

const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});




//js files
// gulp.task('scripts', function() {
//   var js_src = 'assets/js/**/*.js';
//   var js_dest = 'assets/build/js';
//   // pipe the js through concat, console log stripping, uglification and then store
//   return gulp.src(js_src)
//       .pipe(concat('app.min.js')) // concat all files in the src
//       .pipe(striplog())
//       .pipe(uglify())   // uglify them all
//       .pipe(gulp.dest(js_dest)) // save the file
//       .on('error', gutil.log);
// });

// gulp.task('css', function() {
// //return gulp.src(['node_modules/materialize-css/*.scss', 'assets/css/**/*.css'])
// gulp.src(['./node_modules/materialize-css/sass/*.scss'])
//   .pipe(sass({style: 'compressed', errLogToConsole: true}))  // Compile sass
//   .pipe(concat('app.min.css'))                               // Concat all css
//   .pipe(minifycss())                                         // Minify the CSS
//   .pipe(gulp.dest('../assets/build/css/'));                      // Set the destination to assets/css
// });

//
// gulp.task('css', function () {
//
//   gulp.src(['./node_modules/materialize-css/sass/*.scss'])
//   //.pipe(sass({style: 'compressed', errLogToConsole: true}))
//   .pipe(sass().on('error', sass.logError))
//
//   .pipe(concat('style.css'))
//   .pipe(gulp.dest('../assets/build/css'));
//
//   // gulp.src(['../assets/classprep/base/css/bootstrap.css',
//   //           '../assets/classprep/base/css/classprep.common.css',
//   //           '../assets/classprep/base/css/classprep.style.css',])
//     // .pipe(replace('../../images', '../images'))
//     //.pipe(replace('../fonts', 'fonts'))
//
//
//   // build directory file move
//   // gulp.src('../assets/classprep/base/style.css').pipe(gulp.dest('../app_build/assets/classprep/base/'));
//   console.log("success");
//   console.log("** css concat end");
// });

gulp.task('sass', function () {
 return gulp.src('./node_modules/materialize-css/sass/*.scss')
   .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
   .pipe(gulp.dest('../assets/build/css'));
});


gulp.task('watch', function() {




  console.log("1 : codeigniter controllers watching");
  console.log("2 : codeigniter models watching");
  console.log("3 : codeigniter views watching");
  console.log("0 : bye");


  rl.prompt();
  rl.on('line', (line) => {
    switch(line.trim()) {
      case '1':
        gulp.start("controllers_watch");
        break;
      case '2':
        gulp.start("models_watch");
        break;
      case '3':
        gulp.start("views_watch");
        break;
      default:
        console.log(`Say what? I might have heard '${line.trim()}'`);
        break;
    }

  }).on('close', () => {
    console.log('Have a great day!');
    process.exit(0);
  });
});





gulp.task('controllers', function() {
  console.log("controllers watch load");
  gulp.src('../application/controllers/**/*.php')
    .pipe(livereload());
});
gulp.task('models', function() {
  console.log("models watch load");
  gulp.src('../application/models/**/*.php')
    .pipe(livereload());
});
gulp.task('views', function() {
  console.log("views watch load");
  gulp.src('../application/views/**/*.php')
    .pipe(livereload());
});



gulp.task('controllers_watch', function() {
    console.log('input controllers!');
    livereload.listen();
    gulp.watch('../application/controllers/**/*.php', ['controllers']);
});
gulp.task('models_watch', function() {
  console.log('input models!');
  livereload.listen();
  gulp.watch('../application/models/**/*.php', ['models']);
});
gulp.task('views_watch', function() {
  console.log('input views!');
  livereload.listen();
  gulp.watch('../application/views/**/*.php', ['views']);
});
