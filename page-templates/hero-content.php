<?php
/**
 * Template Name: Hero Content Page
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false )[0];
if(!$src) $src = "https://source.unsplash.com/collection/1242150/2000x1200";

?>

<section class="site-hero" style="
            background: linear-gradient(#00000080, #00000080), url('<?php echo $src ?>')
        ">
    <div class="container h-100">
        <div class="row h-100 d-flex align-items-center justify-content-center flex-column text-uppercase" >
            <h1 class="text-light"><?php the_title(); ?></h1>
            
                <?php if( have_posts() ) {
                    while( have_posts() ) {
                    the_post();
                        the_content();
                    }
                } ?>
            
        </div>
    </div>
</section>


        
			


<?php


get_footer();
