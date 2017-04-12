<?php if(!is_home() & !is_front_page()){ ?>
	<div class="page_title">
	  	<div class="container">
	    	<div class="title">
	      	<h1><?php the_title( ); ?></h1>
	    	</div>
	    	<div class="pagenation"><?php ts_breadcrumbs(); ?></div>
	  	</div>
	</div>
<?php } ?>