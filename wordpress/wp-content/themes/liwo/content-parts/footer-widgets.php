<div class="container">
<?php 
global $liwo;

switch($liwo['footer_widgets'])
	{
		case '1':
			dynamic_sidebar('Footer widget 1');
		break;
		case '2':
			echo '<div class="one_half">';
				dynamic_sidebar('Footer widget 1');
			echo '</div>';
			echo '<div class="one_half last">';
				dynamic_sidebar('Footer widget 2');
			echo '</div>';
		break;
		case '3':
			echo '<div class="one_third">';
				dynamic_sidebar('Footer widget 1');
			echo '</div>';
			echo '<div class="one_third">';
				dynamic_sidebar('Footer widget 2');
			echo '</div>';
			echo '<div class="one_third last">';
				dynamic_sidebar('Footer widget 3');
			echo '</div>';
		break;
		case '4':
			echo '<div class="one_fourth">';
				dynamic_sidebar('Footer widget 1');
			echo '</div>';
			echo '<div class="one_fourth">';
				dynamic_sidebar('Footer widget 2');
			echo '</div>';
			echo '<div class="one_fourth">';
				dynamic_sidebar('Footer widget 3');
			echo '</div>';
			echo '<div class="one_fourth last">';
				dynamic_sidebar('Footer widget 4');
			echo '</div>';
		break;
	}

?>
</div>