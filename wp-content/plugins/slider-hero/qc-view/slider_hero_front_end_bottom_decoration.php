<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php //slope-left
if(isset($params->herobottom->decoration) and $params->herobottom->decoration !==''):
?>
<style type="text/css">
.slider_hero_bottom_decoration{
	width: 100%;
    height: 50px;
    position: absolute;
    bottom: -50px;
}

.hero-rounded-outer-bottom{
	    -webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    -o-transform: rotate(180deg);
    transform: rotate(180deg);
}
.hero-slope-right-bottom{
	
webkit-transform: rotateX(180deg);
    -moz-transform: rotateX(180deg);
    -ms-transform: rotate(180deg);
    -o-transform: rotateX(180deg);
    transform: rotateX(180deg);
}
.hero-bottom-common{
	width: 100%;
	height: 100%;
}
.hero-arrow-bottom{
	    display: block;
    position: relative;
    height: 50px;
    width: 160px;
    margin: 0 auto;
}
.hero-circle-bottom{
    display: block;
    position: relative;
    height: 120px;
    width: 120px;
    margin: 0 auto;
    margin-top: -60px;
}
#particles-js<?php echo intval( esc_html( $_id ) ); ?>{
	overflow: inherit !important;
}
</style>
<div class="slider_hero_bottom_decoration">
<?php //slope-left
if(isset($params->herobottom->decoration) and $params->herobottom->decoration=='slope-left'):
?>
	<svg class="hero-bottom-common" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M0 0 L100 0 L100 100" stroke-width="0" style="fill: <?php echo (isset($params->bottomdecorationcolor) and $params->bottomdecorationcolor==''?'rgb(255, 255, 255)':esc_attr($params->bottomdecorationcolor)); ?>;"></path></svg>
	
<?php //slope-right
elseif(isset($params->herobottom->decoration) and $params->herobottom->decoration=='slope-right'):
?>

	<svg class="hero-slope-right-bottom hero-bottom-common" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M0 0 L100 100 L0 100" stroke-width="0" style="fill: <?php echo ($params->bottomdecorationcolor==''?'rgb(255, 255, 255)':esc_attr($params->bottomdecorationcolor)); ?>;"></path></svg>

<?php //rounded-outer
elseif(isset($params->herobottom->decoration) and $params->herobottom->decoration=='rounded-outer'):
?>

	<svg class="hero-rounded-outer-bottom hero-bottom-common" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M0 100 C50 0 50 0 100 100 Z" stroke-width="0" style="fill: <?php echo ($params->bottomdecorationcolor==''?'rgb(255, 255, 255)':esc_attr($params->bottomdecorationcolor)); ?>;"></path></svg>

<?php //rounded-inner
elseif(isset($params->herobottom->decoration) and $params->herobottom->decoration=='rounded-inner'):
?>

	<svg class="hero-rounded-outer-bottom hero-top-common" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M0 0 C50 100 50 100 100 0  L100 100 0 100" stroke-width="0" style="fill: <?php echo ($params->bottomdecorationcolor==''?'rgb(255, 255, 255)':esc_attr($params->bottomdecorationcolor)); ?>;"></path></svg>
	
<?php //rounded-inner
elseif(isset($params->herobottom->decoration) and $params->herobottom->decoration=='triangle-outer'):
?>

	<svg class="hero-rounded-outer-bottom hero-top-common" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M0 100 L50 0 L100 100" stroke-width="0" style="fill: <?php echo ($params->bottomdecorationcolor==''?'rgb(255, 255, 255)':esc_attr($params->bottomdecorationcolor)); ?>;"></path></svg>
	
<?php //rounded-inner
elseif(isset($params->herobottom->decoration) and $params->herobottom->decoration=='triangle-inner'):
?>

	<svg class="hero-rounded-outer-bottom hero-top-common" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M0 0 L50 100 L100 0 L100 100 L0 100" stroke-width="0" style="fill: <?php echo ($params->bottomdecorationcolor==''?'rgb(255, 255, 255)':esc_attr($params->bottomdecorationcolor)); ?>;"></path></svg>
	
<?php //rounded-inner
elseif(isset($params->herobottom->decoration) and $params->herobottom->decoration=='arrow'):
?>

	<svg class="hero-rounded-outer-bottom hero-arrow-top" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M0 100 L50 0 L100 100" stroke-width="0" style="fill: <?php echo ($params->bottomdecorationcolor==''?'rgb(255, 255, 255)':esc_attr($params->bottomdecorationcolor)); ?>;"></path></svg>
	
<?php //rounded-inner
elseif(isset($params->herobottom->decoration) and $params->herobottom->decoration=='circle'):
?>

	<svg class="hero-rounded-outer-bottom hero-circle-bottom" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50" stroke-width="0" style="fill: <?php echo ($params->bottomdecorationcolor==''?'rgb(255, 255, 255)':esc_attr($params->bottomdecorationcolor)); ?>;"></circle></svg>
	
<?php //rounded-inner
elseif(isset($params->herobottom->decoration) and $params->herobottom->decoration=='clouds'):
?>

	<svg class="hero-rounded-outer-bottom hero-top-common" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M-5 100 Q 0 20 5 100 Z M0 100 Q 5 0 10 100 M5 100 Q 10 30 15 100 M10 100 Q 15 10 20 100 M15 100 Q 20 30 25 100 M20 100 Q 25 -10 30 100 M25 100 Q 30 10 35 100 M30 100 Q 35 30 40 100 M35 100 Q 40 10 45 100 M40 100 Q 45 50 50 100 M45 100 Q 50 20 55 100 M50 100 Q 55 40 60 100 M55 100 Q 60 60 65 100 M60 100 Q 65 50 70 100 M65 100 Q 70 20 75 100 M70 100 Q 75 45 80 100 M75 100 Q 80 30 85 100 M80 100 Q 85 20 90 100 M85 100 Q 90 50 95 100 M90 100 Q 95 25 100 100 M95 100 Q 100 15 105 100 Z" stroke-width="0" style="fill: <?php echo ($params->bottomdecorationcolor==''?'rgb(255, 255, 255)':esc_attr($params->bottomdecorationcolor)); ?>;"></path></svg>
	
<?php //rounded-inner
elseif(isset($params->herobottom->decoration) and $params->herobottom->decoration=='repeat-triangle'):
?>

	<svg class="hero-rounded-outer-bottom hero-top-common" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M0 100 L2 60 L4 100 L6 60 L8 100 L10 60 L12 100 L14 60 L16 100 L18 60 L20 100 L22 60 L24 100 L26 60 L28 100 L30 60 L32 100 L34 60 L36 100 L38 60 L40 100 L42 60 L44 100 L46 60 L48 100 L50 60 L52 100 L54 60 L56 100 L58 60 L60 100 L62 60 L64 100 L66 60 L68 100 L70 60 L72 100 L74 60 L76 100 L78 60 L80 100 L82 60 L84 100 L86 60 L88 100 L90 60 L92 100 L94 60 L96 100 L98 60 L100 100 Z" stroke-width="0" style="fill: <?php echo ($params->bottomdecorationcolor==''?'rgb(255, 255, 255)':esc_attr($params->bottomdecorationcolor)); ?>;"></path></svg>
	
<?php //rounded-inner
elseif(isset($params->herobottom->decoration) and $params->herobottom->decoration=='repeat-circle'):
?>

	<svg class="hero-rounded-outer-bottom hero-top-common" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M0 100 Q 2.5 40 5 100 Q 7.5 40 10 100 Q 12.5 40 15 100 Q 17.5 40 20 100 Q 22.5 40 25 100 Q 27.5 40 30 100 Q 32.5 40 35 100 Q 37.5 40 40 100 Q 42.5 40 45 100 Q 47.5 40 50 100 Q 52.5 40 55 100 Q 57.5 40 60 100 Q 62.5 40 65 100 Q 67.5 40 70 100 Q 72.5 40 75 100 Q 77.5 40 80 100 Q 82.5 40 85 100 Q 87.5 40 90 100 Q 92.5 40 95 100 Q 97.5 40 100 100 " stroke-width="0" style="fill: <?php echo ($params->bottomdecorationcolor==''?'rgb(255, 255, 255)':esc_attr($params->bottomdecorationcolor)); ?>;"></path></svg>
	
<?php endif; ?>
</div>
<?php 
endif;
?>
