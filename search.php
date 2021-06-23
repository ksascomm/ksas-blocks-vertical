<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package KSAS_Blocks
 */

get_header();
?>

<div class="flex flex-wrap md:flex-row-reverse">
	<main id="site-content" class="site-main page-with-sidebar w-full lg:w-4/5 prose sm:prose lg:prose-lg mx-auto">
	<div class="breadcrumbs mb-4" typeof="BreadcrumbList" vocab="https://schema.org/">
		<?php
		if ( function_exists( 'bcn_display' ) ) {
			bcn_display();
		}
		?>
		</div>
	<?php if ( have_posts() ) : ?>

<header class="page-header prose px-12 py-6">
	<h1 class="page-title">
		<?php
		/* translators: %s: search query. */
		printf( esc_html__( 'Search Results for: %s', 'ksas-blocks' ), '<span>' . get_search_query() . '</span>' );
		?>
	</h1>
</header><!-- .page-header -->

<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	/**
	 * Run the loop for the search to output the results.
	 * If you want to overload this in a child theme then include a file
	 * called content-search.php and that will be used instead.
	 */
	get_template_part( 'template-parts/content', 'search' );

endwhile;

if ( function_exists( 'ksas_blocks_pagination' ) ) :

	ksas_blocks_pagination();

else :

	the_posts_navigation();

endif;

else :

get_template_part( 'template-parts/content', 'none' );

endif;
?>

	</main><!-- #main -->

	<?php
	get_sidebar();
	?>
</div>
<?php
get_footer();