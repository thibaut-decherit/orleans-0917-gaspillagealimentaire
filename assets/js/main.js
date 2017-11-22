var $ = require('jquery');
require('bootstrap-sass');

$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});

$(document).ready(function () {
    $('#sidebarCollapseInfo').on('click', function () {
        $('#sidebarInfo').toggleClass('active');
    });
});

$(document).ready(function () {
    $('#sidebarCollapseTrain').on('click', function () {
        $('#sidebarTrain').toggleClass('active');
    });
});

$(document).ready(function () {
    $('#sidebarCollapseChall').on('click', function () {
        $('#sidebarChall').toggleClass('active');
    });
});