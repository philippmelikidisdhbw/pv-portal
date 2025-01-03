<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$_id = isset( $_id ) ? $_id : '';
?>

<style type="text/css">
.ytp-gradient-top{display:none !important}
.ytp-show-watch-later-title{display:none !important}
.ytp-watch-later-button{display:none !important}
.ytp-share-button{display:none !important}

.sh_video_overlay{
<?php if(isset($params->video_overlay_color) && $params->video_overlay_color!=''): ?>
background: <?php echo esc_attr( $params->video_overlay_color ); ?>;
<?php endif; ?>
<?php if( isset( $params->video_overlay ) && $params->video_overlay ==1 ): ?>
opacity: <?php echo esc_attr( ( isset( $params->video_overlay_opacity ) && $params->video_overlay_opacity != '' ? $params->video_overlay_opacity : '0.4') ); ?>;
<?php endif; ?>
}


#particles-js<?php echo intval( esc_html( $_id ) ); ?> .qcld_hero_content_area{
	position:absolute;
	
	width: 100%;
	<?php 
	if(isset($params->content) && $params->content=='top'){
		echo 'top: '.(isset($params->contentspace)&&$params->contentspace!=''?esc_attr($params->contentspace):'50px').';';
	}elseif(isset($params->content) && $params->content=='bottom'){
		echo 'bottom: '.(isset($params->contentspace)&&$params->contentspace!=''?esc_attr($params->contentspace):'50px').';';
	}else{
		echo 'top:50%;';
	}
	?>
	
	<?php if(isset($params->arrow_style) && $params->arrow_style!='floating'): ?>
	z-index:9;
	<?php endif; ?>
	
}

#particles-js<?php echo intval( esc_html( $_id ) ); ?> .slider-x-lead-title, #particles-js<?php echo intval( esc_html( $_id ) ); ?> .hero_slider_button, #particles-js<?php echo intval( esc_html( $_id ) ); ?> .slider-x-item-title{margin: 15px 0px;}

#particles-js<?php echo intval( esc_html( $_id ) ); ?> .slider-x-lead-title{
<?php if(isset($params->titlebottommargin)&&$params->titlebottommargin!=''): ?>
	margin-bottom: <?php echo esc_attr( $params->titlebottommargin ); ?>;
<?php endif; ?>	
}

#particles-js<?php echo intval( esc_html( $_id ) ); ?> .hero_slider_button{
<?php if(isset($params->buttonbottommargin)&&$params->buttonbottommargin!=''): ?>
	margin-bottom: <?php echo esc_attr( $params->buttonbottommargin ); ?>;
<?php endif; ?>	
}

#particles-js<?php echo intval( esc_html( $_id ) ); ?> .slider-x-item-title{
<?php if(isset($params->descriptionbottommargin)&&$params->descriptionbottommargin!=''): ?>
	margin-bottom: <?php echo esc_attr( $params->descriptionbottommargin ); ?>;
<?php endif; ?>	
}

.slider-hero-prev, .slider-hero-next{
<?php if(isset($params->arrowcolor)&& $params->arrowcolor!=''):?>
color: <?php echo esc_attr( $params->arrowcolor ); ?> !important;
<?php endif; ?>
}

.slider-hero-prev:hover,.slider-hero-next:hover{
<?php if(isset($params->arrowhovercolor)&& $params->arrowhovercolor!=''):?>
color: <?php echo esc_attr( $params->arrowhovercolor ); ?> !important;
<?php endif; ?>
}

.qc-sliderX-bottom-slide{
<?php if(isset($params->navigatorcolor) && $params->navigatorcolor!=''): ?>
color:<?php echo esc_attr( $params->navigatorcolor ); ?> !important;
<?php endif; ?>
}
.qc-sliderX-bottom-slide:hover{
<?php if(isset($params->navigatorhovercolor) && $params->navigatorhovercolor!=''): ?>
color:<?php echo esc_attr( $params->navigatorhovercolor ); ?> !important;
<?php endif; ?>
}
.qc-sliderx-bottom-current{
<?php if(isset($params->navigatorhovercolor) && $params->navigatorhovercolor!=''): ?>
color:<?php echo esc_attr( $params->navigatorhovercolor ); ?> !important;
<?php endif; ?>
}


<?php 
if($_slider[0]->type=='walkingbackground'):
?>
.slider_hero_walkingbackground:before {
	<?php 
		if($bg_image_url!=''):
	?>
	background: url(<?php echo esc_url($bg_image_url); ?>);
	<?php else: ?>
	background: url(<?php echo QCLD_SLIDERHERO_IMAGES; ?>/bg.jpg);
	<?php endif; ?>
}
<?php endif; ?>


#particles-js<?php echo intval( esc_html( $_id ) ); ?> canvas {
	position:absolute;
	<?php if($_slider[0]->type=='rainy_season'): ?>
	z-index:0;
	<?php else: ?>
	z-index:8;
	<?php endif; ?>
}


<?php 
if($_slider[0]->type=='intro'):
?>
#particles-js<?php echo intval( esc_html( $_id ) ); ?> .eachAnim {
font-family: "Lato", Arial, sans-serif;
    font-weight: 300;
    font-size: 50px;
    text-align: center;
    width: 100%;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
	z-index: 999;
    position: absolute;
	line-height: normal;
	background-size: cover !important;
    background-position: center center !important;
}
#particles-js<?php echo intval( esc_html( $_id ) ); ?> canvas{
	position: absolute;
    top: 0;
}
<?php endif; ?>

<?php 
if($_slider[0]->type=='flyingrocket'):
?>
.cloud {
  display: block;
  position: absolute;
  background: white;
  border-radius: 40px;
  z-index: 2;
}

.star {
  display: block;
  position: absolute;
  background: white;
  border-radius: 2;
  z-index: 1;
}
<?php endif; ?>


<?php 
if($_slider[0]->type=='cloudysky'):
?>
@keyframes clouds-loop-1 {
  to {
    background-position: -1000px 0;
  }
}
.slider_hero_clouds-1 {
  background-image: url("<?php echo QCLD_SLIDERHERO_IMAGES; ?>/clouds_2.png");
  animation: clouds-loop-1 <?php echo (isset($params->cloudysky->speed)&&$params->cloudysky->speed>0?($params->cloudysky->speed-10):'30'); ?>s infinite linear;
}

@keyframes clouds-loop-2 {
  to {
    background-position: -1000px 0;
  }
}
.slider_hero_clouds-2 {
  background-image: url("<?php echo QCLD_SLIDERHERO_IMAGES; ?>/clouds_1.png");
  animation: clouds-loop-2 <?php echo (isset($params->cloudysky->speed)&&$params->cloudysky->speed>0?($params->cloudysky->speed):'40'); ?>s infinite linear;
}

@keyframes clouds-loop-3 {
  to {
    background-position: -1579px 0;
  }
}
.slider_hero_clouds-3 {
  background-image: url("<?php echo QCLD_SLIDERHERO_IMAGES; ?>/clouds_3.png");
  animation: clouds-loop-3 <?php echo (isset($params->cloudysky->speed)&&$params->cloudysky->speed>0?($params->cloudysky->speed-5):'35'); ?>s infinite linear;
}



.slider_hero_clouds {
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=40);
  opacity: 0.4;
  pointer-events: none;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
  right: 0;
  height: 100%;
}

.slider_hero_clouds-1,
.slider_hero_clouds-2,
.slider_hero_clouds-3 {
  background-repeat: repeat-x;
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  height: 500px;
}
<?php endif; ?>

#particles-js<?php echo intval( esc_html( $_id ) ); ?> > img{
	position:absolute;
	z-index:1;
}
#particles-js<?php echo intval( esc_html( $_id ) ); ?>{
  width: 100%;
  height: 100%;
  overflow: hidden;
  <?php if($_slider[0]->type=='metaballs' || $_slider[0]->type=='valentine' || $_slider[0]->type=='shapeanimation'): ?>
 overflow: hidden;
 <?php endif; ?>

<?php
if($_slider[0]->type!='walkingbackground'){
if(isset($_slider[0]->bg_gradient) and strlen($_slider[0]->bg_gradient)>2){
	echo esc_html( str_replace('"','',$_slider[0]->bg_gradient) );
}elseif($bg_image_url!='' and @$params->bgimageeffect==''){
?>
  background-image: url('<?php echo esc_url($bg_image_url); ?>');
<?php
}
?>
<?php if(!isset($params->bgimageeffect) || $params->bgimageeffect!='parallax'): ?>
  background-color: <?php echo ($params->background==''?'#4684b5':esc_attr($params->background)); ?>;
<?php endif; ?>
  background-size: cover;
  background-position: 50% 50%;
  background-repeat: no-repeat;
<?php } ?>
  z-index: 1;
  position:relative;
<?php 

if(isset($params->herotop->decoration) and $params->herotop->decoration!=''):
?>
  margin-top:50px;

<?php 
	endif;
?>

<?php 

if(isset($params->herobottom->decoration) and $params->herobottom->decoration!=''):
?>
  margin-bottom:50px;
<?php
endif;
 ?>
    max-width: unset !important;
}

<?php if(isset($params->bgimageeffect) && $params->bgimageeffect=='parallax'): ?>
.parallax-mirror{
	z-index: 1 !important;
}
<?php endif; ?>

<?php 
if(isset($params->canvasopacity) and $params->canvasopacity!=''){
?>
#particles-js<?php echo intval( esc_html( $_id ) ); ?> > canvas{
	opacity: <?php echo esc_html($params->canvasopacity); ?>;
}
<?php
}
?>

#sunset {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #294372 url('<?php echo QCLD_SLIDERHERO_IMAGES; ?>/sunset.jpg') center top no-repeat;
    background-size: cover;
    opacity: 0;
    z-index: 1
}

.slider-x-lead-title<?php echo intval( esc_html( $_id ) ); ?>{
/*position: absolute;
top: <?php echo esc_attr($params->title->style->top); ?>;*/
left: 0px;
width: 100%;
<?php if(isset($params->contentoffset) && $params->contentoffset!=''):?>
	padding: 0px <?php echo esc_attr( $params->contentoffset ); ?> !important;
<?php else: ?>
	padding: 0px 10% !important;
<?php endif; ?>
box-sizing: border-box;


}
.slider-x-item-title<?php echo intval( esc_html( $_id ) ); ?>{
/*
position: absolute;
top: <?php echo esc_attr($params->description->style->top); ?>;*/
left: 0px;
width: 100%;
z-index:99 !important;
<?php if(isset($params->contentoffset) && $params->contentoffset!=''):?>
	padding: 0px <?php echo esc_attr( $params->contentoffset ); ?> !important;
<?php else: ?>
	padding: 0px 10% !important;
<?php endif; ?>

<?php //description line height
if(isset($params->descfontheight) and $params->descfontheight!=''){
	echo 'line-height: '.esc_attr($params->descfontheight).'px;';	
}else{
	echo 'line-height: 40px;';
}
?>

box-sizing: border-box;

}

.slider-x-lead-title<?php echo intval( esc_html( $_id ) ); ?>{

<?php //title font size
if(isset($params->titlefontsize) and $params->titlefontsize!=''){
	echo 'font-size: '.esc_attr($params->titlefontsize).'px !important;';	
}else{
	echo 'font-size: 54px;';
}
?>
<?php //title font color
if(isset($params->titlecolor) and $params->titlecolor!=''){
	echo 'color: '.esc_attr($params->titlecolor).' !important;';	
}else{
	echo 'color: #fff;';
}
if(isset($params->title->align) and $params->title->align!=''){
	echo 'text-align: '.esc_attr($params->title->align).';';	
}
?>

<?php //title line height
if(isset($params->titlefontheight) and $params->titlefontheight!=''){
	echo 'line-height: '.esc_attr($params->titlefontheight).'px !important;';	
}else{
	echo 'line-height: 54px;';
}
?>



}

.hero_slider_btn<?php echo intval( esc_html( $_id ) ); ?>{
	/*
	position:absolute;
	top: <?php echo esc_attr($params->button1->style->top); ?>;*/
	left:0px;
	width:100%;
<?php if(isset($params->contentoffset) && $params->contentoffset!=''):?>
	padding: 0px <?php echo esc_attr( $params->contentoffset ); ?>;
<?php else: ?>
	padding: 0px 10%;
<?php endif; ?>
	box-sizing: border-box;
	z-index: -1;
<?php 
if(isset($params->button1->align) and $params->button1->align!=''){
	echo 'text-align: '.esc_attr($params->button1->align).';';	
}

?>
}
.hero_slider_btn<?php echo intval( esc_html( $_id ) ); ?> a{
	z-index: 9;
    position: relative;
}

.slider-x-item-title<?php echo intval( esc_html( $_id ) ); ?>, .slider-x-item-title<?php echo intval( esc_html( $_id ) ); ?> > p, .slider-x-item-title<?php echo intval( esc_html( $_id ) ); ?> > *{
<?php //description font color
if(isset($params->descriptioncolor) and $params->descriptioncolor!=''){
	echo 'color: '.esc_attr($params->descriptioncolor).';';	
}else{
	echo 'color: #fff;';
}
//description bg color
if(isset($params->descriptionbgcolor) and $params->descriptionbgcolor!=''){
	echo 'background-color: '.esc_attr($params->descriptionbgcolor).';';	
}
?>
<?php //description font size
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
<?php //description line height
if(isset($params->descfontheight) and $params->descfontheight!=''){
	echo 'line-height: '.esc_attr($params->descfontheight).'px;';	
}else{
	echo 'line-height: 40px;';
}
?>
<?php //description bg color
if(isset($params->descriptionbgcolor) and $params->descriptionbgcolor!=''){
	echo 'background-color: '.esc_attr($params->descriptionbgcolor).';';	
}
?>
padding: 0px;
}

@media only screen and (min-width: 320px) and (max-width: 767px){
.qcld_hero_content_area h2{font-size:26px !important;line-height: 30px !important;}
.qcld_hero_content_area > .slider-x-item-title > p{font-size: 16px !important;line-height:normal;}	

}

<?php if($_slider[0]->type=='antigravity' || $_slider[0]->type=='metaballs') : //code for daynight effect ?>
svg {
  display: block;
  width: 30px;
  height: 30px;
  position: absolute;
  transform: translateZ(0px);
}
<?php endif; ?>

<?php if($_slider[0]->type=='just_cloud'): //code for Just Cloud effect ?>
#hero_just_clouds{
  background:url("<?php echo QCLD_SLIDERHERO_IMAGES; ?>/just-clouds.png") repeat 0 0 transparent;
  width:100%;
  height:190px;
  
}
#particles-js<?php echo intval( esc_html( $_id ) ); ?>{
	background:#ACE6FF !important;
}
<?php endif; ?>

<?php if($_slider[0]->type=='intro' && isset($params->introbgeffect) && $params->introbgeffect=='just_cloud'): //code for Just Cloud effect ?>
#hero_just_clouds{
  background:url("<?php echo QCLD_SLIDERHERO_IMAGES; ?>/just-clouds.png") repeat 0 0 transparent;
  width:100%;
  height:190px;
  position:absolute;
  
}
#particles-js<?php echo intval( esc_html( $_id ) ); ?>{
	background:#ACE6FF !important;
}
<?php endif; ?>

<?php if($_slider[0]->type=='wormhole'): //code for Just Cloud effect ?>
#particles-js<?php echo intval( esc_html( $_id ) ); ?> {
  background-color: #1e0059;
  
  margin: 0;
  overflow: hidden;
  -webkit-perspective: 5em;
          perspective: 5em;
}

#particles-js<?php echo intval( esc_html( $_id ) ); ?>::after {
  background-color: inherit;
  border-radius: 50%;
  box-shadow: 0 0 2em 2em #1e0059;
  content: "";
  height: 1em;
  left: 50%;
  position: absolute;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  width: 1em;
}
.hero-cylinder:nth-child(1) {
  -webkit-animation-duration: 8s;
          animation-duration: 8s;
}
.hero-cylinder:nth-child(2) {
  -webkit-animation-duration: 4s;
          animation-duration: 4s;
}
.hero-cylinder {
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
  -webkit-animation-name: hero_wormhole_tunnel;
          animation-name: hero_wormhole_tunnel;
  -webkit-animation-timing-function: linear;
          animation-timing-function: linear;
  left: 50%;
  position: absolute;
  top: 50%;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
  -webkit-transform: rotatex(90deg) rotatey(0) translatey(-25em);
          transform: rotatex(90deg) rotatey(0) translatey(-25em);
}


.hero-slid {
  background-image: url(<?php echo QCLD_SLIDERHERO_IMAGES; ?>/wormholebg.jpg);
  background-size: 32em 10em;
  -webkit-filter: hue-rotate(-11.25deg);
          filter: hue-rotate(-11.25deg);
  height: 40em;
  position: absolute;
  -webkit-transform-origin: 0;
          transform-origin: 0;
  width: 2em;
}
.hero-slid:nth-child(1) {
  background-position: -1em;
  -webkit-transform: rotatey(11.25deg) translate3d(-50%, 0, 5em);
          transform: rotatey(11.25deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(2) {
  background-position: -2em;
  -webkit-transform: rotatey(22.5deg) translate3d(-50%, 0, 5em);
          transform: rotatey(22.5deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(3) {
  background-position: -3em;
  -webkit-transform: rotatey(33.75deg) translate3d(-50%, 0, 5em);
          transform: rotatey(33.75deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(4) {
  background-position: -4em;
  -webkit-transform: rotatey(45deg) translate3d(-50%, 0, 5em);
          transform: rotatey(45deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(5) {
  background-position: -5em;
  -webkit-transform: rotatey(56.25deg) translate3d(-50%, 0, 5em);
          transform: rotatey(56.25deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(6) {
  background-position: -6em;
  -webkit-transform: rotatey(67.5deg) translate3d(-50%, 0, 5em);
          transform: rotatey(67.5deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(7) {
  background-position: -7em;
  -webkit-transform: rotatey(78.75deg) translate3d(-50%, 0, 5em);
          transform: rotatey(78.75deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(8) {
  background-position: -8em;
  -webkit-transform: rotatey(90deg) translate3d(-50%, 0, 5em);
          transform: rotatey(90deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(9) {
  background-position: -9em;
  -webkit-transform: rotatey(101.25deg) translate3d(-50%, 0, 5em);
          transform: rotatey(101.25deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(10) {
  background-position: -10em;
  -webkit-transform: rotatey(112.5deg) translate3d(-50%, 0, 5em);
          transform: rotatey(112.5deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(11) {
  background-position: -11em;
  -webkit-transform: rotatey(123.75deg) translate3d(-50%, 0, 5em);
          transform: rotatey(123.75deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(12) {
  background-position: -12em;
  -webkit-transform: rotatey(135deg) translate3d(-50%, 0, 5em);
          transform: rotatey(135deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(13) {
  background-position: -13em;
  -webkit-transform: rotatey(146.25deg) translate3d(-50%, 0, 5em);
          transform: rotatey(146.25deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(14) {
  background-position: -14em;
  -webkit-transform: rotatey(157.5deg) translate3d(-50%, 0, 5em);
          transform: rotatey(157.5deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(15) {
  background-position: -15em;
  -webkit-transform: rotatey(168.75deg) translate3d(-50%, 0, 5em);
          transform: rotatey(168.75deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(16) {
  background-position: -16em;
  -webkit-transform: rotatey(180deg) translate3d(-50%, 0, 5em);
          transform: rotatey(180deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(17) {
  background-position: -17em;
  -webkit-transform: rotatey(191.25deg) translate3d(-50%, 0, 5em);
          transform: rotatey(191.25deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(18) {
  background-position: -18em;
  -webkit-transform: rotatey(202.5deg) translate3d(-50%, 0, 5em);
          transform: rotatey(202.5deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(19) {
  background-position: -19em;
  -webkit-transform: rotatey(213.75deg) translate3d(-50%, 0, 5em);
          transform: rotatey(213.75deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(20) {
  background-position: -20em;
  -webkit-transform: rotatey(225deg) translate3d(-50%, 0, 5em);
          transform: rotatey(225deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(21) {
  background-position: -21em;
  -webkit-transform: rotatey(236.25deg) translate3d(-50%, 0, 5em);
          transform: rotatey(236.25deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(22) {
  background-position: -22em;
  -webkit-transform: rotatey(247.5deg) translate3d(-50%, 0, 5em);
          transform: rotatey(247.5deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(23) {
  background-position: -23em;
  -webkit-transform: rotatey(258.75deg) translate3d(-50%, 0, 5em);
          transform: rotatey(258.75deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(24) {
  background-position: -24em;
  -webkit-transform: rotatey(270deg) translate3d(-50%, 0, 5em);
          transform: rotatey(270deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(25) {
  background-position: -25em;
  -webkit-transform: rotatey(281.25deg) translate3d(-50%, 0, 5em);
          transform: rotatey(281.25deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(26) {
  background-position: -26em;
  -webkit-transform: rotatey(292.5deg) translate3d(-50%, 0, 5em);
          transform: rotatey(292.5deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(27) {
  background-position: -27em;
  -webkit-transform: rotatey(303.75deg) translate3d(-50%, 0, 5em);
          transform: rotatey(303.75deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(28) {
  background-position: -28em;
  -webkit-transform: rotatey(315deg) translate3d(-50%, 0, 5em);
          transform: rotatey(315deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(29) {
  background-position: -29em;
  -webkit-transform: rotatey(326.25deg) translate3d(-50%, 0, 5em);
          transform: rotatey(326.25deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(30) {
  background-position: -30em;
  -webkit-transform: rotatey(337.5deg) translate3d(-50%, 0, 5em);
          transform: rotatey(337.5deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(31) {
  background-position: -31em;
  -webkit-transform: rotatey(348.75deg) translate3d(-50%, 0, 5em);
          transform: rotatey(348.75deg) translate3d(-50%, 0, 5em);
}
.hero-slid:nth-child(32) {
  background-position: -32em;
  -webkit-transform: rotatey(360deg) translate3d(-50%, 0, 5em);
          transform: rotatey(360deg) translate3d(-50%, 0, 5em);
}
.hero-cylinder:nth-child(2) .hero-slid {
  opacity: 0.5;
}

@-webkit-keyframes hero_wormhole_tunnel {
  100% {
    -webkit-transform: rotatex(90deg) rotatey(360deg) translatey(-15em);
            transform: rotatex(90deg) rotatey(360deg) translatey(-15em);
  }
}

@keyframes hero_wormhole_tunnel {
  100% {
    -webkit-transform: rotatex(90deg) rotatey(360deg) translatey(-15em);
            transform: rotatex(90deg) rotatey(360deg) translatey(-15em);
  }
}
<?php endif; ?>



</style>

<?php // code for Hero hollywood_console Title effect
if(isset($params->titleffect) and $params->titleffect=='hollywood_console'):
?>
<style type="text/css">
.pre_play_info_text {
  visibility: hidden;
}
.play_info_text {
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
  text-transform: uppercase;
  animation: blur-play-info-text-in 9.5s ease-in;
  text-shadow: 0px 0px 3px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>,
      0px 0px 5px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>;
}
.play_info_text_out {

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
  text-transform: uppercase;
  opacity: 0;
  animation: blur-play-info-text-out 9.5s ease-in;
  text-shadow:
      0px 0px 10px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>,
      0px 0px 25px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>,
      0px 0px 50px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>,
      0px 0px 150px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>,
      0px 10px 100px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>,
      0px -10px 100px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>;
}

@keyframes blur-play-info-text-in {
  from {
    opacity: 0;
    text-shadow:
      0px 0px 10px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>,
      0px 0px 25px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>,
      0px 0px 50px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>,
      0px 0px 150px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>,
      0px 10px 100px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>,
      0px -10px 100px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>;
  }
}

@keyframes blur-play-info-text-out {
  from {
    opacity: 1;
    text-shadow:
      0px 0px 3px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>,
      0px 0px 5px <?php echo (isset($params->titlecolor) && $params->titlecolor!=''?$params->titlecolor:'#fff'); ?>;
  }
}
</style>
<?php endif; ?>

<?php 
if($_slider[0]->type=='play_or_work'):
?>
<style type="text/css">
#hg_stage{
  width: 100%;
  height: 100%;
  background:url(<?php echo QCLD_SLIDERHERO_IMAGES; ?>/test_background_game.jpg) repeat-x;
  background-position: 0 bottom;
  margin: 0 auto;
  overflow: hidden;
  position: relative;
  animation: bgAnim 5s linear infinite;
}

#hg_bird{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  position: absolute;
  top:8%;
  left: 8%;
  transition: 1s all linear;
}

#hg_bird.hg_goDown {
  top: calc(100% - 100px);
  transition: 1s all ease-in;
}
#hg_bird.birdMove {
  top: -100px;
  transition: 0.7s all linear;
}

#hg_bird:after {
  content:"";
  background: url('<?php echo QCLD_SLIDERHERO_IMAGES; ?>/fire.png') no-repeat center center;
  background-size: contain;
  height: 50px;
  width: 25px;
  display: block;
  position: absolute;
  left: 0;right: 0;
  margin: auto;
  bottom: 0;
  top: 120%;
  z-index: 0;
  transition: 0.3s all linear;
  transform: scale(0);
  -webkit-transform: scale(0);
  -moz-transform: scale(0);
  transform-origin: top;
  -webkit-transform-origin: top;
  -moz-transform-origin: top;
}

#hg_bird.hg_birdMove:after {
  transform: scale(1);
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
}
#hg_bird img {
  width: 100%;
}



.hg_enemy{
  position: absolute;
  height:50px;
  width: 50px;
}

#hg_ceiling.hg_enemy{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background-color: red;
}

#hg_ground.hg_enemy{
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background-color: red;
}

.hg_item.hg_enemy {
  width: 100px; 
  height: 100px;
}
.hg_item.hg_enemy:after {
  content: "";
  position: absolute;
  height: 200%;
  width: 200%;
  background: url(<?php echo QCLD_SLIDERHERO_IMAGES; ?>/smash.png) no-repeat center center;
  background-size: contain;
  transform: translate(-25%,-25%);
}

.hg_item.hg_gold {
  width: 100px;
  height: 100px;
  position: absolute;
}
.hg_item.hg_gold.hg_goldFound {
  transform: scale(0);
  -webkit-transform: scale(0);
  -moz-transform: scale(0);
  transition: 0.3s all ease-out;
  -webkit-transition: 0.3s all ease-out;
  -moz-transition: 0.3s all ease-out;
}
.hg_item.hg_gold:after {
  content: "";
  position: absolute;
  height: 200%;
  width: 200%;
  background:url(<?php echo QCLD_SLIDERHERO_IMAGES; ?>/gold.png) no-repeat center center;
  background-size: contain;
  transform: translate(-25%,-25%);
}

.hg_textWrap {
  position: relative;
  top: 50%;
  transform: translateY(-50%);
  text-align: center;
}

.hg_textWrap h2 {
  font-size: 72px;
  margin-bottom: 30px;
  color: #fff;
}
.hg_textWrap p {
  margin-bottom: 40px;
  color: #fff;
  font-size: 30px;
}

.hg_welcomePop, .hg_restartGamePop {
  position: absolute;
  top: 0;left: 0;
  width: 100%;
  height: 100%;
  z-index: 2;
  background: rgba(0,0,0,0.7);
  display: none;
}

.hg_cta {
  display: inline-block;
  background: red;
  padding:12px 20px;
  color: #fff;
  text-transform: uppercase;
  font-size: 16px;
  font-weight: 700;
  cursor: pointer;
}

#hg_credits {
  position: absolute;
  top: 30px;
  left: 0;right: 0;
  margin: auto;
  font-size: 30px;
  width: 100%;
  text-align: center;
}
#hg_credits p, #hg_credits span {
  color: #fff;
  display: inline-block;
}
#hg_msg{
	color: #fff;
    position: absolute;
    top: 50%;
    text-align: center;
    font-size: 25px;
    width: 100%;
    display: none;
	
}

@keyframes bgAnim {
  0% {
    background-position: 0 bottom;
  }
  100%{
    background-position: -1920px bottom;
  }
}

-webkit-@keyframes bgAnim {
  0% {
    background-position: 0 bottom;
  }
  100%{
    background-position: -1920px bottom;
  }
}

-moz-@keyframes bgAnim {
  0% {
    background-position: 0 bottom;
  }
  100%{
    background-position: -1920px bottom;
  }
}

</style>
<?php
endif;
?>

<?php 
if($_slider[0]->type=='rays_particles'):
?>
<style type="text/css">
#particles-js<?php echo intval( esc_html( $_id ) ); ?> canvas {
  position: absolute;
  width: 100%;
  height: 100%;
}
#particles-js<?php echo intval( esc_html( $_id ) ); ?> form {
  position: absolute;
  padding: 30px;
  width: 150px;
  mix-blend-mode: overlay;
  font-size: 12px;
    z-index: 999;
}

#particles-js<?php echo intval( esc_html( $_id ) ); ?> label {
  display: block;
  text-align: center;
  font-family: "Open Sans Condensed", sans-serif;
  color: white;
}

#particles-js<?php echo intval( esc_html( $_id ) ); ?> input[type=range] {
  -webkit-appearance: none;
  margin-bottom: 18px;
  width: 100%;
}
#particles-js<?php echo intval( esc_html( $_id ) ); ?> input[type=range]:focus {
  outline: none;
}
#particles-js<?php echo intval( esc_html( $_id ) ); ?> input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 2px;
  cursor: pointer;
  background: white;
}
#particles-js<?php echo intval( esc_html( $_id ) ); ?> input[type=range]::-webkit-slider-thumb {
  height: 13px;
  width: 13px;
  border-radius: 50%;
  background: white;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -6px;
}
#particles-js<?php echo intval( esc_html( $_id ) ); ?> input[type=range]::-moz-range-track {
  width: 100%;
  height: 2px;
  cursor: pointer;
  background: white;
}
#particles-js<?php echo intval( esc_html( $_id ) ); ?> input[type=range]::-moz-range-thumb {
  height: 16px;
  width: 16px;
  border-radius: 50%;
  border: 2px solid white;
  background: transparent;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -7px;
}
</style>
<?php
endif;
?>

<?php 
if($_slider[0]->type=='firework'):
?>
<style type="text/css">
#hero-canvas-container {
  width: 100%;
  height: 100%;
  -webkit-transition: -webkit-filter 0.3s;
  transition: -webkit-filter 0.3s;
  transition: filter 0.3s;
  transition: filter 0.3s, -webkit-filter 0.3s;
}
#hero-canvas-container canvas {
  position: absolute;
  mix-blend-mode: lighten;
}
</style>
<?php
endif;
?>

<?php 
if($_slider[0]->type=='svg_animation'):
?>
<style type="text/css">
#particles-js<?php echo intval( esc_html( $_id ) ); ?> {
position:relative;
background: linear-gradient(to top, #7b00e0, #ff006a);
  margin: 0 auto;
  overflow: hidden;
}


@keyframes fadeInRight {
  0% {
    opacity: 0;
    left: 20%;
  }
  100% {
    opacity: 1;
    left: 0;
  }
}


.blob {
  animation: blobby 4s infinite;
}

.blob2 {
  animation: blobby2 6s infinite;
}

@keyframes blobby {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.08);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes blobby2 {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.18);
  }
  100% {
    transform: scale(1);
  }
}
svg {
  position: absolute;
  top: 0;
  z-index:999;
}

#svg-right {
  display: block;
  fill: #7b00e0;
  opacity: 0.5;
  right: 0;
  width: 50%;
  z-index: 9;
}

#svg-left {
  fill: #ff006a;
  margin: 0;
  width: 50%;
  z-index: 9;
}
</style>
<?php
endif;
?>

<?php 
if($_slider[0]->type=='hero_404'){
?>
<style type="text/css">
canvas {
    z-index: 1;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    font-family: 'Merriweather', serif;
}
.hero_not_found {
    z-index: 2;
    position: absolute;
    font: bold 5.5vw 'Merriweather', serif;
    left: 51%;
    top: 40%;
    width: 90%;
    margin-left: -45%;
    height: 50vw;
    text-align: center;
    color: transparent;
    text-shadow: 0 0 12px hsla(0, 0%, 0%, .5);
    animation: flicks 1.5s linear infinite;
}
.hero_not_found span{
   font-size:7.5vw;
   text-shadow: 0 0 24px hsla(0, 0%, 0%, 1);
   animation: spanflicks 1s linear infinite;
}
.hero_not_found_title p{
  z-index:2;
  position: absolute;
  font: bold 3vw 'Merriweather', serif;
  left: 51%;
  top: 30%;
  width: 90%;
  margin-left: -45%;
  height: 50vw;
  text-align: center;
  color: transparent;
  text-shadow: 0 0 12px hsla(0, 0%, 0%, .4);
  animation: flicks 1s linear infinite;
}
.hero_404_shed {
    z-index: 3;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(ellipse at center, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, 0) 19%, hsla(0, 0%, 0%, 0.9) 100%); 
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr = '#00000000', endColorstr = '#e6000000', GradientType = 1); 
}


@keyframes flicks {
    0% {
        text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
    }
    33% {
      color: hsla(0,0%,0%,.4);
      text-shadow: 0 0 10px hsla(0, 0%, 0%, .4);
    }
    66% {
        color: transparent;
        text-shadow: 0 0 20px hsla(0, 0%, 0%, .2);
    }
    100% {
        color: hsla(0,0%,0%,.5);
        text-shadow: 0 0 40px hsla(0, 0%, 0%, .8);
    }
}

@keyframes spanflicks {
    0% {
        text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
    }
    33% {
      color: hsla(0,0%,0%,.4);
      text-shadow: 0 0 10px hsla(2, 95%, 15%, .5);
    }
    66% {
        color: transparent;
        text-shadow: 0 0 20px hsla(2, 95%, 15%, .2);
    }
    100% {
        color: hsla(0,0%,0%,.5);
        text-shadow: 0 0 40px hsla(2, 95%, 15%, .1);
    }
}
</style>
<?php } ?>
<?php 
if($_slider[0]->type=='fizzy_sparks'){
?>
<style type="text/css">
#particles-js<?php echo intval( esc_html( $_id ) ); ?>{
	overflow:hidden;
	background:black !important;
}
#c-container,
#c2-container {
    width: 100%;
    height: 85%;
    position: absolute;
    top: 0;
    left: 0;
}
canvas {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}
</style>
<?php
}
?>

<?php 
if($_slider[0]->type=='pretend_hacker'){
?>
<style type="text/css">
#particles-js<?php echo intval( esc_html( $_id ) ); ?>{
	overflow:hidden;
	
}
#hero_console{
	width:100%;height:100%;
}
.hero_blob_pretent_hacker {
  font-family: monospace;
  font-weight: bold;
  font-size: 2.1vh;
  margin: 0;
  padding: 0;
  line-height: 1;
  color: limegreen;
  text-shadow: 0px 0px 10px limegreen;
  margin-left:10px;
}
</style>
<?php
}
?>

<?php 
if($_slider[0]->type=='the_great_attractor'){
?>
<style type="text/css">
@-webkit-keyframes rotate {
  0% {
    transform: rotate(0);
  }
  100% {
    transform: rotate(360deg);
  }
}
@-moz-keyframes rotate {
  0% {
    transform: rotate(0);
  }
  100% {
    transform: rotate(360deg);
  }
}
@-o-keyframes rotate {
  0% {
    transform: rotate(0);
  }
  100% {
    transform: rotate(360deg);
  }
}
@keyframes rotate {
  0% {
    transform: rotate(0);
  }
  100% {
    transform: rotate(360deg);
  }
}


.slider-hero-m-intro {
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  margin: 0 auto;
  min-width: 785px;
  overflow: hidden;
  position: relative;
  z-index: -999;
}
.slider-hero-m-intro:before, .slider-hero-m-intro:after {
  display: block;
  content: " ";
  width: 2560px;
  height: 2560px;
  position: absolute;
  margin-top: -1280px;
  margin-left: -1280px;
  transform-origin: center;
  background-position: center;
  background-repeat: no-repeat;
  z-index: 50;
  top: 50%;
  left: 50%;
}
.slider-hero-m-intro:before {
  background-image: url("<?php echo QCLD_SLIDERHERO_IMAGES; ?>/circle_inner.png");
  background-size: 100% auto;
  -webkit-animation: rotate 30s infinite linear;
  -moz-animation: rotate 30s infinite linear;
  -o-animation: rotate 30s infinite linear;
  animation: rotate 30s infinite linear;
}
.slider-hero-m-intro:after {
  background-image: url("<?php echo QCLD_SLIDERHERO_IMAGES; ?>/circle_outer.png");
  background-size: 100% auto;
  -webkit-animation: rotate 80s infinite linear;
  -moz-animation: rotate 80s infinite linear;
  -o-animation: rotate 80s infinite linear;
  animation: rotate 80s infinite linear;
}





.slider-hero-e-particles-orange {
  position: absolute;
  border-radius: 50%;
  top: 50%;
  left: 50%;
  z-index: 5;
  width: 1000px;
  height: 600px;
  opacity: 0.4;
  transform: translate(-50%, -50%);
}

.slider-hero-e-particles-blue {
  position: absolute;
  top: 0%;
  left: 0%;
  z-index: 5;
  width: 100%;
  height: 100%;
  opacity: 0.1;
}
</style>
<?php
}
?>

<?php if($_slider[0]->type=='animated_cloud'){ ?>
<style>
#particles-js<?php echo intval( esc_html( $_id ) ); ?>{
	overflow:hidden;
}
.sh_clouds_one {
  background: url("<?php echo QCLD_SLIDERHERO_IMAGES; ?>/zc06.png");
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 300%;
  -webkit-animation: sh_cloud_one 50s linear infinite;
  -moz-animation: sh_cloud_one 50s linear infinite;
  -o-animation: sh_cloud_one 50s linear infinite;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0)
}

.sh_clouds_two {
  background: url("<?php echo QCLD_SLIDERHERO_IMAGES; ?>/clouds-transparent-background-2.png");
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 300%;
  -webkit-animation: sh_cloud_two 75s linear infinite;
  -moz-animation: sh_cloud_two 75s linear infinite;
  -o-animation: sh_cloud_two 75s linear infinite;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0)
}



@-webkit-keyframes sky_background {
  0% {
    background: #007fd5;
    color: #007fd5
  }
  50% {
    background: #000;
    color: #a3d9ff
  }
  100% {
    background: #007fd5;
    color: #007fd5
  }
}

@-webkit-keyframes moon {
  0% {
    opacity: 0;
    left: -200% -moz-transform: scale(0.5);
    -webkit-transform: scale(0.5);
  }
  50% {
    opacity: 1;
    -moz-transform: scale(1);
    left: 0% bottom: 250px;
    -webkit-transform: scale(1);
  }
  100% {
    opacity: 0;
    bottom: 500px;
    -moz-transform: scale(0.5);
    -webkit-transform: scale(0.5);
  }
}

@-webkit-keyframes sh_cloud_one {
  0% {
    left: 0
  }
  100% {
    left: -200%
  }
}

@-webkit-keyframes sh_cloud_two {
  0% {
    left: 0
  }
  100% {
    left: -200%
  }
}

@-webkit-keyframes sh_cloud_three {
  0% {
    left: 0
  }
  100% {
    left: -200%
  }
}

@-moz-keyframes sky_background {
  0% {
    background: #007fd5;
    color: #007fd5
  }
  50% {
    background: #000;
    color: #a3d9ff
  }
  100% {
    background: #007fd5;
    color: #007fd5
  }
}

@-moz-keyframes moon {
  0% {
    opacity: 0;
    left: -200% -moz-transform: scale(0.5);
    -webkit-transform: scale(0.5);
  }
  50% {
    opacity: 1;
    -moz-transform: scale(1);
    left: 0% bottom: 250px;
    -webkit-transform: scale(1);
  }
  100% {
    opacity: 0;
    bottom: 500px;
    -moz-transform: scale(0.5);
    -webkit-transform: scale(0.5);
  }
}

@-moz-keyframes sh_cloud_one {
  0% {
    left: 0
  }
  100% {
    left: -200%
  }
}

@-moz-keyframes sh_cloud_two {
  0% {
    left: 0
  }
  100% {
    left: -200%
  }
}

@-moz-keyframes sh_cloud_three {
  0% {
    left: 0
  }
  100% {
    left: -200%
  }
}
</style>
<?php } ?>

<?php if($_slider[0]->type=='stripe-cube'){ ?>
<style>
.qc_cubes .qc_cube {
  position: absolute;
  height: 100px;
  width: 100px;
  margin: 0;
  -webkit-animation: cube-fade-in 2s cubic-bezier(0.165, 0.84, 0.44, 1);
          animation: cube-fade-in 2s cubic-bezier(0.165, 0.84, 0.44, 1);
  will-change: transform;
}
@-webkit-keyframes cube-fade-in {
  0% {
    opacity: 0;
    -webkit-transform: scale(0.5);
            transform: scale(0.5);
  }
}
@keyframes cube-fade-in {
  0% {
    opacity: 0;
    -webkit-transform: scale(0.5);
            transform: scale(0.5);
  }
}
.qc_cubes .qc_cube * {
  position: absolute;
  height: 100%;
  width: 100%;
}
.qc_cubes .qc_cube .qc_shadow {
  background: #07427a;
  top: 40%;
}
.qc_cubes .qc_cube .qc_sides {
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
  -webkit-perspective: 600px;
          perspective: 600px;
}
.qc_cubes .qc_cube .qc_sides div {
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  will-change: transform;
}
.qc_cubes .qc_cube .qc_sides .qc_front {
  -webkit-transform: rotateY(0deg) translateZ(50px);
          transform: rotateY(0deg) translateZ(50px);
}
.qc_cubes .qc_cube .qc_sides .qc_back {
  -webkit-transform: rotateY(-180deg) translateZ(50px);
          transform: rotateY(-180deg) translateZ(50px);
}
.qc_cubes .qc_cube .qc_sides .qc_left {
  -webkit-transform: rotateY(-90deg) translateZ(50px);
          transform: rotateY(-90deg) translateZ(50px);
}
.qc_cubes .qc_cube .qc_sides .qc_right {
  -webkit-transform: rotateY(90deg) translateZ(50px);
          transform: rotateY(90deg) translateZ(50px);
}
.qc_cubes .qc_cube .qc_sides .qc_top {
  -webkit-transform: rotateX(90deg) translateZ(50px);
          transform: rotateX(90deg) translateZ(50px);
}
.qc_cubes .qc_cube .qc_sides .qc_bottom {
  -webkit-transform: rotateX(-90deg) translateZ(50px);
          transform: rotateX(-90deg) translateZ(50px);
}

</style>
<?php } ?>
