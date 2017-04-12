<?php  

	global $liwo;

	if(isset($liwo['sidebars'])){

		/*======== Register widgets ========*/

		$dynamic_sidebar = $liwo['sidebars'];



		if(!empty($dynamic_sidebar))

		{

			foreach($dynamic_sidebar as $sidebar)

			{

				if ( function_exists('register_sidebar') && ($sidebar <> ''))

			    register_sidebar(

			    array(

			    	'name' => str_replace("_"," ",$sidebar),

		            'description' => esc_html__( 'This is land of page sidebar','themestudio' ),		

					'before_title' =>'<div class="sidebar_title"><h3>',

					'after_title' =>'</h3></div>',			

					'before_widget' => '<div   id="%1$s" class="sidebar_widget %2$s">',

					'after_widget' => '</div>',

				));

			}

		}

	}

	if(isset($liwo["footer_widgets"])){

		$footer_widget_style=$liwo["footer_widgets"];

		switch($footer_widget_style)

		{

		   	case '1':

		   	if ( function_exists('register_sidebar'))

			    register_sidebar(

						array(        

							'name' => esc_html__( 'Footer widget 1', 'themestudio' ),

							'description' => esc_html__( 'This is footer widget One','themestudio' ),

							'before_title' =>'<h2 class="widget-title">',

							'after_title' =>'</h2>',				  

							'before_widget' => '<div class="%1$s widget %2$s">',

							'after_widget' => '</div>',

						)

		      		);

		   	break;

		   	case '2':

		   	if ( function_exists('register_sidebar') )

			    register_sidebar(

		      		array(        

							'name' => esc_html__( 'Footer widget 1', 'themestudio' ),

							'description' => esc_html__( 'This is footer widget One','themestudio' ),

							'before_title' =>'<h2 class="widget-title">',

							'after_title' =>'</h2>',			  

							'before_widget' => '<div class="%1$s widget %2$s">',

							'after_widget' => '</div>',		  

					 )

		      		);

		   	if ( function_exists('register_sidebar') )

			    register_sidebar(

		      		array(        

							'name' => esc_html__( 'Footer widget 2', 'themestudio' ),

							'description' => esc_html__( 'This is footer widget Two','themestudio' ),

							'before_title' =>'<h2 class="widget-title">',

							'after_title' =>'</h2>',			  

							'before_widget' => '<div class="%1$s widget %2$s">',

							'after_widget' => '</div>',			  

					 )

		      		);

		   	break;

		   	case '3':

		   	if ( function_exists('register_sidebar') )

			    register_sidebar(

		      		array(        

							'name' => esc_html__( 'Footer widget 1', 'themestudio' ),

							'description' => esc_html__( 'This is footer widget One','themestudio' ),

							'before_title' =>'<h2 class="widget-title">',

							'after_title' =>'</h2>',			  

							'before_widget' => '<div class="%1$s widget %2$s">',

							'after_widget' => '</div>',			  

					 )

		      		);

		   	if ( function_exists('register_sidebar') )

			    register_sidebar(

		      		array(        

							'name' => esc_html__( 'Footer widget 2', 'themestudio' ),

							'description' => esc_html__( 'This is footer widget One','themestudio' ),

							'before_title' =>'<h2 class="widget-title">',

							'after_title' =>'</h2>',			  

							'before_widget' => '<div class="%1$s widget %2$s">',

							'after_widget' => '</div>',			  

					 )

		      		);

			if ( function_exists('register_sidebar') )

			    register_sidebar(

		      		array(        

							'name' => esc_html__( 'Footer widget 3', 'themestudio' ),

							'description' => esc_html__( 'This is footer widget One','themestudio' ),

							'before_title' =>'<h2 class="widget-title">',

							'after_title' =>'</h2>',			  

							'before_widget' => '<div class="%1$s widget %2$s">',

							'after_widget' => '</div>',				  

					 )

		      		);

					

		   	break;

		   	case '4':

		   	if ( function_exists('register_sidebar') )

			    register_sidebar(

		      		array(        

							'name' => esc_html__( 'Footer widget 1', 'themestudio' ),

							'description' => esc_html__( 'This is footer widget One','themestudio' ),

							'before_title' =>'<h2 class="widget-title">',

							'after_title' =>'</h2>',			  

							'before_widget' => '<div class="%1$s widget %2$s">',

							'after_widget' => '</div>',				  

					 )

		      		);

		   	if ( function_exists('register_sidebar') )

			    register_sidebar(

		      		array(        

							'name' => esc_html__( 'Footer widget 2', 'themestudio' ),

							'description' => esc_html__( 'This is footer widget One','themestudio' ),

							'before_title' =>'<h2 class="widget-title">',

							'after_title' =>'</h2>',			  

							'before_widget' => '<div class="%1$s widget %2$s">',

							'after_widget' => '</div>',			  

					 )

		      		);

		   	if ( function_exists('register_sidebar') )

			    register_sidebar(

		      		array(        

							'name' => esc_html__( 'Footer widget 3', 'themestudio' ),

							'description' => esc_html__( 'This is footer widget One','themestudio' ),

							'before_title' =>'<h2 class="widget-title">',

							'after_title' =>'</h2>',			  

							'before_widget' => '<div class="%1$s widget %2$s">',

							'after_widget' => '</div>',			  

					 )

		      		);

			if ( function_exists('register_sidebar') )

			    register_sidebar(

		      		array(        

							'name' => esc_html__( 'Footer widget 4', 'themestudio' ),

							'description' => esc_html__( 'This is footer widget One','themestudio' ),

							'before_title' =>'<h2 class="widget-title">',

							'after_title' =>'</h2>',			  

							'before_widget' => '<div class="%1$s widget %2$s">',

							'after_widget' => '</div>',			  

					 )

		      		);

					

		   	break;

		}

	}



   	if ( function_exists('register_sidebar'))

    register_sidebar(

		array(        

			'name' => esc_html__( 'Contact widget 1', 'themestudio' ),

			'description' => esc_html__( 'This is contact widget address','themestudio' ),

			'before_title' =>'<h3>',

			'after_title' =>'</h3>',				  

			'before_widget' => '<ul><li>',

			'after_widget' => '</ul></li>',

		)

  	);



	if ( function_exists('register_sidebar'))

    register_sidebar(

		array(        

			'name' => esc_html__( 'Contact widget 2', 'themestudio' ),

			'description' => esc_html__( 'This is contact widget map','themestudio' ),

			'before_title' =>'<h3>',

			'after_title' =>'</h3>',				  

			'before_widget' => '<div class="%1$s widget %2$s">',

			'after_widget' => '</div>',

		)

  	);

	

	function filter_widget_title($title) {

		$ex_title 	= explode(" ", $title);



		$arr_count	= count($ex_title)-1;

		if($arr_count>0){

			$ex_title[$arr_count] = '<i>'.$ex_title[$arr_count].'</i>';

		}

		

		$title 		= implode(" ", $ex_title);

		return $title;

    }



	add_filter ( 'widget_title' , 'filter_widget_title');





	function filter_search_form( $form ) {

	    $form = array();



	    $form[] = '<div class="site-search-area">';

	    $form[] = '<form method="get" id="site-searchform" action="'.home_url().'">';

	    $form[] = '<div>';

	    $form[] ='<input class="input-text" name="s" id="s" value="';

	    $form[] = __('Enter Search keywords...','themestudio');

	    $form[] = '" onFocus="if (this.value == ';

	    $form[] = "'".__('Enter Search keywords...','themestudio')."'";

	    $form[] = ") {this.value = '';}";

		$form[] = '" onBlur="if (this.value == ';

		$form[] = "'') {this.value = '";

		$form[] = __('Enter Search keywords...','themestudio');

		$form[] = "';}";

		$form[] = '" type="text" />';

		$form[] = '<input id="searchsubmit" value="Search" type="submit" />';

		$form[] = '</div></form></div>';



	    return implode("", $form);

	}



	add_filter( 'get_search_form', 'filter_search_form' );





	function filter_list_categories ($args)

	{

		$args = array();

		$cats = get_categories($args);

		$html = array();

		

		$html[]= '<ul class="arrows_list1">';



		foreach($cats as $cat):



			$html[]= '<li>';



                $html[]= '<a href="'.get_category_link( $cat->term_id ).'"><i class="fa fa-angle-right"></i> '.$cat->cat_name;



            	$html[]= '</a>';



            $html[]= '</li>';



		endforeach; 



		$html[]= '</ul>';

		return implode(' ', $html);

	}



	add_filter( 'wp_list_categories', 'filter_list_categories' );


/*======== Register post type ========*/
add_action('init', 'service_post_type');

function service_post_type() 
{
    $labels = array(
        'name' => __('Service', 'post type general name', 'themestudio'),
        'singular_name' => __('Service', 'post type singular name', 'themestudio'),
        'add_new' => __('Add New', 'service', 'themestudio'),
        'all_items' => __('All Service', 'themestudio'),
        'add_new_item' => __('Add New Service', 'themestudio'),
        'edit_item' => __('Edit Service', 'themestudio'),
        'new_item' => __('New Service', 'themestudio'),
        'view_item' => __('View Service', 'themestudio'),
        'search_items' => __('Search Service', 'themestudio'),
        'not_found' =>  __('No Service Found', 'themestudio'),
        'not_found_in_trash' => __('No Service Found in Trash', 'themestudio'), 
        'parent_item_colon' => ''
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'service-view', 'with_front' => true),
        'query_var' => true,
        'show_in_nav_menus'=> false,
        'supports' => array('title', 'thumbnail', 'excerpt', 'editor')
    );
    
    add_theme_support( 'post-thumbnails' );
    register_post_type( 'service' , $args );  
    
    register_taxonomy('service-category', 
        array('service'), 
        array(
            'hierarchical' => true, 
            'label' => 'Service Categories',
            'show_admin_column'=>'true',
            'singular_label' => 'Service Category', 
            'rewrite' => true,
            'query_var' => true
        )
    );
}
?>