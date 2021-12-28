// Gulp
const gulp = require('gulp');

// Utilities
const sass = require('gulp-sass')(require('sass'));
const cssnano = require('cssnano');
const autoprefixer = require("autoprefixer");
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const fs = require('fs');
const newer = require('gulp-newer');
const imagemin = require('gulp-imagemin');
const imageminWebp = require('imagemin-webp');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const wpPot = require('gulp-wp-pot');

// Gulp plugins
const header = require('gulp-header');
const gulpif = require('gulp-if');
const del = require("del");
const rename = require('gulp-rename');
const notify = require("gulp-notify");
const zip = require('gulp-zip');

// Misc/global vars
const pkg = JSON.parse(fs.readFileSync('./package.json'));

// Task options
const opts = {
  rootPath: './',
  devPath: './assets/src/',
  distPath: './assets/dist/',

  autoprefixer: {
    dev: {
      cascade: false
    },
    build: {
      cascade: false
    }
  },

  cssnano: {
    dev: {
      preset: ['default', {
        reduceIdents: {
          keyframes: false
        }
      }]
    },
    build: {
      preset: ['default', {
        reduceIdents: {
          keyframes: false
        },
        normalizeWhitespace: false
      }]
    }
  },

  sass: {
    dev: {outputStyle: 'expanded'},
    build: {outputStyle: 'compressed'}
  },

  imagemin: {
    settings : ([
      imagemin.gifsicle({interlaced: true}),
      imagemin.mozjpeg({progressive: true}),
      imagemin.optipng({optimizationLevel: 5}),
      imagemin.svgo({
        plugins: [
          {removeViewBox: true},
          {cleanupIDs: false}
        ]
      })
    ], {
      verbose: true
    })
  },

  // https://github.com/imagemin/imagemin-webp
  imageminWebp: {
    quality: 85,
    alphaQuality: 75,
    metadata: 'none'
  },


  banner: [
    '@charset "UTF-8";',
    '/*!' ,
    'Theme Name: <%= wp.themeName %> ' ,
    'Description: <%= wp.description %> ' ,
    'Theme URI: <%= homepage %> ' ,
    'Author: <%= author.name %> ' ,
    'Author URI: <%= author.website %> ' ,
    'Requires at least: 4.9.6 ' ,
    'Tested up to: <%= author.wp_tested %> ' ,
    'Requires PHP: 5.6 ' ,
    'Version: <%= version %> ' ,
    'License: GPLv2 or later ' ,
    'License: © <%= new Date().getFullYear() %> <%= author.name %> ' ,
    'License URI: <%= wp.licenseURI %> ' ,
    'Text Domain: <%= wp.textDomain %> ' ,
    'Tags: <%= wp.tags %> ' ,
    '*/',
    ''
  ].join('\n')
};

// ----------------------------
// Gulp task definitions
// ----------------------------

// Clean assets
function clean() {
  return del([
    '**/Thumbs.db',
    '**/.DS_Store',
    opts.rootPath + '*.css.map',
    opts.rootPath + 'assets/**/*.map'
  ]).then( paths => {
    console.log('Successfully deleted files and folders:\n', paths.join('\n'));
  });
}

function cleanAssets() {
  return del([
    opts.distPath + '**'
  ]).then( paths => {
    console.log('Successfully deleted files and folders:\n', paths.join('\n'));
  });
}

function imageMinify(imgFolder, destFolder) {
  return gulp
    .src(imgFolder + '**/*.{jpeg,jpg,png,gif,svg,JPEG,JPG,PNG,GIF,SVG}')
    .pipe(newer(opts.distPath))
    .pipe(
      imagemin(opts.imagemin.settings)
        .on('error', notify.onError('Error: <%= error.message %>,title: "Imagemin Error"'))
    )
    .pipe(gulp.dest(destFolder));
}
async function imageToWebP(imgFolder, destFolder) {
  return gulp
    .src(imgFolder + '**/*.{jpeg,jpg,png,JPEG,JPG,PNG}')
    .pipe(imagemin([
      imageminWebp(opts.imageminWebp)
    ]))
    .pipe(rename(function (path) {
      path.extname += ".webp"
    }))
    .pipe(gulp.dest(destFolder))
}

// return if is the build environment or not
async function isBuild(env) {
  return (env === 'build');
}
async function optimizeThemeImg() {
  imageMinify(opts.devPath + 'img/', opts.distPath + 'img/' );
  imageToWebP(opts.devPath + 'img/', opts.distPath + 'img/');
}
async function optimizeWPUploads() {
  imageMinify('../../uploads/', '../../uploads/');
  imageToWebP('../../uploads/', '../../uploads/');
}

// WordPress pot translation file
function createPot() {
  return gulp
    .src(opts.rootPath + '**/*.php')
    .pipe( wpPot({
        domain: pkg.wp.textDomain,
        package: pkg.name + '-theme'
      }).on('error', notify.onError('Error: <%= error.message %>,title: "Translation Error"'))
    )
    .pipe(gulp.dest(opts.rootPath + 'languages/' + pkg.name + '.pot'));
}

// User Scripts
function userScript(env = 'dev') {
  return gulp
    .src(opts.devPath + 'js/user/*.js')
    .pipe(gulpif(!isBuild(env), sourcemaps.init()))
    .pipe(babel({
      presets: ['@babel/env']
    }))
    .pipe(gulpif(isBuild(env), uglify()))
    .pipe(concat('scripts.js'))
    .pipe(gulpif(!isBuild(env), sourcemaps.write('.', { sourceRoot: '/' })))
    .pipe(gulp.dest(opts.distPath + 'js/'));
}

// User Scripts Build (with uglify)
async function userScriptBuild() {
  userScript('build');
}

// Vendor scripts concat
function vendorScript(env = 'dev') {
  return gulp
    .src(opts.devPath + 'js/vendor/*.js')
    .pipe(newer(opts.distPath + 'js/vendor-scripts.js'))
    .pipe(gulpif(isBuild(env), uglify()))
    .pipe(gulp.dest(opts.distPath + 'js/'));
}

// Vendor Scripts Build (with uglify)
async function vendorScriptBuild() {
  vendorScript('build');
}


// CSS Style functions
function atfCSS() {
  return gulp
    .src(opts.devPath + 'scss/atf.scss')
    .pipe(sass(opts.sass.build))
    .on('error', notify.onError('Error: <%= error.message %>,title: "SASS Error"'))
    .pipe(postcss([
      autoprefixer(opts.autoprefixer.build),
      cssnano(opts.cssnano.build)
    ]))
    .pipe(gulp.dest(opts.distPath + 'css/'));
}

// compile style.scss (the main WordPress style)
function mainCSS(env = 'dev') {
  return gulp
    .src(opts.devPath + 'scss/style.scss')
    .pipe(gulpif(!isBuild(env), sourcemaps.init()))
    .pipe(sass(opts.sass[env]))
    .on('error', notify.onError('Error: <%= error.message %>,title: "SASS Error"'))
    .pipe(postcss([
      autoprefixer(opts.autoprefixer[env]),
      cssnano(opts.cssnano[env])
    ]))
    .pipe(header(opts.banner, pkg))
    .pipe(gulp.dest(opts.rootPath))
    .pipe(gulpif(!isBuild(env), sourcemaps.write('.', { sourceRoot: '/' })))
    .pipe(gulp.dest(opts.rootPath));
}

// compile style.scss for release
async function mainCSSbuild() {
  mainCSS('build');
}

// compile all other styles that's name is not style.scss or atf
function backendCSS(env = 'dev') {
  return gulp
    .src([
      opts.devPath + 'scss/woo.scss',
      opts.devPath + 'scss/editor.scss',
      opts.devPath + 'scss/admin.scss'
    ])
    .pipe(gulpif(!isBuild(env), sourcemaps.init()))
    .pipe(sass(opts.sass.dev))
    .on('error', notify.onError('Error: <%= error.message %>,title: "SASS Error"'))
    .pipe(postcss([
      autoprefixer(opts.autoprefixer.dev)
    ]))
    .pipe(gulp.dest(opts.distPath + 'css/'))
    .pipe(gulpif(!isBuild(env), sourcemaps.write('.', { sourceRoot: '/' })))
    .pipe(gulp.dest(opts.distPath + 'css/'));
}
// compile style.scss for release
async function backendCSSbuild() {
  backendCSS('build');
}

// Zip all theme files into /release/version/textDomain.zip
async function zipRelease() {
  return gulp
    .src([
      opts.rootPath + 'assets/**/*.*',
      opts.rootPath + 'inc/**/*.*',
      opts.rootPath + 'languages/**/*.*',
      opts.rootPath + 'template-parts/**/*.*',
      opts.rootPath + '*.*',
      '!.gitignore',
      '!./node_modules',
      '!./releases'
    ], {base: '.'})
    .pipe(zip( pkg.wp.textDomain + '.zip'))
    .pipe(gulp.dest(opts.rootPath + '/releases/' + pkg.version + '/' ))
}

// Watch files
function watchStyle() {
  gulp.watch(opts.devPath + 'scss/**/*.scss', style );
}

function watchCode() {
  gulp.watch(opts.devPath + 'js/**/*.js', scripts );
}

function watchImages() {
  gulp.watch(opts.devPath + 'img/**/*', optimizeThemeImg );
}

const style = gulp.parallel(mainCSS, backendCSS, atfCSS);
const scripts = gulp.parallel(vendorScript, userScript);
const buildStyle = gulp.parallel(mainCSSbuild, backendCSSbuild, atfCSS);
const buildScripts = gulp.parallel(vendorScriptBuild, userScriptBuild);
const build = gulp.series(cleanAssets, gulp.parallel( optimizeThemeImg, buildScripts, buildStyle, createPot ));
const buildRelease = gulp.series(build, clean, zipRelease);
const watch = gulp.parallel(watchStyle, watchCode, watchImages);


// exports
exports.default = build;
exports.watch = watch;
exports.build = build;
exports.buildStyle = buildStyle;
exports.buildScripts = buildScripts;
exports.buildRelease = buildRelease;

exports.style = style;
exports.scripts = scripts;
exports.optimizeThemeImg = optimizeThemeImg;
exports.optimizeWPUploads = optimizeWPUploads;
exports.createPot = createPot;