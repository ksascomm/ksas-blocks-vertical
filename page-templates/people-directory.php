<?php
/**
 * Template Name: People Directory
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

	<div class="flex flex-wrap md:flex-row-reverse">
		<main id="site-content" class="site-main page-with-sidebar w-full lg:w-4/5 prose prose-sm sm:prose lg:prose-lg mx-auto">
		<div class="breadcrumbs mb-4" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
		<section class="error-404 not-found prose p-2">
			<header class="page-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .page-header -->
		</section>
				<?php
		endwhile;
		endif;
		?>
			<?php
			$positions      = get_terms(
				'role',
				array(
					'orderby'    => 'slug',
					'order'      => 'ASC',
					'hide_empty' => true,
				)
			);
			$position_slugs = array();
			foreach ( $positions as $position ) {
				$position_slugs[] = $position->slug;
			}
			$position_classes = implode( ' ', $position_slugs );
			?>

			<?php foreach ( $positions as $position ) : ?>
				<?php
				$position_slug    = $position->slug;
				$position_name    = $position->name;
					$people_query = new WP_Query(
						array(
							'post_type'      => 'people',
							'role'           => $position_slug,
							'meta_key'       => 'ecpt_people_alpha',
							'orderby'        => 'meta_value',
							'order'          => 'ASC',
							'posts_per_page' => '100',
						)
					);

				if ( $people_query->have_posts() ) :
					?>
					<div class="role-title <?php echo esc_html( $position->slug ); ?>">
						<h3 class="uppercase"><?php echo esc_html( $position_name ); ?></h3>
					</div>
					<?php
					while ( $people_query->have_posts() ) :
						$people_query->the_post();
						get_template_part( 'template-parts/content', 'people' );
					endwhile;
				endif;
			endforeach;
			wp_reset_postdata();
			?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ksas-blocks' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
					<?php
					edit_post_link(
						sprintf(
							wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'ksas-blocks' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
		</footer><!-- .entry-footer -->
			<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

			<?php
			endwhile; // End of the loop.
		endif;
?>

		</main><!-- #main -->

<?php
get_sidebar();
?>
</div>

<?php
get_footer();
