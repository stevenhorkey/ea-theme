<?php
/**
 * Template Name: Background Page Template
 *
 * 
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );
// var_dump(wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false )[0]);
$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false )[0];
if(!$src) $src = "https://source.unsplash.com/collection/1242150/2000x1200";

?>

<section class="site-hero" style="
            background: linear-gradient(#00000080, #00000080), url('<?php echo $src ?>');
            min-height: 100vh;
            height: fit-content;
            padding: 5rem;
        ">
    <div class="container h-100">
        <div class="row" >
            <main class="site-main w-100 text-center" id="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                <?php endwhile; // end of the loop. ?>

            </main><!-- #main -->
        </div>
    </div>
</section>

<?php

get_footer();
