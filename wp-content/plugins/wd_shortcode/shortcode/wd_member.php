<?php 
add_shortcode("wd_teammate", "TS_VCSC_Team_Mates_Single_Custom" );

//function show information all  member
  function TS_VCSC_Team_Mates_Single_Custom ($atts, $content = null) {
            global $VISUAL_COMPOSER_EXTENSIONS;
            ob_start();
            extract( shortcode_atts( array(
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'orderby' => 'title',
                'order' => 'ASC',

            ), $atts ));
        
            // Retrieve Team Post Main Content
            $team_array                         = array();
            $args = array(
                'ignore_sticky_posts'           => 1,
                'posts_per_page'                => $posts_per_page,
                'post_type'                     => 'ts_team',
                'post_status'                   => $post_status,
                'orderby'                       => $orderby,
                'order'                         => $order,
            );
            $team_query = new WP_Query($args);
            if ($team_query->have_posts()) {
                foreach($team_query->posts as $p) {
                        $team_data = array(
                            'author'            => $p->post_author,
                            'name'              => $p->post_name,
                            'title'             => $p->post_title,
                            'id'                => $p->ID,
                            'content'           => $p->post_content,
                        );
                        $team_array[] = $team_data;
                    }
            }
            wp_reset_postdata();
            
            // Build Team Post Main Content
            if (count($team_array) > 0){ ?>
                <div class="owl-carousel owl-theme" id='wd-teammate-style-1'>
                    <?php foreach ($team_array as $index => $array) {
                        $Team_Author                    = $team_array[$index]['author'];
                        $Team_Name                      = $team_array[$index]['name'];
                        $Team_Title                     = $team_array[$index]['title'];
                        $Team_ID                        = $team_array[$index]['id'];
                        $Team_Image                     = wp_get_attachment_image_src(get_post_thumbnail_id($Team_ID), 'full');
                        if ($Team_Image == false) {
                            $Team_Image                 = TS_VCSC_GetResourceURL('images/defaults/default_person.jpg');
                        } else {
                            $Team_Image                 = $Team_Image[0];
                        }
                    // Retrieve Team Post Meta Content
                        $custom_fields                      = get_post_custom($Team_ID);
                        $custom_fields_array                = array();
                        foreach ($custom_fields as $field_key => $field_values) {
                            if (!isset($field_values[0])) continue;
                            if (in_array($field_key, array("_edit_lock", "_edit_last"))) continue;
                            if (strpos($field_key, 'ts_vcsc_team_') !== false) {
                                $field_key_split            = explode("_", $field_key);
                                $field_key_length           = count($field_key_split) - 1;
                                $custom_data = array(
                                    'group'                 => $field_key_split[$field_key_length - 1],
                                    'name'                  => 'Team_' . ucfirst($field_key_split[$field_key_length]),
                                    'value'                 => $field_values[0],
                                );
                                $custom_fields_array[] = $custom_data;
                            }
                        }

                        foreach ($custom_fields_array as $index => $array) {
                            ${$custom_fields_array[$index]['name']} = $custom_fields_array[$index]['value'];
                        }
                        if (isset($Team_Position)) {
                            $Team_Position                  = $Team_Position;
                        } else {
                            $Team_Position                  = '';
                        }
                       ?>
                       <div class="item">
                            <div class="wd-teammate-image"><img src="<?php echo esc_attr($Team_Image); ?>"></div>
                            <div class="wd-teammate-content">
                                <p class="wd-temmate-tittle"><?php echo esc_html($Team_Title ); ?></p>
                                <p class="wd-teammate-position"><?php echo esc_html($Team_Position); ?></p>
                            </div>
                       </div>
                    <?php } ?>   
                </div>
            <?php
            }else{
                echo '<div style="text-align: justify; font-weight: bold; font-size: 14px; color: red;">'.esc_html__('please create a teammate in the element setting !','wdfuniture' ).'</div>';
            }
            $myvariable = ob_get_clean();
            return $myvariable;
}