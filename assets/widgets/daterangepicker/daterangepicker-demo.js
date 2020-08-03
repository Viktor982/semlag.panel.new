/* Daterangepicker bootstrap */

$(function() {
    "use strict";

    $('#daterangepicker-time').daterangepicker({
        timePicker: true,
        timePickerIncrement: 5,
        timePicker24Hour: true,
        format: 'YYYY/MM/DD HH:mm',
        locale: {
            format: 'YYYY/MM/DD HH:mm'
        }
    });

});
