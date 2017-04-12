<?php 
	/**
	 * archive-dslc_projects.php
	 * The project archive used in Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	 */
	get_header();
	global $liwo;
?>

    <?php if(!is_home() & !is_front_page()){ ?>
	    <div class="page_title">
	      <div class="container">
	        <div class="title">
	          <h1><?php echo get_queried_object()->name; ?></h1>
	        </div>
	        <div class="pagenation"><?php ts_breadcrumbs(); ?><?php echo get_queried_object()->name; ?></div>
	      </div>
	    </div>
	<?php } ?>
    

	<div class="container">
		<?php switch ($liwo['portfolio_page_layout']) {
			case 'left-sidebar':
		?>
				<!-- left sidebar starts -->
			    <div class="left_sidebar">
			    	<?php get_sidebar( 'left' ); ?>
			    </div>
			    <!-- end left sidebar -->
				
				<?php
					$so_id = rand(20,1000);
					switch ($liwo['portfolio_style']) {
						case '2columns':
				?>
							<script type="text/javascript">
								jQuery(document).ready(function ($) {
									$(".cbp-l-grid-masonry .cbp-item").css({"width":"500px"});
									$(".cbp-caption-defaultWrap img").css({"width":"100%", "height":"auto"});
								});
							</script>
				<?php
						break;
						
						case '3columns':
				?>
							<script type="text/javascript">
								jQuery(document).ready(function ($) {
									$(".cbp-l-grid-masonry .cbp-item").css({"width":"380px"});
									$(".cbp-caption-defaultWrap img").css({"width":"100%", "height":"auto"});
								});
							</script>
				<?php
						break;
						
						default:
				?>
							<script type="text/javascript">
								jQuery(document).ready(function ($) {
									$(".cbp-l-grid-masonry .cbp-item").css({"width":"280px"});
									$(".cbp-caption-defaultWrap img").css({"width":"100%", "height":"auto"});
								});
							</script>
				<?php
						break;
					}
				?>
			    

				<div class="content_right">
				    <div id="grid-container<?php echo $so_id; ?>" class="cbp-l-grid-masonry">
		                <ul>
							<?php 
								if ( have_posts() ) : while ( have_posts() ) : the_post();
									
									/**
									 * Get portfolio posts by portfolio layout.
									 */
									//get_template_part('loop/content', 'portfolio_'.$liwo['portfolio_page_layout']);
								?>
									<?php $post_id = (int)get_post_thumbnail_id( ); ?>
									<li class="cbp-item identity cbp-l-grid-masonry-height1">
									    <a class="cbp-caption cbp-lightbox" data-title="<?php the_title( ); ?>" href="<?php echo wp_get_attachment_image_src( $post_id, 'large' )[0]; ?>">
									        <div class="cbp-caption-defaultWrap">
									            <?php the_post_thumbnail( ); ?>
									        </div>
									        <div class="cbp-caption-activeWrap">
									            <div class="cbp-l-caption-alignCenter">
									                <div class="cbp-l-caption-body">
									                    <div class="cbp-l-caption-title"><?php the_title( ); ?></div>
									                    <div class="cbp-l-caption-desc"><?php the_excerpt(); ?></div>
									                </div>
									            </div>
									        </div>
									    </a>
									</li>
								<?php
								endwhile;	
								else : 
									
									/**
									 * Display no posts message if none are found.
									 */
									get_template_part('loop/content','none');
									
								endif;
							?>
						</ul>
				    </div>
				</div>
				
				<script type="text/javascript">
					jQuery(document).ready(function ($) {

				        var gridContainer = $('#grid-container<?php echo $so_id; ?>'), filtersContainer = $('#filters-container');

				    	// init cubeportfolio
					    gridContainer.cubeportfolio({

					        animationType: 'scaleSides',

					        gapHorizontal: 20,

					        gapVertical: 20,

					        gridAdjustment: 'responsive',

					        caption: 'zoom',

					        displayType: 'lazyLoading',

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
			break;
			case 'right-sidebar':
		?>
				<?php
					$so_id = rand(20,1000);
					switch ($liwo['portfolio_style']) {
						case '2columns':
				?>
							<script type="text/javascript">
								jQuery(document).ready(function ($) {
									$(".cbp-l-grid-masonry .cbp-item").css({"width":"500px"});
									$(".cbp-caption-defaultWrap img").css({"width":"100%", "height":"auto"});
								});
							</script>
				<?php
						break;
						
						case '3columns':
				?>
							<script type="text/javascript">
								jQuery(document).ready(function ($) {
									$(".cbp-l-grid-masonry .cbp-item").css({"width":"380px"});
									$(".cbp-caption-defaultWrap img").css({"width":"100%", "height":"auto"});
								});
							</script>
				<?php
						break;
						
						default:
				?>
							<script type="text/javascript">
								jQuery(document).ready(function ($) {
									$(".cbp-l-grid-masonry .cbp-item").css({"width":"280px"});
									$(".cbp-caption-defaultWrap img").css({"width":"100%", "height":"auto"});
								});
							</script>
				<?php
						break;
					}
				?>

				<div class="content_left">
				    <div id="grid-container<?php echo $so_id; ?>" class="cbp-l-grid-masonry">
		                <ul>
							<?php 
								if ( have_posts() ) : while ( have_posts() ) : the_post();
									
									/**
									 * Get portfolio posts by portfolio layout.
									 */
									// get_template_part('loop/content', 'portfolio_'.$liwo['portfolio_page_layout']);
							?>
									<?php $post_id = (int)get_post_thumbnail_id( ); ?>
									<li class="cbp-item identity cbp-l-grid-masonry-height1">
									    <a class="cbp-caption cbp-lightbox" data-title="<?php the_title( ); ?>" href="<?php echo wp_get_attachment_image_src( $post_id, 'large' )[0]; ?>">
									        <div class="cbp-caption-defaultWrap">
									            <?php the_post_thumbnail( ); ?>
									        </div>
									        <div class="cbp-caption-activeWrap">
									            <div class="cbp-l-caption-alignCenter">
									                <div class="cbp-l-caption-body">
									                    <div class="cbp-l-caption-title"><?php the_title( ); ?></div>
									                    <div class="cbp-l-caption-desc"><?php the_excerpt(); ?></div>
									                </div>
									            </div>
									        </div>
									    </a>
									</li>
							<?php
								endwhile;	
								else : 
									
									/**
									 * Display no posts message if none are found.
									 */
									get_template_part('loop/content','none');
									
								endif;
							?>
						</ul>
				    </div>
				</div>

				<script type="text/javascript">
					jQuery(document).ready(function ($) {

				        var gridContainer = $('#grid-container<?php echo $so_id; ?>'), filtersContainer = $('#filters-container');

				    	// init cubeportfolio
					    gridContainer.cubeportfolio({

					        animationType: 'scaleSides',

					        gapHorizontal: 20,

					        gapVertical: 20,

					        gridAdjustment: 'responsive',

					        caption: 'zoom',

					        displayType: 'lazyLoading',

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
				
				<!-- right sidebar starts -->
			    <div class="right_sidebar">
			    	<?php get_sidebar( 'right' ); ?>
			    </div>
			    <!-- end right sidebar -->
			    
		<?php
			break;
			
			default:
		?>
				<?php
					$so_id = rand(20,1000);
					switch ($liwo['portfolio_style']) {
						case '2columns':
				?>
							<script type="text/javascript">
								jQuery(document).ready(function ($) {
									$(".cbp-l-grid-masonry .cbp-item").css({"width":"500px"});
									$(".cbp-caption-defaultWrap img").css({"width":"100%", "height":"auto"});
								});
							</script>
				<?php
						break;
						
						case '3columns':
				?>
							<script type="text/javascript">
								jQuery(document).ready(function ($) {
									$(".cbp-l-grid-masonry .cbp-item").css({"width":"380px"});
									$(".cbp-caption-defaultWrap img").css({"width":"100%", "height":"auto"});
								});
							</script>
				<?php
						break;
						
						default:
				?>
							<script type="text/javascript">
								jQuery(document).ready(function ($) {
									$(".cbp-l-grid-masonry .cbp-item").css({"width":"280px"});
									$(".cbp-caption-defaultWrap img").css({"width":"100%", "height":"auto"});
								});
							</script>
				<?php
						break;
					}
				?>

				<div class="content_fullwidth">
				    <div id="grid-container<?php echo $so_id; ?>" class="cbp-l-grid-masonry">
		                <ul>
							<?php 
								if ( have_posts() ) : while ( have_posts() ) : the_post();
									
									/**
									 * Get portfolio posts by portfolio layout.
									 */
									// get_template_part('loop/content', 'portfolio_'.$liwo['portfolio_page_layout']);
							?>
									<?php $post_id = (int)get_post_thumbnail_id( ); ?>
									<li class="cbp-item identity cbp-l-grid-masonry-height1">
									    <a class="cbp-caption cbp-lightbox" data-title="<?php the_title( ); ?>" href="<?php echo wp_get_attachment_image_src( $post_id, 'large' )[0]; ?>">
									        <div class="cbp-caption-defaultWrap">
									            <?php the_post_thumbnail( ); ?>
									        </div>
									        <div class="cbp-caption-activeWrap">
									            <div class="cbp-l-caption-alignCenter">
									                <div class="cbp-l-caption-body">
									                    <div class="cbp-l-caption-title"><?php the_title( ); ?></div>
									                    <div class="cbp-l-caption-desc"><?php the_excerpt(); ?></div>
									                </div>
									            </div>
									        </div>
									    </a>
									</li>
							<?php
								endwhile;	
								else : 
									
									/**
									 * Display no posts message if none are found.
									 */
									get_template_part('loop/content','none');
									
								endif;
							?>
						</ul>
				    </div>
				</div>

				<script type="text/javascript">
					jQuery(document).ready(function ($) {

				        var gridContainer = $('#grid-container<?php echo $so_id; ?>'), filtersContainer = $('#filters-container');

				    	// init cubeportfolio
					    gridContainer.cubeportfolio({

					        animationType: 'scaleSides',

					        gapHorizontal: 20,

					        gapVertical: 20,

					        gridAdjustment: 'responsive',

					        caption: 'zoom',

					        displayType: 'lazyLoading',

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
			break;
		} ?>
  	</div><!-- /.container --> 
  
<?php 
	get_footer();