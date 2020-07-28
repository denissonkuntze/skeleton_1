/*
Comandos a executar:
---
gulp - atualiza todos os arquivos
gulp auto - fica buscando atualizacoes nos arquivos relacionados ao fw
*/

var gulp             = require('gulp');         // gulp
var watch            = require('gulp-watch');   // verifica alterações em tempo real, caso haja, compacta novamente o projeto
var cssmin           = require('gulp-cssmin');  // minifica o CSS
var concat           = require('gulp-concat');  // agrupa todos arquivos em um so
var stripCssComments = require('gulp-strip-css-comments'); // remove comentários CSS
var terser           = require('gulp-terser');

var themePath    = 'limitless/v2';
var iconset      = 'icons/icomoon/styles.css';
var iconsetFonts = 'icons/icomoon/fonts/';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// FW //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// configuracoes do gulp do framework

filesSourceMinCSS = [
    'module/Fw/source.assets/themes/' + themePath + '/css/bootstrap.min.css',
    'module/Fw/source.assets/themes/' + themePath + '/css/bootstrap_limitless.min.css',
    'module/Fw/source.assets/themes/' + themePath + '/css/layout.min.css',
    'module/Fw/source.assets/themes/' + themePath + '/css/components.min.css',
    'module/Fw/source.assets/themes/' + themePath + '/css/colors.min.css',
    'module/Fw/source.assets/themes/' + themePath + '/css/animate.min.css',
    'module/Fw/source.assets/themes/' + themePath + '/css/' + iconset,

    'module/Fw/source.assets/js/plugins/x-editable/bs4/css/bootstrap-editable.css',
    'module/Fw/source.assets/js/plugins/popover/jquery.webui-popover.css',
    'module/Fw/source.assets/js/plugins/tabs/zozo/css/zozo.tabs.min.css',
    'module/Fw/source.assets/js/plugins/tabs/zozo/css/zozo.tabs.flat.min.css',
    'module/Fw/source.assets/js/plugins/tooltip/qtip/jquery.qtip.css',
    'module/Fw/source.assets/js/plugins/fancybox/jquery.fancybox.min.css',
    'module/Fw/source.assets/js/plugins/upload/fileuploader/font/font-fileuploader.css',
    'module/Fw/source.assets/js/plugins/upload/fileuploader/jquery.fileuploader.min.css',
    'module/Fw/source.assets/js/plugins/prism/prism.css',
    'module/Fw/source.assets/js/plugins/pace/pace.css',
    'module/Fw/source.assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker.standalone.css',

];

// Processo que agrupará todos os arquivos CSS, removerá comentários CSS e minificará.
gulp.task('fw-minify-css', gulp.series(function (done)
{

    gulp.src(filesSourceMinCSS, {allowEmpty: true}) //
      .pipe(concat('style.min.css')) //
      //.pipe(stripCssComments({all: true})) //
      //.pipe(cssmin()) //
      .pipe(gulp.dest('public/assets.fw/css/')); //

    done();

}));

filesSourceMinJs = [
    'module/Fw/source.assets/themes/' + themePath + '/js/layout/jquery.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/layout/bootstrap.bundle.min.js',

    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/ui/nicescroll.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/ui/drilldown.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/ui/position-calculator.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/ui/moment/moment.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/ui/perfect_scrollbar.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/ui/slinky.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/ui/dragula.min.js',
    //'module/Fw/source.assets/themes/' + themePath + '/js/plugins/buttons/hover_dropdown.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/notifications/pnotify.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/notifications/bootbox.all.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/notifications/sweet_alert.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/loaders/blockui.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/pickers/daterangepicker.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/pickers/anytime.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/pickers/pickadate/picker.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/pickers/pickadate/picker.date.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/pickers/pickadate/picker.time.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/pickers/pickadate/legacy.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/forms/selects/select2.4.0.13.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/forms/wizards/steps.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/forms/styling/switch.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/forms/styling/uniform.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/uploaders/fileinput/fileinput.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/uploaders/dropzone.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/visualization/d3/d3.min.js',
    'module/Fw/source.assets/themes/' + themePath + '/js/plugins/visualization/d3/d3_tooltip.js',

    'module/Fw/source.assets/js/plugins/jquery.autoheight.js',
    'module/Fw/source.assets/js/plugins/print/print.js/print.min.js',
    'module/Fw/source.assets/js/plugins/download/jquery.fileDownload.js',
    'module/Fw/source.assets/js/plugins/popover/jquery.webui-popover.js',
    'module/Fw/source.assets/js/plugins/pdfobject/pdfobject.min.js',
    'module/Fw/source.assets/js/plugins/x-editable/bs4/js/bootstrap-editable.min.js',
    'module/Fw/source.assets/js/plugins/fancybox/jquery.fancybox.min.js',
    'module/Fw/source.assets/js/plugins/tooltip/qtip/jquery.qtip.min.js',
    'module/Fw/source.assets/js/plugins/tabs/zozo/js/zozo.tabs.v2.js',
    'module/Fw/source.assets/js/plugins/masks/inputmask/inputmask/inputmask.js',
    'module/Fw/source.assets/js/plugins/masks/inputmask/inputmask/inputmask.date.extensions.js',
    'module/Fw/source.assets/js/plugins/masks/inputmask/inputmask/inputmask.numeric.extensions.js',
    'module/Fw/source.assets/js/plugins/masks/inputmask/inputmask/jquery.inputmask.js',
    'module/Fw/source.assets/js/plugins/masks/jquery.priceformat.min.js',
    'module/Fw/source.assets/js/plugins/upload/fileuploader/jquery.fileuploader.min.js',
    'module/Fw/source.assets/js/plugins/prism/prism.js',
    'module/Fw/source.assets/js/plugins/pace/pace.min.js',
    'module/Fw/source.assets/js/plugins/sortable/sortable.js',
    'module/Fw/source.assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
    'module/Fw/source.assets/js/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js',

    'module/Fw/source.assets/themes/' + themePath + '/js/pages/*',
    'module/Fw/source.assets/themes/' + themePath + '/js/layout/app.js',

];

//// Tarefa de minificação do Javascript
gulp.task('fw-minify-js', gulp.series(function (done)
{

    gulp.src(filesSourceMinJs, {allowEmpty: true}) // Arquivos que serão carregados
      .pipe(concat('script.min.js')) // arquivo de saída
      //.pipe(terser()) // minifica o arquivo
      .pipe(gulp.dest('public/assets.fw/js/')); // pasta de destino do arquivo

    done();

}));

// arquivos CSS do framework que nao são minificados ///////////////////////////////////////////////////////////////////
filesSourceCSS = [
    'module/Fw/source.assets/css/fw.css',
    'module/App/source.assets/css/app.css'
];

gulp.task('fw-css', gulp.series(function (done)
{
    gulp.src(filesSourceCSS, {allowEmpty: true}) //
      .pipe(concat('style.fw.css')) //
      .pipe(gulp.dest('public/assets.fw/css/')); //

    done();

}));

// arquivos Javascript do framework e da APP que nao são minificados ///////////////////////////////////////////////////
filesSourceJs = [
    'module/Fw/source.assets/js/fw/**/*',
    'module/App/source.assets/js/app.js'
];

gulp.task('fw-js', gulp.series(function (done)
{

    gulp.src(filesSourceJs, {allowEmpty: true}) //
      .pipe(concat('script.fw.js')) //
      .pipe(gulp.dest('public/assets.fw/js/')); //

    done();

}));

// arquivos Javascript dos controllers do framework ////////////////////////////////////////////////////////////////////
filesControllersSourceJs = [
    'module/Fw/source.assets/js/controllers/**/*'
];

gulp.task('fw-controllers-js', gulp.series(function (done)
{

    gulp.src(filesControllersSourceJs, {allowEmpty: true}) //
      .pipe(gulp.dest('public/assets.fw/js/controllers/')); //

    done();

}));

// arquivos extras do framework ////////////////////////////////////////////////////////////////////////////////////////
filesOthers = [
    'module/Fw/source.assets/others/**/*'
];

gulp.task('fw-others', gulp.series(function (done)
{

    gulp.src(filesOthers, {allowEmpty: true}) //
      .pipe(gulp.dest('public/assets.fw/others/')); //

    done();

}));

// arquivos de fontes, imagens e icones css ////////////////////////////////////////////////////////////////////////////
gulp.task('fw-icons-fonts-imgs', gulp.series(function (done)
{

    gulp.src(['module/Fw/source.assets/images/**/*'], {allowEmpty: true}) //
      .pipe(gulp.dest('public/assets.fw/images/')); //

    gulp.src(['module/Fw/source.assets/themes/' + themePath + '/css/' + iconsetFonts + '/**/*'], {allowEmpty: true}) //
      .pipe(gulp.dest('public/assets.fw/css/fonts/')); //

    gulp.src(['module/Fw/source.assets/themes/' + themePath + '/css/icons/**/*'], {allowEmpty: true}) //
      .pipe(gulp.dest('public/assets.fw/css/icons/')); //

    gulp.src(['module/Fw/source.assets/themes/' + themePath + '/js/plugins/x-editable/css/img/'], {allowEmpty: true}) //
      .pipe(gulp.dest('public/assets.fw/css/img/')); //

    done();

}));

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//// APP ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
//// configuracoes do gulp da app

filesSourceApp = [
    'module/App/source.assets/**/*'
];

gulp.task('app', gulp.series(function (done)
{
    gulp.src(filesSourceApp)
      .pipe(gulp.dest('public/assets.app/'));

    done();

}));

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//// SITE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
//// configuracoes do gulp do site

filesSourceSite = [
    'module/Site/source.assets/**/*'
];

gulp.task('site', gulp.series(function (done)
{
    gulp.src(filesSourceSite) //
      .pipe(gulp.dest('public/assets.site/')); //

    done();

}));


gulp.task('auto', gulp.series(function (done)
{

    gulp.watch(filesSourceApp, gulp.parallel(['app']));
    gulp.watch(filesSourceSite, gulp.parallel(['site']));
    gulp.watch(filesSourceJs, gulp.parallel(['fw-js']));
    gulp.watch(filesSourceCSS, gulp.parallel(['fw-css']));
    gulp.watch(filesControllersSourceJs, gulp.parallel(['fw-controllers-js']));
    gulp.watch(filesOthers, gulp.parallel(['fw-others']));

    done();

}));

gulp.task('default', gulp.series([
    'fw-minify-css', 'fw-minify-js', 'fw-css', 'fw-js', 'fw-controllers-js', 'fw-others', 'fw-icons-fonts-imgs', 'app', 'site'
]));

