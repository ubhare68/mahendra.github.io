<?php global $liwo; ?>
<?php if ($liwo['blog_metas'] != '') { ?>
	<ul class="post_meta_links_small">
		<?php if (in_array('author', $liwo['blog_metas'])): ?>
			<li class="post_by"><?php the_author_posts_link(); ?> </li>
		<?php endif ?>
		
		<?php if (in_array('category', $liwo['blog_metas'])): ?>
			<li class="post_categoty"><?php the_category(', '); ?></li>
		<?php endif ?>

		<?php if (in_array('tag', $liwo['blog_metas'])): ?>
			
	        <?php 
	            $posttags = get_the_tags();
	            if ($posttags) {
	            	$arr_tag = array();
	            	$html = '<li class="post_categoty">';
		            foreach ( $posttags as $tag ) {
		            	$tag_link = get_tag_link( $tag->term_id );
		             	$arr_tag[] = "<a href='{$tag_link}' title='{$tag->name}'>{$tag->name}</a>";
		            }
		            $html .= implode(", ", $arr_tag);
		            $html .= '</li>';
		            echo $html;
	            }
	        ?>
			
		<?php endif ?>

		<?php if (in_array('comment', $liwo['blog_metas'])): ?>
			<li class="post_comments"><a href="<?php echo get_comments_link( $post->ID ); ?>"><?php comments_number( __('0 Comments','themestudio'), __('1 Comment','themestudio'), __('% Comments','themestudio') ); ?></a></li>
		<?php endif ?>
	</ul>
<?php } ?>