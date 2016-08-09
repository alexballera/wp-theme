var gulp = require('gulp')
var browserSync = require('browser-sync')
var reload = browserSync.reload
var sass = require('gulp-sass')
var sassGlob = require('gulp-sass-glob')
var autoprefixer = require('gulp-autoprefixer')
var rename = require('gulp-rename')
var browserify = require('browserify')
var source = require('vinyl-source-stream')
var buffer = require('vinyl-buffer')
var uglify = require('gulp-uglify')
var babelify = require('babelify')
var imagemin = require('gulp-imagemin')
var pngquant = require('imagemin-pngquant')
var imageminSvgo = require('imagemin-svgo')
var imageminOptipng = require('imagemin-optipng')
var imageminJpegtran = require('imagemin-jpegtran')
var cache = require('gulp-cache')
var del = require('del')
// Para que babelify funcione: instalar babel-preset-es2015
// sudo npm install --save-dev babel-preset-es2015
// sudo npm install --save jquery
// sudo npm install --save-dev gulp-sass-glob

// Variables
var globs = {
  build: './build',
  src: './src',
  public: './public',
  php: {
    main: './src/*.php',
    watch: './src/**/*.php'
  },
  styles: {
    main: './src/styles/scss/style.scss',
    watch: './src/styles/scss/**/*.scss',
    src: './src/styles',
    public: './public/css'
  },
  scripts: {
    main: './src/js/main.js',
    watch: './src/js/main.js',
    src: './src/js',
    public: './public/js'
  },
  images: {
    main: './src/images/**',
    watch: './src/images/**/*.*',
    src: './src/images',
    public: './public/images'
  },
  videos: {
    main: './src/videos/**',
    watch: './src/videos/**/*.*',
    src: './src/videos',
    public: './public/videos'
  },
  fonts: {
    main: './src/styles/fonts/**',
    watch: './src/styles/fonts/**/*.*',
    src: './src/styles/fonts',
    public: './public/fonts'
  }
}

// Servidor - Browsersync
gulp.task('serve', () => {
  browserSync.init({
    notify: false,
    logPrefix: 'BS',
    server: {
      baseDir: [globs.public]
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
    .pipe(gulp.dest(globs.public))
})
// Styles: Compila SASS ~> CSS
gulp.task('build:styles', () => {
  return gulp.src(globs.styles.main)
    .pipe(sassGlob())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 2 version'))
    .pipe(gulp.dest(globs.public))
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
    .pipe(gulp.dest(globs.scripts.public))
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
    .pipe(gulp.dest(globs.images.public))
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
    .pipe(gulp.dest(globs.public))
})

// Clean
gulp.task('clean', (cb) => {
  return del(globs.public, cb)
})

// Copy
gulp.task('copy', () => {
  gulp.src(globs.fonts.src + '/fonts-mfizz/**/*.*')
    .pipe(gulp.dest(globs.fonts.public + '/fonts-mfizz'))
  gulp.src(globs.fonts.src + '/fonts/**/*.*') // Comentar si se va a usar el cdnjs
    .pipe(gulp.dest(globs.fonts.public + '/fonts')) // Comentar si se va a usar el cdnjs
  gulp.src(globs.videos.watch)
    .pipe(gulp.dest(globs.videos.public))
  gulp.src(globs.scripts.src + '/vendors/**/*.*')
    .pipe(gulp.dest(globs.scripts.public + '/vendors'))
  gulp.src(globs.styles.src + '/flexslider.css')
    .pipe(gulp.dest(globs.styles.public))
  gulp.src(globs.fonts.src + '/fonts-flexslides/**/*.*')
    .pipe(gulp.dest(globs.styles.public + '/fonts'))
  gulp.src(globs.src + '/login/**/*.*')
    .pipe(gulp.dest(globs.public + '/login'))
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
