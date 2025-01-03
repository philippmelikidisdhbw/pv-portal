<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
//Load style for specific slider effect//






function qcld_sliderhero_sliders_list_func() {
	global $wpdb;
	$s       = 1;
	$table   = QCLD_TABLE_SLIDERS;
	
	$sliders = array();
	$row     = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE %d", $s ) );
	
	$table   = QCLD_TABLE_SLIDES;
	foreach ( $row as $rows ) {
		$count       = $wpdb->get_var( $wpdb->prepare( "SELECT count(*) FROM $table WHERE sliderid = %d", $rows->id ) );
		$rows->count = $count;
		array_push( $sliders, $rows );
	};
	$sliders = array_reverse( $sliders );

	qcld_sliderhero_sliders_view_list( $sliders );
}

function qcld_sliderhero_add_slider( $type ) {
	global $wpdb;
	$s     = 1;
	$table = QCLD_TABLE_SLIDERS;
	$now = current_time( 'mysql', false );
	$wpdb->insert(
		$table,
		array(
			'title'  => 'New Slider Hero',
			'type'   => $type,
			'params' => '{"autoplay":1,"pauseonhover":1,"directionnav":1,"controlnav":1,"effect":{"interval":11000},"title":{"show":1,"align":"center","style":{"width":213,"height":61,"left":"0px","top":"10%"}},"button1":{"show":1,"position":"1","align":"center","style":{"width":213,"height":61,"left":"0%","top":"80%"}},"titleffect":"bounceInLeft","deseffect":"bounceInRight","description":{"show":1,"align":"center","style":{"width":213,"height":61,"left":"0%","top":"30%"}},"titlefontsize":40,"descfontsize":20,"background":"#4e56fc","titlecolor":"#d6d6d6","descriptioncolor":"#e8e8e8","btneffect":"","blur":{"canvas_bg":"","particle_color":""},"wave":{"one_color":"","two_color":"","three_color":""},"metaballs":{},"matrix":{},"tiny_galaxy":{},"tagcanvas":{},"water_swimming":{},"warp_speed":{},"line":{},"circle":{},"waaave":{},"ballsgravity":{},"iconsahedron":{},"helix":{},"corruption":{},"chaos":{},"helix_multiple":{},"neno_hexagon":{},"cosmic_web":{},"directional":{},"distance":{},"valentine":{},"cloudysky":{},"particle_snow":{},"herotop":{"decoration":""},"herobottom":{"decoration":""},"rays_particles":{"particles":""},"hero404":{"title":""}}',
			'custom' => '{}',
			'style'  => '{"background":"blue;","border":"1px solid red;","color":"yellow","width":"800","height":"480","marginLeft":"0","marginRight":"0","marginTop":"0","marginBottom":"0"}',
			'time'   => $now
		),
		array(
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s'
		)
	);
	$id = $wpdb->get_var( $wpdb->prepare(
		"
			SELECT ID 
			FROM $table WHERE %d
			ORDER BY ID DESC limit 0,1
        ",
		$s
	) );
    $location = admin_url( 'admin.php?page=Slider-Hero&task=editslider&type='.$type.'&id=' . $id);
    $location = wp_nonce_url( $location, 'sliderhero_editslider_' . $id );
    $location = html_entity_decode($location);
    wp_redirect( wp_sanitize_redirect(  $location )  );
    exit;
}

function qcld_sliderhero_edit_slider( $id ) {
	/***Slider images***/
	global $wpdb;
	$s            = 1;
	$table        = QCLD_TABLE_SLIDERS;
	$AllSLidersId = $wpdb->get_results( $wpdb->prepare( "SELECT id FROM $table WHERE %d", $s ), ARRAY_A );
	if ( ! in_array( array( 'id' => (string) $id ), $AllSLidersId ) ) {
		wp_die( '<h3 style="color: #FF0011;">Hero-slider ' . $id . ' does not exist</h3>' );
		exit;
	}
	
	$table      = QCLD_TABLE_SLIDES;
	$row        = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table  WHERE sliderid = %d order by ordering desc", $id ) );
	$table      = QCLD_TABLE_SLIDERS;
	$slider_row = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table  WHERE id = %d", $id ) );

	
	qcld_sliderhero_edit_slider_view( $row, $id, $slider_row );
}
function qchero_remove_slider( $id ) {
	global $wpdb;
	$s     = 1;
	$table = QCLD_TABLE_SLIDERS;
	$wpdb->delete( $table, array( 'id' => $id ), array( '%d' ) );
	$wpdb->delete( QCLD_TABLE_SLIDES, array( 'sliderid' => $id ), array( '%d' ) );
	$row     = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE %d order by id desc", $s ) );
	$table   = QCLD_TABLE_SLIDES;
	$sliders = array();
	foreach ( $row as $rows ) {
		$count       = $wpdb->get_var( $wpdb->prepare( "SELECT count(*) FROM `$table` WHERE sliderid = %d", $rows->id ) );
		$rows->count = $count;
		array_push( $sliders, $rows );
	};
	qcld_sliderhero_sliders_view_list( $sliders );
}



