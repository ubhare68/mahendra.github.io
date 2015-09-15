<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      date.php
* Brief:       
*      Theme date page code
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com   
***********************************************************************/ 

    get_header();     
    the_post();
    
    global $post;
    global $more;    // Declare global $more (before the loop).
    global $wp_query;
                                                      
    $pageid = $post->ID;
    $year = (get_query_var('year')) ? get_query_var('year') : '';
    $month = (get_query_var('monthnum')) ? get_query_var('monthnum') : '';
    $m = get_query_var('m');
    if($month == '')
    {
        $month = (int)substr($m, 4, 2);
        $year = (int)substr($m, 0, 4);
    }
    $timestamp = mktime(0, 0, 0, $month, 1, 2010);
    $monthname = date('F', $timestamp);   
    
    $dccp = GetDCCPInterface();     
                                       
?>

    <div class="navigation-tree-container">        
        <?php dcf_naviTree($post->ID, 0, 'Archive for '.$monthname.' '.$year); ?> 
    </div>

    <div id="content">
    
        <?php 
            $dccp->getIGeneral()->includeSidebar($pageid);
            if($dccp->getIGeneral()->getSidebarOnRight())
            {
                echo '<div class="page-width-600-left">';
            } else
            {
               echo '<div class="page-width-600">'; 
            }
                        
            echo '<h1>'.'Archive for '.$monthname.' '.$year.'</h1>';
            
            echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>';
               
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;            
            $args=array('paged'=>$paged,'year'=>$year,'monthnum'=>$month);           
            
            query_posts($args);                         
            $max_page = $wp_query->max_num_pages;

                             
            if(have_posts())
            {
                while(have_posts())
                {
                    the_post();
                    $imagepath = get_post_meta($post->ID, 'post_image', true);
                    $imagedesc = get_post_meta($post->ID, 'post_image_desc', true);
                    $videopath = get_post_meta($post->ID, 'post_video', true);
                    $disablevideo = get_post_meta($post->ID, 'post_disable_video', true); 
                    $postdesc = get_post_meta($post->ID, 'post_desc', true);
                    $novoting = get_post_meta($post->ID, 'post_novoting', true);                
                    $more = 0;
                    
                    $month = get_the_time('n', $post->ID);
                    $year = get_the_time('Y', $post->ID);
                    
                    $out = '';
                    $out .= '<div class="blog-post">';   
                                            
                        if($videopath != '' and $disablevideo == '')
                        {
                            $out .= '<div class="photo">'.do_shortcode($videopath).' '.$imagedesc.'</div>';
                        } else
                        if($imagepath != '')
                        {
                            $out .= '<div class="photo"><a class="async-img image" href="'.get_permalink($post->ID).'" rel="'.$imagepath.'" ></a>'.$imagedesc.'</div>'; 
                        } else
                        {
                            $out .= '<div class="no-photo-spliter"></div>';
                        }                                      
                             
                        $out .= '<div class="post-content">';
                          
                        if('open' == $post->comment_status) 
                        {                         
                            $out .= '<a href="'.get_comments_link($post->ID).'" class="comments">'.get_comments_number($post->ID).'</a>';                     
                        }
                            
                        $out .= '<div class="info">
                                <a class="date-left"></a><a href="'.get_month_link($year, $month).'" class="date">'.get_the_time('F j, Y').'</a><a class="date-right"></a>
                                Posted by&nbsp;<a href="'.get_author_posts_url($post->post_author).'" class="author">'.get_the_author_meta('nickname', $post->post_author).'</a> in ';
                                
                                $catlist = wp_get_post_categories($post->ID);
                                $count = count($catlist);
                                for($i = 0; $i < $count; $i++)
                                {
                                    if($i > 0)
                                    {
                                       $out .= ', '; 
                                    }
                                    $cat = get_category($catlist[$i]);
                                    $out .= '<a href="'.get_category_link($catlist[$i]).'" >'.$cat->name.'</a>';
                                     
                                }                                
                            
                            $out .= '</div>';
                              
                            $out .= '<a href="'.get_permalink($post->ID).'"><h2>'.$post->post_title.'</h2></a>';                    
                            echo $out;
                    
                            if($postdesc != '')
                            {
                                $out = '';
                                $out .= apply_filters('the_content', $postdesc);
                                $out .= ' <a href="'.get_permalink($post->ID).'">Read&nbsp;more</a>';
                                echo $out; 
                            } else
                            {
                                the_content('Read&nbsp;more');
                            }
                    
                        $out = '';
                        $out .= '<div class="blog-post-bottom-wrapper">';
                        $blog_pages_voting = GetDCCPInterface()->getIGeneral()->showBlogPagesVoting(); 
                        if(GetDCCPInterface()->getIGeneral()->showPostVoting() and $novoting == '' and $blog_pages_voting)
                        {
                            global $dcp_votingshortcodes; 
                            if(isset($dcp_votingshortcodes))
                            {
                                $out .= $dcp_votingshortcodes->votePostStarsCreate($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum(), 'left', $post->post_type); 
                            }
                        }                         
                        
                       // post tags list
                       $posttags = get_the_tags();                              
                       $count = 0;
                       if($posttags !== false)
                       {
                            $count = count($posttags);
                       }
                        
                       if($count > 0)
                       {   
                           $out .= '<div class="blog-post-tags">
                                    <span class="name">Tags:</span> ';
                           
                           $i = 0;            
                           foreach($posttags as $tag)
                           {   
                               if($i > 0)
                               {
                                   $out .= ',&nbsp;';
                               }
                               $title = '';
                               if($tag->count == 1) { $title = 'One post'; } else { $title = $tag->count.' posts'; }                                
                               
                               $out .= '<a href="'.get_tag_link($tag->term_id).'" class="tag link-tip-bottom" title="'.$title.'">'.$tag->name.'</a>';
                               $i++;
                           }                       
                           $out .= '</div>';                                            
                            
                       } else
                       { 
                            if(GetDCCPInterface()->getIGeneral()->showNoTags()) 
                            {                                
                               $out .= '<div class="blog-post-tags">
                                        There are no tags associeted with this post.                           
                                    </div>';   
                            }                                                                                 
                       } 
                         
                        $out .= '<div class="clear-both"></div></div>';      
                        $out .= '</div> <!-- content -->                 
                    </div> <!-- blog-post -->';                    
                    echo $out;
                    
                } // while
            } else
            {
                echo '<p>There are no posts in this category.</p>';
            }   
                      
            GetDCCPInterface()->getIGeneral()->renderSitePagination($paged, $max_page);             
                               
        ?>                    
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>



