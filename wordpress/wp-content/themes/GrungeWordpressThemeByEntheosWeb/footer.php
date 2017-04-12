<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

			<div style="float:left"><ul>
			  <?php wp_list_pages('sort_column=menu_order&title_li=<h2>' . __('Prose') . '</h2>' ); ?>
            </ul></div>
            
            <div style="float:left;padding-left:120px"><ul>
			  <?php wp_list_pages('sort_column=menu_order&title_li=<h2>' . __('Prose') . '</h2>' ); ?>
            </ul></div>
            
            <div style="float:left;padding-left:120px"><ul>
			  <?php wp_list_pages('sort_column=menu_order&title_li=<h2>' . __('Prose') . '</h2>' ); ?>
            </ul></div>

 



  	 </div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
<center><font size="3px" color="#FFFFFF"> Copyright &copy; <? echo date("Y");?> <?php bloginfo( 'name' ); ?>, All right reserved.  <a href="http://www.entheosweb.com"> Designed by www.EntheosWeb.com</a></font></center>
</body>
</html>
