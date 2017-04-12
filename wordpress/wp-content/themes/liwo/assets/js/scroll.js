(function($) {
    $(document).ready(function () {
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 500);
            return false;
        });
    });

    // Menu drop down effect
    // $('.dropdown-toggle').dropdownHover().dropdown();

    jQuery('.dropdown-toggle').dropdownHover({
        instantlyCloseOthers: false,
        delay: 0,
        fadeOut: 400,
    }).dropdown();

    $(document).on('click', '.fhmm .dropdown-menu', function(e) {
      e.stopPropagation()
    })

})(jQuery);