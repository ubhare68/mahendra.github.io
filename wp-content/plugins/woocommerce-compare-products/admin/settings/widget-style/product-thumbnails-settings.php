<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/*-----------------------------------------------------------------------------------
WC Compare Widget Product Thumbnails Settings

TABLE OF CONTENTS

- var parent_tab
- var subtab_data
- var option_name
- var form_key
- var position
- var form_fields
- var form_messages

- __construct()
- subtab_init()
- set_default_settings()
- get_settings()
- subtab_data()
- add_subtab()
- settings_form()
- init_form_fields()

-----------------------------------------------------------------------------------*/

class WC_Compare_Widget_Product_Thumbnails_Settings extends WC_Compare_Admin_UI
{
	
	/**
	 * @var string
	 */
	private $parent_tab = 'compare-widget';
	
	/**
	 * @var array
	 */
	private $subtab_data;
	
	/**
	 * @var string
	 * You must change to correct option name that you are working
	 */
	public $option_name = 'woo_compare_widget_thumbnail_style';
	
	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'woo_compare_widget_thumbnail_style';
	
	/**
	 * @var string
	 * You can change the order show of this sub tab in list sub tabs
	 */
	private $position = 5;
	
	/**
	 * @var array
	 */
	public $form_fields = array();
	
	/**
	 * @var array
	 */
	public $form_messages = array();
	
	/*-----------------------------------------------------------------------------------*/
	/* __construct() */
	/* Settings Constructor */
	/*-----------------------------------------------------------------------------------*/
	public function __construct() {
		$this->init_form_fields();
		$this->subtab_init();
		
		$this->form_messages = array(
				'success_message'	=> __( 'Widget Product Thumbnails Settings successfully saved.', 'woo_cp' ),
				'error_message'		=> __( 'Error: Widget Product Thumbnails Settings can not save.', 'woo_cp' ),
				'reset_message'		=> __( 'Widget Product Thumbnails Settings successfully reseted.', 'woo_cp' ),
			);
			
		add_action( $this->plugin_name . '-' . $this->parent_tab . '_tab_end', array( $this, 'include_script' ) );
			
		add_action( $this->plugin_name . '_set_default_settings' , array( $this, 'set_default_settings' ) );
		add_action( $this->plugin_name . '_get_all_settings' , array( $this, 'get_settings' ) );
		
		add_action( $this->plugin_name . '-' . $this->form_key . '_settings_init' , array( $this, 'reset_default_settings' ) );
		
		add_action( $this->plugin_name . '-'. $this->form_key.'_settings_start', array( $this, 'pro_fields_before' ) );
		add_action( $this->plugin_name . '-'. $this->form_key.'_settings_end', array( $this, 'pro_fields_after' ) );
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* subtab_init() */
	/* Sub Tab Init */
	/*-----------------------------------------------------------------------------------*/
	public function subtab_init() {
		
		add_filter( $this->plugin_name . '-' . $this->parent_tab . '_settings_subtabs_array', array( $this, 'add_subtab' ), $this->position );
		
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* set_default_settings()
	/* Set default settings with function called from Admin Interface */
	/*-----------------------------------------------------------------------------------*/
	public function set_default_settings() {
		global $wc_compare_admin_interface;
		
		$wc_compare_admin_interface->reset_settings( $this->form_fields, $this->option_name, false );
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* reset_default_settings()
	/* Reset default settings with function called from Admin Interface */
	/*-----------------------------------------------------------------------------------*/
	public function reset_default_settings() {
		global $wc_compare_admin_interface;
		
		$wc_compare_admin_interface->reset_settings( $this->form_fields, $this->option_name, true, true );
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* get_settings()
	/* Get settings with function called from Admin Interface */
	/*-----------------------------------------------------------------------------------*/
	public function get_settings() {
		global $wc_compare_admin_interface;
		
		$wc_compare_admin_interface->get_settings( $this->form_fields, $this->option_name );
	}
	
	/**
	 * subtab_data()
	 * Get SubTab Data
	 * =============================================
	 * array ( 
	 *		'name'				=> 'my_subtab_name'				: (required) Enter your subtab name that you want to set for this subtab
	 *		'label'				=> 'My SubTab Name'				: (required) Enter the subtab label
	 * 		'callback_function'	=> 'my_callback_function'		: (required) The callback function is called to show content of this subtab
	 * )
	 *
	 */
	public function subtab_data() {
		
		$subtab_data = array( 
			'name'				=> 'product-thumbnails',
			'label'				=> __( 'Product Thumbnails', 'woo_cp' ),
			'callback_function'	=> 'wc_compare_widget_product_thumbnails_settings_form',
		);
		
		if ( $this->subtab_data ) return $this->subtab_data;
		return $this->subtab_data = $subtab_data;
		
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* add_subtab() */
	/* Add Subtab to Admin Init
	/*-----------------------------------------------------------------------------------*/
	public function add_subtab( $subtabs_array ) {
	
		if ( ! is_array( $subtabs_array ) ) $subtabs_array = array();
		$subtabs_array[] = $this->subtab_data();
		
		return $subtabs_array;
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* settings_form() */
	/* Call the form from Admin Interface
	/*-----------------------------------------------------------------------------------*/
	public function settings_form() {
		global $wc_compare_admin_interface;
		
		$output = '';
		$output .= $wc_compare_admin_interface->admin_forms( $this->form_fields, $this->form_key, $this->option_name, $this->form_messages );
		
		return $output;
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* init_form_fields() */
	/* Init all fields of this form */
	/*-----------------------------------------------------------------------------------*/
	public function init_form_fields() {
		
  		// Define settings			
     	$this->form_fields = apply_filters( $this->option_name . '_settings_fields', array(
		
			array(
            	'name' => __( "Product Thumbnails in Widget", 'woo_cp' ),
                'type' => 'heading',
           	),
			array(  
				'name' 		=> __( 'Product Thumbnails', 'woo_cp' ),
				'desc'		=> __('ON to show Product Thumbnails when items added to the Compare Widget.', 'woo_cp'),
				'id' 		=> 'activate_thumbnail',
				'class' 	=> 'activate_thumbnail',
				'type' 		=> 'onoff_checkbox',
				'default'	=> '1',
				'checked_value'		=> '1',
				'unchecked_value'	=> '0',
				'checked_label'		=> __( 'ON', 'woo_cp' ),
				'unchecked_label' 	=> __( 'OFF', 'woo_cp' ),
			),
			
			array(
                'type' 		=> 'heading',
				'class'		=> 'activate_thumbnail_container',
           	),
			array(  
				'name' 		=> __( 'Thumbnail Wide', 'woo_cp' ),
				'desc' 		=> 'px ' .__( "Default <code>'[default_value]'</code>px", 'woo_cp' ),
				'id' 		=> 'thumb_wide',
				'css' 		=> 'width:40px;',
				'type' 		=> 'text',
				'default'	=> 64,
			),
			array(  
				'name' 		=> __( 'Thumbnail Padding', 'woo_cp' ),
				'desc' 		=> 'px ' .__( "Default <code>'[default_value]'</code>px", 'woo_cp' ),
				'id' 		=> 'thumb_padding',
				'css' 		=> 'width:40px;',
				'type' 		=> 'text',
				'default'	=> 2,
			),
			array(  
				'name' 		=> __( "Thumbnail Alignment", 'woo_cp' ),
				'id' 		=> 'thumb_align',
				'css' 		=> 'width:80px;',
				'type' 		=> 'select',
				'default'	=> 'left',
				'options'	=> array(
						'left'			=> __( 'Left', 'woo_cp' ) ,	
						'right'			=> __( 'Right', 'woo_cp' ) ,
					),
			),
			array(  
				'name' 		=> __( 'Thumbnail Background Colour', 'woo_cp' ),
				'desc' 		=> __( 'Default', 'woo_cp' ) . ' [default_value]',
				'id' 		=> 'thumb_bg_colour',
				'type' 		=> 'color',
				'default'	=> '#FFFFFF'
			),
			array(  
				'name' 		=> __( 'Thumbnail Border', 'woo_cp' ),
				'id' 		=> 'thumb_border',
				'type' 		=> 'border',
				'default'	=> array( 'width' => '1px', 'style' => 'solid', 'color' => '#CDCDCE', 'corner' => 'square' , 'top_left_corner' => 3 , 'top_right_corner' => 3 , 'bottom_left_corner' => 3 , 'bottom_right_corner' => 3 ),
			),
			array(  
				'name' 		=> __( 'Thumbnail Shadow', 'woo_cp' ),
				'id' 		=> 'thumb_shadow',
				'type' 		=> 'box_shadow',
				'default'	=> array( 'enable' => 0, 'h_shadow' => '5px' , 'v_shadow' => '5px', 'blur' => '2px' , 'spread' => '2px', 'color' => '#999999', 'inset' => '' )
			),
			
        ));
	}
	
	public function include_script() {
	?>
<script>
(function($) {
$(document).ready(function() {
	if ( $("input.activate_thumbnail:checked").val() == '1') {
		$(".activate_thumbnail_container").slideDown();
		//$(".activate_thumbnail_container").css( {'visibility': 'visible', 'height' : 'auto', 'overflow' : 'inherit'} );
	} else {
		$(".activate_thumbnail_container").slideUp();
		//$(".activate_thumbnail_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden'} );
	}
	$(document).on( "a3rev-ui-onoff_checkbox-switch", '.activate_thumbnail', function( event, value, status ) {
		//$(".activate_thumbnail_container").hide().css( {'visibility': 'visible', 'height' : 'auto', 'overflow' : 'inherit'} );
		if ( status == 'true') {
			$(".activate_thumbnail_container").slideDown();
		} else {
			$(".activate_thumbnail_container").slideUp();
		}
	});
});
})(jQuery);
</script>
    <?php	
	}
}

global $wc_compare_widget_product_thumbnails_settings;
$wc_compare_widget_product_thumbnails_settings = new WC_Compare_Widget_Product_Thumbnails_Settings();

/** 
 * wc_compare_widget_product_thumbnails_settings_form()
 * Define the callback function to show subtab content
 */
function wc_compare_widget_product_thumbnails_settings_form() {
	global $wc_compare_widget_product_thumbnails_settings;
	$wc_compare_widget_product_thumbnails_settings->settings_form();
}

?>