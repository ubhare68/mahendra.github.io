<?php
function wdjewelry_edit_background_header()
{

    if (wdjewelry_checkplugin_woocommerce() && is_shop()):
        $id_page = woocommerce_get_page_id('shop');
    else:
        $id_page = get_the_ID();
    endif;

    if ((is_page() || (wdjewelry_checkplugin_woocommerce() && is_shop())) && has_post_thumbnail($id_page)):
        $url = wp_get_attachment_url(get_post_thumbnail_id($id_page));
    else:
        if (get_header_image()) {
            $url = get_header_image();
        }

    endif;

    return isset($url) ? $url : '';
}