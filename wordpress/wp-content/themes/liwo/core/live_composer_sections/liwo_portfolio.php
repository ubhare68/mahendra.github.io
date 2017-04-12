<?php 

add_action('dslc_hook_register_modules',
    create_function('', 'return dslc_register_module( "Liwo_Portfolio" );')
);

class Liwo_Portfolio extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Portfolio';
    var $module_title = 'Projects';
    var $module_icon = 'th';
    var $module_category = 'Liwo - Section';
 
 	// Module Options
    function options() { 
		$filter_choice = '';
		$filter_choices[] = array(
			'label' => 'Projects - Hide Filters',
			'value' => 'none'
		);
		
		$pagination_choices = '';
		$pagination_choices[] = array(
			'label' => 'Hide',
			'value' => 'none'
		);
		$pagination_choices[] = array(
			'label' => 'Show',
			'value' => 'show'
		);

		// Get categories
		$cats = get_categories('taxonomy=dslc_projects_cats');
		$cats_choices = array();

		// Generate usable array of categories
		foreach ( $cats as $cat ) {
			$cats_choices[] = array(
				'label' => $cat->name,
				'value' => $cat->cat_ID
			);
			$filter_choices[] = array(
				'label' => $cat->name,
				'value' => $cat->cat_ID
			);
		}
		
    	// The options array
    	$dslc_options = array(
			
			array(
				'label' => 'Layout',
				'id' => 'layout',
				'std' => '4',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => '4 columns',
						'value' => '4'
					),
					array(
						'label' => '3 columns',
						'value' => '3'
					),
					array(
						'label' => '2 columns',
						'value' => '2'
					)
				),
				'affect_on_change_el' => '.container, .fresh_projects',
			),
           	array(
    			'label' => 'Posts Per Page',
    			'id' => 'amount',
    			'std' => '15',
    			'type' => 'text',
    		),
    		array(
				'label' => 'Filter Type',
				'id' => 'filter-layout',
				'std' => '2',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => 'Button',
						'value' => '1'
					),
					array(
						'label' => 'Text',
						'value' => '2'
					)
				)
			),
			array(
				'label' => 'Sidebar',
				'id' => 'sidebar',
				'std' => 'none',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => 'None',
						'value' => 'none'
					),
					array(
						'label' => 'Left Sidebar',
						'value' => 'left'
					),
					array(
						'label' => 'Right Sidebar',
						'value' => 'right'
					)
				)
			),
    		array(
    			'label' => 'Hide Pagination Buttons?',
    			'id' => 'pagination',
    			'std' => 'none',
    			'type' => 'select',
    			'choices' => $pagination_choices
    		),
    		array(
    			'label' => 'Show Which Categories?',
    			'id' => 'categories',
    			'std' => '',
    			'type' => 'checkbox',
    			'choices' => $cats_choices
    		),
    		array(
    			'label' => 'Show Which Filters?',
    			'id' => 'filters',
    			'std' => '',
    			'type' => 'checkbox',
    			'choices' => $filter_choices
    		),
    		array(
    			'label' => 'Order By',
    			'id' => 'orderby',
    			'std' => 'date',
    			'type' => 'select',
    			'choices' => array(
    				array(
    					'label' => 'Publish Date',
    					'value' => 'date'
    				),
    				array(
    					'label' => 'Modified Date',
    					'value' => 'modified'
    				),
    				array(
    					'label' => 'Random',
    					'value' => 'rand'
    				),
    				array(
    					'label' => 'Alphabetic',
    					'value' => 'title'
    				),
    				array(
    					'label' => 'Comment Count',
    					'value' => 'comment_count'
    				),
    			)
    		),
    		array(
    			'label' => 'Order',
    			'id' => 'order',
    			'std' => 'DESC',
    			'type' => 'select',
    			'choices' => array(
    				array(
    					'label' => 'Ascending',
    					'value' => 'ASC'
    				),
    				array(
    					'label' => 'Descending',
    					'value' => 'DESC'
    				)
    			)
    		),
    		array(
    			'label' => 'Offset',
    			'id' => 'offset',
    			'std' => '0',
    			'type' => 'text',
    		),

    		/*
    		 * Cube config
    		 * cube_config_
    		*/
             array(
                'label' => 'Portfolio Template',
                'id' => 'portfolio_layout_template',
                'std' => 'fullScreen',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => 'Jucy Project',
                        'value' => 'projects'
                    ),
                    array(
                        'label' => 'Full Screen',
                        'value' => 'fullScreen'
                    ),
                    array(
                        'label' => 'Blog Posts',
                        'value' => 'blog'
                    ),
                    array(
                        'label' => 'Lightbox Gallery',
                        'value' => 'gallery'
                    ),
                    array(
                        'label' => 'Masonry',
                        'value' => 'masonry'
                    )
                    // array(
                    //     'label' => 'Meet the Team',
                    //     'value' => 'meet-the-team'
                    // )
                ),
                'section' => 'styling',
                'tab' => 'Cube Config',
            ),

    		array(
    			'label' => __( 'Animation Type', 'dslc_string' ),
    			'id' => 'cube_config_animation_type',
    			'std' => 'scaleSides',
    			'type' => 'select',
    			'choices' => array(
    				array(
    					'label' => 'scaleSides',
    					'value' => 'scaleSides'
    				),
    				array(
    					'label' => 'fadeOut',
    					'value' => 'fadeOut'
    				),
    				array(
    					'label' => 'quicksand',
    					'value' => 'quicksand'
    				),
    				array(
    					'label' => 'boxShadow',
    					'value' => 'boxShadow'
    				),
    				array(
    					'label' => 'bounceLeft',
    					'value' => 'bounceLeft'
    				),
    				array(
    					'label' => 'bounceTop',
    					'value' => 'bounceTop'
    				),
    				array(
    					'label' => 'bounceBottom',
    					'value' => 'bounceBottom'
    				),
    				array(
    					'label' => 'moveLeft',
    					'value' => 'moveLeft'
    				),
    				array(
    					'label' => 'slideLeft',
    					'value' => 'slideLeft'
    				),
    				array(
    					'label' => 'fadeOutTop',
    					'value' => 'fadeOutTop'
    				),
    				array(
    					'label' => 'sequentially',
    					'value' => 'sequentially'
    				),
    				array(
    					'label' => 'skew',
    					'value' => 'skew'
    				),
    				array(
    					'label' => 'slideDelay',
    					'value' => 'slideDelay'
    				),
    				array(
    					'label' => '3d',
    					'value' => '3d'
    				),
    				array(
    					'label' => 'Flip',
    					'value' => 'Flip'
    				),
    				array(
    					'label' => 'rotateSides',
    					'value' => 'rotateSides'
    				),
    				array(
    					'label' => 'flipOutDelay',
    					'value' => 'flipOutDelay'
    				),
    				array(
    					'label' => 'flipOut',
    					'value' => 'flipOut'
    				),
    				array(
    					'label' => 'unfold',
    					'value' => 'unfold'
    				),
    				array(
    					'label' => 'foldLeft',
    					'value' => 'foldLeft'
    				),
    				array(
    					'label' => 'scaleDown',
    					'value' => 'scaleDown'
    				),
    				array(
    					'label' => 'scaleSides',
    					'value' => 'scaleSides'
    				),
    				array(
    					'label' => 'frontRow',
    					'value' => 'frontRow'
    				),
    				array(
    					'label' => 'flipBottom',
    					'value' => 'flipBottom'
    				),
    				array(
    					'label' => 'rotateRoom',
    					'value' => 'rotateRoom'
    				),
    			),
				'section' => 'styling',
				'tab' => 'Cube Config',
    		),
			array(
				'label' => __( 'gapHorizontal', 'dslc_string' ),
				'id' => 'cube_config_gap_horizontal',
				'std' => '0',
				'type' => 'text',
				'section' => 'styling',
				'tab' => 'Cube Config',
			),
			array(
				'label' => __( 'gapVertical', 'dslc_string' ),
				'id' => 'cube_config_gap_vertical',
				'std' => '0',
				'type' => 'text',
				'section' => 'styling',
				'tab' => 'Cube Config',
			),
			array(
    			'label' => __( 'gridAdjustment', 'dslc_string' ),
    			'id' => 'cube_config_grid_adjustment',
    			'std' => 'responsive',
    			'type' => 'select',
    			'choices' => array(
    				array(
    					'label' => 'Default',
    					'value' => 'default'
    				),
    				array(
    					'label' => 'align Center',
    					'value' => 'alignCenter'
    				),
    				array(
    					'label' => 'Responsive',
    					'value' => 'responsive'
    				),
    			),
				'section' => 'styling',
				'tab' => 'Cube Config',
    		),
			array(
    			'label' => __( 'Caption', 'dslc_string' ),
    			'id' => 'cube_config_caption',
    			'std' => 'zoom',
    			'type' => 'select',
    			'choices' => array(
    				array(
    					'label' => 'pushTop',
    					'value' => 'pushTop'
    				),
    				array(
    					'label' => 'pushDown',
    					'value' => 'pushDown'
    				),
    				array(
    					'label' => 'revealBottom',
    					'value' => 'revealBottom'
    				),
    				array(
    					'label' => 'revealTop',
    					'value' => 'revealTop'
    				),
    				array(
    					'label' => 'moveRight',
    					'value' => 'moveRight'
    				),
    				array(
    					'label' => 'moveLeft',
    					'value' => 'moveLeft'
    				),
    				array(
    					'label' => 'overlayBottomPush',
    					'value' => 'overlayBottomPush'
    				),
    				array(
    					'label' => 'overlayBottom',
    					'value' => 'overlayBottom'
    				),
    				array(
    					'label' => 'overlayBottomReveal',
    					'value' => 'overlayBottomReveal'
    				),
    				array(
    					'label' => 'overlayBottomAlong',
    					'value' => 'overlayBottomAlong'
    				),
    				array(
    					'label' => 'overlayRightAlong',
    					'value' => 'overlayRightAlong'
    				),
    				array(
    					'label' => 'minimal',
    					'value' => 'minimal'
    				),
    				array(
    					'label' => 'fadeIn',
    					'value' => 'fadeIn'
    				),
    				array(
    					'label' => 'zoom',
    					'value' => 'zoom'
    				),
    			),
				'section' => 'styling',
				'tab' => 'Cube Config',
    		),
			array(
    			'label' => __( 'displayType', 'dslc_string' ),
    			'id' => 'cube_config_display_type',
    			'std' => 'lazyLoading',
    			'type' => 'select',
    			'choices' => array(
    				array( 
    					'label' => 'default',
    				'value' => 'default',
    				),
					array( 
						'label' => 'fadeIn',
					'value' => 'fadeIn',
					),
					array( 
						'label' => 'lazyLoading',
					'value' => 'lazyLoading',
					),
					array( 
						'label' => 'fadeInToTop',
					'value' => 'fadeInToTop',
					),
					array( 
						'label' => 'sequentially',
					'value' => 'sequentially',
					),
					array( 
						'label' => 'bottomToTop',
					'value' => 'bottomToTop',
					),
    			),
				'section' => 'styling',
				'tab' => 'Cube Config',
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

		$this->module_start( $options );
		
		// Fix for pagination
		if( is_front_page() ) { 
			$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; 
		} else { 
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
		}
		
		// General args
		$args = array(
			'paged' => $paged, 
			'post_type' => 'dslc_projects',
			'posts_per_page' => $options['amount'],
			'order' => $options['order'],
			'orderby' => $options['orderby'],
			'offset' => $options['offset']
		);

		// Category args
		if ( isset( $options['categories'] ) && $options['categories'] !== '' ) {
			$terms = explode( ' ', $options['categories']);
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'dslc_projects_cats',
					'field' => 'id',
					'terms' => $terms,
					'operator' => 'IN',
				)
			);
		}

		// Do the query
		$block_query = new WP_Query( $args );
		?>
	
		<?php
			
			$so_id = rand(20,1000);
			switch ($options['layout']) {
				case '2':
		?>
					<script type="text/javascript">
						jQuery(document).ready(function ($) {
							$(".cbp-item").css({"width":"500px", <?php if($options['portfolio_layout_template'] !='masonry'){  ?>"height":"300px" <?php } ?>});
							$(".cbp-caption-defaultWrap img").css({"width":"100%", "height":"auto" });
						});
					</script>
		<?php
				break;
				
				case '3':
		?>
					<script type="text/javascript">
						jQuery(document).ready(function ($) {
							$(".cbp-item").css({"width":"380px", <?php if($options['portfolio_layout_template'] !='masonry'){  ?>"height":"267px" <?php } ?>});
							$(".cbp-caption-defaultWrap img").css({"width":"100%", "height":"auto" });
						});
					</script>
		<?php
				break;
				
				default:
		?>
					<script type="text/javascript">
						jQuery(document).ready(function ($) {
							$(".cbp-item").css({"width":"280px"});
							$(".cbp-caption-defaultWrap img").css({"width":"100%", "height":"auto" });
						});
					</script>
		<?php
				break;
			}
			ts_cube_js();


			if($options['filter-layout']==1){
				$main_class1	= 'container';
				$filter_classs 	= 'alignRight';
				$filter_text	= '';
					if ($options['portfolio_layout_template'] == 'fullwidth') {
						$main_class1 = '';
					}
			} else {
				$main_class1	= 'fresh_projects';
				$filter_classs	= 'alignCenter';
				$filter_text	= '/';
			}

			switch ($options['sidebar']) {
				case 'left':
					$main_class2 = 'content_right';
				break;
				
				case 'right':
					$main_class2 = 'content_left';
				break;
				
				default:
					$main_class2 = 'container_full';
				break;
			}
		?>
		<?php global $liwo ?>

		<div class="<?php echo $main_class1; echo ' portfolio_'.$options['portfolio_layout_template']; ?>">
    		<div class="<?php echo $main_class2; ?>">
    			<?php
					$elements = $options['filters'];
					if ( ! empty( $elements ) )
						$elements = explode( ' ', trim( $elements ) );
					else
						$elements = array();

					if( in_array( 'none', $elements ) ){
						//nothing
					} else {
				?>
					<div id="filters-container" class="cbp-l-filters-<?php echo $filter_classs; ?>">
		                <button data-filter="*" class="cbp-filter-item-active cbp-filter-item">All</button>
		                <?php 
		                	$filters = get_categories('taxonomy=dslc_projects_cats');
		                	foreach( $filters as $filter ){ 
		                		$terms = explode( ' ', $options['filters']);
								if(!( in_array( $filter->term_id, $terms) ) && trim($options['filters']) !== '' )
									continue;
		                		echo $filter_text.'<button data-filter=".'. $filter->slug .'" class="cbp-filter-item">'. $filter->name .'</button>';
		                	}
		               	?>
		            </div>
				<?php } ?>
				<div id="grid-container<?php echo $so_id; ?>" class="cbp-l-grid-<?php echo $options['portfolio_layout_template'] ?>">
                	<ul>
                		<?php 
					    	if ( $block_query->have_posts() ) : 
					    		while ( $block_query->have_posts() ) : $block_query->the_post();
                                        get_template_part('loop/content', 'portfolio_layout_'.$options['portfolio_layout_template']);
					    		endwhile;	
					    	else : 
					    		get_template_part('loop/content','none');
					    	endif;
					    ?>
                	</ul>
                </div>
                <?php
				  	/**
				  	 * Post pagination, use ts_pagination() first and fall back to default
				  	 */
				  	if( $options['pagination'] !== 'none' )
				  		echo function_exists('ts_pagination') ? ts_pagination($block_query->max_num_pages) : posts_nav_link();
				  	wp_reset_query();
				?>
			</div>
		</div>
		
		<script type="text/javascript">
			jQuery(document).ready(function ($) {

		        var gridContainer = $('#grid-container<?php echo $so_id; ?>'), filtersContainer = $('#filters-container');

		    	// init cubeportfolio
			    gridContainer.cubeportfolio({

			        animationType: '<?php echo $options['cube_config_animation_type']; ?>',

			        gapHorizontal: <?php echo $options['cube_config_gap_horizontal']; ?>,

			        gapVertical: <?php echo $options['cube_config_gap_vertical']; ?>,

			        gridAdjustment: '<?php echo $options['cube_config_grid_adjustment']; ?>',

			        caption: '<?php echo $options['cube_config_caption']; ?>',

			        displayType: '<?php echo $options['cube_config_display_type']; ?>',

			        displayTypeSpeed: 100,

			        // lightbox
			        lightboxDelegate: '.cbp-lightbox',
			        lightboxGallery: true,
			        lightboxTitleSrc: 'data-title',
			        lightboxShowCounter: true,

			        // singlePage popup
			        singlePageDelegate: '.cbp-singlePage',
			        singlePageDeeplinking: true,
			        singlePageStickyNavigation: true,
			        singlePageShowCounter: true,
			        singlePageCallback: function (url, element) {
			            // to update singlePage content use the following method: this.updateSinglePage(yourContent)
			        },

			        // singlePageInline
			        singlePageInlineDelegate: '.cbp-singlePageInline',
			        singlePageInlinePosition: 'above',
			        singlePageInlineShowCounter: true,
			        singlePageInlineCallback: function(url, element) {
			            // to update singlePageInline content use the following method: this.updateSinglePageInline(yourContent)
			        }
			    });

		        //activate filters for cubeportfolio
				filtersContainer.on('click', 'button', function (e) {

				// cache current button clicked
				var me = jQuery(this);

				// add class cbp-filter-item-active on the current button clicked and remove from other buttons
				me.addClass('cbp-filter-item-active').siblings().removeClass('cbp-filter-item-active');

				// call cubeportfolio filter function
				gridContainer.cubeportfolio('filter', me.data('filter'));

				});

		    });
		</script>

		<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
}