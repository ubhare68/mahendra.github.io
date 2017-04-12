<?php
if (!function_exists('wdjewelry_share_social')) {
    function wdjewelry_share_social()
    {
        global $post;
        ?>
		<div class="social_sharing wd-social share-list" style="margin-bottom: 0px">

			<div class="social_icon">
				<div class="facebook" style="margin-bottom: 0px">
					<a class="social_item" data-toggle="tooltip" data-placement="bottom" title="<?php esc_html_e("Facebook", 'wdjewelry')?>" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink()); ?>"><i class=" swing fa fa-facebook"></i></a>
				</div>

				<div class="twitter" style="margin-bottom: 0px">
					<a class="social_item" data-toggle="tooltip" data-placement="bottom" title="<?php esc_html_e("Twitter", 'wdjewelry')?>" href="https://twitter.com/home?status=<?php echo esc_url(get_permalink()); ?>"><i class=" swing fa fa-twitter"></i></a>
				</div>

				<div class="google" style="margin-bottom: 0px">
					<a class="social_item" data-toggle="tooltip" data-placement="bottom" title="<?php esc_html_e("Google +", 'wdjewelry')?>" href="https://plus.google.com/share?url=<?php echo esc_url(get_permalink()); ?>"><i class=" swing fa fa-google-plus"></i></a>
				</div>

				<div class="pinterest" style="margin-bottom: 0px">
					<?php $image_link = wp_get_attachment_url(get_post_thumbnail_id());?>
					<a class="social_item" data-toggle="tooltip" data-placement="bottom" title="<?php esc_html_e("Pin", 'wdjewelry')?>" href="<?php echo esc_url("https://pinterest.com/pin/create/button/?url=" . get_permalink() . '&media=' . $image_link); ?>"><i class=" swing fa fa-pinterest"></i></a>
				</div>

			</div>
		</div>

	<?php
}
}
?>