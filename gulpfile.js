// gulpfile.js - versión corregida y probada (usa gulp-dart-sass y gulp-cached)
const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-dart-sass');             // gulp-dart-sass (usamos nombre 'sass' para compatibilidad)
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin');
const notify = require('gulp-notify');
const cached = require('gulp-cached');
const webp = require('gulp-webp');

const paths = {
  scss: 'src/scss/**/*.scss',
  js: 'src/js/**/*.js',
  imagenes: 'src/img/**/*'
};

// ------------------ CSS ------------------
function css() {
  return src(paths.scss, { sourcemaps: true })
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError)) // compilador Dart Sass
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('public/build/css'));
}

// ------------------ JS ------------------
function javascript() {
  return src(paths.js, { sourcemaps: true })
    .pipe(sourcemaps.init())
    .pipe(terser({ ecma: 2020 }).on('error', (e) => { console.error(e.toString()); this.emit && this.emit('end'); }))
    .pipe(concat('app.js'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('public/build/js'));
}

// ------------------ Imágenes ------------------
function imagenes() {
  return src(paths.imagenes)
    .pipe(cached('imagenes'))   // sólo procesa archivos cambiados (memoria)
    .pipe(imagemin())           // usa plugins por defecto; evita pasar objetos obsoletos
    .pipe(dest('public/build/img'))
    .pipe(notify({ message: 'Imagen Completada', onLast: true }));
}

// ------------------ WebP ------------------
function versionWebp() {
  return src(paths.imagenes)
    .pipe(cached('webp'))
    .pipe(webp())
    .pipe(dest('public/build/img'))
    .pipe(notify({ message: 'Imagen WebP generada', onLast: true }));
}

// ------------------ Watch ------------------
function watchArchivos() {
  watch(paths.scss, css);
  watch(paths.js, javascript);
  watch(paths.imagenes, imagenes);
  watch(paths.imagenes, versionWebp);
}

// ------------------ Exports ------------------
exports.css = css;
exports.javascript = javascript;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.watchArchivos = watchArchivos;

// default: arranca tareas en paralelo y el watch
exports.default = parallel(css, javascript, imagenes, versionWebp, watchArchivos);
