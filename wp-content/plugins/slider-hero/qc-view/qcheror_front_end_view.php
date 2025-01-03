<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function qcld_slider_front_end($_id,$_slider, $_slide, $atts) {

	ob_start();
	if(!function_exists('deleteSpacesNewlines')) {
		function deleteSpacesNewlines($str) {
			return preg_replace(array('/\r/', '/\n/'), '',$str);
		}
	}
	
	$sliderID = intval($_slider[0]->id);
	$style = json_decode($_slider[0]->style);
	$params = json_decode($_slider[0]->params);
	$customs = json_decode($_slider[0]->custom);
	$title = $_slider[0]->title;
	$bg_image_url = $_slider[0]->bg_image_url;
	
	$description = $params->description;
	$paramsJson = deleteSpacesNewlines($_slider[0]->params);
	$styleJson = deleteSpacesNewlines($_slider[0]->style);
	$customJson = deleteSpacesNewlines($_slider[0]->custom);
	
	if(isset($params->onlyonce) && $params->onlyonce==1){
		
		$cookie_name = 'hero_'.$_id;
		if(isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name]=='1'){
			return ob_get_clean();
		}

	}

	if(!$_slider) {
		return '<h3 style="color: #FF0011;">qcld_slider '.esc_attr( $_id ).' does not exist</h3>';
		
	}
	if(!$sliderID) {
		return '<h3 style="color: #FF0011;">qcld_slider '.esc_attr( $_id ).' was removed</h3>';
		
	}
	
	
	
require(QCLD_sliderhero_view.'/slider_hero_front_end_enque.php');
	

require(QCLD_sliderhero_view.'/slider_hero_front_end_google_font.php');

require(QCLD_sliderhero_view.'/slider_hero_front_end_style.php');

/*Ordering section*/
$odarr = array(
	'title'			=> str_replace('%','',$params->title->style->top),
	'description'	=> str_replace('%','',$params->description->style->top),
	'button'		=> str_replace('%','',$params->button1->style->top)
);

asort($odarr);



$preloader = get_option('sh_plugin_options');

if(isset($preloader['hero_enable_preloader_image']) and $preloader['hero_enable_preloader_image']!=''){
	$preloader_img = $preloader['hero_enable_preloader_image'];
}
if($atts['preloader']=='off'){
	$preloader['hero_enable_preloader'] = 'off';
}
if($atts['preloader']=='on'){
	$preloader['hero_enable_preloader'] = 'on';
}

?>

<?php if(isset($preloader['hero_enable_preloader']) && $preloader['hero_enable_preloader']=='on' && $_slider[0]->type!='wormhole'): ?>

<div class="hero_preloader" style="background: #fff;width: 100%;height: 300px;z-index: 999;position: relative;display: flex;justify-content: center !important;align-items: center;">
<?php 
	if(!isset($preloader_img)){
	?>
		<div class="hero_loader"></div>
	<?php
	}else{
	?>
		<img style="width: 200px;height: auto;" src="<?php echo esc_url( $preloader_img ); ?>" alt="loading" />
	<?php
	}
?>


</div>

<?php endif; ?>
<div id="particles-js<?php echo intval( esc_html( $_id ) ); ?>" <?php echo ($_slider[0]->type=='walkingbackground'?'class="slider_hero_walkingbackground"':''); ?> <?php echo (isset($preloader['hero_enable_preloader']) && $preloader['hero_enable_preloader']=='on' && $_slider[0]->type!='wormhole'?'style="display:none;"':''); ?> <?php if(isset($params->bgimageeffect) && $params->bgimageeffect=='parallax' && $bg_image_url!=''){ ?>data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="<?php echo esc_url( $bg_image_url ); ?>" <?php } ?>>

<?php
	require(QCLD_sliderhero_view.'/slider_hero_front_end_top_decoration.php');
	require(QCLD_sliderhero_view.'/slider_hero_front_end_bottom_decoration.php');
	
	if(isset($params->bgimageeffect) && $params->bgimageeffect=='ken-burn' && $bg_image_url!=''){
		echo '<img src="'.esc_url( $bg_image_url ).'" alt="bg image ken burn effect" />';
	}
	
	
?>

<?php
	require(QCLD_sliderhero_view.'/slider_hero_front_end_effect_config.php');
	
?>

	<?php 
		$totalSlide = 0;
		$preimg = array();
	?>
	<?php foreach($_slide as $slide) : 

	if($slide->published=='1' and $slide->draft!='1') :
	$totalSlide++;
	
	?>
		<?php 
			if($_slider[0]->type=='play_or_work'):
		?>
			<div class="hg_welcomePop">
				<div class="qcld_hero_content_area">
				<?php
				require(QCLD_sliderhero_view.'/slider_hero_front_end_title_effect.php');
				?>
				
				<div class="slider-x-item-title slider-x-item-title<?php echo intval( esc_html( $_id ) ); ?>">

					<?php echo esc_attr( apply_filters('the_content', wp_unslash(htmlspecialchars_decode($slide->description))) ); ?>

				</div>
				<?php require(QCLD_sliderhero_view.'/slider_hero_front_end_buttons.php');?>
			  
				</div>
			</div>
			<div class="hg_restartGamePop">
			  <div class="hg_textWrap">
				<h2>Continue...</h2>
				<div class="hg_cta hg_ctaRestartGame">Play again</div>
			  </div>
			</div>

			<div id="hg_stage">
			  <div id="hg_credits"><span>0</span> <p>credits</p></div>
			  <div id="hg_msg">Use your spacebar to keep me alive.</div>
			  <div id="hg_bird"><img src="<?php echo QCLD_SLIDERHERO_IMAGES; ?>/ufo.png" alt="" /></div>
			  
			</div>	
		<?php
			break;
			elseif($_slider[0]->type=='hero_404')://code for hero_404
		?>
		<div class="qcld_hero_content_area">
		<h2 class="hero_not_found"><span><?php echo wp_unslash( esc_js($slide->title)); ?></span></h2>
		
		<?php if(isset($params->hero404->title) and $params->hero404->title!=''): ?>
		<div class="hero_not_found_title"><?php echo esc_attr( apply_filters('the_content', wp_unslash(htmlspecialchars_decode($slide->description))) ); ?></div>
		<?php endif; ?>
		<?php require(QCLD_sliderhero_view.'/slider_hero_front_end_buttons.php');?>
		</div>
		
		<?php elseif($_slider[0]->type=='intro'): 
				
				if($slide->stomp!=''){
					$config = json_decode(wp_unslash(htmlspecialchars_decode($slide->stomp)));
				}else{
					$config = '';
				}
		?>
			<div class="eachAnim" data-id="<?php echo esc_attr( $slide->ordering ); ?>" data-animtype="<?php echo (isset($config->hero_stomp_animation) && $config->hero_stomp_animation!=''?esc_attr( $config->hero_stomp_animation ):'zoomIn'); ?>" data-animout="<?php echo (isset($config->hero_stomp_animation_out) && $config->hero_stomp_animation_out!=''?esc_attr( $config->hero_stomp_animation_out ):'zoomOut'); ?>" data-delay="<?php echo (isset($config->hero_stomp_delay) && $config->hero_stomp_delay!=''?esc_attr( $config->hero_stomp_delay ):'500'); ?>" 
			data-fontsize="<?php echo (isset($config->hero_stomp_fontsize) && $config->hero_stomp_fontsize!=''?esc_attr( $config->hero_stomp_fontsize ):''); ?>" data-fontweight="<?php echo (isset($config->hero_stomp_font_weight) && $config->hero_stomp_font_weight!=''?esc_attr( $config->hero_stomp_font_weight ):''); ?>" data-letterspacing="<?php echo (isset($config->hero_stomp_letter_spacing) && $config->hero_stomp_letter_spacing!=''?esc_attr( $config->hero_stomp_letter_spacing ):''); ?>" data-color="<?php echo (isset($config->hero_stomp_text_color) && $config->hero_stomp_text_color!=''?esc_attr( $config->hero_stomp_text_color ):''); ?>" style="display:none;<?php echo (isset($slide->image_link) && $slide->image_link!=''?'background:url('.esc_url( $slide->image_link ).')no-repeat':''); ?>;<?php echo (isset($config->hero_stomp_background_color)&&$config->hero_stomp_background_color!=''?'background-color:'.esc_attr( $config->hero_stomp_background_color ):''); ?>" data-fontfamily="<?php echo (isset($config->hero_intro_font_family)&&$config->hero_intro_font_family!=''?esc_attr( $config->hero_intro_font_family ):''); ?>">
				<?php echo wp_unslash(esc_html($slide->title)); ?>
			</div>
			
			
		<?php else: ?>
		<?php 
		
		if(isset($slide->image_link) && $slide->image_link!=''){
			$preimg[] = $slide->image_link;
		}
		?>
		<div class="qcld_hero_content_area" <?php echo ( isset($slide->image_link)&&$slide->image_link!='' && ( !isset($params->video) || $params->video!='youtube' ) ? 'data-bg-image="'.( $slide->image_link ).'"':'data-bg-image=""') ?> style="display:none;">
		
			<?php 
				foreach($odarr as $key=>$val ){
					if($key=='title'){
						require(QCLD_sliderhero_view.'/slider_hero_front_end_title_effect.php');
					}elseif($key=='description'){
					?>
						<div class="slider-x-item-title slider-x-item-title<?php echo intval( esc_html( $_id ) ); ?>">
							<?php

								//Fixing for XSS issues ON 07-02-2024 by Kadir

								$arrayOfAllowedTags = array( 'br' => array(), 'p' => array(), 'strong' => array() );

								echo wp_kses( wp_unslash(htmlspecialchars_decode($slide->description)), $arrayOfAllowedTags );

							?>
						</div>
					<?php
					}else{
						
						require(QCLD_sliderhero_view.'/slider_hero_front_end_buttons.php');
					}
				}
				
			?>
			
			
			
		</div> <!--End of hero Content Area-->
		<?php endif; ?>
	<?php 
	endif; // is slide published
	endforeach;
	require(QCLD_sliderhero_view.'/slider_hero_front_end_audio.php');
	
	if($_slider[0]->type=='intro'){
		?>
		<div class="hero_restart_button">
			<?php if(isset($params->herorestart) and $params->herorestart==0): ?>
			<span id="hero_restart_button"><i class="fa fa-repeat" aria-hidden="true"></i></span>
			<?php endif; ?>
			
			<?php if(isset($params->heropause) and $params->heropause==0): ?>
			<span id="hero_pause_button"><i class="fa fa-pause" aria-hidden="true"></i></span>
			<span id="hero_play_button" style="display:none;"><i class="fa fa-play" aria-hidden="true"></i></span>
			<?php endif; ?>
		</div>
		<?php 
	}
	?>


<?php if($_slider[0]->type=='youtube_video' && !empty($preimg)):?>
<div class="sh_bg_video sh_bg_video_y">
	<div class="sh_bg_video_fluid sh_bg_video_fluid_y" style="width: 100%;position: relative;padding: 0;padding-top: 56.5%;">
		<div id="hero_youtube_video"></div>
	</div>
</div>
<script type="text/javascript">

jQuery( document ).ready(function($) {
	var player;
	function onYouTubeIframeAPIReady() {
	    player = new YT.Player('hero_youtube_video', {
	        width: 600,
	        height: 400,
	        videoId: '<?php echo esc_attr($preimg[0]); ?>',
	        playerVars: {
	            color: 'white',
				autoplay: 1,
				controls: 0,
				rel: 0,
				showinfo: 0,
				<?php if(isset($params->videoslide_loop)&& $params->videoslide_loop=='1'){ ?>
				loop: 1,
				playlist: '<?php echo esc_attr( $preimg[0] ); ?>',
				<?php }else{ ?>
				loop: 0,
				<?php } ?>
				modestbranding: 1,
				<?php if(isset($params->videoslide_mute)&& $params->videoslide_mute=='1'){ ?>
				mute: 1
				<?php }else{ ?>
				mute: 0
				<?php } ?>
	        },
			
	        events: {
	            onReady: initialize,
				onStateChange: onPlayerStateChange
	        }
	    });
	}
	function initialize(event){
		event.target.playVideo();
	}

	function onPlayerStateChange(event) {
		//console.log(player.getPlayerState())
	}

	jQuery(window).load(function($){
		
		iframeHeight = jQuery('#hero_youtube_video').height();
		containerHeight = jQuery('#particles-js<?php echo intval( esc_html( $_id ) ); ?>').height();
		actualHeight = (iframeHeight - containerHeight)/2;
		jQuery('.sh_bg_video_fluid> iframe').css({'top': '-'+actualHeight+'px'});
		
	});

	onYouTubeIframeAPIReady();

});

</script>
<?php endif; ?>


	
	
	<?php require(QCLD_sliderhero_view.'/slider_hero_front_end_script.php') ?>
</div>

<?php if(!empty($preimg) && $_slider[0]->type!='video'){
	foreach($preimg as $preimageloaded){
		echo '<div style="background-image:url('.esc_url( $preimageloaded ).');position:absolute;left:-999px;width:2px;height:2px;z-index:-999"></div>';
	}
} ?>



<?php 
if($_slider[0]->type=='intro' and isset($params->newsliderafterend) and $params->newsliderafterend!=''){
	echo '<div class="second_div_hero" style="visibility:hidden;position:absolute;z-index:-9999999;top:0px;left:0px;width:100%;height:100%;">'.do_shortcode("[qcld_hero id=".esc_attr( $params->newsliderafterend )."]").'</div>'; 
}

?>
<style type="text/css">
<?php 
$customCss = get_option( 'sh_plugin_options' );
echo @$customCss['sh_custom_style'];
?>
</style>
<?php
	$content = ob_get_clean();
	$content = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $content);
	return $content;
}
