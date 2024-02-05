$(document).ready(function() {
    $('#menu-toggle').on('click', function() {
        $('#mobile-menu').toggle();
    });

    $('#mobile-menu a').on('click', function() {
        var section = $(this).data('section');
        contentSelector(section);
        $('#mobile-menu').hide();
    });
});
