<nav class="navbar navbar-default fhmm" role="navigation">
    <div class="navbar-header">
        <button type="button" data-toggle="collapse" data-target="#menu-mega-menu" class="navbar-toggle">Menu <i class="fa fa-bars tbars"></i></button>
    </div><!-- end navbar-header -->
 <?php if( is_page_template('templates/page_one_page.php') )
    {
        ts_onepage_menu_js();
        wp_nav_menu( 
            array( 
            'theme_location'  => 'onepage_menu',
            'items_wrap'      => '<div id="menu-onepage-menu" class="%2$s navbar-collapse collapse"><ul class="nav navbar-nav">%3$s</ul></div>', 
            )
        ); 
        ?>
        <script>
            jQuery(document).ready(function($) {
                
                 jQuery('#menu-onepage-menu').onePageNav({

                    currentClass: 'current_page_item',
                    changeHash: false,
                    scrollSpeed: 900,
                    scrollOffset: 75,
                    scrollThreshold: 0.1,
                    filter: ':not(.external)',
                    begin: function() {
                        //I get fired when the animation is starting
                    },
                    end: function() {
                        //I get fired when the animation is ending
                    },
                    scrollChange: function() {
                        //I get fired when you enter a section and I pass the list item of the section
                    }
                });
            });
        </script>
        <?php

    }else{

        wp_nav_menu( array(
        'theme_location'    => 'mega_menu',
        'depth'             => 0,
        'container'         => false,
        'container_class'   => false,
        // 'menu_class'        => 'nav navbar-nav',
        'items_wrap'        => '<div id="%1$s" class="%2$s navbar-collapse collapse"><ul class="nav navbar-nav">%3$s</ul></div>', 
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new ts_bootstrap_navwalker())
    );

    }
?>
</nav>