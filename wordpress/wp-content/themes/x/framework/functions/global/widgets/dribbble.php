<?php

// =============================================================================
// FUNCTIONS/GLOBAL/WIDGETS/DRIBBBLE.PHP
// -----------------------------------------------------------------------------
// Artfully based on the Okay Dribbble Widget.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Create Widget
//   02. Register Widget
// =============================================================================

// Create Widget
// =============================================================================

class x_dribbble_widget extends WP_Widget {

  function x_dribbble_widget() {
    $widget_ops  = array( 'classname' => 'x-dribbble-widget', 'description' => __( 'Show off your latest Dribbble shots', '__x__' ) );
    $control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'x-dribbble-widget' );
    $this->WP_Widget( 'x-dribbble-widget', __( 'X Dribbble Widget', '__x__' ), $widget_ops, $control_ops );
  }

  function widget( $args, $instance ) {

    include_once( ABSPATH . WPINC . '/feed.php' );
 
    $playerName = $instance['dribbble_name'];
    $shots      = $instance['dribbble_shots'];
  
    if ( function_exists( 'fetch_feed' ) ) :
      $rss = fetch_feed( "http://dribbble.com/players/{$playerName}/shots.rss" );
      add_filter( 'wp_feed_cache_transient_lifetime', create_function( '$a', 'return 1800;' ) );
      if ( ! is_wp_error( $rss ) ) : 
        $items = $rss->get_items( 0, $rss->get_item_quantity( $shots ) );
      endif;
    endif;

    extract( $args );
    $dribbble_title = esc_attr( $instance['dribbble_title'] );
    $dribbble_name  = esc_attr( $instance['dribbble_name'] );
    $dribbble_shots = esc_attr( $instance['dribbble_shots'] );
    echo $before_widget;
    ?>

    <div class="dribbble-widget"> 
      <?php if ( $dribbble_title ) echo $before_title . $dribbble_title . $after_title; ?>
      <ul class="dribbbles x-block-grid three-up cf mvn">
        <?php
        foreach ( $items as $item ) :
          $title       = $item->get_title();
          $link        = $item->get_permalink();
          $date        = $item->get_date( 'F d, Y' );
          $description = $item->get_description();
          preg_match( "/src=\"(http.*(jpg|jpeg|gif|png))/", $description, $image_url );
          $image = $image_url[1];
        ?>
        <li class="dribbble x-block-grid-item"> 
          <a href="<?php echo $link; ?>" class="dribbble-link x-img-thumbnail"><img src="<?php echo $image; ?>" class="dribbble-image" alt="<?php echo $title;?>"/></a> 
        </li>
        <?php endforeach;?>
      </ul>
    </div>

    <?php
    echo $after_widget;
  }

  function update( $new_instance, $old_instance ) {
    $instance                   = $old_instance;
    $instance['dribbble_title'] = $new_instance['dribbble_title'];
    $instance['dribbble_name']  = $new_instance['dribbble_name'];
    $instance['dribbble_shots'] = $new_instance['dribbble_shots'];
    return $instance;
  }

  function form( $instance ) {
    $instance                   = wp_parse_args( (array) $instance, array( 'dribbble_title' => '', 'dribbble_name' => '', 'dribbble_shots' => '') );
    $instance['dribbble_title'] = $instance['dribbble_title'];
    $instance['dribbble_name']  = $instance['dribbble_name'];
    $instance['dribbble_shots'] = $instance['dribbble_shots'];
    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'dribbble_title' ); ?>"><?php _e( 'Title:','__x__' ); ?>
        <input class="widefat" id="<?php echo $this->get_field_id( 'dribbble_title' ); ?>" name="<?php echo $this->get_field_name( 'dribbble_title' ); ?>" type="text" value="<?php if ( isset( $instance['dribbble_title'] ) ) echo $instance['dribbble_title']; ?>" />
      </label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'dribbble_name' ); ?>"><?php _e( 'Username:','__x__' ); ?>
        <input class="widefat" id="<?php echo $this->get_field_id( 'dribbble_name' ); ?>" name="<?php echo $this->get_field_name( 'dribbble_name' ); ?>" type="text" value="<?php if ( isset( $instance['dribbble_name'] ) ) echo $instance['dribbble_name']; ?>" />
      </label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'dribbble_shots' ); ?>"><?php _e( 'Number of Shots:','__x__' ); ?>
        <input class="widefat" id="<?php echo $this->get_field_id( 'dribbble_shots' ); ?>" name="<?php echo $this->get_field_name( 'dribbble_shots' ); ?>" type="text" value="<?php if ( isset( $instance['dribbble_shots'] ) ) echo $instance['dribbble_shots']; ?>" />
      </label>
    </p>

    <?php
  }
}



// Register Widget
// =============================================================================

function x_load_dribbble_widget() {
  register_widget( 'x_dribbble_widget' );
}

add_action( 'widgets_init', 'x_load_dribbble_widget' );