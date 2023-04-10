<?php
/**
 * Masthead Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'masthead-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'masthead bg-primary text-white text-center';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$avatar_image  = get_field( 'avatar_image' );
$main_title    = get_field( 'main_title' );
$main_subtitle = get_field( 'main_subtitle' );
?>

<!-- Masthead-->
<header id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<div class="container d-flex align-items-center flex-column">

		<!-- Masthead Avatar Image-->
		<!-- <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." /> -->
		<?php echo wp_get_attachment_image( $avatar_image, 'thumbnail', false, array( 'class' => 'masthead-avatar mb-5' ) ); ?>

		<!-- Masthead Heading-->
		<h1 class="masthead-heading text-uppercase mb-0">
			<?php echo $main_title; ?>
		</h1>

		<!-- Icon Divider-->
		<div class="divider-custom divider-light">
			<div class="divider-custom-line"></div>
			<div class="divider-custom-icon"><i class="fas fa-star"></i></div>
			<div class="divider-custom-line"></div>
		</div>

		<!-- Masthead Subheading-->
		<p class="masthead-subheading font-weight-light mb-0">
			<?php echo $main_subtitle; ?>
		</p>
	</div>
</header>
