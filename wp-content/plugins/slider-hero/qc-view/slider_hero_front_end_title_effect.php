<?php //code for pretty shadow effect title
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//google font & letter spacing add for every slide Title & Description
$tfont = '';
$tlspace = '';
if(isset($slide->t_font) && strlen($slide->t_font)>2){
	$tfont = explode(':',$slide->t_font);
	$tfont = $tfont[0];
}
if(isset($slide->tl_space) && $slide->tl_space>0){
	$tlspace = $slide->tl_space;
}

$dfont = '';
$dlspace = '';
if(isset($slide->d_font) && strlen($slide->d_font)>2){
	$dfont = explode(':',$slide->d_font);
	$dfont = $dfont[0];
}
if(isset($slide->dl_space) && $slide->dl_space>0){
	$dlspace = $slide->dl_space;
}
?>

<style type="text/css">
.slider-x-lead-title<?php echo intval($_id); ?>, .slider-x-lead-title<?php echo intval($_id); ?> p, .slider-x-lead-title<?php echo intval($_id); ?> h1, .slider-x-lead-title<?php echo intval($_id); ?> h2, .slider-x-lead-title<?php echo intval($_id); ?> span{
	<?php if($tfont!=''): ?>
	font-family:'<?php echo $tfont; ?>', sans-serif !important;
	<?php endif; ?>
	<?php if($tlspace!=''): ?>
	letter-spacing: <?php echo $tlspace ?> !important;
	<?php endif; ?>
}
.slider-x-item-title<?php echo intval($_id); ?>, .slider-x-item-title<?php echo intval($_id); ?> p, .slider-x-item-title<?php echo intval($_id); ?> div{
	<?php if($dfont!=''): ?>
	font-family:'<?php echo $dfont; ?>', sans-serif !important;
	<?php endif; ?>
	<?php if($dlspace!=''): ?>
	letter-spacing: <?php echo $dlspace ?> !important;
	<?php endif; ?>
}
</style>


<?php
	if(isset($params->titleffect) and $params->titleffect=='hero_pretty_shadow'):
?>
	<style>
	.hero_pretty_shadow{
		color: <?php echo esc_attr($params->titlecolor); ?>;
	}
	</style>
<?php endif; ?>


<?php // code for peeled effect
if(isset($params->titleffect) and $params->titleffect=='hero_peeled_effect'):
?>
	<style type="text/css">
		.hero_peeled_effect span::after {
			color: <?php echo esc_attr($params->titlecolor); ?>;
			text-shadow: -1px 0 1px <?php echo esc_attr($params->titlecolor); ?>, 1px 0 1px rgba(0,0,0,0.8);
		}
		.hero_peeled_effect{
			color:#fff !important;
		}
	</style>
	<h2 class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?>"><?php 
		$titletext = esc_attr( wp_unslash(($slide->title)) );
		$titletext = str_split_unicode($titletext,1);
		foreach($titletext as $k=>$v):
			echo '<span data-text="'.$v.'">'.$v.'</span>';
		endforeach;
	?></h2>
<?php // code for Text Animation effect
elseif(isset($params->titleffect) and $params->titleffect=='hero_text_animation'):
?>
	<h2 class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?>">
		<svg class="hero_svg_style">
			<symbol id="s-text<?php echo $slide->id; ?>">
				<text text-anchor="middle" x="50%" y="80%"><?php echo esc_attr( wp_unslash(($slide->title)) ); ?></text>
			</symbol>

			<g class = "g-ants">
				<use xlink:href="#s-text<?php echo $slide->id; ?>" class="hero-text-copy"></use>
				<use xlink:href="#s-text<?php echo $slide->id; ?>" class="hero-text-copy"></use>
				<use xlink:href="#s-text<?php echo $slide->id; ?>" class="hero-text-copy"></use>
				<use xlink:href="#s-text<?php echo $slide->id; ?>" class="hero-text-copy"></use>
				<use xlink:href="#s-text<?php echo $slide->id; ?>" class="hero-text-copy"></use>
			</g>
		</svg>
	</h2>


<?php // code for Happy Text effect
elseif(isset($params->titleffect) and $params->titleffect=='hero_happy_text'):
?>
<h2 class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?>"><?php 
		$titletext = esc_attr( wp_unslash(($slide->title)) );
		$titletext = str_split_unicode($titletext,1);
		foreach($titletext as $k=>$v):
			echo '<span>'.($v).'</span>';
		endforeach;
	?></h2>

<?php // code for Hero Glitch effect
elseif(isset($params->titleffect) and $params->titleffect=='hero_glitch'):
?>
<div class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?> hero_glitch_header" id="hero-glitch">
	<h1 class="glitched"><?php echo esc_attr( wp_unslash(($slide->title)) ); ?></h1>
</div>
<script type="text/javascript">

jQuery(".hero_glitch_header").append("<div class='hero-glitch-window'></div>");
//fill div with clone of real header
jQuery( ".hero_glitch_header h1" ).clone().appendTo( " .hero-glitch-window" );
</script>

<?php // code for Hero shuffle effect
elseif(isset($params->titleffect) and $params->titleffect=='hero_shuffle'):
?>
<style type="text/css">
#hero-shuffle h1{
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

?>
padding: 10px;
}
</style>

<div class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?>" id="hero-shuffle" data-title="<?php echo esc_attr( wp_unslash(($slide->title)) ) ?>">

	<h1></h1>
	
</div>

<script type="text/javascript">


var shuffle_text ='<?php echo esc_attr( wp_unslash(($slide->title)) ) ?>';

</script>

<?php // code for Hero rearrange effect
elseif(isset($params->titleffect) and $params->titleffect=='hero_rearrange'):
?>
<style type="text/css">
#hero-rearrange h1 span.hero_rearrange_character {
  display: inline-block;
  -webkit-transition: opacity 3s 0.5s ease, -webkit-transform 4s ease-out;
  transition: opacity 3s 0.5s ease, -webkit-transform 4s ease-out;
  transition: opacity 3s 0.5s ease, transform 4s ease-out;
  transition: opacity 3s 0.5s ease, transform 4s ease-out, -webkit-transform 4s ease-out;
}
#hero-rearrange h1{
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

?>
padding: 10px;
}
</style>
<div class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?>" id="hero-rearrange">
	<h1><?php echo esc_attr( wp_unslash(($slide->title)) ) ?></h1>
</div>

<?php // code for Hero hollywood_console effect
elseif(isset($params->titleffect) and $params->titleffect=='hollywood_console'):
?>

<div class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?>">
	<span id="play_info_text" class="pre_play_info_text"><?php echo esc_attr( wp_unslash(($slide->title)) ); ?></span>
</div>

<script type="text/javascript">
var text = '';
function isNumber(n){
    return typeof(n) != "boolean" && !isNaN(n);
}
function addChar(parent, j) {
  return function() {
    var character = document.createElement('b');
    character.setAttribute('class', 'play_info_text');
    character.innerHTML = text.charAt(j);
    parent.appendChild(character);
  };
}

function fadeChar(parent, j) {
  return function() {
	  console.log(parent.children[j]);
	 if(isNumber(j)){
		var character = parent.children[j];
		character.setAttribute('class', 'play_info_text_out'); 
	 }
  };
}
function fadeChar2(parent, j) {
  return function() {
	  console.log(parent.children[j]);
	 if(isNumber(j)){
		var character = parent.children[j];
		character.setAttribute('class', ''); 
		character.setAttribute('class', 'play_info_text'); 
	 }
  };
}

function animateInfoTextIn() {
  var element = document.getElementById('play_info_text');
  element.setAttribute('class', 'test_class_only');
  if (element.children.length == 0) {
    text = element.innerHTML;
  }
  
  var chars = text.length;
  element.innerHTML = '';
  for (var i = element.children.length; i < chars; ++i) {
    setTimeout(addChar(element, i), i*40+100);
  }
  
}

function animateInfoTextOut() {
	if(jQuery('.test_class_only').length==2){
		jQuery('.test_class_only').eq(0).remove();
	}
  var element = document.getElementById('play_info_text');
 
  for (var charindex in element.children) {
    
    setTimeout(fadeChar(element, charindex), charindex*40+100);
  }
}
function animateInfoTextIn2() {
	if(jQuery('.test_class_only').length==2){
		jQuery('.test_class_only').eq(0).remove();
	}
  var element = document.getElementById('play_info_text');
 
  for (var charindex in element.children) {
    
    setTimeout(fadeChar2(element, charindex), charindex*40+100);
  }
}

animateInfoTextIn();

</script>

<?php // code for Burn In Text effect

	elseif(isset($params->titleffect) and $params->titleffect=='hero_burn_in'):

?>

<h2 class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?> mast__text">
	<?php 

		$titletext = esc_attr( wp_unslash(($slide->title)) );

		$titletext = str_split_unicode($titletext,1);
	
		foreach($titletext as $k=>$v):
			echo '<span>'.($v).'</span>';
		endforeach;

 	?>
 	
 </h2>


<?php // code for Text Multicolor effect

	elseif(isset($params->titleffect) and $params->titleffect=='hero_multicolor'):

?>

<h2 class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?>" id="hero_multicolor">
	<?php 

		$titletext = esc_attr( wp_unslash(($slide->title)) );
		$titletext = str_split_unicode($titletext,1);
		foreach($titletext as $k=>$v):
			echo '<span>'.($v).'</span>';
		endforeach;

  ?>
 	
 </h2>
 
<?php // code for Blur effect

	elseif(isset($params->titleffect) and $params->titleffect=='hero_blur_effect'):

		$titledata = explode(';',$slide->title);

		$titledata = implode("','",$titledata);

?>

<script type="text/javascript">
	var sentences = new Array ('<?php echo $titledata; ?>');
</script>

<div class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?> hero_text_box"></div>
 
<?php // code for hero_matrix Effect

	elseif(isset($params->titleffect) and $params->titleffect=='hero_matrix'):

?>

<div class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?> hero_prompt">
	<p><?php echo esc_attr( wp_unslash(($slide->title)) ); ?></p>
</div>
 
 
<?php // code for Spin Text effect

	elseif(isset($params->titleffect) and $params->titleffect=='hero_spin_text'):

?>


<div class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?> spintext">

	<?php 

			$titletext = esc_attr( wp_unslash(($slide->title)) );
			$titletext = str_split_unicode($titletext,1);
			$textdata = '<ul>';
			foreach($titletext as $k=>$v):
				$textdata .= '<li>'.strtoupper($v).'</li>';
			endforeach;
			$textdata .= '</ul>';
			echo $textdata;

	?>

</div>

<?php // code for Spin Text effect

	elseif(isset($params->titleffect) and $params->titleffect=='hero_folded_paper'):

?>


<h1 class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?> flag">

	<?php echo esc_attr( trim(wp_unslash($slide->title)) ); ?>
		
</h1>

<script src="<?php echo QCLD_SLIDERHERO_JS . "/jquery.lettering.js?time=".time(); ?>" type="text/javascript"></script>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".flag").lettering();
	});
</script>

<?php // code for Sliding Text effect

	elseif(isset($params->titleffect) and $params->titleffect=='hero_sliding_text'):

?>

<div class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?>">
	<h2 class="slidingtext"><span><?php echo esc_attr( trim(wp_unslash($slide->title)) ); ?></span></h1>
</div>

<script type="text/javascript">

	jQuery(document).ready(function($) {
		
	  $('.slidingtext').each(function(){
	    $(this).addClass('active');
	  });
	});

</script>

<?php // code for Knockout Text effect

	elseif(isset($params->titleffect) and $params->titleffect=='hero_knockout_text'):

?>

<style type="text/css">
.clip-text_one {
    background-image: url(<?php echo QCLD_SLIDERHERO_IMAGES; ?>/pJewmf8.jpg);
}
</style>

<script src="<?php echo QCLD_SLIDERHERO_JS . "/qcmax.js?time=".time(); ?>" type="text/javascript"></script>

<h2 class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?> clip-text clip-text_one">
	
	<?php echo esc_attr( wp_unslash(($slide->title)) ); ?>
		
</h2>

<script type="text/javascript">
	var tl = new TimelineMax({repeat:-1, yoyo:true});

	tl.to(".clip-text", 4, { css:{"background-position": "800px"} , ease:Quad.easeInOut });
</script>

<?php // code for Animated Fill Text effect

	elseif(isset($params->titleffect) and $params->titleffect=='hero_animated_fill'):

?>
	<style type="text/css">
	.hero_animated_fill{
		 background: url(<?php echo QCLD_SLIDERHERO_IMAGES ?>/animated_text_fill.png) repeat-y;
	}
	</style>

<h2 class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?>">
	
	<?php echo esc_attr( wp_unslash(($slide->title)) ); ?>
		
</h2>

<?php else: ?>

	<?php if(isset($params->titlebgcolor) and $params->titlebgcolor!=''): ?>

		<h2 class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?>">
			<span style="background-color:<?php echo $params->titlebgcolor; ?>;padding: 0px 10px;">
				
				<?php echo esc_attr( wp_unslash(($slide->title)) ); ?>
					
			</span>
		</h2>

	<?php else: ?>
	
		<h2 class="slider-x-lead-title slider-x-lead-title<?php echo intval($_id); ?>">

			<?php echo esc_attr( wp_unslash(($slide->title)) ); ?>
				
		</h2>

	<?php endif; ?>

<?php endif; ?>