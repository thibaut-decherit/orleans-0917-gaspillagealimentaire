var $ = require('jquery');
require('bootstrap-sass');

$(document).ready(function () {

    $('.article').fadeOut(0);
    $('.article:first-child').fadeIn(0);

    $(".pInfo").on('click', function (e) {
        e.preventDefault();

        $(".article").fadeOut(0);
        $(".article[data-target=" + $(this).data('target') + "]").fadeIn();


    });

    $('#form-submit-button').submit(function () {
        $('#button-submit').attr('disabled', 'disabled');
    });

    $('.btnReportConfirm').click(function () {
        $('.btnReportConfirm').attr('disabled', 'disabled');
    });
});
