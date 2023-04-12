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
$main_title           = get_field( 'main_title' );
$left_column_of_text  = get_field( 'left_column_of_text' );
$right_column_of_text = get_field( 'right_column_of_text' );
$button_text          = get_field( 'button_text' );
$button_link          = get_field( 'button_link' );
?>

<!-- About Section-->
<section class="page-section bg-primary text-white mb-0" id="about">
	<div class="container">

		<!-- About Section Heading-->
		<h2 class="page-section-heading text-center text-uppercase text-white">
			<?php echo $main_title; ?>
		</h2>

		<!-- Icon Divider-->
		<div class="divider-custom divider-light">
			<div class="divider-custom-line"></div>
			<div class="divider-custom-icon"><i class="fas fa-star"></i></div>
			<div class="divider-custom-line"></div>
		</div>

		<!-- About Section Content-->
		<div class="row">
			<div class="col-lg-4 ms-auto"><div class="lead">
				<?php echo apply_filters( 'the_content', $left_column_of_text ); ?>
			</div></div>
			<div class="col-lg-4 me-auto"><div class="lead">
				<?php echo apply_filters( 'the_content', $right_column_of_text ); ?>
			</div></div>
		</div>

		<!-- About Section Button-->
		<div class="text-center mt-4">
			<a class="btn btn-xl btn-outline-light" href="<?php echo $button_link; ?>">
				<i class="fas fa-download me-2"></i>
				<?php echo $button_text; ?>
			</a>
		</div>
	</div>
</section>
