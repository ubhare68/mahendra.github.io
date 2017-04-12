jQuery(document).ready(function($){
	var maxpage = parseInt(ajax_post.maxpage);
	var paged = parseInt(ajax_post.paged) + 1;
	var ajaxUrl1 = ajax_post.ajaxurl;
    var class_item = ajax_post.class_item;

    if(paged > maxpage){
        $("#load_post").hide();
    }

	$('#load_post').on('click', function(event) {
        $("#load_post img").show();
		event.preventDefault();
		 $("#load_post").attr("disabled",true); // Disable the button, temp.
            $.post(ajaxUrl1, {
                action:"more_post_ajax",
                paged: paged,
                class_item:class_item,
            }).success(function(posts){
                $("#load_post img").hide();
                paged++;
                var $newItems = jQuery(posts);
                jQuery('.content_blog .content_blogs').append( $newItems ).masonry( 'appended', $newItems );
                //jQuery('.content_blog .masonry').append( $newItems ).masonry( 'reload' );
                jQuery('.content_blog .masonry').imagesLoaded( function() { // When images are loaded, fire masonry again.
        jQuery('.content_blog .masonry').masonry();
      });
                 tvlgiao_wpdance_load_isotope();
                if(paged <= maxpage ){
                	$("#load_post").attr("disabled",false);
                }else{
                	$("#load_post").hide();
                } 
            });
		/* Act on the event */
	});

    tvlgiao_wpdance_load_isotope();

});    
function tvlgiao_wpdance_load_isotope(){
    jQuery('.masonry').masonry({
        itemSelector: '.wd_item_blog',  
    });
  
}
