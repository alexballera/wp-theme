var gulp = require('gulp'),
browserSync = require('browser-sync'),
reload = browserSync.reload,
sass = require('gulp-sass'),
sassGlob = require('gulp-sass-glob'),
autoprefixer = require('gulp-autoprefixer'),
cssnano = require('gulp-cssnano'),
rename = require('gulp-rename'),
browserify = require('browserify'),
source = require('vinyl-source-stream'),
buffer = require('vinyl-buffer'),
uglify = require('gulp-uglify'),
babelify = require('babelify'),
imagemin = require('gulp-imagemin'),
pngquant = require('imagemin-pngquant'),
imageminSvgo = require('imagemin-svgo'),
imageminOptipng = require('imagemin-optipng'),
imageminJpegtran = require('imagemin-jpegtran'),
cache = require('gulp-cache'),
del = require('del'),
notify = require('gulp-notify'),
plumber = require('gulp-plumber');
// Instalar babel-preset-latest & gulp-sass-glob
// sudo npm install i -D babel-preset-latest babel-cli gulp-sass-glob

var onError = function(err) {
  notify.onError({
    title:    "Error",
    message:  "<%= error %>",
  })(err);
  this.emit('end');
};

var plumberOptions = {
  errorHandler: onError,
};

// Variables
const globs = {
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
gulp.task('build:styles', ['loginCSS'], () => {
  var autoprefixerOptions = {
    browsers: ['last 2 versions'],
  };

  var reloadOptions = {
    stream: true,
  };

  var sassOptions = {
    includePaths: [
    ],
    outputStyle: 'compressed'
  };
  return gulp.src(globs.styles.main)
    .pipe(sassGlob())
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(plumber(plumberOptions))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(cssnano())
    .pipe(gulp.dest(globs.public))
    .pipe(reload(reloadOptions))
})
gulp.task('loginCSS', () => {
  var autoprefixerOptions = {
    browsers: ['last 2 versions'],
  };

  var reloadOptions = {
    stream: true,
  };

  var sassOptions = {
    includePaths: [
    ],
    outputStyle: 'compressed'
  };
  return gulp.src(globs.src + '/login/custom-login.scss')
    .pipe(sassGlob())
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(plumber(plumberOptions))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(cssnano())
    .pipe(gulp.dest(globs.public + '/login'))
    .pipe(reload(reloadOptions))
})

// Scripts: todos los archivos JS concatenados en uno solo minificado
gulp.task('build:scripts', () => {
  var presets = {
    presets: 'latest'
  }
  return browserify(globs.scripts.main)
    .transform(babelify, {presets})
    .bundle()
    .pipe(source('main.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(globs.scripts.public))
})

// Images
gulp.task('build:images', ['screenshot', 'login'], () => {
  gulp.src(globs.images.main)
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
gulp.task('login', () => {
  gulp.src(globs.src + '/login/*.*g')
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
    .pipe(gulp.dest(globs.public + '/login'))
})

// Clean
gulp.task('clean', (cb) => {
  return del(globs.public, cb)
})

// Copy
gulp.task('copy', () => {
  gulp.src(globs.fonts.src + '/fonts-mfizz/**/*.*')
    .pipe(gulp.dest(globs.fonts.public + '/fonts-mfizz'))
  gulp.src(globs.fonts.src + '/fonts-flexslides/**/*.*')
    .pipe(gulp.dest(globs.fonts.public + '/fonts-flexslides'))
  gulp.src(globs.fonts.src + '/fonts/**/*.*') // Comentar si se va a usar el cdnjs
    .pipe(gulp.dest(globs.fonts.public + '/fonts')) // Comentar si se va a usar el cdnjs
  gulp.src(globs.videos.watch)
    .pipe(gulp.dest(globs.videos.public))
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
