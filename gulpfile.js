var gulp = require('gulp'),
	util = require("gulp-util"),
	sass = require('gulp-sass'),
	livereload = require('gulp-livereload'),
	// cssnano = require('gulp-cssnano'),
	log = util.log;

var sassFiles = "site/assets/css/*.scss";

gulp.task('default', function(){
});

gulp.task('sass', function(){
	log("Generate CSS files " + (new Date()).toString());
	gulp.src("site/assets/css/styles.scss")
		.pipe(sass({ style: 'expanded' }))
		.pipe(gulp.dest("site/assets/css"))
		;
	log("Generated");
});

gulp.task('reload', function(){
	// setTimeout(
		// function(){
			gulp.src("*")
		.pipe(livereload());
	// }, 1000);
});

gulp.task("watch", function(){
	livereload.listen();
	gulp.watch(["**/*.html", "**/*.twig", "php/*.php", "**/*.css", "**/*.scss", "**/*.md", "**/*.js"], ["reload"]);
	console.log("Watching...");
});


gulp.task("watchsass", function(){
	gulp.watch(sassFiles, ["sass"]);
	console.log("Watching CSS...");
});
