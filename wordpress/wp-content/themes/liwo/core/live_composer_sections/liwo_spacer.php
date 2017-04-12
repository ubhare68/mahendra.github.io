<?php

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Spacer" );')
);


class Liwo_Spacer extends DSLC_Module {

	var $module_id = 'Liwo_Spacer';
	var $module_title = 'Spacer';
	var $module_icon = 'minus';
	var $module_category = 'Liwo - Misc';

	function options() {		

		$dslc_options = array(
			array(
				'label' => 'Spacer - Height',
				'id' => 'height',
				'std' => '40',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.spacer',
				'affect_on_change_rule' => 'height',
				'ext' => 'px',
				'min' => 1,
				'max' => 100,
				'section' => 'styling',
			),
			

		);

		return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

	}

	function output( $options ) {

		global $dslc_active;

		$this->module_start( $options );

		/* Module output stars here */

			?>

			<div class="spacer"> </div>

			<?php

		/* Module output ends here */

		$this->module_end( $options );

	}

}