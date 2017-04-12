<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Table" );')
);

class Liwo_Table extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Table';
    var $module_title = 'Table';
    var $module_icon = 'dollar';
    var $module_category = 'Liwo - Elements';
 
 	// Module Options
    function options() { 
				
    	// The options array
    	$dslc_options = array(
			array(
				'label' => 'Columns Pricing Table',
				'id' => 'columns',
				'std' => '4',
				'type' => 'select',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => '2 Columns',
						'value' => '2'
					),
					array(
						'label' => '3 Columns',
						'value' => '3'
					),
					array(
						'label' => '4 Columns',
						'value' => '4'
					),
					array(
						'label' => '5 Columns',
						'value' => '5'
					),
					array(
						'label' => '6 Columns',
						'value' => '6'
					),
					array(
						'label' => '7 Columns',
						'value' => '7'
					),
					array(
						'label' => '8 Columns',
						'value' => '8'
					),
					array(
						'label' => '9 Columns',
						'value' => '9'
					),
					array(
						'label' => '10 Columns',
						'value' => '10'
					),
					array(
						'label' => '11 Columns',
						'value' => '11'
					),
					array(
						'label' => '12 Columns',
						'value' => '12'
					),
				)
			),

			/*
			 * Column 1
			*/
			array(
				'label' => 'Title',
				'id' => 'title1',
				'std' => 'Header 1',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 1',
			),
			array(
				'label' => 'Content',
				'id' => 'content1',
				'std' => 'Content 1
					Content 2
					Content 3
					Content 4
					Content 5
					Content 6
					Content 7
					Content 8
					Content 9
					Content 10
					Content 11
					Content 12',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 1',
			),

			/*
			 * Column 2
			*/
			array(
				'label' => 'Title',
				'id' => 'title2',
				'std' => 'Header 2',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 2',
			),
			array(
				'label' => 'Content',
				'id' => 'content2',
				'std' => 'Content 1
					Content 2
					Content 3
					Content 4
					Content 5
					Content 6
					Content 7
					Content 8
					Content 9
					Content 10
					Content 11
					Content 12',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 2',
			),

			/*
			 * Column 3
			*/
			array(
				'label' => 'Title',
				'id' => 'title3',
				'std' => 'Header 3',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 3',
			),
			array(
				'label' => 'Content',
				'id' => 'content3',
				'std' => 'Content 1
					Content 2
					Content 3
					Content 4
					Content 5
					Content 6
					Content 7
					Content 8
					Content 9
					Content 10
					Content 11
					Content 12',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 3',
			),
			
			/*
			 * Column 4
			*/
			array(
				'label' => 'Title',
				'id' => 'title4',
				'std' => 'Header 4',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 4',
			),
			array(
				'label' => 'Content',
				'id' => 'content4',
				'std' => 'Content 1
					Content 2
					Content 3
					Content 4
					Content 5
					Content 6
					Content 7
					Content 8
					Content 9
					Content 10
					Content 11
					Content 12',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 4',
			),

			/*
			 * Column 5
			*/
			array(
				'label' => 'Title',
				'id' => 'title5',
				'std' => 'Header 5',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 5',
			),
			array(
				'label' => 'Content',
				'id' => 'content5',
				'std' => 'Content 1
					Content 2
					Content 3
					Content 4
					Content 5
					Content 6
					Content 7
					Content 8
					Content 9
					Content 10
					Content 11
					Content 12',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 5',
			),

			/*
			 * Column 6
			*/
			array(
				'label' => 'Title',
				'id' => 'title6',
				'std' => 'Header 6',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 6',
			),
			array(
				'label' => 'Content',
				'id' => 'content6',
				'std' => 'Content 1
					Content 2
					Content 3
					Content 4
					Content 5
					Content 6
					Content 7
					Content 8
					Content 9
					Content 10
					Content 11
					Content 12',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 6',
			),

			/*
			 * Column 7
			*/
			array(
				'label' => 'Title',
				'id' => 'title7',
				'std' => 'Header 7',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 7',
			),
			array(
				'label' => 'Content',
				'id' => 'content7',
				'std' => 'Content 1
					Content 2
					Content 3
					Content 4
					Content 5
					Content 6
					Content 7
					Content 8
					Content 9
					Content 10
					Content 11
					Content 12',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 7',
			),

			/*
			 * Column 8
			*/
			array(
				'label' => 'Title',
				'id' => 'title8',
				'std' => 'Header 8',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 8',
			),
			array(
				'label' => 'Content',
				'id' => 'content8',
				'std' => 'Content 1
					Content 2
					Content 3
					Content 4
					Content 5
					Content 6
					Content 7
					Content 8
					Content 9
					Content 10
					Content 11
					Content 12',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 8',
			),

			/*
			 * Column 9
			*/
			array(
				'label' => 'Title',
				'id' => 'title9',
				'std' => 'Header 9',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 9',
			),
			array(
				'label' => 'Content',
				'id' => 'content9',
				'std' => 'Content 1
					Content 2
					Content 3
					Content 4
					Content 5
					Content 6
					Content 7
					Content 8
					Content 9
					Content 10
					Content 11
					Content 12',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 9',
			),

			/*
			 * Column 10
			*/
			array(
				'label' => 'Title',
				'id' => 'title10',
				'std' => 'Header 10',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 10',
			),
			array(
				'label' => 'Content',
				'id' => 'content10',
				'std' => 'Content 1
					Content 2
					Content 3
					Content 4
					Content 5
					Content 16
					Content 17
					Content 18
					Content 19
					Content 110
					Content 111
					Content 112',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 10',
			),

			/*
			 * Column 11
			*/
			array(
				'label' => 'Title',
				'id' => 'title11',
				'std' => 'Header 11',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 11',
			),
			array(
				'label' => 'Content',
				'id' => 'content11',
				'std' => 'Content 1
					Content 2
					Content 3
					Content 4
					Content 5
					Content 16
					Content 17
					Content 18
					Content 19
					Content 110
					Content 111
					Content 112',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 11',
			),

			/*
			 * Column 12
			*/
			array(
				'label' => 'Title',
				'id' => 'title12',
				'std' => 'Header 12',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 12',
			),
			array(
				'label' => 'Content',
				'id' => 'content12',
				'std' => 'Content 1
					Content 2
					Content 3
					Content 4
					Content 5
					Content 16
					Content 17
					Content 18
					Content 19
					Content 110
					Content 111
					Content 112',
				'type' => 'textarea',
				'section' => 'styling',
				'tab'		=> 'Column 12',
			),

		);

		$dslc_options = array_merge( $dslc_options, $this->animation_options );
		
    	// Return the array
    	return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

    }
 
 	// Module Output
    function output( $options ) {

    	global $dslc_active;
    	
		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) )
			$dslc_is_admin = true;
		else
			$dslc_is_admin = false;
		
		//REQUIRED
		$this->module_start( $options );

	?>
	<div class="table-style">
          <table class="table-list">
            <tbody><tr>
            <?php for ($i=1; $i <= $options['columns']; $i++) { 
            	echo '<th>'.$options['title'.$i].'</th>';
            } ?>
            </tr>
            <?php for ($i=1; $i <= $options['columns']; $i++) { ?>
	            <tr>
	              <?php 
					$content = stripcslashes( $options['content'.$i] );
					$items = preg_split( '/\r\n|\r|\n/', $content );
					$dem = 1;
					foreach($items as $item){
						if ($options['columns'] >= $dem) {
				   				echo '<td>'.htmlspecialchars_decode( $item ).'</td>';
						}
				   		$dem ++;
					}
					?>
	            </tr>
            <?php } ?>
          </tbody></table>
        </div>
		<div class="clearfix"></div>
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}