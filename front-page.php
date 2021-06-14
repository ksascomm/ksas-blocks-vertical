<?php
/**
 * The template for displaying front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

<div class="flex flex-wrap md:flex-row-reverse">
	<main id="site-content" class="site-main page-with-sidebar w-full lg:w-4/5 prose prose-sm sm:prose lg:prose-lg mx-auto">

	<?php
		while ( have_posts() ) :
			the_post()
			?>
			<?php
			get_template_part( 'template-parts/content', 'front' );

		endwhile; // End of the loop.
		?>

		<?php

		if ( get_field( 'show_homepage_news_feed', 'option' ) ) :
			// If ACF Conditional is YES, display news feed.

			$heading       = get_field( 'homepage_news_header', 'option' );
			$news_quantity = get_field( 'homepage_news_posts', 'option' );
			?>
		<div class="news-section mb-24">
			<div class="front prose prose-sm sm:prose lg:prose-lg mx-auto">
				<h2><?php echo esc_html( $heading ); ?>
					<small>
					<a class="button" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">
						View All Posts&nbsp;<span class="fa fa-chevron-circle-right" aria-hidden="true"></span></a>
					</small>
				</h2>
			</div>
			<?php
			$news_query = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => $news_quantity,
				)
			);
			if ( $news_query->have_posts() ) :
				while ( $news_query->have_posts() ) :
					$news_query->the_post();
					get_template_part( 'template-parts/content', 'post-excerpt' );
				endwhile;
			endif;
			?>
		</div>
		<?php else : // field_name returned false ?>
		
		<?php endif; // end of if field_name logic ?>
		

	</main><!-- #main -->

	<?php
	get_sidebar();
	?>
</div>
<?php
get_footer();