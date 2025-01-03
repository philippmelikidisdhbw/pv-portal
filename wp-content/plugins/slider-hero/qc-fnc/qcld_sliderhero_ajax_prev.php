<?php
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
function qcld_show_preview_items_fnc(){
$id = sanitize_text_field($_POST['sid']);

global $wpdb;
$query   = $wpdb->prepare( "SELECT * FROM " . QCLD_TABLE_SLIDERS . " WHERE id = '%d' ", $id );
$_slider = $wpdb->get_results( $query );
$query   = $wpdb->prepare( "SELECT * FROM " . QCLD_TABLE_SLIDES . " WHERE sliderid = '%d' ORDER BY ordering DESC", $id );
$_slide = $wpdb->get_results( $query );

	if(!function_exists('deleteSpacesNewlines')) {
		function deleteSpacesNewlines($str) {
			return preg_replace(array('/\r/', '/\n/'), '',$str);
		}
	}
	if(!$_slider) {
		echo '<h3 style="color: #FF0011;">qcld_slider '.esc_html( $_id ).' does not exist</h3>';
		return;
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
	if(!$sliderID) {
		echo '<h3 style="color: #FF0011;">qcld_slider '.esc_html( $_id ).' was removed</h3>';
		return;
	}

/*Ordering section*/
$odarr = array(
	'title'			=> str_replace('%','',$params->title->style->top),
	'description'	=> str_replace('%','',$params->description->style->top),
	'button'		=> str_replace('%','',$params->button1->style->top)
);

asort($odarr);
?>

	<div id="sm-modal" class="slider_hero_modal">

		<!-- Modal content -->
		<div class="modal-content" style="width: 95%;">
			<span class="close"><?php _e( "X", 'Slider Hero' ); ?></span>
			<h3><?php _e( "Preview", 'Slider Hero' ); ?></h3>
			<hr/>
<?php 
require(QCLD_sliderhero_view.'/slider_hero_front_end_style.php');
?>
<style type="text/css">
#particles-js<?php echo intval( esc_html( $_id ) ); ?>{
	width: 100% !important;
	height: 87vh !important;
	left: 0px !important;
	max-width:100% !important;
}
#threeD canvas{
	width:100% !important;
	height:450px !important;
}
#hero_tags{
	display:none;
}
</style>


<div id="particles-js<?php echo intval( esc_html( $_id ) ); ?>" <?php echo ($_slider[0]->type=='walkingbackground'?'class="slider_hero_walkingbackground"':''); ?>>

<?php
	require(QCLD_sliderhero_view.'/slider_hero_front_end_effect_config.php');
?>

<?php if($_slider[0]->type=='hero_404'){?>

	<h2 class="hero_not_found"><span> Not Found</span></h2>
	<?php if(isset($params->hero404->title) and $params->hero404->title!=''): ?>
	<h3 class="hero_not_found_title"><?php echo esc_html( $params->hero404->title ); ?></h3>
	<?php endif; ?>
<?php
}else{
?>
<?php $totalSlide = 0; ?>
<?php foreach($_slide as $slide) : 

if($slide->published=='1' and $slide->draft!='1') :
$totalSlide++;
?>

	<?php 
		if($_slider[0]->type=='play_or_work'):
	?>
		<div class="hg_welcomePop">
		  
			<?php
			require(QCLD_sliderhero_view.'/slider_hero_front_end_title_effect.php');
			?>
			
			<div class="slider-x-item-title slider-x-item-title<?php echo esc_attr( $_id ); ?>">
				<?php echo apply_filters('the_content', wp_unslash(htmlspecialchars_decode($slide->description))); ?>
			</div>
			<?php require(QCLD_sliderhero_view.'/slider_hero_front_end_buttons.php');?>
		  
		</div>
		<div class="hg_restartGamePop">
		  <div class="hg_textWrap">
			<h2>Continue...</h2>
			<div class="hg_cta hg_ctaRestartGame">Play again</div>
		  </div>
		</div>

		<div id="hg_stage">
		  <div id="hg_credits"><span>0</span> <p>credits</p></div>
		  
		  <div id="hg_bird"><img src="<?php echo esc_url( QCLD_SLIDERHERO_IMAGES ); ?>/ufo.png" alt="" /></div>
		  
		</div>	
	<?php elseif($_slider[0]->type=='intro'):
				
				if($slide->stomp!=''){
					$config = json_decode(wp_unslash(htmlspecialchars_decode($slide->stomp)));
				}else{
					$config = '';
				}
		?>
			<div class="eachAnim" data-id="<?php echo esc_attr( $slide->ordering ); ?>" data-animtype="<?php echo (isset($config->hero_stomp_animation) && $config->hero_stomp_animation!=''?esc_attr( $config->hero_stomp_animation ):'zoomIn'); ?>" data-delay="<?php echo (isset($config->hero_stomp_delay) && $config->hero_stomp_delay!=''?esc_attr( $config->hero_stomp_delay ):'500'); ?>" 
			data-fontsize="<?php echo (isset($config->hero_stomp_fontsize) && $config->hero_stomp_fontsize!=''?esc_attr( $config->hero_stomp_fontsize ):''); ?>" data-fontweight="<?php echo (isset($config->hero_stomp_font_weight) && $config->hero_stomp_font_weight!=''?esc_attr( $config->hero_stomp_font_weight ):''); ?>" data-letterspacing="<?php echo (isset($config->hero_stomp_letter_spacing) && $config->hero_stomp_letter_spacing!=''?esc_attr( $config->hero_stomp_letter_spacing ):''); ?>" data-color="<?php echo (isset($config->hero_stomp_text_color) && $config->hero_stomp_text_color!=''?esc_attr( $config->hero_stomp_text_color ):''); ?>" style="display:none;<?php echo (isset($slide->image_link) && $slide->image_link!=''?'background:url('.esc_url( $slide->image_link ).')no-repeat':''); ?>;<?php echo (isset($config->hero_stomp_background_color)&&$config->hero_stomp_background_color!=''?'background-color:'.esc_url( $config->hero_stomp_background_color ):''); ?>" data-fontfamily="<?php echo (isset($config->hero_intro_font_family)&&$config->hero_intro_font_family!=''?esc_attr( $config->hero_intro_font_family ):''); ?>">
				<?php echo wp_unslash( esc_attr( $slide->title ) ); ?>
			</div>
			
		<?php elseif($_slider[0]->type=='hero_404'): ?>
		<div class="qcld_hero_content_area">
		<h2 class="hero_not_found"><span><?php echo wp_unslash( esc_js($slide->title)); ?></span></h2>
		
		<?php if(isset($params->hero404->title) and $params->hero404->title!=''): ?>
		<div class="hero_not_found_title"><?php echo apply_filters('the_content', wp_unslash(htmlspecialchars_decode($slide->description))); ?></div>
		<?php endif; ?>
		<?php require(QCLD_sliderhero_view.'/slider_hero_front_end_buttons.php');?>
		</div>
		<?php else: ?>
		<?php 
		
		if(isset($slide->image_link) && $slide->image_link!=''){
			$preimg[] = $slide->image_link;
		}
		?>
	<div class="qcld_hero_content_area" <?php echo (isset($slide->image_link)&&$slide->image_link!=''?'data-bg-image="'.esc_attr( $slide->image_link ).'"':'data-bg-image=""') ?>>
	
		<?php 
			foreach($odarr as $key=>$val ){
				if($key=='title'){
					require(QCLD_sliderhero_view.'/slider_hero_front_end_title_effect.php');
				}elseif($key=='description'){
				?>
					<div class="slider-x-item-title slider-x-item-title<?php echo intval( esc_html( $_id ) ); ?>">
						<?php echo wp_unslash(htmlspecialchars_decode($slide->description)); ?>
					</div>
				<?php
				}else{
					require(QCLD_sliderhero_view.'/slider_hero_front_end_buttons.php');
				}
			}
		?>
	
		
		
	</div> <!--End of hero Content Area-->
	<?php 
		endif;
	?>
	
<?php 
endif;
endforeach;
require(QCLD_sliderhero_view.'/slider_hero_front_end_audio.php');
?>
<?php
}
 ?>
 
 
<?php if($_slider[0]->type=='video' && !empty($preimg)):?>

<div class="sh_bg_video">
	<div class="sh_bg_video_fluid" style="width: 100%;position: relative;padding: 0;padding-top: <?php echo ($style->screenoption=='2'?'56.5%':$style->height.'px'); ?>;">
		<video id="hero_vid<?php echo intval( esc_html( $_id ) ); ?>" class="qc_hero_vid" autoplay preload="auto" <?php echo (isset($params->videoslide_loop)&& $params->videoslide_loop=='1'?'loop':''); ?> <?php echo (isset($params->videoslide_mute)&& $params->videoslide_mute=='1'?'muted':''); ?> style="margin: auto; position: absolute; z-index: -1; top: 50%; left: 50%; transform: translate(-50%, -50%); visibility: visible; opacity: 1; width: 100%; height: auto;">
			<source src="<?php echo esc_url( $preimg[0] ); ?>" >
		</video>
	</div>
</div>
<?php endif; ?>

<?php if($_slider[0]->type=='vimeo_video' && !empty($preimg)):?>

<div class="sh_vimeo_wrapper">
	
		<iframe src="https://player.vimeo.com/video/<?php echo esc_attr( $preimg[0] ); ?>?<?php echo (isset($params->videoslide_mute)&& $params->videoslide_mute=='1'?'background=1&':''); ?>autoplay=1<?php echo (isset($params->videoslide_loop)&& $params->videoslide_loop=='1'?'&loop=1':'&loop=0'); ?>&byline=0&title=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	
</div>

<?php endif; ?>

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
	        videoId: '<?php echo esc_attr( $preimg[0] ); ?>',
	        playerVars: {
	            color: 'white',
				autoplay: 1,
				controls: 0,
				rel: 0,
				showinfo: 0,
				<?php if(isset($params->videoslide_loop)&& $params->videoslide_loop=='1'){ ?>
				loop: 1,
				<?php echo esc_attr( $preimg[0] ); ?>
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


		</div>
	</div>
<?php
exit;
}
add_action( 'wp_ajax_qcld_show_preview_items', 'qcld_show_preview_items_fnc');
?>