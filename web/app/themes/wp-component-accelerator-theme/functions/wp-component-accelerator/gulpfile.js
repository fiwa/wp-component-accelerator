var gulp = require('gulp'),
concat = require('gulp-concat'),
sass = require('gulp-sass'),
rename = require('gulp-rename'),
header = require('gulp-header'),
plumber = require('gulp-plumber'),
notify = require('gulp-notify'),
uglify = require('gulp-uglify'),
noop = require('gulp-noop'),
del = require('del'),
fs = require('fs'),
watch = require('gulp-watch'),
dev = true;

settings = {
    srcDirectory: "src/",
    css: {
        srcFile: "src/master.scss",
        outputFile: "style.css",
        outputDirectory: "./",
        mapsDirectory: "./maps"
    },
    js: {
        srcDirectory: "src/js/",
        outputDirectory: "./js/",
        syntaxCheck: ['src/js/plugins-bento/*.js', 'src/js/scripts.js'],
        bundleFiles: ['src/js/vendors/**/*.js', 'src/js/pluginsvendor/*.js', 'src/js/plugins-bento/*.js', 'src/js/scripts.js'],
        bundleOutput: 'bundled.js',
        bundleOutputMin: 'bundled.js'
    }
}

gulp.task('css', function () {
    return gulp.src(settings.css.srcFile).pipe(plumber()).pipe(sass({
        sourceComments: false,
        imagePath: '../img',
        outputStyle: 'compressed'
    })).pipe(rename(settings.css.outputFile)).pipe(gulp.dest(settings.css.outputDirectory)).pipe(notify({
        title: "SASS done",
        message: "Sass is done",
        onLast: true
    }))
});

gulp.task('clean:js', function () {
    return del([settings.js.outputDirectory])
});

gulp.task('clean:css', function () {
    return del([settings.css.outputDirectory + settings.css.outputFile, settings.css.mapsDirectory])
});

gulp.task('minify', function () {
    var files = settings.js.bundleFiles.slice(0);
    for (var i = 0; i < files.length; i++) {
        files[i] = '!' + files[i]
    }
    ;
    files.push(settings.js.srcDirectory + '**/*.js');
    return gulp.src(files).pipe(plumber()).pipe(dev ? noop() : uglify()).pipe(gulp.dest(settings.js.outputDirectory)).pipe(notify({
        title: "Minification",
        message: "Minification is done",
        onLast: true
    }));
});

gulp.task('jsbundle', function () {
    return gulp.src(settings.js.bundleFiles).pipe(plumber()).pipe(concat(settings.js.bundleOutput)).pipe(gulp.dest(settings.js.outputDirectory)).pipe(notify({
        title: "Bundle done",
        message: "Bundle of files done",
        onLast: true
    }));
});

gulp.task('jsbundlemin', function () {
    dev = false;
    return gulp.src(settings.js.bundleFiles).pipe(plumber()).pipe(concat(settings.js.bundleOutputMin)).pipe(uglify()).pipe(gulp.dest(settings.js.outputDirectory))
})

gulp.task('watch', gulp.series('css', 'jsbundle', 'minify', function () {
    var files = settings.js.bundleFiles.slice(0);
    for (var i = 0; i < files.length; i++) {
        files[i] = '!' + files[i]
    }

    files.unshift(settings.js.srcDirectory + '**/*.js');
    gulp.watch(settings.srcDirectory + '**/*.scss', gulp.series('css'));
    gulp.watch(settings.js.bundleFiles, gulp.series('jsbundle'));
    gulp.watch(files, gulp.series('minify'));
}));

gulp.task('clean', gulp.series('clean:css', 'clean:js'));

gulp.task('build', gulp.series('clean:css', 'css', 'jsbundlemin', 'minify'));

gulp.task('default', function () {
    console.log("Use 'gulp watch' to start a sass compiler session or 'gulp build' to build the project");
    console.log("Use 'gulp clean' to clean compiled results");
    console.log("Use 'gulp build' to get production code");
});