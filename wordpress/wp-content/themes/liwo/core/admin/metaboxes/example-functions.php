<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'liwo_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['portfolio_metabox'] = array(
		'id'         => 'liwo_portfolio_metabox',
		'title'      => __( 'Portfolio Metas', 'themestudio' ),
		'pages'      => array( 'dslc_projects' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name'    => __( 'Portfolio Type', 'themestudio' ),
				'desc'    => __( 'field description (optional)', 'themestudio' ),
				'id'      => $prefix . 'portfolio_type',
				'type'    => 'select',
				'options' => array(
					'image' => __( 'Image', 'themestudio' ),
					'slider'   => __( 'Slider', 'themestudio' ),
					'video'     => __( 'Video', 'themestudio' ),
					'soundcloud'=> __('Soundcloud', 'themestudio')
				),
			),
			array(
				'name' => __( 'Portfolio Image', 'themestudio' ),
				'desc' => __( 'Upload an image or enter a URL.', 'themestudio' ),
				'id'   => $prefix . 'portfolio_image',
				'type' => 'file',
			),
			array(
				'name'         => __( 'Portfolio slider', 'themestudio' ),
				'desc'         => __( 'Upload or add multiple images/attachments.', 'themestudio' ),
				'id'           => $prefix . 'portfolio_slider',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),

			array(
				'name' => __( 'Portfolio Video', 'themestudio' ),
				'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'themestudio' ),
				'id'   => $prefix . 'portfolio_video',
				'type' => 'oembed',
			),

			array(
				'name' => __( 'Portfolio Soundcloud', 'themestudio' ),
				'desc' => __( 'Enter a soundcloud URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'themestudio' ),
				'id'   => $prefix . 'portfolio_soundcloud',
				'type' => 'oembed',
			),

			array(
				'name' => __( 'Website URL', 'themestudio' ),
				'desc' => __( 'field description (optional)', 'themestudio' ),
				'id'   => $prefix . 'portfolio_url',
				'type' => 'text_url',
				// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
				// 'repeatable' => true,
			),
		),
	);

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['post_metabox'] = array(

	  'title' => 'Post metas',
	  'pages' => array('post'),
	  'context'    => 'normal',
	  'id'         => 'liwo_post_metas',
	  'priority'   => 'low',
	  'show_names' => true, // Show field names on the left
	  'fields' => array(
		   array(
		       'name' => 'Image gallery',
		       'desc' => '',
		       'id' => $prefix .'image_gallery',
		       'type' => 'file_list',
		       'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		   ),
		   array(
		       'name' => 'Post image',
		       'desc' => 'Upload an image or enter an URL.',
		       'id' => $prefix . 'post_image',
		       'type' => 'file',
		       'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
		   ),
		   array(
		    'name' => __( 'Video oEmbed', 'themestudio' ),
		    'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'themestudio' ),
		    'id'   => $prefix . 'post_video_embed',
		    'type' => 'oembed',
		   ),
		   array(
		    'name' => __( 'Audio oEmbed', 'themestudio' ),
		    'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'themestudio' ),
		    'id'   => $prefix . 'post_audio_embed',
		    'type' => 'oembed',
		   ),
	  	)

	);


	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['service_metabox'] = array(

	  	'title' => 'Services metas',
	  	'pages' => array('service'),
	  	'context'    => 'normal',
	  	'id'         => 'liwo_service_metas',
	  	'priority'   => 'low',
	  	'show_names' => true, // Show field names on the left
	  	'fields' => array(
	  		array(
			    'id'       => $prefix .'service_select_icon',
			    'type'     => 'select',
			    'name'    => __('Select Icon Service', 'themestudio'),
			    'subtitle' => __('A preview of the selected image will appear underneath the select box.', 'themestudio'),
			    'desc'     => '',
			    'options'  => array( 
			    	'fa-adjust'  			=>	'fa-adjust' ,
					'fa-align-center'  		=>	'fa-align-center' ,
					'fa-align-justify'  	=>	'fa-align-justify' ,
					'fa-align-left'  		=>	'fa-align-left' ,
					'fa-align-right'  		=>	'fa-align-right' ,
					'fa-ambulance' 			=>	'fa-ambulance',
					'fa-angle-down' 		=>	'fa-angle-down',
					'fa-angle-left' 		=>	'fa-angle-left',
					'fa-angle-right' 		=>	'fa-angle-right',
					'fa-angle-up' 			=>	'fa-angle-up',
					'fa-arrow-down'  		=>	'fa-arrow-down' ,
					'fa-arrow-left'  		=>	'fa-arrow-left' ,
					'fa-arrow-right'  		=>	'fa-arrow-right' ,
					'fa-arrow-up'  			=>	'fa-arrow-up' ,
					'fa-apple'  			=>	'fa-apple' ,
					'fa-asterisk'  			=>	'fa-asterisk' ,
					'fa-backward'  			=>	'fa-backward' ,
					'fa-ban-circle'  		=>	'fa-ban-circle' ,
					'fa-bar-chart'  		=>	'fa-bar-chart' ,
					'fa-barcode'  			=>	'fa-barcode' ,
					'fa-beaker'  			=>	'fa-beaker' ,
					'fa-beer' 				=>	'fa-beer',
					'fa-bell'  				=>	'fa-bell' ,
					'fa-bell-alt' 			=>	'fa-bell-alt',
					'fa-bug'  				=>	'fa-bug' ,
					'fa-bold'  				=>	'fa-bold' ,
					'fa-bolt'  				=>	'fa-bolt' ,
					'fa-book'  				=>	'fa-book' ,
					'fa-bookmark'  			=>	'fa-bookmark' ,
					'fa-bookmark-empty'  	=>	'fa-bookmark-empty' ,
					'fa-briefcase'  		=>	'fa-briefcase' ,
					'fa-building' 			=>	'fa-building',
					'fa-bullhorn'  			=>	'fa-bullhorn' ,
					'fa-calendar'  			=>	'fa-calendar' ,
					'fa-camera'  			=>	'fa-camera' ,
					'fa-camera-retro'  		=>	'fa-camera-retro' ,
					'fa-caret-down'  		=>	'fa-caret-down' ,
					'fa-caret-left'  		=>	'fa-caret-left' ,
					'fa-caret-right'  		=>	'fa-caret-right' ,
					'fa-caret-up'  			=>	'fa-caret-up' ,
					'fa-certificate'  		=>	'fa-certificate' ,
					'fa-check'  			=>	'fa-check' ,
					'fa-check-empty'  		=>	'fa-check-empty' ,
					'fa-chevron-down'  	=>	'fa-chevron-down' ,
					'fa-chevron-left'  	=>	'fa-chevron-left' ,
					'fa-chevron-right'  	=>	'fa-chevron-right' ,
					'fa-chevron-up'  		=>	'fa-chevron-up' ,
					'fa-circle' 			=>	'fa-circle',
					'fa-circle-arrow-down'  		=>	'fa-circle-arrow-down' ,
					'fa-circle-arrow-left'  		=>	'fa-circle-arrow-left' ,
					'fa-circle-arrow-right'  		=>	'fa-circle-arrow-right' ,
					'fa-circle-arrow-up'  	=>	'fa-circle-arrow-up' ,
					'fa-circle-blank' 		=>	'fa-circle-blank',
					'fa-cloud'  			=>	'fa-cloud' ,
					'fa-cloud-download' 	=>	'fa-cloud-download',
					'fa-cloud-upload' 		=>	'fa-cloud-upload',
					'fa-code' 				=>	'fa-code',
					'fa-coffee' 			=>	'fa-coffee',
					'fa-cog'  				=>	'fa-cog' ,
					'fa-cogs'  				=>	'fa-cogs' ,
					'fa-columns'  			=>	'fa-columns' ,
					'fa-comment'  			=>	'fa-comment' ,
					'fa-comment-alt'  		=>	'fa-comment-alt' ,
					'fa-comments'  			=>	'fa-comments' ,
					'fa-comments-alt'  		=>	'fa-comments-alt' ,
					'fa-copy'  				=>	'fa-copy' ,
					'fa-credit-card'  		=>	'fa-credit-card' ,
					'fa-crop'  				=>	'fa-crop' ,
					'fa-cut'  				=>	'fa-cut' ,
					'fa-dashboard'  		=>	'fa-dashboard' ,
					'fa-desktop' 			=>	'fa-desktop',
					'fa-double-angle-down' 		=>	'fa-double-angle-down',
					'fa-double-angle-left' 		=>	'fa-double-angle-left',
					'fa-double-angle-right' 		=>	'fa-double-angle-right',
					'fa-double-angle-up' 	=>	'fa-double-angle-up',
					'fa-download'  		=>	'fa-download' ,
					'fa-download-alt'  	=>	'fa-download-alt' ,
					'fa-edit'  			=>	'fa-edit' ,
					'fa-eject'  			=>	'fa-eject' ,
					'fa-envelope'  		=>	'fa-envelope' ,
					'fa-envelope-alt'  	=>	'fa-envelope-alt' ,
					'fa-exchange' 			=>	'fa-exchange',
					'fa-exclamation-sign'  =>	'fa-exclamation-sign' ,
					'fa-external-link'  	=>	'fa-external-link' ,
					'fa-eye-close'  		=>	'fa-eye-close' ,
					'fa-eye-open'  		=>	'fa-eye-open' ,
					'fa-facebook'  		=>	'fa-facebook' ,
					'fa-facebook-sign'  	=>	'fa-facebook-sign' ,
					'fa-facetime-video'  	=>	'fa-facetime-video' ,
					'fa-fast-backward'  	=>	'fa-fast-backward' ,
					'fa-fast-forward'  	=>	'fa-fast-forward' ,
					'fa-fighter-jet' 		=>	'fa-fighter-jet',
					'fa-file'  			=>	'fa-file' ,
					'fa-file-alt' 			=>	'fa-file-alt',
					'fa-film'  			=>	'fa-film' ,
					'fa-filter'  			=>	'fa-filter' ,
					'fa-fire'  			=>	'fa-fire' ,
					'fa-flag'  			=>	'fa-flag' ,
					'fa-folder-close'  	=>	'fa-folder-close' ,
					'fa-folder-close-alt' 	=>	'fa-folder-close-alt',
					'fa-folder-open'  		=>	'fa-folder-open' ,
					'fa-folder-open-alt' 	=>	'fa-folder-open-alt',
					'fa-font'  			=>	'fa-font' ,
					'fa-food' 				=>	'fa-food',
					'fa-forward'  			=>	'fa-forward' ,
					'fa-fullscreen'  		=>	'fa-fullscreen' ,
					'fa-gift'  			=>	'fa-gift' ,
					'fa-github'  			=>	'fa-github' ,
					'fa-github-alt' 		=>	'fa-github-alt',
					'fa-github-sign'  		=>	'fa-github-sign' ,
					'fa-glass'  			=>	'fa-glass' ,
					'fa-globe'  			=>	'fa-globe' ,
					'fa-google-plus'  		=>	'fa-google-plus' ,
					'fa-google-plus-sign'  =>	'fa-google-plus-sign' ,
					'fa-group'  			=>	'fa-group' ,
					'fa-h-sign' 			=>	'fa-h-sign',
					'fa-hand-down'  		=>	'fa-hand-down' ,
					'fa-hand-left'  		=>	'fa-hand-left' ,
					'fa-hand-right'  		=>	'fa-hand-right' ,
					'fa-hand-up'  			=>	'fa-hand-up' ,
					'fa-hdd'  				=>	'fa-hdd' ,
					'fa-headphones'  		=>	'fa-headphones' ,
					'fa-heart'  			=>	'fa-heart' ,
					'fa-heart-empty'  		=>	'fa-heart-empty' ,
					'fa-home'  				=>	'fa-home' ,
					'fa-hospital' 			=>	'fa-hospital',
					'fa-html5' 				=>	'fa-html5',
					'fa-inbox'  			=>	'fa-inbox' ,
					'fa-indent-left'  		=>	'fa-indent-left' ,
					'fa-indent-right'  		=>	'fa-indent-right' ,
					'fa-info-sign'  		=>	'fa-info-sign' ,
					'fa-italic'  			=>	'fa-italic' ,
					'fa-key'  				=>	'fa-key' ,
					'fa-laptop' 			=>	'fa-laptop',
					'fa-leaf'  			=>	'fa-leaf' ,
					'fa-legal'  			=>	'fa-legal' ,
					'fa-lemon'  			=>	'fa-lemon' ,
					'fa-lightbulb' 		=>	'fa-lightbulb',
					'fa-link'  			=>	'fa-link' ,
					'fa-linkedin'  		=>	'fa-linkedin' ,
					'fa-linkedin-sign'  	=>	'fa-linkedin-sign' ,
					'fa-list'  			=>	'fa-list' ,
					'fa-list-alt'  		=>	'fa-list-alt' ,
					'fa-list-ol'  			=>	'fa-list-ol' ,
					'fa-list-ul'  			=>	'fa-list-ul' ,
					'fa-lock'  			=>	'fa-lock' ,
					'fa-magic'  			=>	'fa-magic' ,
					'fa-magnet'  			=>	'fa-magnet' ,
					'fa-map-marker'  		=>	'fa-map-marker' ,
					'fa-medkit' 			=>	'fa-medkit',
					'fa-minus'  			=>	'fa-minus' ,
					'fa-minus-sign'  		=>	'fa-minus-sign' ,
					'fa-mobile-phone' 		=>	'fa-mobile-phone',
					'fa-money'  			=>	'fa-money' ,
					'fa-move'  			=>	'fa-move' ,
					'fa-music'  			=>	'fa-music' ,
					'fa-off'  				=>	'fa-off' ,
					'fa-ok'  				=>	'fa-ok' ,
					'fa-ok-circle'  		=>	'fa-ok-circle' ,
					'fa-ok-sign'  			=>	'fa-ok-sign' ,
					'fa-paper-clip'  		=>	'fa-paper-clip' ,
					'fa-paste'  			=>	'fa-paste' ,
					'fa-pause'  			=>	'fa-pause' ,
					'fa-pencil'  			=>	'fa-pencil' ,
					'fa-phone'  			=>	'fa-phone' ,
					'fa-phone-sign'  		=>	'fa-phone-sign' ,
					'fa-picture'  			=>	'fa-picture' ,
					'fa-picture-o'  		=>	'fa-picture-o' ,
					'fa-pinterest'  		=>	'fa-pinterest' ,
					'fa-pinterest-sign'  	=>	'fa-pinterest-sign' ,
					'fa-plane'  			=>	'fa-plane' ,
					'fa-play'  			=>	'fa-play' ,
					'fa-play-circle'  		=>	'fa-play-circle' ,
					'fa-plus'  			=>	'fa-plus' ,
					'fa-plus-sign'  		=>	'fa-plus-sign' ,
					'fa-plus-sign-alt' 	=>	'fa-plus-sign-alt',
					'fa-print'  			=>	'fa-print' ,
					'fa-pushpin'  			=>	'fa-pushpin' ,
					'fa-qrcode'  			=>	'fa-qrcode' ,
					'fa-question-sign'  	=>	'fa-question-sign' ,
					'fa-quote-left' 		=>	'fa-quote-left',
					'fa-quote-right' 		=>	'fa-quote-right',
					'fa-random'  			=>	'fa-random' ,
					'fa-refresh'  			=>	'fa-refresh' ,
					'fa-remove'  			=>	'fa-remove' ,
					'fa-remove-circle'  	=>	'fa-remove-circle' ,
					'fa-remove-sign'  		=>	'fa-remove-sign' ,
					'fa-reorder'  			=>	'fa-reorder' ,
					'fa-repeat'  			=>	'fa-repeat' ,
					'fa-reply' 			=>	'fa-reply',
					'fa-resize-full'  		=>	'fa-resize-full' ,
					'fa-resize-horizontal'  		=>	'fa-resize-horizontal' ,
					'fa-resize-small'  	=>	'fa-resize-small' ,
					'fa-resize-vertical'  	=>	'fa-resize-vertical' ,
					'fa-retweet'  			=>	'fa-retweet' ,
					'fa-road'  			=>	'fa-road' ,
					'fa-rss'  				=>	'fa-rss' ,
					'fa-save'  			=>	'fa-save' ,
					'fa-screenshot'  		=>	'fa-screenshot' ,
					'fa-search'  			=>	'fa-search' ,
					'fa-share'  			=>	'fa-share' ,
					'fa-share-alt'  		=>	'fa-share-alt' ,
					'fa-shopping-cart'  	=>	'fa-shopping-cart' ,
					'fa-sign-blank'  		=>	'fa-sign-blank' ,
					'fa-signal'  			=>	'fa-signal' ,
					'fa-signin'  			=>	'fa-signin' ,
					'fa-signout'  			=>	'fa-signout' ,
					'fa-sitemap'  			=>	'fa-sitemap' ,
					'fa-sort'  			=>	'fa-sort' ,
					'fa-sort-down'  		=>	'fa-sort-down' ,
					'fa-sort-up'  			=>	'fa-sort-up' ,
					'fa-spinner' 			=>	'fa-spinner',
					'fa-star'  			=>	'fa-star' ,
					'fa-star-empty'  		=>	'fa-star-empty' ,
					'fa-star-half'  		=>	'fa-star-half' ,
					'fa-step-backward'  	=>	'fa-step-backward' ,
					'fa-step-forward'  	=>	'fa-step-forward' ,
					'fa-stethoscope' 		=>	'fa-stethoscope',
					'fa-stop'  			=>	'fa-stop' ,
					'fa-strikethrough'  	=>	'fa-strikethrough' ,
					'fa-suitcase' 			=>	'fa-suitcase',
					'fa-table'  			=>	'fa-table' ,
					'fa-tablet' 			=>	'fa-tablet',
					'fa-tag'  				=>	'fa-tag' ,
					'fa-tags'  			=>	'fa-tags' ,
					'fa-tasks'  			=>	'fa-tasks' ,
					'fa-text-height'  		=>	'fa-text-height' ,
					'fa-text-width'  		=>	'fa-text-width' ,
					'fa-th'  				=>	'fa-th' ,
					'fa-th-large'  		=>	'fa-th-large' ,
					'fa-th-list'  			=>	'fa-th-list' ,
					'fa-thumbs-down'  		=>	'fa-thumbs-down' ,
					'fa-thumbs-up'  		=>	'fa-thumbs-up' ,
					'fa-time'  			=>	'fa-time' ,
					'fa-tint'  			=>	'fa-tint' ,
					'fa-trash'  			=>	'fa-trash' ,
					'fa-trophy'  			=>	'fa-trophy' ,
					'fa-truck'  			=>	'fa-truck' ,
					'fa-twitter'  			=>	'fa-twitter' ,
					'fa-twitter-sign'  	=>	'fa-twitter-sign' ,
					'fa-umbrella'  		=>	'fa-umbrella' ,
					'fa-underline'  		=>	'fa-underline' ,
					'fa-undo'  			=>	'fa-undo' ,
					'fa-unlock'  			=>	'fa-unlock' ,
					'fa-upload'  			=>	'fa-upload' ,
					'fa-upload-alt'  		=>	'fa-upload-alt' ,
					'fa-user'  			=>	'fa-user' ,
					'fa-user-md'  			=>	'fa-user-md' ,
					'fa-user-md' 			=>	'fa-user-md',
					'fa-volume-down'  		=>	'fa-volume-down' ,
					'fa-volume-off'  		=>	'fa-volume-off' ,
					'fa-volume-up'  		=>	'fa-volume-up' ,
					'fa-warning-sign'  	=>	'fa-warning-sign' ,
					'fa-wrench'  			=>	'fa-wrench' ,
					'fa-zoom-in'  			=>	'fa-zoom-in' ,
					'fa-zoom-out'	 		=>	'fa-zoom-out'	,
			    ),
			),
			array(
			    'name'    => 'Switch Highlight',
			    'id'      => $prefix . 'service_helight_switch',
			    'type'    => 'radio',
			    'options' => array(
			        '0'   => __( 'Off', 'themestudio' ),
			        '1'   => __( 'On', 'themestudio' ),
			    ),
			),
			array(
				'name' => __( 'Custom Link', 'themestudio' ),
				'desc' => __( 'field description (optional)', 'themestudio' ),
				'id'   => $prefix . 'services_url',
				'type' => 'text_url',
				// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Sub Title', 'themestudio' ),
				'desc' => __( 'field description (optional)', 'themestudio' ),
				'id'   => $prefix . 'sub_title',
				'type' => 'text',
			),
	  	),
	);



	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['galleries_metabox'] = array(
		'id'         => 'galleries_metabox',
		'title'      => __( 'Gallery Metas', 'themestudio' ),
		'pages'      => array( 'studio_gallery' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name'         => __( 'Galleries slider', 'themestudio' ),
				'desc'         => __( 'Upload or add multiple images/attachments.', 'themestudio' ),
				'id'           => $prefix . 'gallery_slider',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),
		),
	);




	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['dslc_staff_metabox'] = array(
		'id'         => 'dslc_staff_metabox',
		'title'      => __( 'Social - Pinterest', 'themestudio' ),
		'pages'      => array( 'dslc_staff' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Social - Pinterest',
				'std' => '',
				'id' => 'dslc_staff_social_pinterest',
				'type' => 'text',
			)
		),
	);



	/**
	 * Metabox to be displayed on a single page ID
	 */
	// $meta_boxes['about_page_metabox'] = array(
	// 	'id'         => 'about_page_metabox',
	// 	'title'      => __( 'About Page Metabox', 'themestudio' ),
	// 	'pages'      => array( 'page', ), // Post type
	// 	'context'    => 'normal',
	// 	'priority'   => 'high',
	// 	'show_names' => true, // Show field names on the left
	// 	'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
	// 	'fields'     => array(
	// 		array(
	// 			'name' => __( 'Test Text', 'themestudio' ),
	// 			'desc' => __( 'field description (optional)', 'themestudio' ),
	// 			'id'   => $prefix . 'test_text',
	// 			'type' => 'text',
	// 		),
	// 	)
	// );

	/**
	 * Repeatable Field Groups
	 */
	// $meta_boxes['field_group'] = array(
	// 	'id'         => 'field_group',
	// 	'title'      => __( 'Repeating Field Group', 'themestudio' ),
	// 	'pages'      => array( 'page', ),
	// 	'fields'     => array(
	// 		array(
	// 			'id'          => $prefix . 'repeat_group',
	// 			'type'        => 'group',
	// 			'description' => __( 'Generates reusable form entries', 'themestudio' ),
	// 			'options'     => array(
	// 				'add_button'    => __( 'Add Another Entry', 'themestudio' ),
	// 				'remove_button' => __( 'Remove Entry', 'themestudio' ),
	// 				'sortable'      => true, // beta
	// 			),
	// 			// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
	// 			'fields'      => array(
	// 				array(
	// 					'name' => 'Entry Title',
	// 					'id'   => 'title',
	// 					'type' => 'text',
	// 					// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	// 				),
	// 				array(
	// 					'name' => 'Description',
	// 					'description' => 'Write a short description for this entry',
	// 					'id'   => 'description',
	// 					'type' => 'textarea_small',
	// 				),
	// 				array(
	// 					'name' => 'Entry Image',
	// 					'id'   => 'image',
	// 					'type' => 'file',
	// 				),
	// 				array(
	// 					'name' => 'Image Caption',
	// 					'id'   => 'image_caption',
	// 					'type' => 'text',
	// 				),
	// 			),
	// 		),
	// 	),
	// );

	/**
	 * Metabox for the user profile screen
	 */
	$meta_boxes['user_edit'] = array(
		'id'         => 'user_edit',
		'title'      => __( 'User Profile Metabox', 'cmb' ),
		'pages'      => array( 'user' ), // Tells CMB to use user_meta vs post_meta
		'show_names' => true,
		'cmb_styles' => false, // Show cmb bundled styles.. not needed on user profile page
		'fields'     => array(
			array(
				'name'     => __( 'Extra Info', 'cmb' ),
				'desc'     => __( 'field description (optional)', 'cmb' ),
				'id'       => $prefix . 'exta_info',
				'type'     => 'title',
				'on_front' => false,
			),
			array(
				'name'    => __( 'Avatar', 'cmb' ),
				'desc'    => __( 'field description (optional)', 'cmb' ),
				'id'      => $prefix . 'avatar',
				'type'    => 'file',
				'save_id' => true,
			),
			array(
				'name' => __( 'Facebook URL', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'facebookurl',
				'type' => 'text_url',
			),
			array(
				'name' => __( 'Twitter URL', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'twitterurl',
				'type' => 'text_url',
			),
			array(
				'name' => __( 'Google+ URL', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'googleplusurl',
				'type' => 'text_url',
			),
			array(
				'name' => __( 'Linkedin URL', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'linkedinurl',
				'type' => 'text_url',
			),
			array(
				'name' => __( 'User Field', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'user_text_field',
				'type' => 'text',
			),
		)
	);

	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb_metabox_form` helper function. See wiki for more info.
	 */
	$meta_boxes['options_page'] = array(
		'id'      => 'options_page',
		'title'   => __( 'Theme Options Metabox', 'cmb' ),
		'show_on' => array( 'key' => 'options-page', 'value' => array( $prefix . 'theme_options', ), ),
		'fields'  => array(
			array(
				'name'    => __( 'Site Background Color', 'cmb' ),
				'desc'    => __( 'field description (optional)', 'cmb' ),
				'id'      => $prefix . 'bg_color',
				'type'    => 'colorpicker',
				'default' => '#ffffff'
			),
		)
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
