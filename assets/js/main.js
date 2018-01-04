var $ = require('jquery');
require('bootstrap-sass');

// $(document).ready(function () {
//     $('.panel-body > a').on('click', function () {
//         var id = $('.panel-heading > h3').attr("id");
//         $.ajax({
//             url: '/quizz/quizzAnswer',
//             type: 'GET',
//             data: id,
//             dataType: 'json',
//             timeout: 5000,
//             success: function (response) {
//                 $('.modal-header').append("<h4>Réponse: </h4>");
//                 $('.modal-footer').append("<a href=\"\" type=\"button\" class=\"btn btn-primary\">Suivant</a>");
//             },
//             error: function () {
//                 alert("Error");
//             }
//         });
//     });
// });