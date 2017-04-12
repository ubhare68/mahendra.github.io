<?php
function wdjewelry_custom_get_archives_link( $link_html ) {
    
   $link_html = str_replace( '</a>', '</a><span>', $link_html );
   $link_html = str_replace( '</li>', '</span></li>', $link_html );
   $link_html = str_replace( '&nbsp;', '', $link_html );
   return $link_html;
}
add_filter( 'get_archives_link', 'wdjewelry_custom_get_archives_link', 1 );