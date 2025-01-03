<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


function qcld_sliderhero_sliders_type() { 
$effects = array(
'No Effect','Intro Builder','Aeronautics Effect','Antigravity Flow','Balls &amp; Gravity Effect','Bird Flying Effect','Blob Effect','Blade Effect','Blur Effect','Bubble','Campfire','Circle Circle Intersection','Cloudy Sky Effect','Confetti Effect','Cosmic Web','Colorful Particle','Cursor And Paint','Day Night Effect','Division Effect','Directional Force','Distance','Electric Clock','Firework','Fizzy Sparks','Float and Rain','Floating Leafs','Flowing Circle Effect','Flying Rocket Effect','Grid Effect','Helix Corruption','Helix Chaos','Helix Multiple','Glitch','Iconsahedron Effect','Intersecting Line Effect','Just Cloud','Link Particle','Liquid Landscape','Matrix Effect','Metaballs','Microcosm Effect','Moving Color Wave','NASA','Neno Hexagon','Noise Effect','Nyan Cat','Orbital Effect','Particle Effect','Particle Helix','Particle System','Hacker','Physics Bug','Racing Particles','Rain Effect','Rainy Season','Rays and Particles','Play or Work?','Rain Of Line','Rising and falling cubes','Shape Animation','Space Elevator','Snow Effect','Squidematics','Stars Effect','Stellar Cloud','Subvisual','Tag Canvas','The Great Attractor','Thibaut','Tiny Galaxy Effect','Torus of Cubes','Water Effect','Wave Effect','Wave Animation Effect','Waaave Canvas','Walking Background','Warp Speed','Water Swimming','Waving Cloth','Water Droplet','Wormhole Effect','Word Cloud','Valentine Effect','Ygekpg Effect',
);
?>

	<div class="qchero_sliders_list_wrapper">
		<div class="sliderhero_menu_title">
			<h2 style="font-size: 26px;">Slider-Hero</h2>
		</div>
		<p class="hero_create_slider_header">Choose an Effect to Start Creating a New Slider. Choose "No Effect" if You Want a Simple Image Slider or only Video Background.</p>
		<div class="form_wrapper_sliderhero">
			
			<div class="hero-intro-effect">
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=intro'); ?>">
					<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/intro_effect.jpg' ?>" alt="Intro Builder" />
					
				</a>
			</div>
			
			<div class="effect_selection_area" style="clear:both;float:none;display:table;height: 195px;
    margin: 0 auto;">
			

				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=youtube_video'); ?>">
					<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/youtube_video.png' ?>" alt="Youtube Video" />
					<p>Youtube Video Slider</p>
				</a>

			
			</div>
			
			<div class="effect_selection_area">
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=no_effect'); ?>">
					<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/no-effect.jpg' ?>" alt="" />
					<p>No Effect</p>
				</a>
				
				
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=particle'); ?>">
					<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/default.jpg' ?>" alt="" />
					<p>Particle Effect</p>
				</a>
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=particle_snow'); ?>">
					<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/snow.jpg' ?>" alt="" />
					<p>Snow Effect</p>
				</a>

				
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=particle_nasa'); ?>">
					<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/nasa.jpg' ?>" alt="" />
					<p>NASA</p>
				</a>
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=particle_bubble'); ?>">
					<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/bubble.jpg' ?>" alt="" />
					<p>Bubble</p>
				</a>
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=nyan_cat'); ?>">
					<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/nyan_cat.jpg' ?>" alt="" />
					<p>Nyan Cat</p>
				</a>
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=cubes_animation'); ?>">
					<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/cubes_animation.jpg' ?>" alt="" />
					<p>Cubes Animation</p>
				</a>
				
				
				<div style="clear:both"></div>
				<p style="font-size: 17px;color: red;text-align:center">Note: You can add Youtube Video as Slider background for all of the above slider effects except for Intro builder & Cubes Animation.</p>
				
				<div class="hero_pro_effects" style="clear:both;float:none;display:table;height: 195px;
    margin: 0 auto; margin-top: 54px;">
			
				<div class="unlink-pro">
					<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/custom_video.png' ?>" alt="Video" />
					<p>Custom Video Slider <span>[PRO]</span></p>
				</div>
				<div class="unlink-pro">
					<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/vimeo_video.png' ?>" alt="Vimeo Video" />
					<p>Vimeo Video Slider <span>[PRO]</span></p>
				</div>
			
			</div>
				
				<div class="hero_pro_effects">
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/aeronautics.jpg' ?>" alt="Aeronautics Effect" />
						<p>Aeronautics Effect<span>[PRO]</span></p>
					</div>				
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/antigravity.jpg' ?>" alt="Antigravity Flow" />
						<p>Antigravity Flow<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/animated_cloud.jpg' ?>" alt="Animated Cloud" />
						<p>Animated Cloud<span>[PRO]</span></p>
					</div>
					
					
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/ballsgravity.jpg' ?>" alt="Balls & Gravity Effect" />
						<p>Balls & Gravity Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/bird.png' ?>" alt="Bird Flying Effect" />
						<p>Bird Flying Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/blob.jpg' ?>" alt="Blob Effect" />
						<p>Blob Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/glitch.jpg' ?>" alt="Blade Effect" />
						<p>Blade Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/blur.jpg' ?>" alt="Blur Effect" />
						<p>Blur Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/campfire.jpg' ?>" alt="Campfire" />
						<p>Campfire<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/circle.jpg' ?>" alt="Circle Circle Intersection" />
						<p>Circle Circle Intersection<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/cloudysky.jpg' ?>" alt="Cloudy Sky Effect" />
						<p>Cloudy Sky Effect<span>[PRO]</span></p>
					</div>				
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/confetti.jpg' ?>" alt="Confetti Effect" />
						<p>Confetti Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/cosmic_web.jpg' ?>" alt="Cosmic Web" />
						<p>Cosmic Web<span>[PRO]</span></p>
					</div>				
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/colorful_particle.jpg' ?>" alt="Colorful Particle" />
						<p>Colorful Particle<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/cursorandpaint.jpg' ?>" alt="Cursor And Paint" />
						<p>Cursor And Paint<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/daynight.jpg' ?>" alt="Day Night Effect" />
						<p>Day Night Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/division.jpg' ?>" alt="Division Effect" />
						<p>Division Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/directional.jpg' ?>" alt="Directional Force" />
						<p>Directional Force<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/distance.jpg' ?>" alt="Distance" />
						<p>Distance<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/electric_clock.jpg' ?>" alt="Electric Clock" />
						<p>Electric Clock<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/firework.jpg' ?>" alt="Firework" />
						<p>Firework<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/fizzy_sparks.jpg' ?>" alt="Fizzy Sparks" />
						<p>Fizzy Sparks<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/floatrain.jpg' ?>" alt="Float and Rain" />
						<p>Float and Rain<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/floatingleafs.png' ?>" alt="Floating Leafs" />
						<p>Floating Leafs<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/flowingcircle.jpg' ?>" alt="Flowing Circle Effect" />
						<p>Flowing Circle Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/flyingrocket.jpg' ?>" alt="Flying Rocket Effect" />
						<p>Flying Rocket Effect<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/grid.jpg' ?>" alt="Grid Effect" />
						<p>Grid Effect<span>[PRO]</span></p>
					</div>

					
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/corruption.jpg' ?>" alt="Helix Corruption" />
						<p>Helix Corruption<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/chaos.jpg' ?>" alt="Helix Chaos" />
						<p>Helix Chaos<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/helix_multiple.jpg' ?>" alt="Helix Multiple" />
						<p>Helix Multiple<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/hero_404.jpg' ?>" alt="Glitch" />
						<p>Glitch<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/iconsahedron.jpg' ?>" alt="Iconsahedron Effect" />
						<p>Iconsahedron Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/line.jpg' ?>" alt="Intersecting Line Effect" />
						<p>Intersecting Line Effect<span>[PRO]</span></p>
					</div>
					
					

					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/just_cloud.jpg' ?>" alt="Just Cloud" />
						<p>Just Cloud<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/link_particle.jpg' ?>" alt="Link Particle" />
						<p>Link Particle<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/liquid_landscape.jpg' ?>" alt="Liquid Landscape" />
						<p>Liquid Landscape<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/matrix.jpg' ?>" alt="Matrix Effect" />
						<p>Matrix Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/metaballs.jpg' ?>" alt="Metaballs" />
						<p>Metaballs<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/microcosm.jpg' ?>" alt="Microcosm Effect" />
						<p>Microcosm Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/svg_animation.jpg' ?>" alt="Moving Color Wave" />
						<p>Moving Color Wave<span>[PRO]</span></p>
					</div>

								
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/neno_hexagon.jpg' ?>" alt="Neno Hexagon" />
						<p>Neno Hexagon<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/noise_particle.jpg' ?>" alt="Noise Effect" />
						<p>Noise Effect<span>[PRO]</span></p>
					</div>
					

					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/orbital.jpg' ?>" alt="Orbital Effect" />
						<p>Orbital Effect<span>[PRO]</span></p>
					</div>

					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/helix.jpg' ?>" alt="Particle Helix" />
						<p>Particle Helix<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/particle_system.jpg' ?>" alt="Particle System" />
						<p>Particle System<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/pretent_hacker.jpg' ?>" alt="Hacker" />
						<p>Hacker<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/physics_bug.jpg' ?>" alt="Physics Bug" />
						<p>Physics Bug<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/racing_particles.jpg' ?>" alt="Racing Particles" />
						<p>Racing Particles<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/rain.jpg' ?>" alt="Rain Effect" />
						<p>Rain Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/rainy_season.jpg' ?>" alt="rainy_season" />
						<p>Rainy Season<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/rays_particles.jpg' ?>" alt="Rays and Particles" />
						<p>Rays and Particles<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/ripples.jpg' ?>" alt="Ripples" />
						<p>Ripples Effect<span>[PRO]</span></p>
					</div>
					
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/hero_game.jpg' ?>" alt="Play or Work?" />
						<p>Play or Work?<span>[PRO]</span></p>
					</div>

					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/rainofline.jpg' ?>" alt="Rain Of Line" />
						<p>Rain Of Line<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/rising_cubes.jpg' ?>" alt="Rising and falling cubes" />
						<p>Rising and falling cubes<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/shapanimation.jpg' ?>" alt="Shape Animation" />
						<p>Shape Animation<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/space_elevator.jpg' ?>" alt="Space Elevator" />
						<p>Space Elevator<span>[PRO]</span></p>
					</div>
					
									
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/squidematics.jpg' ?>" alt="Squidematics" />
						<p>Squidematics<span>[PRO]</span></p>
					</div>	
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/stars.jpg' ?>" alt="Stars Effect" />
						<p>Stars Effect<span>[PRO]</span></p>
					</div>				
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/stellar.jpg' ?>" alt="Stellar Cloud" />
						<p>Stellar Cloud<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/stripe-cube.jpg' ?>" alt="Stripe Cude Effect" />
						<p>Stripe Cube Effect<span>[PRO]</span></p>
					</div>

					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/subvisual.png' ?>" alt="Subvisual" />
						<p>Subvisual<span>[PRO]</span></p>
					</div>
					

					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/tagcanvas.jpg' ?>" alt="Tag Canvas" />
						<p>Tag Canvas<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/header_banner.jpg' ?>" alt="The Great Attractor" />
						<p>The Great Attractor<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/thibaut.jpg' ?>" alt="Thibaut" />
						<p>Thibaut<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/tiny_galaxy.jpg' ?>" alt="Tiny Galaxy Effect" />
						<p>Tiny Galaxy Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/torus.jpg' ?>" alt="Torus of Cubes" />
						<p>Torus of Cubes<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/water.jpg' ?>" alt="Water Effect" />
						<p>Water Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/wave.jpg' ?>" alt="Wave Effect" />
						<p>Wave Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/wave_animation.jpg' ?>" alt="Wave Animation Effect" />
						<p>Wave Animation Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/waaave.jpg' ?>" alt="Waaave Canvas" />
						<p>Waaave Canvas<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/walkingbg.jpg' ?>" alt="Walking Background" />
						<p>Walking Background<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/wrap_speed.jpg' ?>" alt="Wrap Speed" />
						<p>Warp Speed<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/water_swimming.jpg' ?>" alt="Water Swimming" />
						<p>Water Swimming<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/waving_cloth.jpg' ?>" alt="Waving Cloth" />
						<p>Waving Cloth<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/waterdroplet.jpg' ?>" alt="Water Droplet" />
						<p>Water Droplet<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/wormhole.jpg' ?>" alt="Wormhole Effect" />
						<p>Wormhole Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/wordcloud.jpg' ?>" alt="Word Cloud" />
						<p>Word Cloud<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/valentine.jpg' ?>" alt="Valentine Effect" />
						<p>Valentine Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/ygekpg.jpg' ?>" alt="Ygekpg Effect" />
						<p>Ygekpg Effect<span>[PRO]</span></p>
					</div>
				</div>
				
			</div>			
		</div>

	</div>
	<?php
}

