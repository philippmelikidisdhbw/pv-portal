<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	wp_enqueue_script( 'qcld_hero_custom_partical_js', QCLD_SLIDERHERO_JS . "/particle_custom.js", array('jquery'));wp_enqueue_script( 'qcld_hero_custom_javascript', QCLD_SLIDERHERO_JS . "/hero_custom_script.js", array('jquery'));
	wp_enqueue_style( 'qcld_slider_hero_css_animate', QCLD_SLIDERHERO_CSS . "/animate.css");
	
	wp_enqueue_style( 'qcld_slider_hero_css', QCLD_SLIDERHERO_CSS . "/slider_hero.css");
	wp_enqueue_style( 'qcld_slider_hero_button_css', QCLD_SLIDERHERO_CSS . "/slider_hero_button.css");
	wp_enqueue_style( 'qcld_slider_hero_letter_fx_css', QCLD_SLIDERHERO_CSS . "/jquery-letterfx.css");
	// Script Other Effect
	if($_slider[0]->type!='no_effect' and $_slider[0]->type!='blade' and $_slider[0]->type!='stars') :
	wp_enqueue_script( 'qcld_hero_particles_js', QCLD_SLIDERHERO_JS . '/particles.js', array(), false, false );
	wp_enqueue_script( 'qcld_hero_particles_app_js', QCLD_SLIDERHERO_JS . "/particle_app.js", array('jquery'),$ver = false, $in_footer = false);
	endif;

	if(isset($params->video)&& $params->video=='youtube'): 
		if(isset($params->bg_video_youtube)&& $params->bg_video_youtube!=''):
			//wp_enqueue_script( 'qcld_hero_slider_youtube_api', "https://www.youtube.com/iframe_api", array(), false, false);
		endif;
	endif;
	
	// Script Bird Effect
	if($_slider[0]->type=='bird') :
		wp_enqueue_script( 'qcld_hero_three_js', QCLD_SLIDERHERO_JS . "/three.min.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_projector_js', QCLD_SLIDERHERO_JS . "/Projector.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_canvasrenderer_js', QCLD_SLIDERHERO_JS . "/CanvasRenderer.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_stats_js', QCLD_SLIDERHERO_JS . "/stat.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_bird_js', QCLD_SLIDERHERO_JS . "/bird.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_bird_custom_js', QCLD_SLIDERHERO_JS . "/bird_custom.js", array('jquery'));
	endif;
	
	// Script Noise Effect
	if($_slider[0]->type=='noise_effect') :
		wp_enqueue_script( 'qcld_hero_noise_three_js', QCLD_SLIDERHERO_JS . "/three.min.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_simplex_js', QCLD_SLIDERHERO_JS . "/simplex-noise.min.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_noise_effect_js', QCLD_SLIDERHERO_JS . "/noise_effect.js", array('jquery'));
	endif;
	
	// Script Day Night Effect
	if($_slider[0]->type=='daynight') :
		wp_enqueue_script( 'qcld_hero_three_js', QCLD_SLIDERHERO_JS . "/three.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_daynight_js', QCLD_SLIDERHERO_JS . "/cloudeffect.js", array('jquery'));
	endif;
	
	
	// Script Wave Effect
	if($_slider[0]->type=='wave') :
		wp_enqueue_script( 'qcld_hero_wave_js', QCLD_SLIDERHERO_JS . "/wave.js", array('jquery'));
	endif;
	
	// Script Space Elevator
	if($_slider[0]->type=='space_elevator') :
		wp_enqueue_script( 'qcld_hero_space_tweenmax_js', QCLD_SLIDERHERO_JS . "/qcmax.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_space_elevator_js', QCLD_SLIDERHERO_JS . "/space_elevator.js", array('jquery'));
	endif;
	
	// Script Water Effect
	if($_slider[0]->type=='water') :
		wp_enqueue_script( 'qcld_hero_water_js', QCLD_SLIDERHERO_JS . "/watereffect.js", array('jquery'));
	endif;
	
	// Script Particle System Effect
	if($_slider[0]->type=='particle_system') :
		wp_enqueue_script( 'qcld_hero_particle_system_js', QCLD_SLIDERHERO_JS . "/particle_system.js", array('jquery'));
	endif;
	
	
	if($_slider[0]->type=='cubes_animation') :
		wp_enqueue_script( 'qcld_hero_cube_three_js', QCLD_SLIDERHERO_JS . "/three.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_cube_animation_js', QCLD_SLIDERHERO_JS . "/cubes_animation.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_cube_orbitcontrols_js', QCLD_SLIDERHERO_JS . "/orbitcontrols.js", array('jquery'));
		
	endif;
	
	//script for antigravity effect
	if($_slider[0]->type=='antigravity') :
		wp_enqueue_script( 'qcld_hero_antigravity_js', QCLD_SLIDERHERO_JS . "/antigravity.js", array('jquery'));
	endif;
	
	//script for Subvisual effect
	if($_slider[0]->type=='subvisual') :
		wp_enqueue_script( 'qcld_hero_tweenlite_js', QCLD_SLIDERHERO_JS . "/tweenlite.js");
		wp_enqueue_script( 'qcld_hero_attrplugin_js', QCLD_SLIDERHERO_JS . "/attrplugin.js");
		wp_enqueue_script( 'qcld_hero_cssplugin_js', QCLD_SLIDERHERO_JS . "/cssplugin.js");
		wp_enqueue_script( 'qcld_hero_subvisual_js', QCLD_SLIDERHERO_JS . "/subvisual.js");
	endif;
	
	//script for Metaballs effect
	if($_slider[0]->type=='metaballs') :
		wp_enqueue_script( 'qcld_hero_metaballs_js', QCLD_SLIDERHERO_JS . "/metaballs.js", array('jquery'));
	endif;
	//script for Waaave effect
	if($_slider[0]->type=='waaave') :
		wp_enqueue_script( 'qcld_hero_pixi_js', QCLD_SLIDERHERO_JS . "/pixi.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_waaave_js', QCLD_SLIDERHERO_JS . "/waaave.js", array('jquery'));
	endif;
	
	//script for floatingleafs effect
	if($_slider[0]->type=='floatingleafs') :
		wp_enqueue_script( 'qcld_hero_floatingleafs_js', QCLD_SLIDERHERO_JS . "/floatingleafs.js");
	endif;
	
	//script for floatrain effect
	if($_slider[0]->type=='floatrain') :
		wp_enqueue_script( 'qcld_hero_threeasd_js', QCLD_SLIDERHERO_JS . "/three.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_floatrain_js', QCLD_SLIDERHERO_JS . "/float_rain.js", array('jquery'));
	endif;
	//script for Circle effect
	if($_slider[0]->type=='circle') :
		wp_enqueue_script( 'qcld_hero_circle_js', QCLD_SLIDERHERO_JS . "/circle.js", array('jquery'));
		
	endif;
	//script for Microcosm effect
	if($_slider[0]->type=='microcosm') :
		wp_enqueue_script( 'qcld_hero_microcosm_pixi_js', QCLD_SLIDERHERO_JS . "/pixi.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_microcosm_js', QCLD_SLIDERHERO_JS . "/microcosm.js", array('jquery'));
	endif;
	//script for Balls Gravity effect
	if($_slider[0]->type=='ballsgravity') :
		wp_enqueue_script( 'qcld_hero_ballsgravity_matter_js', QCLD_SLIDERHERO_JS . "/matter.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_ballsgravity_js', QCLD_SLIDERHERO_JS . "/ballsgravity.js", array('jquery'));
	endif;
	//script for Shape Animation effect
	if($_slider[0]->type=='shapeanimation') :
		wp_enqueue_script( 'qcld_hero_shapanimation_js', QCLD_SLIDERHERO_JS . "/shapeanimation.js", array('jquery'));
	endif;
	//script for Rain effect
	if($_slider[0]->type=='rain') :
		wp_enqueue_script( 'qcld_hero_rain_three_js', QCLD_SLIDERHERO_JS . "/three.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_rain_tween_js', QCLD_SLIDERHERO_JS . "/tween.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_rain_js', QCLD_SLIDERHERO_JS . "/rain.js", array('jquery'));
	endif;
	//script for Iconsahedron effect
	if($_slider[0]->type=='iconsahedron') :
		wp_enqueue_script( 'qcld_hero_iconsahedron_tween_js', QCLD_SLIDERHERO_JS . "/pixi.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_iconsahedron_js', QCLD_SLIDERHERO_JS . "/iconsahedron.js", array('jquery'));
	endif;
	//script for Intersecting Lines effect
	if($_slider[0]->type=='line') :
		
		wp_enqueue_script( 'qcld_hero_line_js', QCLD_SLIDERHERO_JS . "/line.js", array('jquery'));
	endif;
	
	//script for Flowing Circle effect
	if($_slider[0]->type=='flowingcircle') :
		
		wp_enqueue_script( 'qcld_hero_flowingcircle_perlin_js', QCLD_SLIDERHERO_JS . "/perlin.js", array('jquery'));
		
		wp_enqueue_script( 'qcld_hero_flowingcircle_js', QCLD_SLIDERHERO_JS . "/flowingcircle.js", array('jquery'));
	endif;
	//script for Grid effect
	if($_slider[0]->type=='grid') :
		wp_enqueue_script( 'qcld_hero_grid_js', QCLD_SLIDERHERO_JS . "/grid_line.js", array('jquery'));
	endif;
	//script for Division effect
	if($_slider[0]->type=='division') :
		wp_enqueue_script( 'qcld_hero_division_js', QCLD_SLIDERHERO_JS . "/division.js", array('jquery'));
	endif;
	//script for ygekpg effect
	if($_slider[0]->type=='ygekpg') :
		wp_enqueue_script( 'qcld_hero_ygekpg_p5_js', QCLD_SLIDERHERO_JS . "/p5.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_ygekpg_js', QCLD_SLIDERHERO_JS . "/ygekpg.js", array('jquery'));
	endif;
	//script for Valentine effect
	if($_slider[0]->type=='valentine') :
		wp_enqueue_script( 'qcld_hero_valentine_js', QCLD_SLIDERHERO_JS . "/valentine.js", array('jquery'));
	endif;
	//script for Orbital effect
	if($_slider[0]->type=='orbital') :
		wp_enqueue_script( 'qcld_hero_orbital_js', QCLD_SLIDERHERO_JS . "/orbital.js", array('jquery'));
	endif;
	
	//script for Matrix effect
	if($_slider[0]->type=='matrix') :
		wp_enqueue_script( 'qcld_hero_matrix_js', QCLD_SLIDERHERO_JS . "/matrix.js", array('jquery'));
	endif;
	
	//script for Tiny Galaxy effect
	if($_slider[0]->type=='tiny_galaxy') :
		wp_enqueue_script( 'qcld_hero_tiny_galaxy_three_js', QCLD_SLIDERHERO_JS . "/three.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_tiny_galaxy_js', QCLD_SLIDERHERO_JS . "/tiny_galaxy.js", array('jquery'));
	endif;
	//script for Flying Rocket effect
	if($_slider[0]->type=='flyingrocket') :
		wp_enqueue_script( 'qcld_hero_flyingrocket_js', QCLD_SLIDERHERO_JS . "/flyingrocket.js", array('jquery'));
	endif;
	
	//script for Aeronautics effect
	if($_slider[0]->type=='aeronautics') :
		wp_enqueue_script( 'qcld_hero_aeronautics_js', QCLD_SLIDERHERO_JS . "/aeronautics.js", array('jquery'));
	endif;
	//script for Tag Canvas
	if($_slider[0]->type=='tagcanvas') :
		wp_enqueue_script( 'qcld_hero_tagcanvas_min_js', QCLD_SLIDERHERO_JS . "/tagcanvas.min.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_tagcanvas_js', QCLD_SLIDERHERO_JS . "/tagcanvas.js", array('jquery'));
	endif;
	
	//script for Word Cloud
	if($_slider[0]->type=='wordcloud') :
		wp_enqueue_script( 'qcld_hero_wordcloud_js', QCLD_SLIDERHERO_JS . "/wordcloud.js", array('jquery'));
	endif;
	
	//script for Helix
	if($_slider[0]->type=='helix') :
		wp_enqueue_script( 'qcld_hero_helix_easel_js', QCLD_SLIDERHERO_JS . "/easel.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_helix_js', QCLD_SLIDERHERO_JS . "/helix.js", array('jquery'));
	endif;
	
	//script for Helix Corruption
	if($_slider[0]->type=='corruption') :
		wp_enqueue_script( 'qcld_hero_corruption_easel_js', QCLD_SLIDERHERO_JS . "/easel.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_corruption_js', QCLD_SLIDERHERO_JS . "/corruption.js", array('jquery'));
	endif;
	
	//script for Helix Chaos
	if($_slider[0]->type=='chaos') :
		wp_enqueue_script( 'qcld_hero_chaos_easel_js', QCLD_SLIDERHERO_JS . "/easel.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_chaos_js', QCLD_SLIDERHERO_JS . "/chaos.js", array('jquery'));
	endif;
	//script for Helix Multiple
	if($_slider[0]->type=='helix_multiple') :
		wp_enqueue_script( 'qcld_hero_helix_multiple_easel_js', QCLD_SLIDERHERO_JS . "/easel.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_helix_multiple_js', QCLD_SLIDERHERO_JS . "/helix_multiple.js", array('jquery'));
	endif;
	//script for Squidematics Effect
	if($_slider[0]->type=='squidematics') :

		wp_enqueue_script( 'qcld_hero_wordcloud_js', QCLD_SLIDERHERO_JS . "/squidematics.js", array('jquery'));
	endif;
	//script for Stellar Cloud
	if($_slider[0]->type=='stellar') :

		wp_enqueue_script( 'qcld_hero_wordcloud_js', QCLD_SLIDERHERO_JS . "/stellar.js", array('jquery'));
	endif;
	//script for warp_speed
	if($_slider[0]->type=='warp_speed') :
		wp_enqueue_script( 'qcld_hero_wrap_speed_three_js', QCLD_SLIDERHERO_JS . "/three.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_wrap_speed_tweenmax_js', QCLD_SLIDERHERO_JS . "/qcmax.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_wrap_speed_js', QCLD_SLIDERHERO_JS . "/wrap_speed.js", array('jquery'));
	endif;
	//script for cursorandpaint
	if($_slider[0]->type=='cursorandpaint') :
		wp_enqueue_script( 'qcld_hero_wrap_speed_js', QCLD_SLIDERHERO_JS . "/cursorandpaint.js", array('jquery'));
	endif;
	//script for cursorandpaint
	if($_slider[0]->type=='thibaut') :
		wp_enqueue_script( 'qcld_hero_thibaut_js', QCLD_SLIDERHERO_JS . "/thibaut.js", array('jquery'));
	endif;
	//script for neno_hexagon
	if($_slider[0]->type=='neno_hexagon') :
		wp_enqueue_script( 'qcld_hero_neno_hexagon_js', QCLD_SLIDERHERO_JS . "/neon_hexagon.js", array('jquery'));
	endif;
	//script for Cosmic Web
	if($_slider[0]->type=='cosmic_web') :
		wp_enqueue_script( 'qcld_hero_cosmic_web_js', QCLD_SLIDERHERO_JS . "/cosmic_web.js", array('jquery'));
	endif;
	//script for Rain Of Line
	if($_slider[0]->type=='rainofline') :
		wp_enqueue_script( 'qcld_hero_crainofline_js', QCLD_SLIDERHERO_JS . "/rainofline.js", array('jquery'));
	endif;
	
	//script for Water Swimming
	if($_slider[0]->type=='water_swimming') :
		wp_enqueue_script( 'qcld_hero_water_swimming_js', QCLD_SLIDERHERO_JS . "/water_swimming.js", array('jquery'));
	endif;
	
	//script for Directional
	if($_slider[0]->type=='directional') :
		wp_enqueue_script( 'qcld_hero_directional_p5_js', QCLD_SLIDERHERO_JS . "/p5.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_directional_js', QCLD_SLIDERHERO_JS . "/directional.js", array('jquery'));
	endif;
	
	//script for Distance
	if($_slider[0]->type=='distance') :
		wp_enqueue_script( 'qcld_hero_distance_js', QCLD_SLIDERHERO_JS . "/distance.js", array('jquery'));
	endif;
	
	//script for Distance
	if($_slider[0]->type=='physics_bug') :
		wp_enqueue_script( 'qcld_hero_physics_bug_js', QCLD_SLIDERHERO_JS . "/physics_bug.js", array('jquery'));
	endif;
	
	//script for colorful_particle
	if($_slider[0]->type=='colorful_particle') :
		wp_enqueue_script( 'qcld_hero_colorful_particle_js', QCLD_SLIDERHERO_JS . "/colorful_particle.js", array('jquery'));
	endif;
	
	//script for Waving Cloth
	if($_slider[0]->type=='waving_cloth') :
		wp_enqueue_script( 'qcld_hero_waving_cloth_js', QCLD_SLIDERHERO_JS . "/waving_cloth.js", array('jquery'));
	endif;
	
	//script for WaterDropLet
	if($_slider[0]->type=='waterdroplet') :
		wp_enqueue_script( 'qcld_hero_pixi_waterdroplet_js', QCLD_SLIDERHERO_JS . "/pixi.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_stat_waterdroplet_js', QCLD_SLIDERHERO_JS . "/stat.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_waterdroplet_js', QCLD_SLIDERHERO_JS . "/waterdroplet.js", array('jquery'));
	endif;
	
	//script for Link_particle
	if($_slider[0]->type=='link_particle') :
		wp_enqueue_script( 'qcld_hero_underscore_js', QCLD_SLIDERHERO_JS . "/underscore-min.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_link_particle_js', QCLD_SLIDERHERO_JS . "/link_particle.js", array('jquery'));
	endif;
	
	//script for just_cloud
	if($_slider[0]->type=='just_cloud') :
		wp_enqueue_script( 'qcld_hero_just_cloud_twinmax_js', QCLD_SLIDERHERO_JS . "/qcmax.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_just_cloud_js', QCLD_SLIDERHERO_JS . "/just_cloud.js", array('jquery'));
	endif;
	
	//script for Rising Cubes
	if($_slider[0]->type=='rising_cubes') :
		wp_enqueue_script( 'qcld_hero_rising_cubes_three_js', QCLD_SLIDERHERO_JS . "/three.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_rising_cubes_OrbitControls_js', QCLD_SLIDERHERO_JS . "/OrbitControls.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_rising_cubes_SubdivisionModifier_js', QCLD_SLIDERHERO_JS . "/SubdivisionModifier.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_rising_cubes_js', QCLD_SLIDERHERO_JS . "/rising_cubes.js", array('jquery'));
	endif;
	// scripts for liquid landscape
	if($_slider[0]->type=='liquid_landscape') :
		wp_enqueue_script( 'qcld_hero_liquid_landscape_three_js', QCLD_SLIDERHERO_JS . "/three.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_liquid_landscape_OrbitControls_js', QCLD_SLIDERHERO_JS . "/OrbitControls.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_liquid_landscape_js', QCLD_SLIDERHERO_JS . "/liquid_landscape.js", array('jquery'));
	endif;
	
	// scripts for Electric Clock
	if($_slider[0]->type=='electric_clock') :
		wp_enqueue_script( 'qcld_hero_electric_clock_js', QCLD_SLIDERHERO_JS . "/electric_clock.js", array('jquery'));
	endif;
	
	// scripts for rays_particles
	if($_slider[0]->type=='rays_particles') :
		wp_enqueue_script( 'qcld_hero_rays_particles_perlin_js', QCLD_SLIDERHERO_JS . "/perlin.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_rays_particles_vector2_js', QCLD_SLIDERHERO_JS . "/vector2.js", array('jquery'));
		wp_enqueue_script( 'qcld_rays_particles_js', QCLD_SLIDERHERO_JS . "/rays_particles.js", array('jquery'));
	endif;
	
	// scripts for firework
	if($_slider[0]->type=='firework') :
		wp_enqueue_script( 'qcld_hero_firework_stage_js', QCLD_SLIDERHERO_JS . "/stage.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_firework_math_js', QCLD_SLIDERHERO_JS . "/math.js", array('jquery'));
		wp_enqueue_script( 'qcld_firework_js', QCLD_SLIDERHERO_JS . "/firework.js", array('jquery'));
	endif;
	
	// scripts for fizzy_sparks
	if($_slider[0]->type=='fizzy_sparks') :
		wp_enqueue_script( 'qcld_hero_fizzy_sparks_tweenmax_js', QCLD_SLIDERHERO_JS . "/qcmax.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_fizzy_sparks_imageloader_js', QCLD_SLIDERHERO_JS . "/imagesloaded.pkgd.min.js", array('jquery'));
		wp_enqueue_script( 'qcld_fizzy_sparks_js', QCLD_SLIDERHERO_JS . "/fizzy_sparks.js", array('jquery'));
	endif;
	
	// scripts for racing_particles
	if($_slider[0]->type=='racing_particles') :
		wp_enqueue_script( 'qcld_hero_racing_particles_three_js', QCLD_SLIDERHERO_JS . "/three.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_racing_particles_tweenmax_js', QCLD_SLIDERHERO_JS . "/qcmax.js", array('jquery'));
		
		wp_enqueue_script( 'qcld_racing_particles_js', QCLD_SLIDERHERO_JS . "/racing_particles.js", array('jquery'));
	endif;
	
	// scripts for blob
	if($_slider[0]->type=='blob') :
		wp_enqueue_script( 'qcld_hero_blob_three_js', QCLD_SLIDERHERO_JS . "/three.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_blob_tweenmax_js', QCLD_SLIDERHERO_JS . "/blob_custom.js", array('jquery'));
		wp_enqueue_script( 'qcld_blob_js', QCLD_SLIDERHERO_JS . "/blob.js", array('jquery'));
	endif;
	
	// scripts for Hero 404
	if($_slider[0]->type=='hero_404') :
		wp_enqueue_script( 'qcld_hero_404_js', QCLD_SLIDERHERO_JS . "/hero_404.js", array('jquery'));
		
	endif;
	
	// scripts for Pretent Hacker
	if($_slider[0]->type=='pretend_hacker') :
		wp_enqueue_script( 'qcld_pretent_hacker_js', QCLD_SLIDERHERO_JS . "/pretent_hacker.js", array('jquery'));
		
	endif;
	
	// scripts for Rainy Season
	if($_slider[0]->type=='rainy_season') :
		wp_enqueue_script( 'qcld_rainy_season_js', QCLD_SLIDERHERO_JS . "/rainy_season.js", array('jquery'));
		
	endif;
	
	// scripts for Ripples
	if($_slider[0]->type=='ripples') :
		wp_enqueue_script( 'qcld_ripples_js', QCLD_SLIDERHERO_JS . "/ripples.js", array('jquery'));
		
	endif;
	
	
	
	// scripts for Header Banner
	if($_slider[0]->type=='the_great_attractor') :
		wp_enqueue_script( 'qcld_the_great_attractor_js', QCLD_SLIDERHERO_JS . "/the_great_attractor.js", array('jquery'));
		
	endif;
	
	//script for Hero Game
	if($_slider[0]->type=='play_or_work') :
		wp_enqueue_script( 'qcld_hero_hero_game_js', QCLD_SLIDERHERO_JS . "/hero_game.js", array('jquery'));
	endif;
	// Script Slider x
	wp_enqueue_script( 'qcld_hero_slider_app_letter_fx_js', QCLD_SLIDERHERO_JS . "/jquery-letterfx.js", array('jquery'));
	
	if($_slider[0]->type=='intro') :
		if(isset($params->introbgeffect) && $params->introbgeffect=='warp_speed'){
			
			wp_enqueue_script( 'qcld_hero_wrap_speed_three_js', QCLD_SLIDERHERO_JS . "/three.js", array('jquery'));
			wp_enqueue_script( 'qcld_hero_wrap_speed_tweenmax_js', QCLD_SLIDERHERO_JS . "/qcmax.js", array('jquery'));
			wp_enqueue_script( 'qcld_hero_wrap_speed_js', QCLD_SLIDERHERO_JS . "/wrap_speed.js", array('jquery'));
			
		}elseif(isset($params->introbgeffect) && $params->introbgeffect=='rising_cubes'){
			
			wp_enqueue_script( 'qcld_hero_rising_cubes_three_js', QCLD_SLIDERHERO_JS . "/three.js", array('jquery'));
			wp_enqueue_script( 'qcld_hero_rising_cubes_OrbitControls_js', QCLD_SLIDERHERO_JS . "/OrbitControls.js", array('jquery'));
			wp_enqueue_script( 'qcld_hero_rising_cubes_SubdivisionModifier_js', QCLD_SLIDERHERO_JS . "/SubdivisionModifier.js", array('jquery'));
			wp_enqueue_script( 'qcld_hero_rising_cubes_js', QCLD_SLIDERHERO_JS . "/rising_cubes.js", array('jquery'));	
			
		}
		elseif(isset($params->introbgeffect) && $params->introbgeffect=='rays_particles'){
			wp_enqueue_script( 'qcld_hero_rays_particles_perlin_js', QCLD_SLIDERHERO_JS . "/perlin.js", array('jquery'));
			wp_enqueue_script( 'qcld_hero_rays_particles_vector2_js', QCLD_SLIDERHERO_JS . "/vector2.js", array('jquery'));
			wp_enqueue_script( 'qcld_rays_particles_js', QCLD_SLIDERHERO_JS . "/rays_particles.js", array('jquery'));	
		}
		elseif(isset($params->introbgeffect) && $params->introbgeffect=='matrix'){
			
			wp_enqueue_script( 'qcld_hero_matrix_js', QCLD_SLIDERHERO_JS . "/matrix.js", array('jquery'));
			
		}elseif(isset($params->introbgeffect) && $params->introbgeffect=='colorful_particle'){
			
			wp_enqueue_script( 'qcld_hero_colorful_particle_js', QCLD_SLIDERHERO_JS . "/colorful_particle.js", array('jquery'));
			
		}elseif(isset($params->introbgeffect) && $params->introbgeffect=='electric_clock'){
			
			wp_enqueue_script( 'qcld_hero_electric_clock_js', QCLD_SLIDERHERO_JS . "/electric_clock.js", array('jquery'));
			
		}elseif(isset($params->introbgeffect) && $params->introbgeffect=='particle_system'){
			
			wp_enqueue_script( 'qcld_hero_particle_system_js', QCLD_SLIDERHERO_JS . "/particle_system.js", array('jquery'));
			
		}elseif(isset($params->introbgeffect) && $params->introbgeffect=='link_particle'){
			
			wp_enqueue_script( 'qcld_hero_underscore_js', QCLD_SLIDERHERO_JS . "/underscore-min.js", array('jquery'));
		wp_enqueue_script( 'qcld_hero_link_particle_js', QCLD_SLIDERHERO_JS . "/link_particle.js", array('jquery'));
			
		}elseif(isset($params->introbgeffect) && $params->introbgeffect=='ripples'){
			
			wp_enqueue_script( 'qcld_ripples_js', QCLD_SLIDERHERO_JS . "/ripples.js", array('jquery'));
			
		}
		elseif(isset($params->introbgeffect) && $params->introbgeffect=='just_cloud'){
			
			wp_enqueue_script( 'qcld_hero_just_cloud_twinmax_js', QCLD_SLIDERHERO_JS . "/qcmax.js", array('jquery'));
			wp_enqueue_script( 'qcld_hero_just_cloud_js', QCLD_SLIDERHERO_JS . "/just_cloud.js", array('jquery'));
			
		}
		
	
		
		wp_enqueue_script( 'qcld_hero_changethewords_js', QCLD_SLIDERHERO_JS . "/jquery.changethewords.js", array('jquery'));
	else:
		wp_enqueue_script( 'qcld_hero_slider_x_js', QCLD_SLIDERHERO_JS . "/jquery.slider_x.js", array('jquery'), time());
		wp_localize_script( 'qcld_hero_slider_x_js', 'heroslider', array(
			'type' => $_slider[0]->type			
		) );
	endif;
	
	

	//========================================================================//
	
	//script for title effect
	if(isset($params->titleffect) and $params->titleffect=='hero_blur_effect'){
		wp_enqueue_script( 'qcld_hero_custom_button_effect_js', QCLD_SLIDERHERO_JS . "/hero_button_blur.js", array('jquery'));
	}
	if(isset($params->titleffect) and $params->titleffect=='hero_matrix'){
		//wp_enqueue_script( 'qcld_hero_matrix_button_effect_js', QCLD_SLIDERHERO_JS . "/hero_button_matrix.js", array('jquery'),$ver = false, $in_footer = false);
	}
	if(isset($params->titleffect) and $params->titleffect=='hero_shuffle'){
		//wp_enqueue_script( 'qcld_hero_custom_button_shuffle_effect_js', QCLD_SLIDERHERO_JS . "/hero_shuffle.js", array('jquery'));
	}
	if(isset($params->titleffect) and $params->titleffect=='hero_rearrange'){
		//wp_enqueue_script( 'qcld_hero_custom_button_rearrange_effect_js', QCLD_SLIDERHERO_JS . "/hero_rearrange.js", array('jquery'));
	}
	