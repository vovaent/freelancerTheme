<?php
// Remove <p> and <br>
add_filter( 'wpcf7_autop_or_not', '__return_false' );

// Remove <span>
function freelancerTheme_remove_span( $content ) {
	$dom                     = new DOMDocument();
	$dom->preserveWhiteSpace = false;
	$dom->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );

	$xpath = new DomXPath( $dom );
	$spans = $xpath->query( "//span[contains(@class, 'wpcf7-form-control-wrap')]" );

	foreach ( $spans as $span ) :
		$child            = $span->firstChild;
		$parent           = $span->parentNode;
		$parent_parent    = $parent->parentNode;
		$span_clone       = $span->cloneNode( true );
		$span_clone_child = $span_clone->firstChild;

		$parent->replaceChild( $child, $span );

		$parent_clone = $parent->cloneNode( true );

		$span_clone->replaceChild( $parent_clone, $span_clone_child );
		$parent_parent->replaceChild( $span_clone, $parent );
	endforeach;

	return $dom->saveHTML();
}
add_filter( 'wpcf7_form_elements', 'freelancerTheme_remove_span' );
