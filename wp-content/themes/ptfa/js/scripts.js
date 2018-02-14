jQuery(function ($) {
    $(document).ready(function() {
        $("#box").on('mouseenter', function() {
            $(this).addClass('highlight');
            $(this).find('.price').show();
             });

            $("#box").on('mouseleave', function() {
                $(this).removeClass('highlight');
            });
    });
});
