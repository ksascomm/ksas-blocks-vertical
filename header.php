<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KSAS_Blocks
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title><?php create_page_title(); ?></title>
	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-40512757-1');
		<?php
		$analytics_id = get_field( 'google_analytics_id', 'option' );
		$default_id = 'UA-100553583-1';
		?>
		<?php if ( $analytics_id ) : ?>
		gtag('config', '<?php echo $analytics_id; ?>');
		<?php else : ?>
		gtag('config', '<?php echo $default_id; ?>');
		<?php endif; ?>
	</script>
	<!-- End Google Analytics -->
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header id="site-header" class="header-footer-group flex-col text-center content-center sm:flex-row lg:text-left sm:justify-between shadow sm:items-baseline w-full bg-blue " role="banner">
	<div class="header-titles-wrapper">
			<div class="header-inner section-inner">
				<div class="header-titles grid grid-cols-1 lg:grid-cols-3 gap-4">
					<div class="h-auto shield mx-auto -mt-4">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php if ( get_field( 'shield', 'option' ) == 'jhu' ) : ?>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/university.shield.svg" class="h-auto w-full p-2" alt="JHU Shield">
							<?php else: ?>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/krieger.shield.svg" class="h-auto w-full p-2" alt="KSAS Shield">
							<?php endif; ?>
						</a>
					</div>
					<div class="lg:col-span-2">
						<h1 class="site-title font-serif font-bold text-2xl sm:text-2xl md:text-2xl lg:text-3xl xl:text-4xl">
						<a class=" text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
							<small class="block font-normal">
							<?php
								$ksas_blocks_description = get_bloginfo( 'description', 'display' );
							if (
								$ksas_blocks_description || is_customize_preview() ) :
								$ksas_blocks_description = get_bloginfo( 'description', 'display' );
								echo $ksas_blocks_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?>
								<?php endif; ?>
							</small>
							
						</a>
						</h1>
					</div>
				</div><!-- .header-titles -->
				<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
					<span class="toggle-inner">
						<span class="toggle-icon">
							<?php twentytwenty_the_theme_svg( 'search' ); ?>
						</span>
						<span class="toggle-text"><?php _ex( 'Search', 'toggle text', 'ksas-blocks' ); ?></span>
					</span>
				</button><!-- .search-toggle -->
				<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
					<span class="toggle-inner">
						<span class="toggle-icon">
							<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
						</span>
						<span class="toggle-text"><?php _e( 'Menu', 'ksas-blocks' ); ?></span>
					</span>
				</button><!-- .nav-toggle -->
			</div><!-- .header-inner -->
		</div><!-- .header-titles-wrapper -->

		<?php
			get_template_part( 'inc/modal-search' );
		?>
	</header><!-- #site-header -->
	<?php
	get_template_part( 'inc/modal-menu' );
