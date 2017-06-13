var
gulp = require('gulp'),
uglify = require('gulp-uglify'),
minifycss = require('gulp-minify-css'),
autoprefixer = require('gulp-autoprefixer'),
rename = require('gulp-rename');

gulp.task('css', function() {
	return gulp.src(['asset/css/main.css'])
		.pipe(autoprefixer({browsers:'last 10 versions'}))
		.pipe(minifycss())
		.pipe(rename('main.min.css'))
		.pipe(gulp.dest('asset/css'));
});

gulp.task('js', function() {
	return gulp.src(['asset/js/main.js'])
		.pipe(uglify({mangle:false,compress:false}))
		.pipe(rename('main.min.js'))
		.pipe(gulp.dest('asset/js'));
});

gulp.task('default', function () {  
    gulp.run(['js', 'css']); 
});  