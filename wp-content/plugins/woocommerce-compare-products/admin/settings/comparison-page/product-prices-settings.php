<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/*-----------------------------------------------------------------------------------
WC Comparison Page Product Prices Settings

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

class WC_Compare_Comparison_Page_Product_Prices_Settings extends WC_Compare_Admin_UI
{
	
	/**
	 * @var string
	 */
	private $parent_tab = 'comparison-page';
	
	/**
	 * @var array
	 */
	private $subtab_data;
	
	/**
	 * @var string
	 * You must change to correct option name that you are working
	 */
	public $option_name = 'woo_compare_product_prices_style';
	
	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'woo_compare_product_prices_style';
	
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
				'success_message'	=> __( 'Product Prices Settings successfully saved.', 'woo_cp' ),
				'error_message'		=> __( 'Error: Product Prices Settings can not save.', 'woo_cp' ),
				'reset_message'		=> __( 'Product Prices Settings successfully reseted.', 'woo_cp' ),
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
			'name'				=> 'product-prices',
			'label'				=> __( 'Product Prices', 'woo_cp' ),
			'callback_function'	=> 'wc_compare_comparison_page_product_prices_settings_form',
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
            	'name' 		=> __( "Product Prices On Compare Table", 'woo_cp' ),
                'type' 		=> 'heading',
           	),
			array(  
				'name' 		=> __( "Product Price", 'woo_cp' ),
				'class'		=> 'disable_product_price',
				'id' 		=> 'disable_product_price',
				'type' 		=> 'onoff_checkbox',
				'default'	=> 0,
				'checked_value'		=> 0,
				'unchecked_value' 	=> 1,
				'checked_label'		=> __( 'ON', 'woo_cp' ),
				'unchecked_label' 	=> __( 'OFF', 'woo_cp' ),
			),
			
			array(
				'name' 		=> __( 'Product Price Settings', 'woo_cp' ),
                'type' 		=> 'heading',
				'class'		=> 'product_price_activated_container',
           	),
			array(  
				'name' 		=> __( "Product Price Position", 'woo_cp' ),
				'desc' 		=> __( "Default <code>Top and Bottom</code>.", 'woo_cp' ),
				'id' 		=> 'product_price_position',
				'css' 		=> 'width:160px;',
				'type' 		=> 'select',
				'default'	=> 'both',
				'options'	=> array(
						'both'			=> __( 'Top and Bottom', 'woo_cp' ) ,	
						'top'			=> __( 'Top Only', 'woo_cp' ) ,	
						'bottom'		=> __( 'Bottom Only', 'woo_cp' ) ,
					),
			),
			array(  
				'name' 		=> __( 'Price Font', 'woo_cp' ),
				'id' 		=> 'price_font',
				'type' 		=> 'typography',
				'default'	=> array( 'size' => '16px', 'face' => 'Arial, sans-serif', 'style' => 'bold', 'color' => '#CC3300' )
			),
			
        ));
	}
	
	public function include_script() {
	?>
<script>
(function($) {
$(document).ready(function() {
	if ( $("input.disable_product_price:checked").val() == '0') {
		$(".product_price_activated_container").slideDown();
		//$(".product_price_activated_container").css( {'visibility': 'visible', 'height' : 'auto', 'overflow' : 'inherit'} );
	} else {
		$(".product_price_activated_container").slideUp();
		//$(".product_price_activated_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden'} );
	}
	
	$(document).on( "a3rev-ui-onoff_checkbox-switch", '.disable_product_price', function( event, value, status ) {
		//$(".product_price_activated_container").hide().css( {'visibility': 'visible', 'height' : 'auto', 'overflow' : 'inherit'} );
		if ( status == 'true' ) {
			$(".product_price_activated_container").slideDown();
		} else {
			$(".product_price_activated_container").slideUp();
		}
	});
	
});
})(jQuery);
</script>
    <?php	
	}
}

global $wc_compare_comparison_page_product_prices_settings;
$wc_compare_comparison_page_product_prices_settings = new WC_Compare_Comparison_Page_Product_Prices_Settings();

/** 
 * wc_compare_comparison_page_product_prices_settings_form()
 * Define the callback function to show subtab content
 */
function wc_compare_comparison_page_product_prices_settings_form() {
	global $wc_compare_comparison_page_product_prices_settings;
	$wc_compare_comparison_page_product_prices_settings->settings_form();
}

?>