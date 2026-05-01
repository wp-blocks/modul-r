<?php
/**
 * Add speculation rules configuration
 */
add_filter( 'wp_speculation_rules_configuration', function ( $config ) {
	if ( empty( $config ) ) {
		$config = [
			'mode'      => 'auto',
			'eagerness' => 'auto',
		];
	}
	return $config;
} );
