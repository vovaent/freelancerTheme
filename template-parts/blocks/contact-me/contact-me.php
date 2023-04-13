<?php
/**
 * Contact Me Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Load values and assing defaults.
$main_title             = get_field( 'main_title' );
$contact_form_obj       = get_field( 'contact_form' );
$contact_form_shortcode = '[contact-form-7 id="' . $contact_form_obj->ID . '" title="' . $contact_form_obj->post_title . '"]';
?>

<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <?php echo do_shortcode( $contact_form_shortcode ); ?>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->