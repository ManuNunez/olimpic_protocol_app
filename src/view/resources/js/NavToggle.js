
$(document).ready(function() {
    $('#menu-toggle').on('click', function() {
        $('#mobile-menu').toggleClass('hidden');
    });

    $('#mobile-menu a').on('click', function() {
        $('#mobile-menu').addClass('hidden');
    });
});
