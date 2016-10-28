const gulp     = require('gulp'),
plumber        = require('gulp-plumber'),
uglify         = require('gulp-uglify'),
concat         = require('gulp-concat'),
stylus         = require('gulp-stylus'),
rupture        = require('rupture'),
sourcemaps     = require('gulp-sourcemaps'),
size           = require('gulp-size'),
mainBowerFiles = require('main-bower-files'),
postcss        = require('gulp-postcss'),
defaultunit    = require('postcss-default-unit'),
circle         = require('postcss-circle'),
crip           = require('postcss-crip'),
csssize        = require('postcss-size'),
font_magician  = require('postcss-font-magician'),
pxtorem        = require('postcss-pxtorem'),
// csstriangle    = require('postcss-triangle'),
shortfontsize  = require('postcss-short-font-size'),
// quantityqueries= require('postcss-quantity-queries'),
shortcolor     = require('postcss-short-color'),
colorshort     = require('postcss-color-short'),
ie_opacity     = require('postcss-opacity'),
center         = require('postcss-center'),
position       = require('postcss-position-alt'),
initial        = require('postcss-initial'),
fontweights    = require('postcss-font-weights'),
flexbugs       = require('postcss-flexbugs-fixes'),
border         = require('postcss-border-shortcut'),
autoprefixer   = require('autoprefixer'),
livereload     = require('gulp-livereload'),
fs             = require('fs'),
isThere        = require('is-there')
argv           = process.argv;

const MODE = isThere('./.git') || argv.indexOf('--dev') > -1 ? 'dev' : 'prod';

if(isThere('./.git')) {
  console.log(`\u001b[33m
  *** GD Theme is in DEVELOPMENT mode ***
  Remove the .git from this directory if you're in PRODUCTION.
  \u001b[0m`);
}
if(argv.indexOf('--dev') > -1) {
  console.log(`\u001b[33m
  *** GD Theme is in DEVELOPMENT mode ***
  You are running: 'gulp --dev',
  to compile PRODUCTION run: 'gulp' with no command line parameter.
  \u001b[0m`);
}

var ie8          = false; // to support IE8 -> true
var css_optimize = MODE === 'dev' ? false : true;
var first_load   = true;

var replace_rem  = !ie8;
var browsers     = ['last 4 versions'];

if(ie8) {
  browsers.push('ie 8');
}

var jsBower  = mainBowerFiles({filter:/\.js$/});
var cssBower = mainBowerFiles({filter:/\.css$/});

var current_folder = require('path').resolve('./src');
if(jsBower[0]){
  console.log('\n\u001b[33m[Bower JS included]\u001b[0m');
  jsBower.map(function(v){
    console.log(v.replace(current_folder+'/bower/', ''));
  })
}
else {
  console.log('\n\u001b[33m[No Bower JS detected]\u001b[0m');
}

if(cssBower[0]){
  console.log('\n\u001b[33m[Bower CSS included]\u001b[0m');
  cssBower.map(function(v){
    console.log(v.replace(current_folder+'/bower/', ''))
  })
}
else {
  console.log('\n\u001b[33m[No Bower CSS detected]\u001b[0m');
}

console.log('\n')

var path = {
  js:     ['src/js/**/*.js', '!src/js/ie9-/**/*.js'],
  js_ie9: ['src/js/ie9-/**/*.js'],
  css:    ['src/css/all.styl'],
  img:    ['dist/img/**/*.{png,jpg,gif,svg}']
};


var onError = function (err) {
  require('gulp-util').beep();
  console.log(err);
};

gulp.task('js', function() {
  gulp.src(jsBower.concat(path.js))
  .pipe(sourcemaps.init())
  .pipe(plumber({errorHandler: onError}))
  //.pipe(babel({blacklist:['useStrict']}))
  .pipe(concat('all.js'))
  //.pipe(uglify())
  .pipe(sourcemaps.write('.'))
  .pipe(gulp.dest('dist/js'))
  .pipe(livereload())
  .pipe(size({showFiles:true}));
})
.task('js-ie9-', function() {
  gulp.src(path.js_ie9)
  .pipe(plumber({errorHandler: onError}))
  .pipe(concat('ie.js'))
  .pipe(uglify())
  .pipe(gulp.dest('dist/js'));
})
.task('css', function() {

  var processors =
  [
    crip,
    circle,
    csssize,
    initial({reset: 'inherited', replace: true}),
    position,
    center,
    shortcolor,
    colorshort,
    // csstriangle,
    shortfontsize,
    fontweights,
    // quantityqueries,
    defaultunit({ unit: 'px' }),
    border,
    pxtorem(
    {
      rootValue: 10,
      unitPrecision: 5,
      propWhiteList: [],
      selectorBlackList: ['html'],
      replace: replace_rem,
      mediaQuery: false,
      minPixelValue: 2
    }),
    font_magician(
    {
      hosted: '../dist/font',
      foundries: ['custom', 'hosted', 'google']
    }),
    flexbugs,
    autoprefixer({browsers: browsers, cascade: false}),
  ];

  if(ie8) {
    processors.push(ie_opacity);
  }
  if(css_optimize) {

    var charset  = require('postcss-normalize-charset');
    var mqpacker = require('css-mqpacker');
    var csswring = require('csswring');

    processors.push(charset);
    processors.push(mqpacker);
    processors.push(csswring({removeAllComments: true, map: false}));
  }

  if(MODE === 'dev') {
    gulp.src(path.css)
      .pipe(plumber({errorHandler: onError}))
      .pipe(sourcemaps.init())
      .pipe(stylus({
        use: [ rupture() ],
        linenos: true
      }))
      .pipe(postcss(processors))
      .pipe(concat('all.css'))
      .pipe(gulp.dest('dist/css'))
      .pipe(livereload())
      .pipe(sourcemaps.write('.'))
      .pipe(size({showFiles:true})
    );
  }
  else {
    gulp.src(path.css)
      .pipe(plumber({errorHandler: onError}))
      .pipe(sourcemaps.init())
      .pipe(stylus({
        use: [ rupture() ],
        compress: true
      }))
      .pipe(postcss(processors))
      .pipe(concat('all.css'))
      .pipe(gulp.dest('dist/css'))
      .pipe(livereload())
      .pipe(sourcemaps.write('.'))
      .pipe(size({showFiles:true})
    );
  }


  if(first_load) {
    var processors_for_plugins =
    [
      pxtorem(
      {
        rootValue: 10,
        unitPrecision: 5,
        propWhiteList: [],
        selectorBlackList: ['html'],
        replace: replace_rem,
        mediaQuery: false,
        minPixelValue: 2
      }),
      autoprefixer({browsers: browsers, cascade: false}),
    ];
    if(css_optimize) {
      processors_for_plugins.push(charset);
      processors_for_plugins.push(mqpacker);
      processors_for_plugins.push(csswring({removeAllComments: true, map: false}));
    }
    if(cssBower[0]) {
      gulp.src(cssBower)
      .pipe(plumber({errorHandler: onError}))
      .pipe(concat('plugin.css'))
      .pipe(postcss(processors_for_plugins))
      .pipe(gulp.dest('dist/css'))
      .pipe(size({showFiles:true}));
    }
    else {
      require('gulp-file')('plugin.css', '', { src: true }).pipe(gulp.dest('dist/css'));
    }
    first_load = false;
  }
})
.task('html', function() {
  livereload.reload()
})
.task('img', function() {
  gulp.src(path.img)
  .pipe(require('gulp-imagemin')({ optimizationLevel: 7 }))
  .pipe(gulp.dest('dist/img'));
});

gulp.task('watch', function() {
  livereload.listen();
  gulp.watch(['src/css/**/*.styl'], ['css']);
  if(MODE === 'prod')
    gulp.watch(['../**/*.{twig,html,php}'], ['html']);
  gulp.watch(path.js,    ['js']);
  gulp.watch(path.js_ie9,['js-ie9-']);
});

gulp.task('build', function(){
  css_optimize = true;
  gulp.start(['css', 'js', 'js-ie9-']);
});
gulp.task('default', ['css', 'js', 'js-ie9-', 'watch'], function(){});
