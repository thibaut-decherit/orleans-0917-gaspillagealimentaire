var $ = require('jquery');
require('bootstrap-sass');

$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('switch');
    });
});

$(document).ready(function () {
    $('#sidebarCollapseTrain').on('click', function () {
        $('#sidebarTrain').toggleClass('switch');
    });
});

$(document).ready(function () {
    $('#sidebarCollapseChall').on('click', function () {
        $('#sidebarChall').toggleClass('switch');
    });
});