<?php
return array(
    'admin' => array (
        'theme_path' => base_path('resources/assets/vendor/genetsis-admin'),
        'groups' => array(
            'main_js' => array(
                'filters' => array(
                    'js_min'
                ),
                'assets' => array(
                    'vendors/bower_components/jquery/dist/jquery.min.js',
                    'vendors/bower_components/tether/dist/js/tether.min.js',
                    'vendors/bower_components/bootstrap/dist/js/bootstrap.min.js',
                    'vendors/bower_components/Waves/dist/waves.min.js',
                    'vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js',
                    'vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js',
                    'vendors/bower_components/flatpickr/dist/flatpickr.js',
                    'vendors/bower_components/flatpickr/dist/plugins/confirmDate/confirmDate.js',
                    'vendors/bower_components/select2/dist/js/select2.full.min.js',
                    'vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js',
                    //'js/inc/functions/app.js',
                    // DataTables
                    'vendors/bower_components/datatables.net/js/jquery.dataTables.js',
                    'vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.js',
                    'vendors/bower_components/datatables.net-buttons/js/buttons.print.js',
                    'vendors/bower_components/jszip/dist/jszip.min.js',
                    'vendors/bower_components/datatables.net-buttons/js/buttons.html5.js',
                    // Flot Charts
                    'vendors/bower_components/flot/jquery.flot.js',
                    'vendors/bower_components/flot/jquery.flot.pie.js',
                    'vendors/bower_components/flot/jquery.flot.time.js',
                    'vendors/bower_components/flot/jquery.flot.resize.js',
                    'vendors/bower_components/flot.curvedlines/curvedLines.js',
                    'vendors/bower_components/flot.orderbars/js/jquery.flot.orderBars.js',
                    // Alerts
                    'vendors/bower_components/sweetalert2/dist/sweetalert2.min.js',
                    'js/app.min.js',
                    'js/custom.js'
                ),
                'output' => 'cache/main.js',
            ),
            'main_css' => array(
                'filters' => array(
                    'css_min'
                ),
                'assets' => array(
                    'vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css',
                    'vendors/bower_components/animate.css/animate.min.css',
                    'vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css',
                    'vendors/bower_components/select2/dist/css/select2.min.css',
                    'vendors/bower_components/flatpickr/dist/flatpickr.min.css',
                    'vendors/bower_components/flatpickr/dist/plugins/confirmDate/confirmDate.css',
                    'vendors/bower_components/sweetalert2/dist/sweetalert2.css',
                    'css/app.css',
                    'css/custom.css',
                ),
                'output' => 'cache/main.css',
            ),
        )
    )
);