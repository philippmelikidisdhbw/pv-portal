<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
//creating list of array of google fonts

$google_fonts = array();

foreach($_slide as $slide){
	
	if(isset($slide->t_font) && strlen($slide->t_font)>2){
		$font = str_replace(' ','+',$slide->t_font);
		if(!in_array($font,$google_fonts))
			$google_fonts[] = $font;
	}
	
	if(isset($slide->d_font) && strlen($slide->d_font)>2){
		$font = str_replace(' ','+',$slide->d_font);
		if(!in_array($font,$google_fonts))
			$google_fonts[] = $font;
	}
	
	$btn = json_decode(wp_unslash(htmlspecialchars_decode($slide->btn)));
	if(isset($btn->hero_btn_font_family) and $btn->hero_btn_font_family!=''){
		$font = str_replace(' ','+',$btn->hero_btn_font_family);
		if(!in_array($font,$google_fonts))
			$google_fonts[] = $font;
	}
	
	$btn2 = json_decode(wp_unslash(htmlspecialchars_decode($slide->btn2)));
	if(isset($btn2->hero_btn_font_family) and $btn2->hero_btn_font_family!=''){
		$font = str_replace(' ','+',$btn2->hero_btn_font_family);
		if(!in_array($font,$google_fonts))
			$google_fonts[] = $font;
	}
}

// Adding google font for slides
if(!empty($google_fonts)){
	wp_enqueue_style( 'qcld_slider_hero_google_font'.$sliderID, "https://fonts.googleapis.com/css?family=".implode('|',$google_fonts),false);
}
