<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		echo var_dump(the_post());
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->
	

</article><!-- #post-## -->
