let gulp = require('gulp');
let cleanCSS = require('gulp-clean-css');
let concat = require('gulp-concat');
let uglify = require('gulp-uglify');
let hash = require('gulp-hash-filename');
let manifest = require('./npmanifest');

const cssList = [

    // Theme
    "assets/css/theme/layout.css",
    "assets/css/theme/colors.css",
    "assets/css/theme/default.css",
    "assets/css/theme/border-radius.css",

    // Helpers section:
    "assets/css/helpers/animate.css",
    "assets/css/helpers/boilerplate.css",
    "assets/css/helpers/border-radius.css",
    "assets/css/helpers/grid.css",
    "assets/css/helpers/page-transitions.css",
    "assets/css/helpers/spacing.css",
    "assets/css/helpers/typography.css",
    "assets/css/helpers/utils.css",
    "assets/css/helpers/colors.css",
    "assets/css/helpers/responsive-elements.css",
    "assets/css/helpers/admin-responsive.css",

    // Some other
    "assets/css/ripple.css",
    "assets/css/style.css",


    // Elements
    "assets/css/elements/badges.css",
    "assets/css/elements/buttons.css",
    "assets/css/elements/content-box.css",
    "assets/css/elements/dashboard-box.css",
    "assets/css/elements/forms.css",
    "assets/css/elements/images.css",
    "assets/css/elements/info-box.css",
    "assets/css/elements/invoice.css",
    "assets/css/elements/loading-indicators.css",
    "assets/css/elements/menus.css",
    "assets/css/elements/panel-box.css",
    "assets/css/elements/response-messages.css",
    "assets/css/elements/responsive-tables.css",
    "assets/css/elements/ribbon.css",
    "assets/css/elements/social-box.css",
    "assets/css/elements/tables.css",
    "assets/css/elements/tile-box.css",
    "assets/css/elements/timeline.css",

    // Widgets:
    "assets/widgets/accordion-ui/accordion.css",
    "assets/widgets/calendar/calendar.css",
    "assets/widgets/carousel/carousel.css",
    "assets/widgets/charts/justgage/justgage.css",
    "assets/widgets/charts/piegage/piegage.css",
    "assets/widgets/charts/xcharts/xcharts.css",
    "assets/widgets/chosen/chosen.css",
    "assets/widgets/colorpicker/colorpicker.css",
    "assets/widgets/datatable/datatable.css",
    "assets/widgets/datepicker/datepicker.css",
    "assets/widgets/datetimepicker/bootstrap-datetimepicker.min.css",
    "assets/widgets/datepicker-ui/datepicker.css",
    "assets/widgets/daterangepicker/daterangepicker.css",
    "assets/widgets/dialog/dialog.css",
    "assets/widgets/dropdown/dropdown.css",
    "assets/widgets/dropzone/dropzone.css",
    "assets/widgets/file-input/fileinput.css",
    "assets/widgets/input-switch/inputswitch.css",
    "assets/widgets/input-switch/inputswitch-alt.css",
    "assets/widgets/ionrangeslider/ionrangeslider.css",
    "assets/widgets/jcrop/jcrop.css",
    "assets/widgets/jgrowl-notifications/jgrowl.css",
    "assets/widgets/loading-bar/loadingbar.css",
    "assets/widgets/maps/vector-maps/vectormaps.css",
    "assets/widgets/markdown/markdown.css",
    "assets/widgets/modal/modal.css",
    "assets/widgets/multi-select/multiselect.css",
    "assets/widgets/multi-upload/fileupload.css",
    "assets/widgets/nestable/nestable.css",
    "assets/widgets/noty-notifications/noty.css",
    "assets/widgets/popover/popover.css",
    "assets/widgets/pretty-photo/prettyphoto.css",
    "assets/widgets/progressbar/progressbar.css",
    "assets/widgets/range-slider/rangeslider.css",
    "assets/widgets/slidebars/slidebars.css",
    "assets/widgets/slider-ui/slider.css",
    "assets/widgets/summernote-wysiwyg/summernote-wysiwyg.css",
    "assets/widgets/tabs-ui/tabs.css",
    "assets/widgets/timepicker/timepicker.css",
    "assets/widgets/tocify/tocify.css",
    "assets/widgets/tooltip/tooltip.css",
    "assets/widgets/touchspin/touchspin.css",
    "assets/widgets/uniform/uniform.css",
    "assets/widgets/wizard/wizard.css",
    "assets/widgets/xeditable/xeditable.css",
    "assets/widgets/datepicker-ui/datepicker.css",
    "assets/frontend-elements/portfolio-navigation.css",
    "assets/widgets/uniform/uniform.css",
    "assets/widgets/chosen/chosen.css",
    "assets/widgets/daterangepicker/daterangepicker.css",

    // Icons
    "assets/icons/fontawesome/fontawesome.css",
    "assets/icons/payment/paymentfont.css",
    "assets/icons/linecons/linecons.css",
    "assets/icons/spinnericon/spinnericon.css",

    // Vendor
    "assets/css/vendor/highlightjs-912-default.min.css",
    "node_modules/noty/lib/noty.css",

    // Select2
    "assets/widgets/select2/select2.min.css",

    // Toast
    "assets/widgets/toast/jquery.toast.min.css"
]

const jsList = [
    // Jquery and Dependencies
    "assets/js/superset.js",
    "assets/js/vendor/axios.min.js",
    "assets/js/vendor/jquery-core.js",
    "assets/js/vendor/jquery-ui-core.js",
    "assets/js/vendor/jquery-ui-widget.js",
    "assets/js/vendor/jquery-ui-mouse.js",
    "assets/js/vendor/jquery-ui-position.js",
    "assets/js/vendor/transition.js",
    "assets/js/vendor/modernizr.js",
    "assets/js/vendor/jquery-cookie.js",
    "assets/widgets/modal/modal.js",
    "assets/widgets/knobs/knob.js",
    "assets/widgets/datatable/datatable.js",
    "assets/widgets/datatable/datatable-bootstrap.js",
    "assets/widgets/datatable/datatable-responsive.js",
    "assets/widgets/datepicker/datepicker.js",
    "assets/widgets/dropdown/dropdown.js",
    "assets/widgets/tooltip/tooltip.js",
    "assets/widgets/popover/popover.js",
    "assets/widgets/progressbar/progressbar.js",
    "assets/widgets/button/button.js",
    "assets/widgets/collapse/collapse.js",
    "assets/widgets/superclick/superclick.js",
    "assets/widgets/input-switch/inputswitch-alt.js",
    "assets/widgets/input-switch/inputswitch.js",
    "assets/widgets/slimscroll/slimscroll.js",
    "assets/widgets/slidebars/slidebars.js",
    "assets/widgets/slidebars/slidebars-demo.js",
    "assets/widgets/charts/chart-js/chart-core.js",
    "assets/widgets/charts/chart-js/chart-bar.js",
    "assets/widgets/charts/chart-js/chart-doughnut.js",
    "assets/widgets/charts/chart-js/chart-line.js",
    "assets/widgets/charts/chart-js/chart-polar.js",
    "assets/widgets/charts/chart-js/chart-radar.js",
    "assets/widgets/charts/piegage/piegage.js",
    "assets/widgets/charts/piegage/piegage-demo.js",
    "assets/widgets/screenfull/screenfull.js",
    "assets/widgets/datetimepicker/bootstrap-datetimepicker.min.js",
    // "assets/widgets/content-box/contentbox.js",
    "assets/widgets/dropzone/dropzone.js",
    "assets/widgets/summernote-wysiwyg/summernote-wysiwyg.js",
    "assets/widgets/material/material.js",
    "assets/widgets/material/ripples.js",
    "assets/widgets/overlay/overlay.js",
    "assets/widgets/parsley/parsley.js",
    "assets/widgets/high-stock/highstock.js",
    "assets/widgets/high-stock/exporting.js",
    "assets/widgets/high-stock/data.js",
    "assets/js/widgets-init.js",
    "assets/js/layout.js",
    "assets/js/slugify.js",
    "assets/js/vendor/highlight912.min.js",
    "assets/widgets/datepicker-ui/datepicker.js",
    "assets/widgets/datepicker-ui/datepicker-demo.js",
    "assets/widgets/mixitup/mixitup.js",
    "assets/widgets/mixitup/images-loaded.js",
    "assets/widgets/mixitup/isotope.js",
    "assets/widgets/mixitup/portfolio-demo.js",
    "assets/widgets/uniform/uniform.js",
    "assets/widgets/uniform/uniform-demo.js",
    "assets/widgets/chosen/chosen.js",
    "assets/widgets/chosen/chosen-demo.js",
    "node_modules/noty/lib/noty.js",
    "assets/widgets/daterangepicker/daterangepicker.js",
    "assets/widgets/daterangepicker/daterangepicker-demo.js",
    "assets/widgets/daterangepicker/moment.js",
    "node_modules/chart.js/dist/Chart.js",
    "node_modules/chart.js/dist/Chart.min.js",
    "assets/widgets/multi-select/multiselect.js",
    "assets/widgets/accordion-ui/accordion.js",
    "assets/widgets/input-mask/inputmask.js",
    "assets/js/vendor/md5.js",

    // Select2
    "assets/widgets/select2/select2.min.js",
    "assets/widgets/select2/i18n/pt-BR.js",

    // Toast
    "assets/widgets/toast/jquery.toast.min.js",

]

const resources = [
    "assets/images/",
    "assets/image-resources/",
    "assets/icons/",
    "assets/fonts/",
    "assets/widgets/"
]

const webAssetsDir = 'public/build/'

gulp.task('buildCss', function () {
    gulp.src(cssList)
        .pipe(concat('nptunnel.css'))
        .pipe(cleanCSS({debug: true}))
        .pipe(hash())
        .pipe(gulp.dest(webAssetsDir+'css/'))
        .pipe(manifest('nptunnel.css'))
})

gulp.task('buildJs', function () {
    gulp.src(jsList)
        .pipe(concat('nptunnel.js'))
        .pipe(uglify())
        .pipe(hash())
        .pipe(gulp.dest(webAssetsDir+'js/'))
        .pipe(manifest('nptunnel.js'))
})

gulp.task('copyResources', function () {
    resources.forEach(function (res) {
        gulp.src(res+'**/*')
            .pipe(gulp.dest(webAssetsDir+res.split("/")[1]))
    })
})

gulp.task('default', ['buildCss', 'buildJs', 'copyResources'])