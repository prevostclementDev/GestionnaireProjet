/* ######################## */
/* ###### IMPORTATION ##### */
/* ######################## */

/* GENERAL */
const rename = require('gulp-rename');
const gulp = require('gulp');

/* CSS */
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');

/* JS */
const uglify = require('gulp-uglify');

/* IMG */
const imagemin = require('gulp-imagemin');

/* ################## */
/* ###### FILES ##### */
/* ################## */

/* CHEMIN FICHIER */
const chemin = {
    styles : {
        Inspectdev : 'app/assets/developpement/**/*.scss',
        dev : 'app/style.scss',
        prod : 'app/assets/production/style/'
    },
    script: {
        dev : 'app/assets/developpement/**/*.js',
        prod : 'app/assets/production/'
    },
    images : {
        dev : 'app/assets/developpement/img/*',
        prod : 'app/assets/production/img/'
    }
}

/* ################# */
/* ###### TASK ##### */
/* ################# */

/* TRANSFORM SCSS EN CSS */
gulp.task('style', function(){
    return gulp.src(chemin.styles.dev)
    .pipe(sass())
    .pipe(cleanCSS())
    .pipe(rename({suffix : '-min'}))
    .pipe(gulp.dest(chemin.styles.prod));
});

/* TRANSFORM JS EN JS MINIFIER */
gulp.task('script', function(){
    return gulp.src(chemin.script.dev)
    .pipe(uglify())
    .pipe(rename({suffix : "-min"}))
    .pipe(gulp.dest(chemin.script.prod));
});

/* COMPRESSER LES IMAGES */
gulp.task('images', function(){
    return gulp.src(chemin.images.dev)
    .pipe(imagemin())
    .pipe(gulp.dest(chemin.images.prod));
});


/* TACHE AUTO */
gulp.task('default', function(){
    gulp.watch(chemin.styles.Inspectdev,gulp.series('style')); // CSS
    gulp.watch(chemin.script.dev,gulp.series('script')); // JS
    gulp.watch(chemin.images.dev,gulp.series('images')); // IMG
});