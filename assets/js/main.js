var $ = require('jquery');
require('bootstrap-sass');

$(document).ready(function () {

    $(".pInfo").on('click', function (e) {
        e.preventdefault();

        $(".article[data-target=" + $(this).data('target') + "]").addClass('show');

    });

});
