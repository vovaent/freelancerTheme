<?php
/**
 * The template for displaying the footer of front page
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package freelancerTheme
 */

/**
 * Load values and assing defaults.
 */
$location_title       = get_field( 'location_title', 'option' );
$location_description = get_field( 'location_description', 'option' );
$socials_title        = get_field( 'socials_title', 'option' );
$socials_items        = get_field( 'socials_items', 'option' );
$about_title          = get_field( 'about_title', 'option' );
$about_description    = get_field( 'about_description', 'option' );
?>

<footer class="footer text-center">
	<div class="container">
		<div class="row">
			<!-- Footer Location-->
			<div class="col-lg-4 mb-5 mb-lg-0">
				<h4 class="text-uppercase mb-4">
					<?php echo esc_html( $location_title ); ?>
				</h4>
				<p class="lead mb-0">
					<?php echo esc_html( $location_description ); ?>
				</p>
			</div>

			<!-- Footer Social Icons-->
			<div class="col-lg-4 mb-5 mb-lg-0">
				<h4 class="text-uppercase mb-4">
					<?php echo esc_html( $socials_title ); ?>
				</h4>

				<?php if ( ! empty( $socials_items ) ) : ?>
					<?php foreach ( $socials_items as $item ) : ?>
						<a class="btn btn-outline-light btn-social mx-1" href="<?php echo esc_html( $item['link'] ); ?>" target="_blank">
							<i class="fab fa-fw fa-<?php echo esc_html( $item['icon_name'] ); ?>"></i>
						</a>
				<?php endforeach; ?>
				<?php endif; ?>				
			</div>

			<!-- Footer About Text-->
			<div class="col-lg-4">
				<h4 class="text-uppercase mb-4">
					<?php echo esc_html( $about_title ); ?>
				</h4>
				<div class="lead mb-0">
					<?php echo apply_filters( 'the_content', $about_description ); ?>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- Copyright Section-->
<div class="copyright py-4 text-center text-white">
	<div class="container"><small>Copyright &copy; Your Website 2023</small></div>
</div>

<?php wp_footer(); ?>

</body>
</html>
