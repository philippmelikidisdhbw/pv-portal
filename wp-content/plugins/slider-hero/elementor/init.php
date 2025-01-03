<?php

// Add a custom category for panel widgets
add_action( 'elementor/init', 'qcld_hero_slider_create_category' );

function qcld_hero_slider_create_category() {
   \Elementor\Plugin::$instance->elements_manager->add_category( 
	   	'quantumcloud-element',
	   	[
	   		'title' => esc_html( 'QuantumCloud Element', 'elementor' ),
	   		'icon' => 'fa fa-plug', //default icon
	   	],
	   	2 // position
   );
}

require_once('main.php');