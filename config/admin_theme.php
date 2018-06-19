<?php
return array(
    'admin' => array (
        'theme_path' => base_path('resources/views/vendor/genetsis-admin'),
        'groups' => array(
            'main_js' => array(
                'filters' => array(
                    'js_min'
                ),
                'assets' => array(
                    'assets/vendors/bower_components/jquery/dist/jquery.min.js',
                    'assets/vendors/bower_components/tether/dist/js/tether.min.js',
                    'assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js',
                    'assets/vendors/bower_components/Waves/dist/waves.min.js',
                    'assets/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js',
                    'assets/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js',
                    'assets/vendors/bower_components/flatpickr/dist/flatpickr.js',
                    'assets/vendors/bower_components/flatpickr/dist/plugins/confirmDate/confirmDate.js',
                    'assets/vendors/bower_components/select2/dist/js/select2.full.min.js',
                    'assets/vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js',
                    //'assets/js/inc/functions/app.js',
                    // DataTables
                    'assets/vendors/bower_components/datatables.net/js/jquery.dataTables.js',
                    'assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.js',
                    'assets/vendors/bower_components/datatables.net-buttons/js/buttons.print.js',
                    'assets/vendors/bower_components/jszip/dist/jszip.min.js',
                    'assets/vendors/bower_components/datatables.net-buttons/js/buttons.html5.js',
                    // Flot Charts
                    'assets/vendors/bower_components/flot/jquery.flot.js',
                    'assets/vendors/bower_components/flot/jquery.flot.pie.js',
                    'assets/vendors/bower_components/flot/jquery.flot.time.js',
                    'assets/vendors/bower_components/flot/jquery.flot.resize.js',
                    'assets/vendors/bower_components/flot.curvedlines/curvedLines.js',
                    'assets/vendors/bower_components/flot.orderbars/js/jquery.flot.orderBars.js',
                    // Alerts
                    'assets/vendors/bower_components/sweetalert2/dist/sweetalert2.min.js',
                    'assets/js/app.min.js',
                    'assets/js/custom.js'
                ),
                'output' => 'cache/main.js',
            ),
            'main_css' => array(
                'filters' => array(
                    'css_min'
                ),
                'assets' => array(
                    'assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css',
                    'assets/vendors/bower_components/animate.css/animate.min.css',
                    'assets/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css',
                    'assets/vendors/bower_components/select2/dist/css/select2.min.css',
                    'assets/vendors/bower_components/flatpickr/dist/flatpickr.min.css',
                    'assets/vendors/bower_components/flatpickr/dist/plugins/confirmDate/confirmDate.css',
                    'assets/vendors/bower_components/sweetalert2/dist/sweetalert2.css',
                    'assets/css/app.css',
                    'assets/css/custom.css',
                ),
                'output' => 'cache/main.css',
            ),
        )
    )
);