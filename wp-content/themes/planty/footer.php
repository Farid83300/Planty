<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->

<footer>
	<a href="#">
		<nav class="bloc-footer">
			<?php
				if ( has_nav_menu( 'menu_footer' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'menu_footer',
						'menu_class'     => 'menu-footer',
						'container'      => 'div',
					));
				}
			?>
		</nav>
	</a>
</footer>

	</div><!-- #page -->
<?php 
	astra_body_bottom();    
	wp_footer(); 
?>
</div>
	</body>
</html>
