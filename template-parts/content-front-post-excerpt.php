<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-excerpt prose lg:prose-lg xl:prose-xl mx-auto border-b border-solid border-grey pt-4 mb-4' ); ?> aria-label="<?php the_title(); ?>">
<?php
	/**
	 * This differs from theme's post_thumbnail()
	 *
	 * See inc/template-tags.php for that function
	 */
if ( has_post_thumbnail() ) :
	?>
	<?php
	$thumbnail_id = get_post_meta( $post->ID, '_thumbnail_id', true );
	$img_alt      = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
	?>
		<div class="news-thumb h-0 lg:h-[21rem] 
		<?php
		if ( ! $img_alt ) {
			echo 'no-alt'; }
		?>
		">
		<?php
			the_post_thumbnail(
				'large',
				array(
					'class' => 'w-full h-0 lg:h-full object-cover pr-0',
				)
			);
		?>
		</div>
<?php endif; ?>
	<header class="px-4 entry-header">
		<?php
		ksas_blocks_posted_on();
		?>
	<?php if ( get_post_meta( $post->ID, 'ecpt_external_link', true ) ) : ?>
		<?php the_title( '<h3 class="entry-title external-link text-2xl!"><a class="front-post" href="' . esc_url( get_post_meta( $post->ID, 'ecpt_external_link', true ) ) . '" rel="bookmark" target="_blank" rel="noopener">', '</a></h3>' ); ?>
	<?php else : ?>
		<?php the_title( '<h3 class="entry-title text-2xl!"><a class="front-post" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
	<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="px-4 pb-4 text-lg leading-normal entry-content">
		<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 40, '...' ) ); ?></p>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
