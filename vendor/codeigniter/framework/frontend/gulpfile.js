var gulp = require('gulp'),
    livereload = require('gulp-livereload');

const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
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
  gulp.src('../application/controllers/*.php')
    .pipe(livereload());
});
gulp.task('models', function() {
  console.log("models watch load");
  gulp.src('../application/models/*.php')
    .pipe(livereload());
});
gulp.task('views', function() {
  console.log("views watch load");
  gulp.src('../application/views/*.php')
    .pipe(livereload());
});



gulp.task('controllers_watch', function() {
    console.log('input controllers!');
    livereload.listen();
    gulp.watch('../application/controllers/*.php', ['controllers']);
});
gulp.task('models_watch', function() {
  console.log('input models!');
  livereload.listen();
  gulp.watch('../application/models/*.php', ['models']);
});
gulp.task('views_watch', function() {
  console.log('input views!');
  livereload.listen();
  gulp.watch('../application/views/*.php', ['views']);
});
