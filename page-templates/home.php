<?php
/**
 * Template Name: Home Page Template
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

get_hero();

if(current_user_can('edit_themes') && is_user_logged_in()):

?>
	
<section class="bg-dark">
	<div class="container">
		<div class="row pb-5 d-flex align-items-center bg-black">
			<div class="col-lg-6 pt-5 text-justify">
				<?php if( have_posts() ) {
					while( have_posts() ) {
					the_post();
						the_content();
					}
				} ?>
				<!-- <div class="col-12 d-flex align-items-center justify-content-center py-4">
					<img id="steven-headshot" src="https://everythinginall.com/wp-content/uploads/2019/01/steven-headshot.jpg" />
					<div class="flex-column d-flex align-items-center">
						<img id="home-signiture" src={signiture}/>
						<small class="text-muted">Steven Horkey</small>
					</div>
				</div> -->
			</div>
			<div class="col-lg-6 pt-5">
				<?php get_subscribe() ?>
			</div>
		</div>
	</div>
</section>

<?php
endif;

?>
<section class="py-5 home-music">
	<div class="container">
		<div class="w-100 text-center">
			<h1 class="text-uppercase py-5 letter-space text-light">Newest Release</h1>
			<?php echo do_shortcode('[sonaar_audioplayer albums="1251" show_playlist="true" show_track_market="true" show_album_market="true" remove_player="true"][/sonaar_audioplayer]'); ?>
			<a href="/music" class="d-block mt-5">
				<button class="btn btn-primary text-uppercase">View all Music</button>
			</a>
		</div>
	</div>
</section>

<?php

if(current_user_can('edit_themes') && is_user_logged_in()) :

?>
<section class="">
	<div class="container py-5">
		<div class="row d-flex align-items-center">
			<div class="col-12 text-center">
				<h1 class="text-uppercase letter-space">Recent Courses</h1>
				
			</div>
		</div>
		<div class="row row-eq-height py-4">
			<?php 
			// the query
			$the_query = new WP_Query( array(
				'posts_per_page' => 4,
			)); 
			$the_query->the_post(); 
				$slug = basename( get_permalink() );
				$src = wp_get_attachment_image_src( get_post_thumbnail_id( $the_query->ID ), 'large', false )[0];
				if(!$src) $src = "https://source.unsplash.com/collection/1242150/2000x1200";
			?>

			<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
			$slug = basename( get_permalink() );
			$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false )[0];
					if(!$src) $src = "https://source.unsplash.com/collection/1242150/2000x1200";
			?>

				<div class="col-md-6 my-3 scale-item">
					<a href="<?php echo get_site_url().'/'.$slug ?>">
						<div class="h-100 post-card d-flex align-items-center justify-content-center text-center text-uppercase flex-column" style="
							background-image: linear-gradient(#00000033, #00000033), url('<?php echo $src ?>');
						">
							<h3 class="text-light"><?php the_title(); ?></h3>
							<h5 class="text-light"><?php the_subtitle(); ?></h5>
						</div>
					</a>
				</div>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			
			<?php endif; ?>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<a href="/courses">
					<button class="btn btn-primary text-uppercase">View all Courses</button>
				</a>
				
			</div>
		</div>
	</div>
</section>

<?php
endif;

// while ( have_posts() ) :
// 	the_post();
// 	get_template_part( 'loop-templates/content', 'empty' );
// endwhile;

get_footer();
