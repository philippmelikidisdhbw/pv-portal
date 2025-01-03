<?php if(isset($params->video)&& $params->video=='custom'):  ?>
<?php if(isset($params->sound_control) && $params->sound_control==0): ?>
<div class="hero_mute_div">
	<span <?php echo (isset($params->video_mute)&& $params->video_mute=='1'?'style="display:block"':'style="display:none"'); ?> id="hero_video_mute<?php echo esc_attr( $_slider[0]->id ); ?>"><i class="fa fa-volume-off" aria-hidden="true"></i></span>
	<span <?php echo (isset($params->video_mute)&& $params->video_mute=='1'?'style="display:none"':'style="display:block"'); ?> id="hero_video_sound<?php echo esc_attr( $_slider[0]->id ); ?>"><i class="fa fa-volume-up" aria-hidden="true"></i></span>
</div>
<script type="text/javascript">
jQuery(window).load(function($){
	
	jQuery('#hero_video_mute<?php echo esc_attr( $_slider[0]->id ); ?>').on('click', function(){
		jQuery(this).hide();
		jQuery('#hero_video_sound<?php echo esc_attr( $_slider[0]->id ); ?>').show();
		jQuery("#hero_vid<?php echo intval( esc_html( $_id ) ); ?>").prop('muted', false);
	})
	jQuery('#hero_video_sound<?php echo esc_attr( $_slider[0]->id ); ?>').on('click', function(){
		jQuery(this).hide();
		jQuery('#hero_video_mute<?php echo esc_attr( $_slider[0]->id ); ?>').show();
		jQuery("#hero_vid<?php echo intval( esc_html( $_id ) ); ?>").prop('muted', true);
	})
	
})
</script>
<?php endif; ?>
<?php endif; ?>

<?php 
if(isset($params->heroskip) && $params->heroskip==0 && $_slider[0]->type=='intro'): 
?>
<div class="hero_skip_button">Skip</div>
<?php endif; ?>

<?php if(isset($params->video)&& $params->video=='custom'):  ?>
<div class="hero_play_video_button" style="display:none;"><i class="fa fa-play" aria-hidden="true"></i></div>
<?php endif; ?>
<?php if($_slider[0]->type=='video'): ?>
<div class="hero_play_video_button" style="display:none;"><i class="fa fa-play" aria-hidden="true"></i></div>
<?php endif; ?>


<?php 
if(isset($_slider[0]->bg_audio_url) && $_slider[0]->bg_audio_url!=''){
?>

<audio src="<?php echo esc_attr($_slider[0]->bg_audio_url); ?>" type="audio" preload="auto" id="hero_audio"></audio>
<style type="text/css">
.hero_audio_control{
<?php if(isset($params->controllerposition) && $params->controllerposition=='topleft'): ?>
left:0px;
top:0px;
<?php elseif(isset($params->controllerposition) && $params->controllerposition=='topright'): ?>
right:0px;
top:0px;
<?php elseif(isset($params->controllerposition) && $params->controllerposition=='bottomleft'): ?>
left:0px;
bottom:0px;
<?php elseif(isset($params->controllerposition) && $params->controllerposition=='bottomright'): ?>
right:0px;
bottom:0px;
<?php else: ?>
right:0px;
top:0px;
<?php endif; ?>
}
</style>

<?php if(isset($params->audiocontrol) && $params->audiocontrol==1){ ?>
	<div class="hero_audio_control">
	
	<?php if(isset($params->audioautoplay) && $params->audioautoplay==1){ ?>
		<span id="hero_control_pause"><img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/volume.gif'; ?>" /></span>
		<span id="hero_control_play" style="display:none;"><img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/volume.png'; ?>" /></span>
	<?php }else{ ?>
		<span id="hero_control_pause" style="display:none;"><img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/volume.gif'; ?>" /></span>
		<span id="hero_control_play" ><img src="<?php echo QCLD_SLIDERHERO_IMAGES.'/volume.png'; ?>" /></span>
	<?php } ?>
</div>	
<?php } ?>

<script type="text/javascript">

jQuery(window).load(function($){
	audioControl();
	<?php if(isset($params->controllerposition) && $params->controllerposition=='bottomright'): ?>
	if(window.innerHeight>1499){
		jQuery('.hero_audio_control').css({
			'right':'2%',
			'bottom':'12%'
		})
	}
	<?php endif; ?>
	
	<?php if(isset($params->controllerposition) && $params->controllerposition=='bottomleft'): ?>
	if(window.innerHeight>1499){
		jQuery('.hero_audio_control').css({
			'left':'2%',
			'bottom':'12%'
		})
	}
	<?php endif; ?>
})

function audioControl(){
	var audio = jQuery('#hero_audio')[0];
	<?php if(isset($params->audiorepeat) && $params->audiorepeat==1 and isset($params->audiorepeatcount) and $params->audiorepeatcount!=''): ?>
		
		var times = <?php echo esc_attr( $params->audiorepeatcount ); ?>;
        
		
		jQuery('#hero_audio')[0].play();
		jQuery('#hero_audio').on('ended', function() {
			console.log('ended audio');
			times--;
			if(times===0){
				jQuery('#hero_control_pause').hide();
				jQuery('#hero_control_play').show();
				return;
			}
			console.log(times);
			jQuery('#hero_audio')[0].play();
		})
		 
	<?php else: ?>
	
		<?php if(isset($params->audiorepeat) && $params->audiorepeat==1){ ?>
		audio.loop = true;
		<?php }else{
		?>
		jQuery('#hero_audio').on('ended', function() {
		   jQuery('#hero_control_pause').hide();
			jQuery('#hero_control_play').show();
		});
		<?php
		} ?>
		
		<?php if(isset($params->audioautoplay) && $params->audioautoplay==1){ ?>
		
		audio.play();
		var promise = document.querySelector('audio').play();
		if (promise !== undefined) {
		  promise.then(_ => {
			console.log('autoplay started');
		  }).catch(error => {
			  console.log('autoplay is Not Allowed.');
			jQuery('#hero_control_pause').hide();
			jQuery('#hero_control_play').show();
		  });
		}
		
		
		<?php } ?>
	<?php endif; ?>
	
	jQuery(document).on('click','#hero_control_play', function(){
		jQuery('#hero_control_play').hide();
		jQuery('#hero_control_pause').show();
		audio.play();
		return false;    
	})
	jQuery(document).on('click','#hero_control_pause', function(){
		jQuery('#hero_control_pause').hide();
		jQuery('#hero_control_play').show();
		audio.pause();
		return false;    
	})
	
	
}
</script>	

<?php
}



