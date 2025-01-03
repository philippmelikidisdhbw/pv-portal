<?php
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
function qcld_show_preview_items2_fnc(){
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
		echo '<h3 style="color: #FF0011;">qcld_slider '.esc_attr( $_id ).' does not exist</h3>';
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
		echo '<h3 style="color: #FF0011;">qcld_slider '.esc_attr( $_id ).' was removed</h3>';
		return;
	}


?>

<style>


#slider_hero_pop_modal_content{
  max-width: 100% !important;
  height: 100%;
    overflow-x: hidden;
  overflow-y: hidden;
<?php
if($_slider[0]->type!='walkingbackground'){
if(isset($_slider[0]->bg_gradient) and strlen($_slider[0]->bg_gradient)>2){
	echo esc_html( str_replace('"','',$_slider[0]->bg_gradient) );
}else{
?>
  background-color: <?php echo ($params->background==''?'#4684b5':esc_attr($params->background)); ?>;
  background-image: url('<?php echo esc_url($bg_image_url); ?>');
<?php
}
?> 
  background-size: cover;
  background-position: 50% 50%;
  background-repeat: no-repeat;
<?php } ?>
  position:relative;
}

.qcld_hero_content_area h2{
position: absolute;
top: <?php echo esc_attr($params->title->style->top); ?>;
left: 0px;
width: 100%;
padding: 0px 46px !important
box-sizing: border-box;
z-index: 9;
}
.qcld_hero_content_area > .slider-x-item-title{
position: absolute;
top: <?php echo esc_attr($params->description->style->top); ?>;
left: 0px;
width: 100%;
padding: 0px 46px !important;
box-sizing: border-box;
z-index: 9;
}

.qcld_hero_content_area h2{
<?php 
if(isset($params->titlefontsize) and $params->titlefontsize!=''){
	echo 'font-size: '.esc_attr($params->titlefontsize).'px;';	
}else{
	echo 'font-size: 54px;';
}
?>
<?php 
if(isset($params->titlecolor) and $params->titlecolor!=''){
	echo 'color: '.esc_attr($params->titlecolor).';';	
}else{
	echo 'color: #fff;';
}
if(isset($params->title->align) and $params->title->align!=''){
	echo 'text-align: '.esc_attr($params->title->align).';';	
}
?>
padding: 10px;
text-shadow: initial;
}
.hero_slider_btn{
	position:absolute;
	top: <?php echo esc_attr($params->button1->style->top); ?>;
	left:0px;
	width:100%;
	padding: 0px 46px;
	box-sizing: border-box;
	z-index: 9;
<?php 
if(isset($params->button1->align) and $params->button1->align!=''){
	echo 'text-align: '.esc_attr($params->button1->align).';';	
}

?>
}

.qcld_hero_content_area > .slider-x-item-title > p{
<?php 
if(isset($params->descriptioncolor) and $params->descriptioncolor!=''){
	echo 'color: '.esc_attr($params->descriptioncolor).';';	
}else{
	echo 'color: #fff;';
}
?>

<?php 
if(isset($params->descfontsize) and $params->descfontsize!=''){
	echo 'font-size: '.esc_attr($params->descfontsize).'px;';	
	echo 'line-height: '.esc_attr($params->descfontsize).'px;';	
}else{
	echo 'font-size: 26px;';
	echo 'line-height: 26px;';
}
if(isset($params->description->align) and $params->description->align!=''){
	echo 'text-align: '.esc_attr($params->description->align).';';	
}
?>

}

</style>

<?php $totalSlide = 0; ?>
<?php foreach($_slide as $slide) : 

if($slide->published=='1' and $slide->draft!='1') :
$totalSlide++;
?>

	<div class="qcld_hero_content_area">

		<?php
		require(QCLD_sliderhero_view.'/slider_hero_front_end_title_effect.php');
		?>
		<div class="slider-x-item-title slider-x-item-title<?php echo intval( esc_html( $_id ) ); ?>"><?php echo apply_filters('the_content', wp_unslash(htmlspecialchars_decode($slide->description))); ?>
		</div>
<?php require(QCLD_sliderhero_view.'/slider_hero_front_end_buttons.php');?>

		
	</div>
<?php 
endif;
endforeach;
?>

<script type="text/javascript">

	
    jQuery.fn.sliderX.defaults = {
		
		sliderWidth: 800,
		sliderHeight:450,
	
        pauseTime: <?php echo esc_attr($params->effect->interval); ?>,
        startSlide: 0,
		
		titlePositionTop:<?php echo esc_attr(str_replace(array('px','%'),'',$params->title->style->top)) ?>,
		
		titlePositionLeft:'0%',
		
		descPositionTop:<?php echo esc_attr(str_replace(array('px','%'),'',$params->description->style->top)) ?>,
		
		descPositionLeft:'0%',
		
		//titleTextAnimation:'pulse',
		titleTextColor:'<?php echo $params->titlecolor != ''? esc_attr($params->titlecolor):'#000' ?>',
		arrowClass: '<?php echo $params->arrow != ''? esc_attr($params->arrow):'qc-sliderX' ?>',
		descriptionTextColor:'<?php echo $params->descriptioncolor != ''? esc_attr($params->descriptioncolor):'#000' ?>',
		
		titleFontSize:'<?php echo $params->titlefontsize != ''? esc_attr($params->titlefontsize):'20' ?>',
		
		descriptionFontSize:'<?php echo $params->descfontsize != ''? esc_attr($params->descfontsize):'30' ?>',
		<?php 
		if(isset($style->screenoption) and $style->screenoption=='1'){
		?>
		fullWidth:false,
		<?php
		}else{
		?>
		fullWidth:false,
		<?php
		}
		?>
		<?php 
		if(isset($style->screenoption) and $style->screenoption=='2'){
		?>
		fullScreen:false,
		<?php
		}else{
		?>
		fullScreen:false,
		<?php
		}
		?>
		<?php 
		if(isset($style->screenoption) and $style->screenoption=='3'){
		?>
		Screenauto:false,
		<?php
		}else{
		?>
		Screenauto:false,
		<?php
		}
		?>		
		<?php 
			if($totalSlide > 1){
		?>
		directionCon:true,
		bottomCon:true,
		slideStart: true,
		<?php
			}else{
		?>
		directionCon:false,
		bottomCon:false,
		slideStart: false,
		<?php
			}
		?>
		prevSlideText:'Previous',
		nextSlideText:'Next',
		titleAnimation: '<?php echo ($params->titleffect!=''?esc_attr($params->titleffect):'normal') ?>',
		desAnimation: '<?php echo ($params->deseffect!=''?esc_attr($params->deseffect):'normal') ?>',
		lfxtitlein:'<?php echo (isset($params->lfxtitlein) && $params->lfxtitlein!=''?esc_attr($params->lfxtitlein):'') ?>',
		lfxtitleout:'<?php echo (isset($params->lfxtitleout) && $params->lfxtitleout!=''?esc_attr($params->lfxtitleout):'') ?>',
		lfxdesin:'<?php echo (isset($params->lfxdesin) && $params->lfxdesin!=''?esc_attr($params->lfxdesin):'') ?>',
		lfxdesout:'<?php echo (isset($params->lfxdesout) && $params->lfxdesout!=''?esc_attr($params->lfxdesout):'') ?>',
		
		mainId: 'slider_hero_pop_modal_content',
        beforeChange: function(){
			//alert("i am changing..");
		}
    };   
        jQuery('#slider_hero_pop_modal_content').sliderX();

</script>

<?php
exit;
}
add_action( 'wp_ajax_qcld_show_preview_items2', 'qcld_show_preview_items2_fnc');
?>