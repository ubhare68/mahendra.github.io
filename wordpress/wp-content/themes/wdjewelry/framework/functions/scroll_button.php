<?php
add_action('wdjewelry_scroll_button','wdjewelry_scroll_button_footer',1);
if (!function_exists('wdjewelry_scroll_button_footer')) {
	function wdjewelry_scroll_button_footer(){?>
		<div id="to-top" class="scroll-button">
			<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"  title="To Top"></a>
		</div>
		<?php
	}
	# code...
}