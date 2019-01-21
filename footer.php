<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper bg-dark py-5" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row text-center">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<small class="text-muted py-5">Copyright &copy; Everything In All 2018 - <span id="copyright">
        <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>
    </span></small>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->
<div id="preloader"><img src="/wp-content/themes/understrap/img/loading.gif" /></div>
<?php wp_footer(); ?>
<script defer  src="/wp-content/themes/understrap/js/custom.js"></script>



</body>

</html>

