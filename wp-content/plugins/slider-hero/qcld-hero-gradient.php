<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit
function qcld_hero_gradient() {
?>
<div class="qcld-hero-gradient-modal" id="qcld-hero-gradient-modal" style="display:none">
  <div class="qcld-hero-gradient-modal-close">&times;</div>
  <h1 style="font-size: 16px;" class="qcld-hero-gradient-modal-title"><?php _e('Gradients', 'qcslide'); ?></h1>
  <p style="margin-top: 18px;"><?php _e('Please Select A gradient by clicking on it.', 'qcslide'); ?></p>
 <div style="position: absolute;right: 59px;top: 26px;">
<input type="button" value="Clear Field" class="button button-primary button-large getallvalue" />
</div>
  <div class="qcld-hero-gradient-modal-icons">
	<?php 
	$file = plugin_dir_path( __FILE__ ).'/gradient/data.txt';
	if(file_exists($file)){
	$data = file_get_contents($file);
	$data = explode("\n",$data);
	foreach($data as $d) : 

	?>
	<div class="gradient-box-hero" style="<?php echo esc_attr($d); ?>" data-gd="<?php echo esc_attr($d); ?>">
		
	</div>
	
	
	<?php endforeach; ?>
	<?php }else{
		echo 'Data file Does Not Exists!';
	} ?>
  </div>
</div>
<?php

}
add_action( 'admin_footer', 'qcld_hero_gradient');






