<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Info_Box" );')
);

class Liwo_Info_Box extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Info_Box';
    var $module_title = 'Info box';
    var $module_icon = 'hand-right';
    var $module_category = 'Liwo - Block';
 
 	// Module Options
    function options() { 

    	// The options array
    	$dslc_options = array(
			array(
				'label' => __('Info Box Title','dslc_string'),
				'id' => 'box_title',
				'std' => 'Sample Title',
				'type' => 'textarea',
				'section' => 'functionality',
			),
			array(
				'label' => __('List Content','dslc_string'),
				'id' => 'content',
				'std' => 'There are many variations
						Lorem Ipsum you need to be sure
						Internet tend to repeat predefined
						Latin words combined with
						This book is treatise on the theory',
				'type' => 'textarea',
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Magrin Bottom', 'dslc_string' ),
				'id' => 'framed_box_margin_bottom',
				'std' => '30',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.framed-box',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'functionality',
				'ext' => 'px',
			),
			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'title_css_bg_color',
				'std' => '#F1F1F1',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.framed-box-wrap .pricing-title',
				'affect_on_change_rule' => 'background-color',
				'tab' => 'Title',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_title_border_color',
				'std' => '#ffffff',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.framed-box-wrap .pricing-title',
				'affect_on_change_rule' => 'border-color',
				'tab' => 'Title',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_title_border_width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.framed-box-wrap .pricing-title',
				'affect_on_change_rule' => 'border-width',
				'tab' => 'Title',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_border_trbl',
				'std' => 'bottom',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Top', 'dslc_string' ),
						'value' => 'top'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'Bottom', 'dslc_string' ),
						'value' => 'bottom'
					),
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.framed-box-wrap .pricing-title',
				'affect_on_change_rule' => 'border-style',
				'tab' => 'Title',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_title_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.framed-box-wrap .pricing-title',
				'affect_on_change_rule' => 'margin-bottom',
				'tab' => 'Title',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Top', 'dslc_string' ),
				'id' => 'css_title_padding_top',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.framed-box-wrap .pricing-title',
				'affect_on_change_rule' => 'padding-top',
				'tab' => 'Title',
				'section' => 'styling',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Bottom', 'dslc_string' ),
				'id' => 'css_title_padding_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.framed-box-wrap .pricing-title',
				'affect_on_change_rule' => 'padding-bottom',
				'tab' => 'Title',
				'section' => 'styling',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_title_padding_horizontal',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.framed-box-wrap .pricing-title',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'tab' => 'Title',
				'section' => 'styling',
				'ext' => 'px'
			),
			array(
				'label' => __( 'List Icon', 'dslc_string' ),
				'id' => 'list_icon',
				'std' => 'fa-check',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __('check','dslc_string'),
						'value' => 'fa-check'
					),
					array(
						'label' => __('cloud upload','dslc_string'),
						'value' => 'fa-cloud-upload'
					),
					array(
						'label' => __('warning','dslc_string'),
						'value' => 'fa-warning'
					),
					array(
						'label' => __('user','dslc_string'),
						'value' => 'fa-user'
					),
					array(
						'label' => __('tag','dslc_string'),
						'value' => 'fa-tag'
					),
					array(
						'label' => __('table','dslc_string'),
						'value' => 'fa-table'
					),
					array(
						'label' => __('star','dslc_string'),
						'value' => 'fa-star'
					),
					array(
						'label' => __('search','dslc_string'),
						'value' => 'fa-search'
					),
					array(
						'label' => __('phone','dslc_string'),
						'value' => 'fa-phone'
					),
					array(
						'label' => __('pencil','dslc_string'),
						'value' => 'fa-pencil'
					),
					array(
						'label' => __('share','dslc_string'),
						'value' => 'fa-share'
					),
					array(
						'label' => __('music','dslc_string'),
						'value' => 'fa-music'
					),
					array(
						'label' => __('hand right','dslc_string'),
						'value' => 'fa-hand-o-right'
					),
					array(
						'label' => __('thumbs down','dslc_string'),
						'value' => 'fa-thumbs-down'
					),
					array(
						'label' => __('thumbs-up','dslc_string'),
						'value' => 'fa-thumbs-up'
					),
					array(
						'label' => __('globe','dslc_string'),
						'value' => 'fa-globe'
					),
					array(
						'label' => __('hospital','dslc_string'),
						'value' => 'fa-hospital'
					),
					array(
						'label' => __('coffee','dslc_string'),
						'value' => 'fa-coffee'
					),
					array(
						'label' => __('list','dslc_string'),
						'value' => 'fa-th-list'
					),
					array(
						'label' => __('comment','dslc_string'),
						'value' => 'fa-comment'
					),
					array(
						'label' => __('play circle','dslc_string'),
						'value' => 'fa-play-circle'
					),
					array(
						'label' => __('times','dslc_string'),
						'value' => 'fa-times'
					),
					array(
						'label' => __('lock','dslc_string'),
						'value' => 'fa-lock'
					),
					array(
						'label' => __('shopping-cart','dslc_string'),
						'value' => 'fa-shopping-cart'
					),
					array(
						'label' => __('dollar','dslc_string'),
						'value' => 'fa-dollar'
					),
					array(
						'label' => __('info','dslc_string'),
						'value' => 'fa-info'
					),
					array(
						'label' => __('question','dslc_string'),
						'value' => 'fa-question'
					),
					array(
						'label' => __('minus','dslc_string'),
						'value' => 'fa-minus'
					),
					array(
						'label' => __('plus','dslc_string'),
						'value' => 'fa-plus'
					),
					array(
						'label' => __('folder open','dslc_string'),
						'value' => 'fa-folder-open'
					),
					array(
						'label' => __('file','dslc_string'),
						'value' => 'fa-file'
					),
					array(
						'label' => __('envelope','dslc_string'),
						'value' => 'fa-envelope'
					),
					array(
						'label' => __('edit','dslc_string'),
						'value' => 'fa-edit'
					),
					array(
						'label' => __('cog','dslc_string'),
						'value' => 'fa-cog'
					),
					array(
						'label' => __('camera','dslc_string'),
						'value' => 'fa-camera'
					),
					array(
						'label' => __('calendar','dslc_string'),
						'value' => 'fa-calendar'
					),
					array(
						'label' => __('bookmark','dslc_string'),
						'value' => 'fa-bookmark'
					),
					array(
						'label' => __('book','dslc_string'),
						'value' => 'fa-book'
					),
					array(
						'label' => __('quote left','dslc_string'),
						'value' => 'fa-quote-left'
					),
					array(
						'label' => __('download','dslc_string'),
						'value' => 'fa-download'
					),
					array(
						'label' => __('html5','dslc_string'),
						'value' => 'fa-html5'
					),
					array(
						'label' => __('home','dslc_string'),
						'value' => 'fa-home'
					),
					array(
						'label' => __('laptop','dslc_string'),
						'value' => 'fa-laptop'
					),
					array(
						'label' => __('key','dslc_string'),
						'value' => 'fa-key'
					),
					array(
						'label' => __('fa-heart', 'dslc_string'),
						'value' => 'fa-heart'
					),
					array(
						'label' => __('fa-star-o', 'dslc_string'),
						'value' => 'fa-star-o'
					),
					
				),
				'section' => 'styling',
				'tab' => 'List',
			),
			array(
					'label' => __('Button title','dslc_string'),
					'id' => 'button_text',
					'std' => 'Click here',
					'type' => 'textarea',
					'section' => 'styling',
					'tab' => 'Button',
				),
			array(
					'label' => __('Button Link','dslc_string'),
					'id' => 'button_link',
					'std' => '#',
					'type' => 'textarea',
					'section' => 'styling',
					'tab' => 'Button',
				),
			array(
				'label' => __( 'Button Text Color', 'dslc_string' ),
				'id' => 'css_button_button_text_color',
				'std' => '#ffffff',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.framed-box-wrap a.info_box_button',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Button Icon', 'dslc_string' ),
				'id' => 'button_icon',
				'std' => 'fa-check',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __('fa-chevron-circle-right', 'dslc_string'),
						'value' => 'fa-chevron-circle-right'
					),
					array(
						'label' => __('fa-thumbs-up', 'dslc_string'),
						'value' => 'fa-thumbs-up'
					),
					array(
						'label' => __('fa-thumbs-down', 'dslc_string'),
						'value' => 'fa-thumbs-down'
					),
					array(
						'label' => __('fa-caret-right', 'dslc_string'),
						'value' => 'fa-caret-right'
					),
					array(
						'label' => __('fa-arrow-circle-right', 'dslc_string'),
						'value' => 'fa-arrow-circle-right'
					),
					array(
						'label' => __('fa-arrow-right', 'dslc_string'),
						'value' => 'fa-arrow-right'
					),
					array(
						'label' => __('fa-angle-double-right', 'dslc_string'),
						'value' => 'fa-angle-double-right'
					),
					array(
						'label' => __('fa-bookmark', 'dslc_string'),
						'value' => 'fa-bookmark'
					),
					array(
						'label' => __('fa-heart', 'dslc_string'),
						'value' => 'fa-heart'
					),
					array(
						'label' => __('fa-check', 'dslc_string'),
						'value' => 'fa-check'
					),
					array(
						'label' => __('fa-camera', 'dslc_string'),
						'value' => 'fa-camera'
					),
					array(
						'label' => __('fa-check-square', 'dslc_string'),
						'value' => 'fa-check-square'
					),
					array(
						'label' => __('fa-anchor', 'dslc_string'),
						'value' => 'fa-anchor'
					),
					array(
						'label' => __('fa-asterisk', 'dslc_string'),
						'value' => 'fa-asterisk'
					),
					array(
						'label' => __('fa-calendar', 'dslc_string'),
						'value' => 'fa-calendar'
					),
					array(
						'label' => __('fa-dashboard', 'dslc_string'),
						'value' => 'fa-dashboard'
					),
					array(
						'label' => __('fa-exclamation', 'dslc_string'),
						'value' => 'fa-exclamation'
					),
					array(
						'label' => __('fa-crop', 'dslc_string'),
						'value' => 'fa-crop'
					),
					array(
						'label' => __('fa-flag', 'dslc_string'),
						'value' => 'fa-flag'
					),
					array(
						'label' => __('fa-female', 'dslc_string'),
						'value' => 'fa-female'
					),
					array(
						'label' => __('fa-cloud-upload', 'dslc_string'),
						'value' => 'fa-cloud-upload'
					),
					array(
						'label' => __('fa-comment', 'dslc_string'),
						'value' => 'fa-comment'
					),
					array(
						'label' => __('fa-glass', 'dslc_string'),
						'value' => 'fa-glass'
					),
					array(
						'label' => __('fa-home', 'dslc_string'),
						'value' => 'fa-home'
					),
					array(
						'label' => __('fa-magnet', 'dslc_string'),
						'value' => 'fa-magnet'
					),
					array(
						'label' => __('fa-picture-o', 'dslc_string'),
						'value' => 'fa-picture-o'
					),
					array(
						'label' => __('fa-puzzle-piece', 'dslc_string'),
						'value' => 'fa-puzzle-piece'
					),
					array(
						'label' => __('fa-star', 'dslc_string'),
						'value' => 'fa-star'
					),
					array(
						'label' => __('fa-volume-up', 'dslc_string'),
						'value' => 'fa-volume-up'
					),
					array(
						'label' => __('fa-clock-o', 'dslc_string'),
						'value' => 'fa-clock-o'
					),
					array(
						'label' => __('fa-truck', 'dslc_string'),
						'value' => 'fa-truck'
					),
					array(
						'label' => __('fa-user', 'dslc_string'),
						'value' => 'fa-user'
					),
					array(
						'label' => __('fa-download', 'dslc_string'),
						'value' => 'fa-download'
					)
					),
				'section' => 'styling',
				'tab' => 'Button',
			),
			array(
				'label' => __( 'Button Style', 'dslc_string' ),
				'id' => 'button_style',
				'std' => 'but_download',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __('Style 1', 'dslc_string'),
						'value' => 'but_goback'
						),
					array(
						'label' => __('Style 2', 'dslc_string'),
						'value' => 'but_ok_2'
						),
					array(
						'label' => __('Style 3', 'dslc_string'),
						'value' => 'but_wifi'
						),
					array(
						'label' => __('Style 4', 'dslc_string'),
						'value' => 'but_warning_sign'
						),
					array(
						'label' => __('Style 5', 'dslc_string'),
						'value' => 'but_user'
						),
					array(
						'label' => __('Style 6', 'dslc_string'),
						'value' => 'but_tag'
						),
					array(
						'label' => __('Style 7', 'dslc_string'),
						'value' => 'but_table'
						),
					array(
						'label' => __('Style 8', 'dslc_string'),
						'value' => 'but_star'
						),
					array(
						'label' => __('Style 9', 'dslc_string'),
						'value' => 'but_search'
						),
					array(
						'label' => __('Style 10', 'dslc_string'),
						'value' => 'but_phone'
						),
					array(
						'label' => __('Style 11', 'dslc_string'),
						'value' => 'but_pencil'
						),
					array(
						'label' => __('Style 12', 'dslc_string'),
						'value' => 'but_new_window'
						),
					array(
						'label' => __('Style 13', 'dslc_string'),
						'value' => 'but_music'
						),
					array(
						'label' => __('Style 14', 'dslc_string'),
						'value' => 'but_hand_right'
						),
					array(
						'label' => __('Style 15', 'dslc_string'),
						'value' => 'but_thumbs_down'
						),
					array(
						'label' => __('Style 16', 'dslc_string'),
						'value' => 'but_thumbs_up'
						),
					array(
						'label' => __('Style 17', 'dslc_string'),
						'value' => 'but_globe'
						),
					array(
						'label' => __('Style 18', 'dslc_string'),
						'value' => 'but_hospital'
						),
					array(
						'label' => __('Style 19', 'dslc_string'),
						'value' => 'but_coffe_cup'
						),
					array(
						'label' => __('Style 20', 'dslc_string'),
						'value' => 'but_settings'
						),
					array(
						'label' => __('Style 21', 'dslc_string'),
						'value' => 'but_chat'
						),
					array(
						'label' => __('Style 22', 'dslc_string'),
						'value' => 'but_play_array'
						),
					array(
						'label' => __('Style 23', 'dslc_string'),
						'value' => 'but_remove_2'
						),
					array(
						'label' => __('Style 24', 'dslc_string'),
						'value' => 'but_lock'
						),
					array(
						'label' => __('Style 25', 'dslc_string'),
						'value' => 'but_shopping_cart'
						),
					array(
						'label' => __('Style 26', 'dslc_string'),
						'value' => 'but_exclamation_mark'
						),
					array(
						'label' => __('Style 27', 'dslc_string'),
						'value' => 'but_info'
						),
					array(
						'label' => __('Style 28', 'dslc_string'),
						'value' => 'but_question_mark'
						),
					array(
						'label' => __('Style 29', 'dslc_string'),
						'value' => 'but_minus'
						),
					array(
						'label' => __('Style 30', 'dslc_string'),
						'value' => 'but_plus'
						),
					array(
						'label' => __('Style 31', 'dslc_string'),
						'value' => 'but_folder_open'
						),
					array(
						'label' => __('Style 32', 'dslc_string'),
						'value' => 'but_file'
						),
					array(
						'label' => __('Style 33', 'dslc_string'),
						'value' => 'but_envelope'
						),
					array(
						'label' => __('Style 34', 'dslc_string'),
						'value' => 'but_edit'
						),
					array(
						'label' => __('Style 35', 'dslc_string'),
						'value' => 'but_cogwheel'
						),
					array(
						'label' => __('Style 36', 'dslc_string'),
						'value' => 'but_check'
						),
					array(
						'label' => __('Style 37', 'dslc_string'),
						'value' => 'but_camera'
						),
					array(
						'label' => __('Style 38', 'dslc_string'),
						'value' => 'but_calendar'
						),
					array(
						'label' => __('Style 39', 'dslc_string'),
						'value' => 'but_bookmark'
						),
					array(
						'label' => __('Style 40', 'dslc_string'),
						'value' => 'but_book'
						),
					array(
						'label' => __('Style 41', 'dslc_string'),
						'value' => 'but_download'
						),
					array(
						'label' => __('Style 42', 'dslc_string'),
						'value' => 'but_pdf'
						),
					array(
						'label' => __('Style 43', 'dslc_string'),
						'value' => 'but_word_doc'
						),
					array(
						'label' => __('Style 44', 'dslc_string'),
						'value' => 'but_woman'
						),
					),
				'section' => 'styling',
				'tab' => 'Button',
				),
			array(
				'label' => __( 'Button align', 'dslc_string' ),
				'id' => 'button_align',
				'std' => 'left',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.button_wrapper',
				'affect_on_change_rule' => 'text-align',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __('Align left', 'dslc_string'),
						'value' => 'left'
						),
					array(
						'label' => __('Align Right', 'dslc_string'),
						'value' => 'right'
						),
					array(
						'label' => __('Align center', 'dslc_string'),
						'value' => 'center'
						),
					),
				'section' => 'styling',
				'tab' => 'Button',
				)
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
		<div class="framed-box">
		  <div class="framed-box-wrap">
		    <div class="pricing-title">
		      <h3><?php echo $options['box_title'] ?></h3>
		    </div>
		    <div class="pricing-text-list">
		      <ul class="list1">

		      <?php 
					$content = stripcslashes( $options['content'] );
					$items = preg_split( '/\r\n|\r|\n/', $content );
					foreach($items as $item){
				   		echo '<li><i class="fa '.$options['list_icon'].'"></i> '.htmlspecialchars_decode( $item ).'</li>';

					}
					?>
		      </ul>
		      <br>
		      <p class="button_wrapper"><a class="<?php echo $options['button_style'] ?>" href="<?php echo $options['button_link'] ?>"><i class="fa <?php echo $options['button_icon'] ?>"></i> <?php echo $options['button_text'] ?></a></p>
		    </div>
		  </div>
		</div>



		<div class="clearfix"></div>
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}