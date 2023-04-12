<?php
/**
 * Portfolio Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Load values and assing defaults.
$main_title         = get_field( 'main_title' );
$number_of_projects = get_field( 'number_of_projects' );

// Getting published projects
$args              = array(
	'post_type'      => 'project',
	'posts_per_page' => $number_of_projects,
);
$my_projects_query = new WP_Query( $args );
$my_projects       = $my_projects_query->get_posts();
?>

<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
	<div class="container">

		<!-- Portfolio Section Heading-->
		<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">
			<?php echo $main_title; ?>
		</h2>

		<!-- Icon Divider-->
		<div class="divider-custom">
			<div class="divider-custom-line"></div>
			<div class="divider-custom-icon"><i class="fas fa-star"></i></div>
			<div class="divider-custom-line"></div>
		</div>

		<?php if ( ! empty( $my_projects ) ) : ?>

		<!-- Portfolio Grid Items-->
		<div class="portfolio-grid row justify-content-center">
			<?php foreach ( $my_projects as $k => $project ) : ?>

			<!-- Portfolio Item -->
			<div class="portfolio-item-wrapper col-md-6 col-lg-4 mb-5">
				<div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal<?php echo $k; ?>">
					<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
						<div class="portfolio-item-caption-content text-center text-white"><i
								class="fas fa-plus fa-3x"></i></div>
					</div>
					<?php echo get_the_post_thumbnail( $project->ID, 'post-thumbnail', 'class="img-fluid"' ); ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
<!-- About Section-->

<?php if ( ! empty( $my_projects ) ) : ?>
	<?php foreach ( $my_projects as $k => $project ) : ?>

		<!-- Portfolio Modals -->
		<!-- Portfolio Modal -->
		<div class="portfolio-modal modal fade" id="portfolioModal<?php echo $k; ?>" tabindex="-1" aria-labelledby="portfolioModal<?php echo $k; ?>" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
					<div class="modal-body text-center pb-5">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-8">

									<!-- Portfolio Modal - Title-->
									<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">
										<?php echo $project->post_title; ?>
									</h2>

									<!-- Icon Divider-->
									<div class="divider-custom">
										<div class="divider-custom-line"></div>
										<div class="divider-custom-icon"><i class="fas fa-star"></i></div>
										<div class="divider-custom-line"></div>
									</div>

									<!-- Portfolio Modal - Image-->
									<?php echo get_the_post_thumbnail( $project->ID, 'post-thumbnail', 'class="img-fluid rounded mb-5"' ); ?>

									<!-- Portfolio Modal - Text-->
									<p class="mb-4">
										<?php echo apply_filters( 'the_content', $project->post_content ); ?>
									</p>
									<button class="btn btn-primary" data-bs-dismiss="modal">
										<i class="fas fa-xmark fa-fw"></i>
										<?php echo __( 'Close Window', 'freelancerTheme' ); ?>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>
