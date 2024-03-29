<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package drinks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('drink'); ?>>
	<div class="entry-thumbnail">
		<?php
			// Show post thumbnails
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('full', ['class' => 'rounded' ]);
			}
		?>
	</div>
	<div class="entry-data">
		<header class="entry-header align-items-center">
			<?php
				the_title( '<h2 class="entry-title h3">', '</h2>' );
			?>
			<?php
				$terms = get_the_terms( get_the_ID(), 'drink_type' );
				if ( $terms && ! is_wp_error( $terms ) ) :
			?>
				<div class="entry-terms">
					<?php
						foreach ( $terms as $term ) {
							$term = get_term_by('name', $term->name, 'drink_type');
							if ($term) {
								$term_link = get_term_link( $term );
								echo '<a class="badge rounded-pill text-bg-danger text-decoration-none me-2 mb-2" href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
							}
						}
					?>
				</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<section class="entry-content mb-md-4">
			<?php
				$last_drank = get_post_meta( get_the_ID(), 'last_drank', true );
				$last_drank = $last_drank ? date('F j, Y', strtotime($last_drank)) : '';

				$times_drank = get_post_meta( get_the_ID(), 'times_drank', true );
			?>
			<ul>
				<li><strong>Price</strong>: <?php echo get_post_meta( get_the_ID(), 'price', true ); ?>€</li>
				<li><strong>Last drank</strong>: <?php echo $last_drank ? $last_drank : 'never' ?></li>
				<li><strong>Times drank</strong>: <span class="times-drank" data-drink="<?php echo get_the_ID(); ?>"><?php echo $times_drank ? $times_drank : 0; ?></span></li>
			</ul>
			<div>
				<?php the_content(); ?>
			</div>
			<?php
				$tags = get_the_terms( get_the_ID(), 'drink_tags' );
				if ( $tags && ! is_wp_error( $tags ) ) :
			?>
				<div class="entry-tags">
					<?php
						$tags_list = [];
						foreach ( $tags as $tag ) {
							$tag_link = get_term_link( $tag );
							echo '<a class="badge rounded-pill text-bg-primary text-decoration-none me-2 mb-2" href="' . esc_url( $tag_link ) . '">' . $tag->name . '</a>';
						}
					?>
				</div>
			<?php endif; ?>

		</section><!-- .entry-content -->

	</div>
	<footer class="entry-footer">
		<div class="d-grid gap-2">
			<button class="btn btn-outline-success checkin" type="button" data-drink="<?php echo get_the_ID(); ?>">
				<span class="spinner spinner-border spinner-border-sm" hidden></span>
				<span class="text">Check-in</span>
			</button>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
