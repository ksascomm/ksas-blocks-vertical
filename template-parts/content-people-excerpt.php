<?php
/**
 * Template part for displaying People CPT excerpt in people-direcory.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<article <?php post_class( 'people p-4 lg:px-0 lg:py-4 my-2 lg:my-0 lg:ml-4 w-11/12 lg:w-full border-grey border-solid border lg:border-none' ); ?>>

<div class="flex flex-wrap lg:flex-nowrap">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="flex-none hidden pl-4 lg:pl-0 lg:pr-4 headshot lg:my-4 lg:mr-4 lg:ml-0 lg:relative ">
			<div class="w-[187px] h-[225px]">
			<?php
				the_post_thumbnail(
					'large',
					array(
						'class' => 'w-full h-0 lg:h-full object-cover pr-0 mt-0! mb-2',
						'alt'   => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
			?>
			</div>
		</div>
	<div class="break"></div> <!-- break -->
	<?php endif; ?>
	<div class="grow contact-info">
		<h3 class="font-heavy">
		<?php if ( get_post_meta( $post->ID, 'ecpt_website', true ) ) : ?>
			<a href="<?php echo esc_html( get_post_meta( $post->ID, 'ecpt_website', true ) ); ?>" title="<?php the_title(); ?>'s webpage" target="_blank">
				<?php the_title(); ?>
			</a>
				<?php if ( get_post_meta( $post->ID, 'ecpt_pronoun', true ) ) : ?>
					<small>(<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_pronoun', true ) ); ?>)</small>
				<?php endif; ?>
		<?php else : ?>
			<?php the_title(); ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_pronoun', true ) ) : ?>
					<small>(<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_pronoun', true ) ); ?>)</small>
				<?php endif; ?>
		<?php endif; ?>
		</h3>

		<?php if ( get_post_meta( $post->ID, 'ecpt_position', true ) ) : ?>
			<div class="position"><p class="leading-normal pr-2"><?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_position', true ) ); ?></p></div>
		<?php endif; ?>

		
		<?php
		if ( get_post_meta( $post->ID, 'ecpt_email', true ) ) :
			?>
			<h4 class="sr-only">Contact Information</h4>

			<ul role="list">
				<?php
				if ( get_post_meta( $post->ID, 'ecpt_email', true ) ) :
					$email = get_post_meta( $post->ID, 'ecpt_email', true );
					?>
					<li><span class="fa-solid fa-envelope" aria-hidden="true"></span>
						<a href="<?php echo esc_url( 'mailto:' . antispambot( $email ) ); ?>">
					<?php echo esc_html( $email ); ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_post_meta( $post->ID, 'ecpt_office', true ) ) : ?>
					<li><span class="fa-solid fa-location-dot" aria-hidden="true"></span> <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_office', true ) ); ?></li>
				<?php endif; ?>

				<?php if ( get_post_meta( $post->ID, 'ecpt_phone', true ) ) : ?>
					<li><span class="fa-solid fa-phone-office" aria-hidden="true"></span> <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_phone', true ) ); ?></li>
				<?php endif; ?>

				<?php if ( get_post_meta( $post->ID, 'ecpt_lab_website', true ) ) : ?>
				<li><span class="fa-solid fa-earth-americas"></span> <a href="<?php echo esc_url( get_post_meta( $post->ID, 'ecpt_lab_website', true ) ); ?>" target="_blank" aria-label="<?php the_title(); ?>'s Group/Lab Website">Group/Lab Website</a></li>
				<?php endif; ?>

			</ul>
		<?php endif; ?>
		<?php if ( get_post_meta( $post->ID, 'ecpt_expertise', true ) ) : ?>
			<p class="leading-normal pr-2"><strong class="font-bold font-heavy">Research Interests:&nbsp;</strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_expertise', true ) ); ?></p>
		<?php endif; ?>
		<?php if ( get_post_meta( $post->ID, 'ecpt_degrees', true ) ) : ?>
			<p class="leading-normal pr-2"><strong class="font-bold font-heavy">Education:&nbsp;</strong><?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_degrees', true ) ); ?></p>
		<?php endif; ?>
	</div>
</div>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="sr-only">%s</span>', 'ksas-blocks' ),
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
