<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KSAS_Blocks
 */

?>

<aside id="secondary" class="sidebar widget-area w-full lg:w-1/5 bg-grey-lightest">
	<div class="menu hidden lg:block">
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'main-nav',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'sidenav',
				)
			);
			?>
		<hr class="w-3/4 mx-auto text-grey-cool">
		<?php
			get_search_form(
				array(
					'label' => __( 'Search for:', 'ksas_blocks' ),
				)
			);
			?>
	</div>

</aside><!-- #secondary -->
