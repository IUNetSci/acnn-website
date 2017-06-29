var gulp = require('gulp'),
    util = require("gulp-util"),
    sass = require('gulp-sass'),
    browserSync = require('browser-sync').create(),
    // livereload = require('gulp-livereload'),
    // cssnano = require('gulp-cssnano'),
    log = util.log;

var sassFiles = "docs/assets-main/css/*.scss";



gulp.task('sass', function () {
    log("Generate CSS files " + (new Date()).toString());
    gulp.src("docs/assets-main/css/styles.scss")
        .pipe(sass({style: 'expanded'}))
        .pipe(gulp.dest("docs/assets-main/css"))
    ;
    log("Generated");
});

gulp.task('reload', function () {
    // setTimeout(
    // function(){
    gulp.src("*")
        .pipe(livereload());
    // }, 1000);
});

gulp.task("watch", function () {
    livereload.listen();
    gulp.watch(["**/*.html", "**/*.twig", "php/*.php", "**/*.css", "**/*.scss", "**/*.md", "**/*.js"], ["reload"]);
    console.log("Watching...");
});


gulp.task("watchsass", function () {
    gulp.watch(sassFiles, ["sass"]);
    console.log("Watching CSS...");
});


gulp.task('serve', function () {


    browserSync.init({
        server: "./docs"
    });
    //Uncomment if using SASS
    // gulp.watch("scss/*.scss", ['sass']);
    gulp.watch("./docs/*.html").on('change', browserSync.reload);
    gulp.watch("./docs/css/*.css").on('change', browserSync.reload);
});

gulp.task('default', ['serve']);
