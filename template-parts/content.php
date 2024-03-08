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
		<header class="entry-header">
			<?php
				the_title( '<h2 class="entry-title">', '</h2>' );
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<button type="button" class="btn btn-outline-primary">Check-in</button>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
