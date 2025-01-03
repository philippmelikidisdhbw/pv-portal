<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @param $id
 * @return string
 */

function qcld_slide_show_published_sliders($atts ) {
	global $wpdb;
	$id = $atts['id'];
	$query   = $wpdb->prepare( "SELECT * FROM " . QCLD_TABLE_SLIDERS . " WHERE id = '%d' ", $id );
	$qcheror = $wpdb->get_results( $query );
	$query   = $wpdb->prepare( "SELECT * FROM " . QCLD_TABLE_SLIDES . " WHERE sliderid = '%d' ORDER BY ordering DESC", $id );
	$qcheros = $wpdb->get_results( $query );
	
	return qcld_slider_front_end( $id, $qcheror, $qcheros, $atts );
}
