<?php
/**
 * freelancerTheme Theme Optimization
 *
 * @package freelancerTheme
 */

// Disable self-pingbacks
function freelancerTheme_stop_self_ping( &$links ) {
	$home = get_option( 'home' );
	foreach ( $links as $l => $link ) {
		if ( 0 === strpos( $link, $home ) ) {
			unset( $links[ $l ] );
		}
	}
}
add_action( 'pre_ping', 'freelancerTheme_stop_self_ping' );