<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function qcld_check_slider_config($id){
	
	global $wpdb;
	$type = sanitize_text_field($_GET['type']);
	
	$query1 = "SELECT id, type, params FROM ".QCLD_TABLE_SLIDERS." where 1 and id=$id";
	$row = $wpdb->get_row($query1);
	
	if($row->type=='warp_speed'){
		if( strpos( $row->params, 'warp_speed' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"warp_speed":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	
	if($row->type=='water_swimming'){
		if( strpos( $row->params, 'water_swimming' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"water_swimming":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	
	if($row->type=='ballsgravity'){
		if( strpos( $row->params, 'ballsgravity' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"ballsgravity":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='waaave'){
		if( strpos( $row->params, 'waaave' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"waaave":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	
	if($row->type=='circle'){
		if( strpos( $row->params, 'circle' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"circle":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='line'){
		if( strpos( $row->params, 'line' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"line":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='water_swimming'){
		if( strpos( $row->params, 'water_swimming' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"water_swimming":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='helix'){
		if( strpos( $row->params, 'helix' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"helix":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='iconsahedron'){
		if( strpos( $row->params, 'iconsahedron' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"iconsahedron":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='blur'){
		if( strpos( $row->params, 'blur' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"blur":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='wave'){
		if( strpos( $row->params, 'wave' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"wave":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='metaballs'){
		if( strpos( $row->params, 'metaballs' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"metaballs":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='matrix'){
		if( strpos( $row->params, 'matrix' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"matrix":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='tiny_galaxy'){
		if( strpos( $row->params, 'tiny_galaxy' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"tiny_galaxy":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='tagcanvas'){
		if( strpos( $row->params, 'tagcanvas' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"tagcanvas":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='corruption'){
		if( strpos( $row->params, 'corruption' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"corruption":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='chaos'){
		if( strpos( $row->params, 'chaos' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"chaos":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='helix_multiple'){
		if( strpos( $row->params, 'helix_multiple' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"helix_multiple":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='neno_hexagon'){
		if( strpos( $row->params, 'neno_hexagon' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"neno_hexagon":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='cosmic_web'){
		if( strpos( $row->params, 'cosmic_web' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"cosmic_web":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='directional'){
		if( strpos( $row->params, 'directional' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"directional":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='distance'){
		if( strpos( $row->params, 'distance' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"distance":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='valentine'){
		if( strpos( $row->params, 'valentine' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"valentine":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='cloudysky'){
		if( strpos( $row->params, 'cloudysky' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"cloudysky":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='particle_snow'){
		if( strpos( $row->params, 'particle_snow' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"particle_snow":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	
	if($row->type=='rays_particles'){
		if( strpos( $row->params, 'rays_particles' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"rays_particles":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	if($row->type=='hero_404'){
		if( strpos( $row->params, 'hero404' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"hero404":{},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	}
	
	
		if( strpos( $row->params, 'herotop' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"herotop":{"decoration":""},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
	
	
	
		if( strpos( $row->params, 'herobottom' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"herobottom":{"decoration":""},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
		if( strpos( $row->params, 'watereffect' ) === false ) {
			$new_param1 = substr_replace( $row->params, '"watereffect":{"color":""},', 1, 0 );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				array( 'params' =>  $new_param1),
				array( 'id' => $row->id )
			);
		}
		
		
	
	
}
