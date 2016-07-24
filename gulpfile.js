const gulp = require('gulp')
const browserSync = require('browser-sync')
const reload = browserSync.reload
const sass = require('gulp-sass')
const autoprefixer = require('gulp-autoprefixer')
const rename = require('gulp-rename')
const browserify = require('browserify')
const source = require('vinyl-source-stream')
const buffer = require('vinyl-buffer')
const uglify = require('gulp-uglify')
const babelify = require('babelify')
const imagemin = require('gulp-imagemin')
const pngquant = require('imagemin-pngquant')
const imageminSvgo = require('imagemin-svgo')
const imageminOptipng = require('imagemin-optipng')
const imageminJpegtran = require('imagemin-jpegtran')
const cache = require('gulp-cache')
const del = require('del')
// Para que babelify funcione: instalar babel-preset-es2015
// sudo npm install --save-dev babel-preset-es2015

// Variables
const globs = {
  build: './build',
  src: './src',
  dist: './dist',
  php: {
    main: './src/*.php',
    watch: './src/**/*.php'
  },
  styles: {
    main: './src/styles/scss/style.scss',
    watch: './src/styles/scss/**/*.scss',
    src: './src/styles',
    dist: './dist/css'
  },
  scripts: {
    main: './src/js/main.js',
    watch: './src/js/main.js',
    src: './src/js',
    dist: './dist/js'
  },
  images: {
    main: './src/images/**',
    watch: './src/images/**/*.*',
    src: './src/images',
    dist: './dist/images'
  },
  videos: {
    main: './src/videos/**',
    watch: './src/videos/**/*.*',
    src: './src/videos',
    dist: './dist/videos'
  },
  fonts: {
    main: './src/styles/fonts/**',
    watch: './src/styles/fonts/**/*.*',
    src: './src/styles/fonts',
    dist: './dist/fonts'
  }
}

// Servidor - Browsersync
gulp.task('serve', () => {
  browserSync.init({
    notify: false,
    logPrefix: 'BS',
    server: {
      baseDir: [globs.dist]
    },
    port: 8080,
    ui: {
      port: 8081
    },
    browser: 'google-chrome'
  })
})
// PHP
gulp.task('build:php', () => {
  gulp.src(globs.php.watch)
    .pipe(gulp.dest(globs.dist))
})
// Styles: Compila SASS ~> CSS
gulp.task('build:styles', () => {
  return gulp.src(globs.styles.main)
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 2 version'))
    .pipe(gulp.dest(globs.dist))
})

// Scripts: todos los archivos JS concatenados en uno solo minificado
gulp.task('build:scripts', () => {
  return browserify(globs.scripts.main)
    .transform(babelify, {presets: 'es2015'})
    .bundle()
    .pipe(source('main.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(globs.scripts.dist))
})

// Images
gulp.task('build:images', ['screenshot'], () => {
  gulp.src(globs.images.main)
    .pipe(cache(imagemin({
      optimizationLevel: 7,
      progressive: true,
      interlaced: true,
      multipass: true,
      use: [pngquant(), imageminSvgo()],
      svgoPlugins: [
        { removeViewBox: false }, // don't remove the viewbox atribute from the SVG
        { removeUselessStrokeAndFill: false }, // don't remove Useless Strokes and Fills
        { removeEmptyAttrs: false } // don't remove Empty Attributes from the SVG
      ]
    })))
    .pipe(gulp.dest(globs.images.dist))
})
gulp.task('screenshot', () => {
  gulp.src(globs.src + '/screenshot.png')
    .pipe(cache(imagemin({
      optimizationLevel: 7,
      progressive: true,
      interlaced: true,
      multipass: true,
      use: [
        pngquant(),
        imageminSvgo(),
        imageminOptipng({optimizationLevel: 7}),
        imageminJpegtran({progressive: true})
      ],
      svgoPlugins: [
        { removeViewBox: false }, // don't remove the viewbox atribute from the SVG
        { removeUselessStrokeAndFill: false }, // don't remove Useless Strokes and Fills
        { removeEmptyAttrs: false } // don't remove Empty Attributes from the SVG
      ]
    })))
    .pipe(gulp.dest(globs.dist))
})

// Clean
gulp.task('clean', (cb) => {
  return del(globs.dist, cb)
})

// Copy
gulp.task('copy', () => {
  gulp.src(globs.fonts.src + '/fonts-mfizz/**/*.*')
    .pipe(gulp.dest(globs.fonts.dist + '/fonts-mfizz'))
  gulp.src(globs.fonts.src + '/fontawesome/**/*.*') // Comentar si se va a usar el cdnjs
    .pipe(gulp.dest(globs.fonts.dist + '/fontawesome')) // Comentar si se va a usar el cdnjs
  gulp.src(globs.videos.watch)
    .pipe(gulp.dest(globs.videos.dist))
  gulp.src(globs.scripts.src + '/vendors/**/*.*')
    .pipe(gulp.dest(globs.scripts.dist + '/vendors'))
  gulp.src(globs.styles.src + '/flexslider.css')
    .pipe(gulp.dest(globs.styles.dist))
  gulp.src(globs.fonts.src + '/fonts-flexslides/**/*.*')
    .pipe(gulp.dest(globs.styles.dist + '/fonts'))
  gulp.src(globs.src + '/login/**/*.*')
    .pipe(gulp.dest(globs.dist + '/login'))
})

// Reload
gulp.watch([
  globs.php.watch,
  globs.styles.watch,
  globs.scripts.watch,
  './bower.json'
]).on('change', reload)

// Watch
gulp.task('watch', () => {
  gulp.watch(globs.styles.watch, ['build:styles'])
  gulp.watch(globs.scripts.watch, ['build:scripts'])
  gulp.watch(globs.images.watch, ['build:images'])
  gulp.watch(globs.php.watch, ['build:php'])
})

// Build
gulp.task('build', ['clean'], () => {
  gulp.start('build:styles', 'build:scripts', 'build:images', 'build:php')
})

// Default
gulp.task('default', ['build'], () => {
  gulp.start('copy', 'watch')
})
