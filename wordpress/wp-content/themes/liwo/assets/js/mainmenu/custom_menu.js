/*-----------------------------------------------------------------------------------*/
/*	MENU
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
    jQuery('.js-activated').dropdownHover({
        instantlyCloseOthers: false,
        delay: 0
    }).dropdown();


    jQuery('.dropdown-menu a, .social .dropdown-menu, .social .dropdown-menu input').click(function (e) {
        e.stopPropagation();
    });

});