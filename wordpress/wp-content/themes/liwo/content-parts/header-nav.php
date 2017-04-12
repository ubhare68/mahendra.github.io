<nav class="navbar navbar-default fhmm" role="navigation">
    <div class="navbar-header">
        <button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle">Menu <i class="fa fa-bars tbars"></i></button>
    </div><!-- end navbar-header -->
    <?php
        
        wp_nav_menu(
            array(
                'container'  => '',
                'items_wrap' => '<div id="%1$s defaultmenu" class="%2$s navbar-collapse collapse"><ul class="nav navbar-nav">%3$s</ul></div>', 
                'theme_location' => 'mega_menu', 
                'walker' => new liwo_walker_nav_menu
            )
        );
    ?>
</nav>