var $ = require('jquery');
require('bootstrap-sass');

$('.checkboxMenu').on('click', function () {
    if ($('.checkboxMenu:checked').length > 5) {
        $(this).prop('checked', false);
        alert("Vous ne pouvez pas sélectionner plus de 5 liens, décochez une case pour sélectionner un nouveau lien.");
    }
    $.ajax({
        type: "POST",
        url: "/admin/sinformer/toggled-checked" + $(this).attr('name'),
    });
});

$('.checkboxMenu1').on('click', function () {
    if ($('.checkboxMenu1:checked').length > 5) {
        $(this).prop('checked', false);
        alert("Vous ne pouvez pas sélectionner plus de 5 liens, décochez une case pour sélectionner un nouveau lien.");
    }
    $.ajax({
        type: "POST",
        url: "/admin/jeux/toggled-checked" + $(this).attr('name'),
    });
});