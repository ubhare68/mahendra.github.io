<?php if(!is_home() & !is_front_page()){ ?>
    <div class="page_title">
      <div class="container">
        <div class="title">
          <h1><?php the_title(); ?></h1>
        </div>
        <div class="pagenation">&nbsp;<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> <i>/</i> <?php the_title(); ?></div>
      </div>
    </div>
<?php } ?>