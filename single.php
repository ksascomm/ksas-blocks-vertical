<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package KSAS_Blocks
 */

get_header();
?>

<div class="flex flex-wrap md:flex-row-reverse">
	<main id="site-content" class="site-main page-with-sidebar w-full lg:w-4/5 prose sm:prose lg:prose-lg mx-auto">
		<?php
		if ( function_exists( 'bcn_display' ) ) :?>
		<div class="breadcrumbs mb-4" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php bcn_display(); ?>
		</div>
		<?php endif; ?>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<?php
	get_sidebar();
	?>
</div>
<?php
get_footer();
