$(document).ready(function () {
    // Custom DateTime Picker
    if ($('.my-datetime-picker')[0]) {
        $('.my-datetime-picker').flatpickr({
            enableTime: true,
            nextArrow: '<i class="zmdi zmdi-long-arrow-right" />',
            prevArrow: '<i class="zmdi zmdi-long-arrow-left" />',
            plugins: [new confirmDatePlugin({})],
            time_24hr: true
        });
    }
});

/*--------------------------------------
 Bootstrap Notify Notifications
 ---------------------------------------*/
function notify(message, from, align, icon, type){

    $.notify({
        icon: icon,
        title: '',
        message: message,
        url: ''
    },{
        element: 'body',
        type: (typeof type === "undefined") ? 'success' : type ,
        allow_dismiss: true,
        placement: {
            from: (typeof from === "undefined") ? 'top' : from,
            align: (typeof align === "undefined") ? 'right' : align
        },
        offset: {
            x: 20,
            y: 20
        },
        spacing: 10,
        z_index: 1031,
        delay: 2500,
        timer: 1000,
        url_target: '_blank',
        mouse_over: false,
        animate: {
            enter: 'animated fadeIn',
            exit: 'animated fadeOut'
        },
        template:   '<div data-notify="container" class="alert alert-dismissible alert-{0} alert--notify" role="alert">' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<div class="progress" data-notify="progressbar">' +
        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        '</div>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '<button type="button" aria-hidden="true" data-notify="dismiss" class="alert--notify__close">Close</button>' +
        '</div>'
    });
}



/*--------------------------------------
 DataTables.js
 ---------------------------------------*/
var dataTableButtons =  '<div class="dataTables_buttons hidden-sm-down actions">' +
    '<span class="actions__item zmdi zmdi-print" data-table-action="print" />' +
    '<span class="actions__item zmdi zmdi-fullscreen" data-table-action="fullscreen" />' +
    '<div class="dropdown actions__item">' +
    '<i data-toggle="dropdown" class="zmdi zmdi-download" />' +
    '<ul class="dropdown-menu dropdown-menu-right">' +
    '<a href="" class="dropdown-item" data-table-action="excel">Excel (.xlsx)</a>' +
    '<a href="" class="dropdown-item" data-table-action="csv">CSV (.csv)</a>' +
    '</ul>' +
    '</div>' +
    '</div>';

$.extend( true, $.fn.dataTable.defaults, {
    autoWidth: false,
    responsive: true,
    lengthMenu: [[15, 30, 45, -1], ['15 Rows', '30 Rows', '45 Rows', 'Everything']],
    language: {
        searchPlaceholder: "Search for records..."
    },
    dom: 'Blfrtip',
    buttons: [
        {
            extend: 'excelHtml5',
            title: 'Export Data'
        },
        {
            extend: 'csvHtml5',
            title: 'Export Data'
        },
        {
            extend: 'print',
            title: 'Material Admin'
        }
    ],
    initComplete: function(settings, json) {
        $(this).closest('.dataTables_wrapper').prepend(dataTableButtons);

        // Add blue line when search is active
        $('.dataTables_filter input[type=search]').focus(function () {
            $(this).closest('.dataTables_filter').addClass('dataTables_filter--toggled');
        });

        $('.dataTables_filter input[type=search]').blur(function () {
            $(this).closest('.dataTables_filter').removeClass('dataTables_filter--toggled');
        });
    },
} );

$(document).ready(function () {
    // Data table buttons
    $('body').on('click', '[data-table-action]', function (e) {
        e.preventDefault();
        var exportFormat = $(this).data('table-action');

        if(exportFormat === 'excel') {
            $(this).closest('.dataTables_wrapper').find('.buttons-excel').trigger('click');
        }
        if(exportFormat === 'csv') {
            $(this).closest('.dataTables_wrapper').find('.buttons-csv').trigger('click');
        }
        if(exportFormat === 'print') {
            $(this).closest('.dataTables_wrapper').find('.buttons-print').trigger('click');
        }
        if(exportFormat === 'fullscreen') {
            var parentCard = $(this).closest('.card');

            if(parentCard.hasClass('card--fullscreen')) {
                parentCard.removeClass('card--fullscreen');
                $('body').removeClass('data-table-toggled');
            }
            else {
                parentCard.addClass('card--fullscreen')
                $('body').addClass('data-table-toggled');
            }
        }
    });
});


/*--------------------------------------
 Admin Extra Fields and Rewards
 ---------------------------------------*/

var num_extra_fields = 0;
var num_rewards = 0;
var extra_fields_types = [];

function add_extra_field(key, name, type) {
    num_extra_fields += 1;

    var button = '<button class="btn btn-danger extra-field-remove-me" type="button" id="'+num_extra_fields+'"> <i class="zmdi zmdi-minus" aria-hidden="true"></i> </button>';
    if (num_extra_fields == 1) {
        button = '<button class="btn btn-success" type="button" id="new_extra_field"> <i class="zmdi zmdi-plus" aria-hidden="true"></i> </button>';
    }

    var text2 = "";
    extra_fields_types.forEach(function(e) {
        selected = (type == e) ? 'selected' : '';
        text2 = text2 + '<option value="' + e + '" '+ selected +'>'+ e.toUpperCase() +'</option>';
    });

    var text = '<div class="col-xs-3 col-md-3">'+
        '<div class="form-group">'+
        '<label>Key</label>'+
        '<input type="text" class="form-control" name="extra_field_keys[]" id="extra_field_keys" value="'+key+'">'+
        '<i class="form-group__bar"></i>'+
        '</div>'+
        '</div>'+
        '<div class="col-xs-3 col-md-3">'+
        '<div class="form-group">'+
        '<label>Type</label>'+
        '<select class="form-control" name="extra_field_types[]" id="extra_field_types">'+
        text2 +
        '</select>'+
        '<i class="form-group__bar"></i>'+
        '</div>'+
        '</div>'+
        '<div class="col-xs-4 col-md-4">'+
        '<div class="form-group">'+
        '<label>Name</label>'+
        '<div class="input-group">'+
        '<input type="text" class="form-control" name="extra_field_names[]" id="extra_field_names" value="'+name+'">'+
        '<i class="form-group__bar"></i>'+
        '<div class="input-group-btn">'+
        button +
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>';

    var divtest = document.createElement("div");
    divtest.setAttribute("class", "row extra-field-remove-"+num_extra_fields);
    divtest.innerHTML = text;

    $("#extra_fields").append(divtest)

    $('.extra-field-remove-me').click(function(e){
        e.preventDefault();
        var fieldNum = this.id;
        $('.extra-field-remove-'+fieldNum).remove();
    });
}

function add_reward(key, name, stock) {
    num_rewards += 1;

    var button = '<button class="btn btn-danger reward-remove-me" type="button" id="'+num_rewards+'"> <i class="zmdi zmdi-minus" aria-hidden="true"></i> </button>';
    if (num_rewards == 1) {
        button = '<button class="btn btn-success" type="button" id="new_reward"> <i class="zmdi zmdi-plus" aria-hidden="true"></i> </button>';
    }
    var text = '<div class="col-xs-4 col-md-4">'+
        '<div class="form-group">'+
        '<label>Key</label>'+
        '<input type="text" class="form-control" name="reward_keys[]" id="reward_keys" value="'+key+'">'+
        '<i class="form-group__bar"></i>'+
        '</div>'+
        '</div>'+
        '<div class="col-xs-4 col-md-4">'+
        '<div class="form-group">'+
        '<label>Name</label>'+
        '<input type="text" class="form-control" name="reward_names[]" id="reward_names" value="'+name+'">'+
        '<i class="form-group__bar"></i>'+
        '</div>'+
        '</div>'+
        '<div class="col-xs-2 col-md-2">'+
        '<div class="form-group">'+
        '<label>Stock</label>'+
        '<div class="input-group">'+
        '<input type="text" class="form-control" name="reward_stocks[]" id="reward_stocks" value="'+stock+'">'+
        '<i class="form-group__bar"></i>'+
        '<div class="input-group-btn">'+
            button +
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>';


    var divtest = document.createElement("div");
    divtest.setAttribute("class", "row reward-remove-"+num_rewards);
    divtest.innerHTML = text;

    $("#rewards").append(divtest)

    $('.reward-remove-me').click(function(e){
        e.preventDefault();
        var fieldNum = this.id;
        $('.reward-remove-'+fieldNum).remove();
    });
}

function slugify(string) {
    const a = 'àáäâãåăæąçćčđďèéěėëêęğǵḧìíïîįłḿǹńňñòóöôœøṕŕřßşśšșťțùúüûǘůűūųẃẍÿýźžż·/_,:;'
    const b = 'aaaaaaaaacccddeeeeeeegghiiiiilmnnnnooooooprrsssssttuuuuuuuuuwxyyzzz------'
    const p = new RegExp(a.split('').join('|'), 'g')

    return string.toString().toLowerCase()
        .replace(/\s+/g, '-') // Replace spaces with -
        .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
        .replace(/&/g, '-and-') // Replace & with 'and'
        .replace(/[^\w\-]+/g, '') // Remove all non-word characters
        .replace(/\-\-+/g, '-') // Replace multiple - with single -
        .replace(/^-+/, '') // Trim - from start of text
        .replace(/-+$/, '') // Trim - from end of text
}


$(document).ready(function() {
    $("body").on("click", ".navigation__sub > a", function (a) {
        if (a.target.getAttribute('href').trim().length > 0) {
            location.href = a.target.href;
        }
    });
});
