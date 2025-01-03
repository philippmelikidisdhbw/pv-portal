<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if(isset($params->video)&& $params->video=='youtube'): 
	if(isset($params->bg_video_youtube)&& $params->bg_video_youtube!=''):
?>
<div class="sh_bg_video sh_bg_video_y">
	<div class="sh_bg_video_fluid sh_bg_video_fluid_y sdf" style="width: 100%;position: relative;padding: 0;padding-top: 56.5%;">
		
		<div id="hero_youtube_video"></div>
		
	</div>
</div>
<?php 
	endif;
endif;
?>


<?php if(isset($params->video_overlay)&& $params->video_overlay=='1'): ?>
	<div class="sh_video_overlay"></div>
<?php endif; ?>


<?php if($_slider[0]->type=='just_cloud') : //code for Just Cloud effect ?>
<div id="hero_just_clouds"></div>
<?php endif; ?>

<?php if($_slider[0]->type=='intro' && isset($params->introbgeffect) && $params->introbgeffect=='just_cloud') : //code for Just Cloud effect ?>
<div id="hero_just_clouds"></div>
<?php endif; ?>

<?php if($_slider[0]->type=='animated_cloud') : ?>
	<div class="sh_clouds_two"></div>
    <div class="sh_clouds_one"></div>
<?php endif; ?>
<?php if($_slider[0]->type=='stripe-cube') : //code for Just Cloud effect ?>
<div class="qc_main">
  <div class="qc_header">
    <div id="qc-header-hero"></div>
  </div>
  <template id="qc-cube-template">
    <div class="qc_cube">
      <div class="qc_shadow"></div>
      <div class="qc_sides">
        <div class="qc_back"></div>
        <div class="qc_top"></div>
        <div class="qc_left"></div>
        <div class="qc_front"></div>
        <div class="qc_right"></div>
        <div class="qc_bottom"></div>
      </div>
    </div>
  </template>
</div>
<?php endif; ?>

<?php if($_slider[0]->type=='space_elevator') : //code for Just Cloud effect ?>

  <svg class="background__lights" id="lines" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewbox="0 0 1920 1080" xml:space="preserve" preserveAspectRatio="none">
    <g class="lines">
      <rect class="line" x="1253.6" width="4.5" height="1080"></rect>
      <rect class="line" x="873.3" width="1.8" height="1080"></rect>
      <rect class="line" x="1100" width="1.8" height="1080"></rect>
      <rect class="line" x="1547.1" width="4.5" height="1080"></rect>
      <rect class="line" x="615" width="4.5" height="1080"></rect>
      <rect class="line" x="684.6" width="1.8" height="1080"></rect>
      <rect class="line" x="1369.4" width="1.8" height="1080"></rect>
      <rect class="line" x="1310.2" width="0.9" height="1080"></rect>
      <rect class="line" x="1233.4" width="0.9" height="1080"></rect>
      <rect class="line" x="124.2" width="0.9" height="1080"></rect>
      <rect class="line" x="1818.4" width="4.5" height="1080"></rect>
      <rect class="line" x="70.3" width="4.5" height="1080"></rect>
      <rect class="line" x="1618.6" width="1.8" height="1080"></rect>
      <rect class="line" x="455.9" width="1.8" height="1080"></rect>
      <rect class="line" x="328.7" width="1.8" height="1080"></rect>
      <rect class="line" x="300.8" width="4.6" height="1080"></rect>
      <rect class="line" x="1666.4" width="0.9" height="1080"></rect>
    </g>
    <g class="lights">
      <path class="light1 light" d="M619.5,298.4H615v19.5h4.5V298.4z M619.5,674.8H615v9.8h4.5V674.8z M619.5,135.1H615v5.6h4.5V135.1z         M619.5,55.5H615v68.7h4.5V55.5z"></path>
      <path class="light2 light" d="M1258.2,531.9h-4.5v8.1h4.5V531.9z M1258.2,497.9h-4.5v17.9h4.5V497.9z M1258.2,0h-4.5v25.3h4.5V0z         M1258.2,252.2h-4.5v42.4h4.5V252.2z"></path>
      <path class="light3 light" d="M875.1,123.8h-1.8v4h1.8V123.8z M875.1,289.4h-1.8v24.1h1.8V289.4z M875.1,0h-1.8v31.4h1.8V0z M875.1,50.2         h-1.8v11.5h1.8V50.2z"></path>
      <path class="light4 light" d="M1101.8,983.8h-1.8v8.2h1.8V983.8z M1101.8,1075.9h-1.8v4.1h1.8V1075.9z M1101.8,873.7h-1.8v4.2h1.8V873.7z         M1101.8,851h-1.8v18.2h1.8V851z"></path>
      <path class="light5 light" d="M686.4,822.7h-1.8v3.8h1.8V822.7z M686.4,928.4h-1.8v23h1.8V928.4z M686.4,1043.8h-1.8v36.2h1.8V1043.8z"></path>
      <path class="light6 light" d="M1551.6,860.9h-4.4v-34.1h4.4V860.9z M1551.6,533.5h-4.4v-13.9h4.4V533.5z M1551.6,1080h-4.4v-89.1h4.4V1080z"></path>
      <path class="light7 light" d="M1311.1,707.7h-0.9V698h0.9V707.7z M1311.1,436.8h-0.9v-58.9h0.9V436.8z M1311.1,140.7h-0.9V48h0.9V140.7z"></path>
      <path class="light8 light" d="M125.1,514.5h-0.9v-9.7h0.9V514.5z M125.1,243.6h-0.9v-58.9h0.9V243.6z"></path>
      <path class="light9 light" d="M305.4,806.7h-4.6v-42.5h4.6V806.7z M305.4,398.5h-4.6v-17.3h4.6V398.5z M305.4,1080h-4.6V968.8h4.6V1080z"></path>
      <path class="light10 light" d="M1822.9,170.7h-4.5v13.7h4.5V170.7z M1822.9,435.1h-4.5v6.8h4.5V435.1z M1822.9,55.9h-4.5v4h4.5V55.9z         M1822.9,0h-4.5v48.3h4.5V0z"></path>
      <path class="light11 light" d="M1666.4,331.5h0.9v9.7h-0.9V331.5z M1666.4,602.4h0.9v58.9h-0.9V602.4z M1666.4,898.5h0.9v92.7h-0.9V898.5z"></path>
      <path class="light12 light" d="M1620.4,200.7h-1.8v6.4h1.8V200.7z M1620.4,469.1h-1.8v39h1.8V469.1z M1620.4,0h-1.8v51h1.8V0z M1620.4,81.3         h-1.8V100h1.8V81.3z"></path>
      <path class="light13 light" d="M74.8,201h-4.5v16.2h4.5V201z M74.8,512.3h-4.5v8.1h4.5V512.3z M74.8,65.8h-4.5v4.6h4.5V65.8z M74.8,0h-4.5         v56.8h4.5V0z"></path>
      <path class="light14 light" d="M1371.2,655.3h-1.8v6.3h1.8V655.3z M1371.2,829.7h-1.8v37.9h1.8V829.7z M1371.2,1020.3h-1.8v59.7h1.8V1020.3z"></path>
      <path class="light15 light" d="M1234.3,898.1h-0.9v-4.9h0.9V898.1z M1234.3,762.5h-0.9v-29.5h0.9V762.5z M1234.3,614.4h-0.9v-46.4h0.9V614.4z         "></path>
      <path class="light16 light" d="M457.7,1010.8h-1.8v-18.1h1.8V1010.8z M457.7,507.5h-1.8V398h1.8V507.5z"></path>
      <path class="light17 light" d="M330.5,170.7h-1.8v13.7h1.8V170.7z M330.5,435.1h-1.8v6.8h1.8V435.1z M330.5,55.9h-1.8v4h1.8V55.9z M330.5,0         h-1.8v48.3h1.8V0z"></path>
    </g>
  </svg>
<style type="text/css">
#particles-js<?php echo intval( esc_html( $_id ) ); ?>{
	display: flex;
    justify-content: center;
}

svg {
  position: absolute;
  height: 100%;
}

.lines {
  opacity: 0.05;
}

.line {
  fill-rule: evenodd;
  clip-rule: evenodd;
  fill: #4C3A90;
}

.lights {
  opacity: 0.9;
}

.light {
  fill-rule: evenodd;
  clip-rule: evenodd;
  fill: #7A6BB5;
}

</style>
<?php endif; ?>

<?php if($_slider[0]->type=='wave_animation') : //code for wave animation effect ?>
 <svg class="waves" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 960 214.5"><defs><style>.waves>path{-webkit-animation:a 17390ms ease-in-out infinite alternate-reverse both;-moz-animation:a 17390ms ease-in-out infinite alternate-reverse both;-ms-animation:a 17390ms ease-in-out infinite alternate-reverse both;-o-animation:a 17390ms ease-in-out infinite alternate-reverse both;animation:a 17390ms ease-in-out infinite alternate-reverse both;-webkit-animation-timing-function:cubic-bezier(.25,0,.75,1);-moz-animation-timing-function:cubic-bezier(.25,0,.75,1);-ms-animation-timing-function:cubic-bezier(.25,0,.75,1);-o-animation-timing-function:cubic-bezier(.25,0,.75,1);animation-timing-function:cubic-bezier(.25,0,.75,1);-webkit-will-change:transform;-moz-will-change:transform;-ms-will-change:transform;-o-will-change:transform;will-change:transform}.waves>path:nth-of-type(1){-webkit-animation-duration:20580ms;-moz-animation-duration:20580ms;-ms-animation-duration:20580ms;-o-animation-duration:20580ms;animation-duration:20580ms}.waves>path:nth-of-type(2){-webkit-animation-delay:-2690ms;-moz-animation-delay:-2690ms;-ms-animation-delay:-2690ms;-o-animation-delay:-2690ms;animation-delay:-2690ms;-webkit-animation-duration:13580ms;-moz-animation-duration:13580ms;-ms-animation-duration:13580ms;-o-animation-duration:13580ms;animation-duration:13580ms}.waves>g>path:nth-of-type(1){-webkit-animation-delay:-820ms;-moz-animation-delay:-820ms;-ms-animation-delay:-820ms;-o-animation-delay:-820ms;animation-delay:-820ms;-webkit-animation-duration:10730ms;-moz-animation-duration:10730ms;-ms-animation-duration:10730ms;-o-animation-duration:10730ms;animation-duration:10730ms}.waves>path:nth-of-type(1),.waves>g>path:nth-of-type(2){-webkit-animation-direction:alternate;-moz-animation-direction:alternate;-ms-animation-direction:alternate;-o-animation-direction:alternate;animation-direction:alternate}@-webkit-keyframes a{0%{-webkit-transform:translateX(-750px);transform:translateX(-750px)}100%{-webkit-transform:translateX(-20px);transform:translateX(-20px)}}@-moz-keyframes a{0%{-moz-transform:translateX(-750px);transform:translateX(-750px)}100%{-moz-transform:translateX(-20px);transform:translateX(-20px)}}@-ms-keyframes a{0%{-ms-transform:translateX(-750px);transform:translateX(-750px)}100%{-ms-transform:translateX(-20px);transform:translateX(-20px)}}@-o-keyframes a{0%{-o-transform:translateX(-750px);transform:translateX(-750px)}100%{-o-transform:translateX(-20px);transform:translateX(-20px)}}@keyframes a{0%{-webkit-transform:translateX(-750px);-moz-transform:translateX(-750px);-ms-transform:translateX(-750px);-o-transform:translateX(-750px);transform:translateX(-750px)}100%{-webkit-transform:translateX(-20px);-moz-transform:translateX(-20px);-ms-transform:translateX(-20px);-o-transform:translateX(-20px);transform:translateX(-20px)}}</style><linearGradient id="a"><stop stop-color="#00A8DE"/><stop offset="0.2" stop-color="#333391"/><stop offset="0.4" stop-color="#E91388"/><stop offset="0.6" stop-color="#EB2D2E"/></linearGradient></defs><path fill="url(#a)" d="M2662.6 1S2532 41.2 2435 40.2c-19.6-.2-37.3-1.3-53.5-2.8 0 0-421.3-59.4-541-28.6-119.8 30.6-206.2 75.7-391 73.3-198.8-2-225.3-15-370.2-50-145-35-218 37-373.3 36-19.6 0-37.5-1-53.7-3 0 0-282.7-36-373.4-38C139 26 75 46-1 46v106c17-1.4 20-2.3 37.6-1.2 130.6 8.4 210 56.3 287 62.4 77 6 262-25 329.3-23.6 67 1.4 107 22.6 193 23.4 155 1.5 249-71 380-62.5 130 8.5 209 56.3 287 62.5 77 6 126-18 188-18 61.4 0 247-38 307.4-46 159.3-20 281.2 29 348.4 30 67 2 132.2 6 217.4 7 39.3 0 87-11 87-11V1z"/><path fill="#F2F5F5" d="M2663.6 73.2S2577 92 2529 89c-130.7-8.5-209.5-56.3-286.7-62.4s-125.7 18-188.3 18c-5 0-10-.4-14.5-.7-52-5-149.2-43-220.7-39-31.7 2-64 14-96.4 30-160.4 80-230.2-5.6-340.4-18-110-12-146.6 20-274 36S820.4 0 605.8 0C450.8 0 356 71 225.2 62.2 128 56 60.7 28-.3 11.2V104c22 7.3 46 14.2 70.4 16.7 110 12.3 147-19.3 275-35.5s350 39.8 369 43c27 4.3 59 8 94 10 13 .5 26 1 39 1 156 2 250-70.3 381-62 130.5 8.2 209.5 56.3 286.7 62 77 6.4 125.8-18 188.3-17.5 5 0 10 .2 14.3.6 52 5 145 49.5 220.7 38.2 32-5 64-15 96.6-31 160.5-79.4 230.3 6 340 18.4 110 12 146.3-20 273.7-36l15.5-2V73l1-.5z"/><g fill="none" stroke="#E2E9E9" stroke-width="1"><path d="M0 51.4c3.4.6 7.7 1.4 11 2.3 133.2 34 224.3 34 308.6 34 110.2 0 116.7 36.6 229.8 26 113-11 128.7-44 222-42.6C865 73 889 38 1002 27c113-10.8 119.6 25.6 229.8 25.6 84.4 0 175.4 0 308.6 34 133 34.2 277-73 379.4-84.3 204-22.5 283.6 128.7 283.6 128.7"/><path d="M0 6C115.7-6 198.3 76.6 308 76.6c109.6 0 131.8-20 223-28.3 114.3-10.2 238.2 0 238.2 0s124 10.2 238.3 0c91-8.2 113.2-28 223-28S1425 103 1541 91c115.8-11.8 153.3-69 269.3-84.6 116-15.5 198.4 71 308 71 109.8 0 131.8-20 223-28 114-10.2 237.7 0 237.7 0s37.4 2.4 82.8 3.7"/></g></svg>
<style type="text/css">
	.waves {
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	display: block;
	min-width: 100%;
	min-height: 70%;
	margin: auto 0;
}
</style>
<?php endif; ?>

<?php if($_slider[0]->type=='campfire') : //code for Campfire effect ?>
<div class="stage">
  <div class="campfire">
    <div class="sparks">
      <div class="spark"></div>
      <div class="spark"></div>
      <div class="spark"></div>
      <div class="spark"></div>
      <div class="spark"></div>
      <div class="spark"></div>
      <div class="spark"></div>
      <div class="spark"></div>
    </div>
    <div class="logs">
      <div class="log">
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
      </div>
      <div class="log">
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
      </div>
      <div class="log">
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
      </div>
      <div class="log">
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
      </div>
      <div class="log">
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
      </div>
      <div class="log">
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
      </div>
      <div class="log">
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
        <div class="streak"></div>
      </div>
    </div>
    <div class="sticks">
      <div class="stick"></div>
      <div class="stick"></div>
      <div class="stick"></div>
      <div class="stick"></div>
    </div>
    <div class="fire">
      <div class="fire__red">
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
      </div>
      <div class="fire__orange">
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
      </div>
      <div class="fire__yellow">
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
      </div>
      <div class="fire__white">
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
.stage {
  width: 100%;
  height: 100%;

  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
 <?php 
	if(isset($params->campfire_position) && $params->campfire_position=='left'):
 ?>
  justify-content: left;
  <?php elseif(isset($params->campfire_position) && $params->campfire_position=='right'): ?>
  justify-content: flex-end;
  <?php else: ?>
  justify-content: center;
  <?php endif; ?>
}
.campfire {
  position: relative;
  width: 600px;
  height: 600px;
  -webkit-transform-origin: center center;
          transform-origin: center center;
  -webkit-transform: scale(0.75);
          transform: scale(0.75);

}
.log {
  position: absolute;
  width: 238px;
  height: 70px;
  border-radius: 32px;
  background: #781e20;
  overflow: hidden;
  opacity: 0.99;
}
.log:before {
  content: '';
  display: block;
  position: absolute;
  top: 50%;
  left: 35px;
  width: 8px;
  height: 8px;
  border-radius: 32px;
  background: #b35050;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  z-index: 3;
  box-shadow: 0 0 0 2.5px #781e20, 0 0 0 10.5px #b35050, 0 0 0 13px #781e20, 0 0 0 21px #b35050, 0 0 0 23.5px #781e20, 0 0 0 31.5px #b35050;
}
.streak {
  position: absolute;
  height: 2px;
  border-radius: 20px;
  background: #b35050;
}
.streak:nth-child(1) {
  top: 10px;
  width: 90px;
}
.streak:nth-child(2) {
  top: 10px;
  left: 100px;
  width: 80px;
}
.streak:nth-child(3) {
  top: 10px;
  left: 190px;
  width: 30px;
}
.streak:nth-child(4) {
  top: 22px;
  width: 132px;
}
.streak:nth-child(5) {
  top: 22px;
  left: 142px;
  width: 48px;
}
.streak:nth-child(6) {
  top: 22px;
  left: 200px;
  width: 28px;
}
.streak:nth-child(7) {
  top: 34px;
  left: 74px;
  width: 160px;
}
.streak:nth-child(8) {
  top: 46px;
  left: 110px;
  width: 40px;
}
.streak:nth-child(9) {
  top: 46px;
  left: 170px;
  width: 54px;
}
.streak:nth-child(10) {
  top: 58px;
  left: 90px;
  width: 110px;
}
.log {
  -webkit-transform-origin: center center;
          transform-origin: center center;
  box-shadow: 0 0 2px 1px rgba(0,0,0,0.15);
}
.log:nth-child(1) {
  bottom: 100px;
  left: 100px;
  -webkit-transform: rotate(150deg) scaleX(0.75);
          transform: rotate(150deg) scaleX(0.75);
  z-index: 20;
}
.log:nth-child(2) {
  bottom: 120px;
  left: 140px;
  -webkit-transform: rotate(110deg) scaleX(0.75);
          transform: rotate(110deg) scaleX(0.75);
  z-index: 10;
}
.log:nth-child(3) {
  bottom: 98px;
  left: 68px;
  -webkit-transform: rotate(-10deg) scaleX(0.75);
          transform: rotate(-10deg) scaleX(0.75);
}
.log:nth-child(4) {
  bottom: 80px;
  left: 220px;
  -webkit-transform: rotate(-120deg) scaleX(0.75);
          transform: rotate(-120deg) scaleX(0.75);
  z-index: 26;
}
.log:nth-child(5) {
  bottom: 75px;
  left: 210px;
  -webkit-transform: rotate(-30deg) scaleX(0.75);
          transform: rotate(-30deg) scaleX(0.75);
  z-index: 25;
}
.log:nth-child(6) {
  bottom: 92px;
  left: 280px;
  -webkit-transform: rotate(35deg) scaleX(0.85);
          transform: rotate(35deg) scaleX(0.85);
  z-index: 30;
}
.log:nth-child(7) {
  bottom: 70px;
  left: 300px;
  -webkit-transform: rotate(-30deg) scaleX(0.75);
          transform: rotate(-30deg) scaleX(0.75);
  z-index: 20;
}
.stick {
  position: absolute;
  width: 68px;
  height: 20px;
  border-radius: 10px;
  box-shadow: 0 0 2px 1px rgba(0,0,0,0.1);
  background: #781e20;
}
.stick:before {
  content: '';
  display: block;
  position: absolute;
  bottom: 100%;
  left: 30px;
  width: 6px;
  height: 20px;
  background: #781e20;
  border-radius: 10px;
  -webkit-transform: translateY(50%) rotate(32deg);
          transform: translateY(50%) rotate(32deg);
}
.stick:after {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  right: 0;
  width: 20px;
  height: 20px;
  background: #b35050;
  border-radius: 10px;
}
.stick {
  -webkit-transform-origin: center center;
          transform-origin: center center;
}
.stick:nth-child(1) {
  left: 158px;
  bottom: 164px;
  -webkit-transform: rotate(-152deg) scaleX(0.8);
          transform: rotate(-152deg) scaleX(0.8);
  z-index: 12;
}
.stick:nth-child(2) {
  left: 180px;
  bottom: 30px;
  -webkit-transform: rotate(20deg) scaleX(0.9);
          transform: rotate(20deg) scaleX(0.9);
}
.stick:nth-child(3) {
  left: 400px;
  bottom: 38px;
  -webkit-transform: rotate(170deg) scaleX(0.9);
          transform: rotate(170deg) scaleX(0.9);
}
.stick:nth-child(3):before {
  display: none;
}
.stick:nth-child(4) {
  left: 370px;
  bottom: 150px;
  -webkit-transform: rotate(80deg) scaleX(0.9);
          transform: rotate(80deg) scaleX(0.9);
  z-index: 20;
}
.stick:nth-child(4):before {
  display: none;
}
.fire .flame {
  position: absolute;
  -webkit-transform-origin: bottom center;
          transform-origin: bottom center;
  opacity: 0.9;
}
.fire__red .flame {
  width: 48px;
  border-radius: 48px;
  background: #e20f00;
  box-shadow: 0 0 80px 18px rgba(226,15,0,0.4);
}
.fire__red .flame:nth-child(1) {
  left: 138px;
  height: 160px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.15s ease-in-out infinite alternate;
          animation: fire 2s 0.15s ease-in-out infinite alternate;
}
.fire__red .flame:nth-child(2) {
  left: 186px;
  height: 240px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.35s ease-in-out infinite alternate;
          animation: fire 2s 0.35s ease-in-out infinite alternate;
}
.fire__red .flame:nth-child(3) {
  left: 234px;
  height: 300px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.1s ease-in-out infinite alternate;
          animation: fire 2s 0.1s ease-in-out infinite alternate;
}
.fire__red .flame:nth-child(4) {
  left: 282px;
  height: 360px;
  bottom: 100px;
  -webkit-animation: fire 2s 0s ease-in-out infinite alternate;
          animation: fire 2s 0s ease-in-out infinite alternate;
}
.fire__red .flame:nth-child(5) {
  left: 330px;
  height: 310px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.45s ease-in-out infinite alternate;
          animation: fire 2s 0.45s ease-in-out infinite alternate;
}
.fire__red .flame:nth-child(6) {
  left: 378px;
  height: 232px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.3s ease-in-out infinite alternate;
          animation: fire 2s 0.3s ease-in-out infinite alternate;
}
.fire__red .flame:nth-child(7) {
  left: 426px;
  height: 140px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.1s ease-in-out infinite alternate;
          animation: fire 2s 0.1s ease-in-out infinite alternate;
}
.fire__orange .flame {
  width: 48px;
  border-radius: 48px;
  background: #ff9c00;
  box-shadow: 0 0 80px 18px rgba(255,156,0,0.4);
}
.fire__orange .flame:nth-child(1) {
  left: 138px;
  height: 140px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.05s ease-in-out infinite alternate;
          animation: fire 2s 0.05s ease-in-out infinite alternate;
}
.fire__orange .flame:nth-child(2) {
  left: 186px;
  height: 210px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.1s ease-in-out infinite alternate;
          animation: fire 2s 0.1s ease-in-out infinite alternate;
}
.fire__orange .flame:nth-child(3) {
  left: 234px;
  height: 250px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.35s ease-in-out infinite alternate;
          animation: fire 2s 0.35s ease-in-out infinite alternate;
}
.fire__orange .flame:nth-child(4) {
  left: 282px;
  height: 300px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.4s ease-in-out infinite alternate;
          animation: fire 2s 0.4s ease-in-out infinite alternate;
}
.fire__orange .flame:nth-child(5) {
  left: 330px;
  height: 260px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.5s ease-in-out infinite alternate;
          animation: fire 2s 0.5s ease-in-out infinite alternate;
}
.fire__orange .flame:nth-child(6) {
  left: 378px;
  height: 202px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.35s ease-in-out infinite alternate;
          animation: fire 2s 0.35s ease-in-out infinite alternate;
}
.fire__orange .flame:nth-child(7) {
  left: 426px;
  height: 110px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.1s ease-in-out infinite alternate;
          animation: fire 2s 0.1s ease-in-out infinite alternate;
}
.fire__yellow .flame {
  width: 48px;
  border-radius: 48px;
  background: #ffeb6e;
  box-shadow: 0 0 80px 18px rgba(255,235,110,0.4);
}
.fire__yellow .flame:nth-child(1) {
  left: 186px;
  height: 140px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.6s ease-in-out infinite alternate;
          animation: fire 2s 0.6s ease-in-out infinite alternate;
}
.fire__yellow .flame:nth-child(2) {
  left: 234px;
  height: 172px;
  bottom: 120px;
  -webkit-animation: fire 2s 0.4s ease-in-out infinite alternate;
          animation: fire 2s 0.4s ease-in-out infinite alternate;
}
.fire__yellow .flame:nth-child(3) {
  left: 282px;
  height: 240px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.38s ease-in-out infinite alternate;
          animation: fire 2s 0.38s ease-in-out infinite alternate;
}
.fire__yellow .flame:nth-child(4) {
  left: 330px;
  height: 200px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.22s ease-in-out infinite alternate;
          animation: fire 2s 0.22s ease-in-out infinite alternate;
}
.fire__yellow .flame:nth-child(5) {
  left: 378px;
  height: 142px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.18s ease-in-out infinite alternate;
          animation: fire 2s 0.18s ease-in-out infinite alternate;
}
.fire__white .flame {
  width: 48px;
  border-radius: 48px;
  background: #fef1d9;
  box-shadow: 0 0 80px 18px rgba(254,241,217,0.4);
}
.fire__white .flame:nth-child(1) {
  left: 156px;
  width: 32px;
  height: 100px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.22s ease-in-out infinite alternate;
          animation: fire 2s 0.22s ease-in-out infinite alternate;
}
.fire__white .flame:nth-child(2) {
  left: 181px;
  width: 32px;
  height: 120px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.42s ease-in-out infinite alternate;
          animation: fire 2s 0.42s ease-in-out infinite alternate;
}
.fire__white .flame:nth-child(3) {
  left: 234px;
  height: 170px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.32s ease-in-out infinite alternate;
          animation: fire 2s 0.32s ease-in-out infinite alternate;
}
.fire__white .flame:nth-child(4) {
  left: 282px;
  height: 210px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.8s ease-in-out infinite alternate;
          animation: fire 2s 0.8s ease-in-out infinite alternate;
}
.fire__white .flame:nth-child(5) {
  left: 330px;
  height: 170px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.85s ease-in-out infinite alternate;
          animation: fire 2s 0.85s ease-in-out infinite alternate;
}
.fire__white .flame:nth-child(6) {
  left: 378px;
  width: 32px;
  height: 110px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.64s ease-in-out infinite alternate;
          animation: fire 2s 0.64s ease-in-out infinite alternate;
}
.fire__white .flame:nth-child(7) {
  left: 408px;
  width: 32px;
  height: 100px;
  bottom: 100px;
  -webkit-animation: fire 2s 0.32s ease-in-out infinite alternate;
          animation: fire 2s 0.32s ease-in-out infinite alternate;
}
.spark {
  position: absolute;
  width: 6px;
  height: 20px;
  background: #fef1d9;
  border-radius: 18px;
  z-index: 50;
  -webkit-transform-origin: bottom center;
          transform-origin: bottom center;
  -webkit-transform: scaleY(0);
          transform: scaleY(0);
}
.spark:nth-child(1) {
  left: 160px;
  bottom: 212px;
  -webkit-animation: spark 1s 0.4s linear infinite;
          animation: spark 1s 0.4s linear infinite;
}
.spark:nth-child(2) {
  left: 180px;
  bottom: 240px;
  -webkit-animation: spark 1s 1s linear infinite;
          animation: spark 1s 1s linear infinite;
}
.spark:nth-child(3) {
  left: 208px;
  bottom: 320px;
  -webkit-animation: spark 1s 0.8s linear infinite;
          animation: spark 1s 0.8s linear infinite;
}
.spark:nth-child(4) {
  left: 310px;
  bottom: 400px;
  -webkit-animation: spark 1s 2s linear infinite;
          animation: spark 1s 2s linear infinite;
}
.spark:nth-child(5) {
  left: 360px;
  bottom: 380px;
  -webkit-animation: spark 1s 0.75s linear infinite;
          animation: spark 1s 0.75s linear infinite;
}
.spark:nth-child(6) {
  left: 390px;
  bottom: 320px;
  -webkit-animation: spark 1s 0.65s linear infinite;
          animation: spark 1s 0.65s linear infinite;
}
.spark:nth-child(7) {
  left: 400px;
  bottom: 280px;
  -webkit-animation: spark 1s 1s linear infinite;
          animation: spark 1s 1s linear infinite;
}
.spark:nth-child(8) {
  left: 430px;
  bottom: 210px;
  -webkit-animation: spark 1s 1.4s linear infinite;
          animation: spark 1s 1.4s linear infinite;
}
@-webkit-keyframes fire {
  0% {
    -webkit-transform: scaleY(1);
            transform: scaleY(1);
  }
  28% {
    -webkit-transform: scaleY(0.7);
            transform: scaleY(0.7);
  }
  38% {
    -webkit-transform: scaleY(0.8);
            transform: scaleY(0.8);
  }
  50% {
    -webkit-transform: scaleY(0.6);
            transform: scaleY(0.6);
  }
  70% {
    -webkit-transform: scaleY(0.95);
            transform: scaleY(0.95);
  }
  82% {
    -webkit-transform: scaleY(0.58);
            transform: scaleY(0.58);
  }
  100% {
    -webkit-transform: scaleY(1);
            transform: scaleY(1);
  }
}
@keyframes fire {
  0% {
    -webkit-transform: scaleY(1);
            transform: scaleY(1);
  }
  28% {
    -webkit-transform: scaleY(0.7);
            transform: scaleY(0.7);
  }
  38% {
    -webkit-transform: scaleY(0.8);
            transform: scaleY(0.8);
  }
  50% {
    -webkit-transform: scaleY(0.6);
            transform: scaleY(0.6);
  }
  70% {
    -webkit-transform: scaleY(0.95);
            transform: scaleY(0.95);
  }
  82% {
    -webkit-transform: scaleY(0.58);
            transform: scaleY(0.58);
  }
  100% {
    -webkit-transform: scaleY(1);
            transform: scaleY(1);
  }
}
@-webkit-keyframes spark {
  0%, 35% {
    -webkit-transform: scaleY(0) translateY(0);
            transform: scaleY(0) translateY(0);
    opacity: 0;
  }
  50% {
    -webkit-transform: scaleY(1) translateY(0);
            transform: scaleY(1) translateY(0);
    opacity: 1;
  }
  70% {
    -webkit-transform: scaleY(1) translateY(-10px);
            transform: scaleY(1) translateY(-10px);
    opacity: 1;
  }
  75% {
    -webkit-transform: scaleY(1) translateY(-10px);
            transform: scaleY(1) translateY(-10px);
    opacity: 0;
  }
  100% {
    -webkit-transform: scaleY(0) translateY(0);
            transform: scaleY(0) translateY(0);
    opacity: 0;
  }
}
@keyframes spark {
  0%, 35% {
    -webkit-transform: scaleY(0) translateY(0);
            transform: scaleY(0) translateY(0);
    opacity: 0;
  }
  50% {
    -webkit-transform: scaleY(1) translateY(0);
            transform: scaleY(1) translateY(0);
    opacity: 1;
  }
  70% {
    -webkit-transform: scaleY(1) translateY(-10px);
            transform: scaleY(1) translateY(-10px);
    opacity: 1;
  }
  75% {
    -webkit-transform: scaleY(1) translateY(-10px);
            transform: scaleY(1) translateY(-10px);
    opacity: 0;
  }
  100% {
    -webkit-transform: scaleY(0) translateY(0);
            transform: scaleY(0) translateY(0);
    opacity: 0;
  }
}

</style>
<?php endif; ?>

<?php if($_slider[0]->type=='floatingleafs') : //code for Floating Leafs effect ?>
<script id="sakura_point_vsh" type="x-shader/x_vertex">
uniform mat4 uProjection;
uniform mat4 uModelview;
uniform vec3 uResolution;
uniform vec3 uOffset;
uniform vec3 uDOF;  //x:focus distance, y:focus radius, z:max radius
uniform vec3 uFade; //x:start distance, y:half distance, z:near fade start

attribute vec3 aPosition;
attribute vec3 aEuler;
attribute vec2 aMisc; //x:size, y:fade

varying vec3 pposition;
varying float psize;
varying float palpha;
varying float pdist;

//varying mat3 rotMat;
varying vec3 normX;
varying vec3 normY;
varying vec3 normZ;
varying vec3 normal;

varying float diffuse;
varying float specular;
varying float rstop;
varying float distancefade;

void main(void) {
    // Projection is based on vertical angle
    vec4 pos = uModelview * vec4(aPosition + uOffset, 1.0);
    gl_Position = uProjection * pos;
    gl_PointSize = aMisc.x * uProjection[1][1] / -pos.z * uResolution.y * 0.5;
    
    pposition = pos.xyz;
    psize = aMisc.x;
    pdist = length(pos.xyz);
    palpha = smoothstep(0.0, 1.0, (pdist - 0.1) / uFade.z);
    
    vec3 elrsn = sin(aEuler);
    vec3 elrcs = cos(aEuler);
    mat3 rotx = mat3(
        1.0, 0.0, 0.0,
        0.0, elrcs.x, elrsn.x,
        0.0, -elrsn.x, elrcs.x
    );
    mat3 roty = mat3(
        elrcs.y, 0.0, -elrsn.y,
        0.0, 1.0, 0.0,
        elrsn.y, 0.0, elrcs.y
    );
    mat3 rotz = mat3(
        elrcs.z, elrsn.z, 0.0, 
        -elrsn.z, elrcs.z, 0.0,
        0.0, 0.0, 1.0
    );
    mat3 rotmat = rotx * roty * rotz;
    normal = rotmat[2];
    
    mat3 trrotm = mat3(
        rotmat[0][0], rotmat[1][0], rotmat[2][0],
        rotmat[0][1], rotmat[1][1], rotmat[2][1],
        rotmat[0][2], rotmat[1][2], rotmat[2][2]
    );
    normX = trrotm[0];
    normY = trrotm[1];
    normZ = trrotm[2];
    
    const vec3 lit = vec3(0.6917144638660746, 0.6917144638660746, -0.20751433915982237);
    
    float tmpdfs = dot(lit, normal);
    if(tmpdfs < 0.0) {
        normal = -normal;
        tmpdfs = dot(lit, normal);
    }
    diffuse = 0.4 + tmpdfs;
    
    vec3 eyev = normalize(-pos.xyz);
    if(dot(eyev, normal) > 0.0) {
        vec3 hv = normalize(eyev + lit);
        specular = pow(max(dot(hv, normal), 0.0), 20.0);
    }
    else {
        specular = 0.0;
    }
    
    rstop = clamp((abs(pdist - uDOF.x) - uDOF.y) / uDOF.z, 0.0, 1.0);
    rstop = pow(rstop, 0.5);
    //-0.69315 = ln(0.5)
    distancefade = min(1.0, exp((uFade.x - pdist) * 0.69315 / uFade.y));
}
</script>
<script id="sakura_point_fsh" type="x-shader/x_fragment">
#ifdef GL_ES
//precision mediump float;
precision highp float;
#endif

uniform vec3 uDOF;  //x:focus distance, y:focus radius, z:max radius
uniform vec3 uFade; //x:start distance, y:half distance, z:near fade start

const vec3 fadeCol = vec3(0.08, 0.03, 0.06);

varying vec3 pposition;
varying float psize;
varying float palpha;
varying float pdist;

//varying mat3 rotMat;
varying vec3 normX;
varying vec3 normY;
varying vec3 normZ;
varying vec3 normal;

varying float diffuse;
varying float specular;
varying float rstop;
varying float distancefade;

float ellipse(vec2 p, vec2 o, vec2 r) {
    vec2 lp = (p - o) / r;
    return length(lp) - 1.0;
}

void main(void) {
    vec3 p = vec3(gl_PointCoord - vec2(0.5, 0.5), 0.0) * 2.0;
    vec3 d = vec3(0.0, 0.0, -1.0);
    float nd = normZ.z; //dot(-normZ, d);
    if(abs(nd) < 0.0001) discard;
    
    float np = dot(normZ, p);
    vec3 tp = p + d * np / nd;
    vec2 coord = vec2(dot(normX, tp), dot(normY, tp));
    
    //angle = 15 degree
    const float flwrsn = 0.258819045102521;
    const float flwrcs = 0.965925826289068;
    mat2 flwrm = mat2(flwrcs, -flwrsn, flwrsn, flwrcs);
    vec2 flwrp = vec2(abs(coord.x), coord.y) * flwrm;
    
    float r;
    if(flwrp.x < 0.0) {
        r = ellipse(flwrp, vec2(0.065, 0.024) * 0.5, vec2(0.36, 0.96) * 0.5);
    }
    else {
        r = ellipse(flwrp, vec2(0.065, 0.024) * 0.5, vec2(0.58, 0.96) * 0.5);
    }
    
    if(r > rstop) discard;
    
    vec3 col = mix(vec3(1.0, 0.8, 0.75), vec3(1.0, 0.9, 0.87), r);
    float grady = mix(0.0, 1.0, pow(coord.y * 0.5 + 0.5, 0.35));
    col *= vec3(1.0, grady, grady);
    col *= mix(0.8, 1.0, pow(abs(coord.x), 0.3));
    col = col * diffuse + specular;
    
    col = mix(fadeCol, col, distancefade);
    
    float alpha = (rstop > 0.001)? (0.5 - r / (rstop * 2.0)) : 1.0;
    alpha = smoothstep(0.0, 1.0, alpha) * palpha;
    
    gl_FragColor = vec4(col * 0.5, alpha);
}
</script>
<!-- effects -->
<script id="fx_common_vsh" type="x-shader/x_vertex">
uniform vec3 uResolution;
attribute vec2 aPosition;

varying vec2 texCoord;
varying vec2 screenCoord;

void main(void) {
    gl_Position = vec4(aPosition, 0.0, 1.0);
    texCoord = aPosition.xy * 0.5 + vec2(0.5, 0.5);
    screenCoord = aPosition.xy * vec2(uResolution.z, 1.0);
}
</script>
<script id="bg_fsh" type="x-shader/x_fragment">
#ifdef GL_ES
//precision mediump float;
precision highp float;
#endif

uniform vec2 uTimes;

varying vec2 texCoord;
varying vec2 screenCoord;

void main(void) {
    vec3 col;
    float c;
    vec2 tmpv = texCoord * vec2(0.8, 1.0) - vec2(0.95, 1.0);
    c = exp(-pow(length(tmpv) * 1.8, 2.0));
    col = mix(vec3(0.02, 0.0, 0.03), vec3(0.96, 0.98, 1.0) * 1.5, c);
    gl_FragColor = vec4(col * 0.5, 1.0);
}
</script>
<script id="fx_brightbuf_fsh" type="x-shader/x_fragment">
#ifdef GL_ES
//precision mediump float;
precision highp float;
#endif
uniform sampler2D uSrc;
uniform vec2 uDelta;

varying vec2 texCoord;
varying vec2 screenCoord;

void main(void) {
    vec4 col = texture2D(uSrc, texCoord);
    gl_FragColor = vec4(col.rgb * 2.0 - vec3(0.5), 1.0);
}
</script>
<script id="fx_dirblur_r4_fsh" type="x-shader/x_fragment">
#ifdef GL_ES
//precision mediump float;
precision highp float;
#endif
uniform sampler2D uSrc;
uniform vec2 uDelta;
uniform vec4 uBlurDir; //dir(x, y), stride(z, w)

varying vec2 texCoord;
varying vec2 screenCoord;

void main(void) {
    vec4 col = texture2D(uSrc, texCoord);
    col = col + texture2D(uSrc, texCoord + uBlurDir.xy * uDelta);
    col = col + texture2D(uSrc, texCoord - uBlurDir.xy * uDelta);
    col = col + texture2D(uSrc, texCoord + (uBlurDir.xy + uBlurDir.zw) * uDelta);
    col = col + texture2D(uSrc, texCoord - (uBlurDir.xy + uBlurDir.zw) * uDelta);
    gl_FragColor = col / 5.0;
}
</script>
<!-- effect fragment shader template -->
<script id="fx_common_fsh" type="x-shader/x_fragment">
#ifdef GL_ES
//precision mediump float;
precision highp float;
#endif
uniform sampler2D uSrc;
uniform vec2 uDelta;

varying vec2 texCoord;
varying vec2 screenCoord;

void main(void) {
    gl_FragColor = texture2D(uSrc, texCoord);
}
</script>
<!-- post processing -->
<script id="pp_final_vsh" type="x-shader/x_vertex">
uniform vec3 uResolution;
attribute vec2 aPosition;
varying vec2 texCoord;
varying vec2 screenCoord;
void main(void) {
    gl_Position = vec4(aPosition, 0.0, 1.0);
    texCoord = aPosition.xy * 0.5 + vec2(0.5, 0.5);
    screenCoord = aPosition.xy * vec2(uResolution.z, 1.0);
}
</script>
<script id="pp_final_fsh" type="x-shader/x_fragment">
#ifdef GL_ES
//precision mediump float;
precision highp float;
#endif
uniform sampler2D uSrc;
uniform sampler2D uBloom;
uniform vec2 uDelta;
varying vec2 texCoord;
varying vec2 screenCoord;
void main(void) {
    vec4 srccol = texture2D(uSrc, texCoord) * 2.0;
    vec4 bloomcol = texture2D(uBloom, texCoord);
    vec4 col;
    col = srccol + bloomcol * (vec4(1.0) + srccol);
    col *= smoothstep(1.0, 0.0, pow(length((texCoord - vec2(0.5)) * 2.0), 1.2) * 0.5);
    col = pow(col, vec4(0.45454545454545)); //(1.0 / 2.2)
    
    gl_FragColor = vec4(col.rgb, 1.0);
    gl_FragColor.a = 1.0;
}
</script>
<?php endif; ?>

<?php if($_slider[0]->type=='subvisual') : //code for Subvisual ?>
	<style>
	svg{
	  width: 100%;
    height: 100%;position:absolute;}
	</style>
	<svg id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 540">

	  <defs>
		<linearGradient id="linearGradient-1" x1="52.9%" x2="40.18%" y1="32.87%" y2="56.72%">
		  <stop stop-color="#09DFF3" offset="0%" />
		  <stop stop-color="#44BEFF" offset="100%" />
		</linearGradient>

		<circle id="planet-shape" cx="31" cy="31" r="30" />
		<mask id="planet-mask" fill="#fff">
		  <use xlink:href="#planet-shape" />
		</mask>
		<path id="planet-section-1" d="M0 1h62v12H0z" mask="url(#planet-mask)" />
		<path id="planet-section-2" d="M0 11h62v12H0z" mask="url(#planet-mask)" />
		<path id="planet-section-3" d="M0 21h62v12H0z" mask="url(#planet-mask)" />
		<path id="planet-section-4" d="M0 31h62v12H0z" mask="url(#planet-mask)" />
		<path id="planet-section-5" d="M0 41h62v12H0z" mask="url(#planet-mask)" />
		<path id="planet-section-6" d="M0 51h62v12H0z" mask="url(#planet-mask)" />

		<circle id="path-4" cx="159.05" cy="159.05" r="159.05" />

		<symbol id="planet-dark-grey">
		  <use fill="#5E9CCC" xlink:href="#planet-shape" />
		  <use fill="#8DCFDC" xlink:href="#planet-section-1" />
		  <use fill="#7ABAD6" xlink:href="#planet-section-2" />
		  <use fill="#72AFD3" xlink:href="#planet-section-3" />
		  <use fill="#65A4CF" xlink:href="#planet-section-4" />
		  <use fill="#5E9CCC" xlink:href="#planet-section-5" />
		  <use fill="#5B94C8" xlink:href="#planet-section-6" />
		</symbol>
		<symbol id="planet-green">
		  <use fill="#18D4D3" xlink:href="#planet-shape" />
		  <use fill="#4DEBC3" xlink:href="#planet-section-1" />
		  <use fill="#39E2C9" xlink:href="#planet-section-2" />
		  <use fill="#29DBCD" xlink:href="#planet-section-3" />
		  <use fill="#18CCD4" xlink:href="#planet-section-4" />
		  <use fill="#0EC0D6" xlink:href="#planet-section-5" />
		  <use fill="#03B2D9" xlink:href="#planet-section-6" />
		</symbol>
		<symbol id="planet-light-grey">
		  <use fill="#E1EAF6" xlink:href="#planet-shape" />
		  <use fill="#F5F9FD" xlink:href="#planet-section-1" />
		  <use fill="#ECF2F9" xlink:href="#planet-section-2" />
		  <use fill="#E1EAF6" xlink:href="#planet-section-3" />
		  <use fill="#D7E3F2" xlink:href="#planet-section-4" />
		  <use fill="#D0DDF0" xlink:href="#planet-section-5" />
		  <use fill="#C4D5EC" xlink:href="#planet-section-6" />
		</symbol>
		<symbol id="planet-orange">
		  <use fill="#F5A77C" xlink:href="#planet-shape" />
		  <use fill="#FCD380" xlink:href="#planet-section-1" />
		  <use fill="#F9C57E" xlink:href="#planet-section-2" />
		  <use fill="#F5A77C" xlink:href="#planet-section-3" />
		  <use fill="#F19179" xlink:href="#planet-section-4" />
		  <use fill="#EC7376" xlink:href="#planet-section-5" />
		  <use fill="#E75873" xlink:href="#planet-section-6" />
		</symbol>
		<symbol id="planet-blue">
		  <use fill="#0196E2" xlink:href="#planet-shape" />
		  <use fill="#0AE7F2" xlink:href="#planet-section-1" />
		  <use fill="#08D2EF" xlink:href="#planet-section-2" />
		  <use fill="#05C6EB" xlink:href="#planet-section-3" />
		  <use fill="#04B5E9" xlink:href="#planet-section-4" />
		  <use fill="#03A9E7" xlink:href="#planet-section-5" />
		  <use fill="#0B9DE7" xlink:href="#planet-section-6" />
		</symbol>
	  </defs>
	  <g id="hero" fill="none" fill-rule="evenodd">
		<g id="lines">
		  <rect class="Line" />
		  <rect class="Line" />
		  <rect class="Line" />
		  <rect class="Line" />
		  <rect class="Line" />
		  <rect class="Line" />
		  <rect class="Line" />
		  <rect class="Line" />
		  <rect class="Line" />
		</g>
		<g id="distance-1x">
		  <g id="big-planet">
			<use id="planet-orange-4" xlink:href="#planet-orange" transform="translate(240.224 186.975) scale(2.85)" />
		  </g>
		  <g id="group-planets-4">
			<use id="planet-blue-5" xlink:href="#planet-blue" transform="translate(249.224 317.975)" />
			<g id="moon-5">
			  <use id="planet-light-grey-7" xlink:href="#planet-light-grey" transform="translate(254.076 367.15) scale(0.27)" />
			</g>
			<use id="planet-light-grey-8" xlink:href="#planet-light-grey" transform="translate(386.063 277.15) scale(0.198)" />
			<use id="planet-dark-grey-5" xlink:href="#planet-dark-grey" transform="translate(298.148 215.675) scale(0.416)" />
		  </g>
		  <g id="planet-blue-with-ring">
			<use id="planet-blue-2" xlink:href="#planet-blue" transform="translate(1067.224 139.975) scale(1.94)" />
			<path stroke="#FFCD6F" stroke-width="2" d="M1048.9 199.05h155.5" stroke-linecap="round" stroke-linejoin="round" />
			<path stroke="#0B9DE7" stroke-width="2" d="M1070.5 201.05h114" stroke-linecap="square" />
		  </g>
		  <g id="moon-1">
			<use id="planet-light-grey-5" xlink:href="#planet-light-grey" transform="translate(1099.654 164.15) scale(0.198)" />
		  </g>
		  <g id="moon-2">
			<use id="planet-orange-7" xlink:href="#planet-orange" transform="translate(1163.398 183.15) scale(0.167)" />
		  </g>
		</g>
		<g id="distance-2x">
		  <use id="planet-dark-grey-1" xlink:href="#planet-dark-grey" transform="translate(1265 452)" />
		  <use id="planet-light-grey-6" xlink:href="#planet-light-grey" transform="translate(1250.154 447.175) scale(0.198)" />
		  <use id="planet-green-1" xlink:href="#planet-green" transform="translate(1023 354)" />
		  <use id="planet-green-2" xlink:href="#planet-green" transform="translate(424 122) scale(0.8)" />
		  <use id="planet-light-grey-1" xlink:href="#planet-light-grey" transform="translate(411.076 427.675) scale(0.885)" />
		  <use id="planet-orange-2" xlink:href="#planet-orange" transform="translate(422.076 461.175) scale(0.133)" />
		  <g id="planet-light-grey-with-ring">
			<use id="planet-light-grey-2" xlink:href="#planet-light-grey" transform="translate(57.063 49.15) scale(0.885)" />
			<path stroke="#F9C57E" d="M50.15 76.67h68" stroke-linecap="square" />
			<path stroke="#B9CDE7" d="M59.063 77.67h51" stroke-linecap="square" />
		  </g>
		  <g id="moon-3">
			<use id="planet-orange-1" xlink:href="#planet-orange" transform="translate(1119.654 340.15) scale(0.333)" />
		  </g>
		  <g id="moon-4">
			<use id="planet-light-grey-3" xlink:href="#planet-light-grey" transform="translate(1103.648 408.15) scale(0.297)" />
		  </g>
		  <g id="planet-orange-with-ring">
			<use id="planet-orange-3" xlink:href="#planet-orange" transform="translate(1301 42)" />
			<path stroke="#0ADCF2" d="M1287.65 71.67h87" stroke-linecap="square" />
			<path stroke="#EC7376" d="M1303 72.67h58" stroke-linecap="square" />
		  </g>
		  <g id="group-planets-2">
			<use id="planet-green-5" xlink:href="#planet-green" transform="translate(1341.654 441.15) scale(0.14)" />
			<use id="planet-blue-3" xlink:href="#planet-blue" transform="translate(462 493) scale(0.266)" />
			<use id="planet-blue-4" xlink:href="#planet-blue" transform="translate(419 121) scale(0.253)" />
			<use id="planet-green-3" xlink:href="#planet-green" transform="translate(1339.654 90.175) scale(0.34)" />
		  </g>
		</g>
		<g id="distance-3x">
		  <use id="planet-dark-grey-4" xlink:href="#planet-dark-grey" transform="translate(1264.654 277.15) scale(0.2)" />
		  <use id="planet-green-4" xlink:href="#planet-green" transform="translate(151 135) scale(0.33)" />
		  <g id="group-planets-1">
			<use id="planet-dark-grey-2" xlink:href="#planet-dark-grey" transform="translate(1008 83) scale(0.41)" />
			<use id="planet-orange-5" xlink:href="#planet-orange" transform="translate(985 108) scale(0.199)" />
			<use id="planet-light-grey-4" xlink:href="#planet-light-grey" transform="translate(1251.654 32.15) scale(0.198)" />
			<use id="planet-dark-grey-3" xlink:href="#planet-dark-grey" transform="translate(87.063 373.15) scale(0.34)" />
			<use id="planet-orange-6" xlink:href="#planet-orange" transform="translate(108.148 369.15) scale(0.133)" />
			<use id="planet-blue-1" xlink:href="#planet-blue" transform="translate(132.148 37.15) scale(0.133)" />
		  </g>
		</g>
		<g id="we-are-sbvsl">
		  <path id="we-are-sbvsl-stripe" fill="url(#linearGradient-1)" d="M922.4 595.26l-396.5-246V233.03l396.5 246v116.22z" transform="translate(0 -131)" />
		  <g id="we-are-sbvsl-rings" transform="translate(494.103 43.607)">
			<ellipse cx="229.5" cy="229.5" fill="#FFF" opacity=".1" rx="229.5" ry="229.5" />
			<ellipse cx="229.42" cy="229.42" fill="#FFF" opacity=".2" rx="182.14" ry="182.14" />
			<ellipse cx="229.19" cy="229.19" fill="#FFF" opacity=".15" rx="207.37" ry="207.37" />
		  </g>
		  <g id="we-are-sbvsl-circle" transform="translate(565.012 115.425)">
			<mask id="mask-5" fill="#fff">
			  <use xlink:href="#path-4" />
			</mask>
			<use xlink:href="#path-4" />
			<path fill="#FAFEFF" d="M-25.1 0h385.05v58.6H-25.1z" mask="url(#mask-5)" />
			<path fill="#F3FBFD" d="M-25.1 58.6h385.05v58.6H-25.1z" mask="url(#mask-5)" />
			<path fill="#EBF5FA" d="M-25.1 108.82h385.05v58.6H-25.1z" mask="url(#mask-5)" />
			<path fill="#DBEDF6" d="M-25.1 167.42h385.05v58.6H-25.1z" mask="url(#mask-5)" />
			<path fill="#CBE6F3" d="M-25.1 220.37h385.05v58.6H-25.1z" mask="url(#mask-5)" />
			<path fill="#C1E1F1" d="M-25.1 266.24h385.05v58.6H-25.1z" mask="url(#mask-5)" />
		  </g>
	 
		</g>
		
		<path id="orbit-group-planets-1" d="M0 0a2,1 0 1,0 4,0a2,1 0 1,0 -4,0" />
		<path id="orbit-group-planets-2" d="M0 0a2,5 0 1,0 4,0a2,5 0 1,0 -4,0" />
		<path id="orbit-big-planet" d="M0 0v5z" />
		<path id="orbit-moons-1" d="M0 0a4,4 0 1,0 8,0a4,4 0 1,0 -8,0" />
		<path id="orbit-moons-3" d="M0,0C-14.64,-31.39,-84.21,-22.84,-125.23,15.39C-144.26,33.14,-151.80,53.05,-145.01,67.62C-130.37,99.01,-60.79,90.46,-19.78,52.22C-0.75,34.48,6.79,14.57,0,0" />
		<path id="orbit-moons-4" d="M0,0C17.32,-30.00,-29.59,-82.08,-84.44,-93.75C-109.89,-99.16,-130.53,-93.92,-138.56,-80C-155.88,-49.99,-108.97,2.08,-54.13,13.75C-28.67,19.16,-8.04,13.92,0,0" />
		<path id="orbit-moons-5" d="M0,0C0,0,42.43,-42.43,42.43,-42.43C42.43,-42.43,-21.21,-49.49,-21.21,-49.49C-21.21,-49.49,0,0,0,0" />
	  </g>
	</svg>
<?php endif; ?>

<?php if($_slider[0]->type=='cloudysky') : //code for cloudysky ?>
<div class='slider_hero_clouds'>
  <div class='slider_hero_clouds-1'></div>
  <div class='slider_hero_clouds-2'></div>
  <div class='slider_hero_clouds-3'></div>
</div>
<?php endif; ?>

<?php if($_slider[0]->type=='tagcanvas') : //code for tagcanvas ?>
<div id="hero_tags"  style="font-size: 50%">
<?php 
if(isset($params->tagcanvas->tags) and $params->tagcanvas->tags!=''):
	$htags = explode(',',str_replace("#","'",$params->tagcanvas->tags));
	$hlinks = (isset($params->tagcanvas->urls) && $params->tagcanvas->urls!=''?explode(',', $params->tagcanvas->urls):array());
	foreach($htags as $k=>$v):
?>
	<?php if(isset($params->tagcanvas->textcolor) && $params->tagcanvas->textcolor!=''): ?>
	<a href="<?php echo(isset($hlinks[$k]) && $hlinks[$k]!=''?$hlinks[$k]:'#'); ?>" style="font-size: <?php echo rand(15,30) ?>px" ><?php echo esc_html(trim($v)); ?></a>
	<?php else: ?>
	<a href="<?php echo(isset($hlinks[$k]) && $hlinks[$k]!=''?$hlinks[$k]:'#'); ?>" style="font-size: <?php echo rand(15,30) ?>px"  ><?php echo esc_html(trim($v)); ?></a>
	<?php endif; ?>
<?php 
	endforeach;
	endif;
?>
  </div>
<?php endif; ?>



<?php if($_slider[0]->type=='wave') : //code for wave effect ?>
<svg id="slider_hero_mySVG" width="500" height="200" xmlns="http://www.w3.org/2000/svg">
<path id="slider_hero_myPath" style="stroke: rgba(0, 0, 0, 0); fill: <?php echo (isset($params->wave->one_color)&&$params->wave->one_color!=''?$params->wave->one_color:'#AEE8FB') ?>"></path>
<path id="slider_hero_myPath2" style="stroke: rgba(0, 0, 0, 0); fill: <?php echo (isset($params->wave->two_color)&&$params->wave->two_color!=''?$params->wave->two_color:'#AEE8FB') ?>"> </path>
<path id="slider_hero_myPath3" style="stroke: rgba(0, 0, 0, 0); fill: <?php echo (isset($params->wave->three_color)&&$params->wave->three_color!=''?$params->wave->three_color:'#AEE8FB') ?>"></path>
</svg>
<?php endif; ?>

<?php if($_slider[0]->type=='metaballs') : //code for metaballs effect ?>

<style type="text/css">
.hero_circle {
  fill: <?php echo (isset($params->metaballs->color)&&$params->metaballs->color!=''?$params->metaballs->color:'#3E82F7') ?>;
}
#slider_hero_particles{
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	z-index: 8;
	filter: url("#goo");
}
</style>
<div id="slider_hero_particles"></div>
<svg>
  <defs>
	<filter id="goo">
	  <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="12" />
	  <feColorMatrix in="blur" result="colormatrix" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 21 -9" />
	  <feBlend in="SourceGraphic" in2="colormatrix" />
	</filter>
  </defs>
</svg>
<?php endif; ?>
<?php if($_slider[0]->type=='floatrain') : //code for Float & Rain effect ?>
	<canvas id="qcld_slider_hero_main_canvas"></canvas>
<?php endif; ?>

<?php if($_slider[0]->type=='confetti') : //code for confitte effect ?>
<svg viewBox="0 0 1000 1000" style="height: 100%;width: 100%;">
  <circle class="confetti" r="30" cy="-50" cx="900" style="transform-origin: 900px -50px"></circle>
  <circle class="confetti" r="30" cy="-50" cx="800" style="transform-origin: 800px -50px"></circle>
  <circle class="confetti" r="30" cy="-50" cx="700" style="transform-origin: 700px -50px"></circle>
  <circle class="confetti" r="30" cy="-50" cx="600" style="transform-origin: 600px -50px"></circle>
  <circle class="confetti" r="30" cy="-50" cx="500" style="transform-origin: 500px -50px"></circle>
  <circle class="confetti" r="30" cy="-50" cx="400" style="transform-origin: 400px -50px"></circle>
  <circle class="confetti" r="30" cy="-50" cx="300" style="transform-origin: 300px -50px"></circle>
  <circle class="confetti" r="30" cy="-50" cx="200" style="transform-origin: 200px -50px"></circle>
  <circle class="confetti" r="30" cy="-50" cx="100" style="transform-origin: 100px -50px"></circle>
  <circle class="confetti" r="30" cy="-50" cx="0" style="transform-origin: 0px -50px"></circle>
</svg>
<?php endif; ?>
<?php if($_slider[0]->type=='wormhole') : //code for confitte effect ?>

	<div class="hero-cylinder" style="-webkit-animation-duration: 8s; animation-duration: 8s;">
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	</div><div class="hero-cylinder" style="-webkit-animation-duration: 4s;animation-duration: 4s;">
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	  <div class="hero-slid"></div>
	</div>
<?php endif; ?>


<?php if($_slider[0]->type=='firework') : //code for rays_particles effect ?>
	
		<div id="hero-canvas-container">
			<canvas id="trails-canvas"></canvas>
			<canvas id="main-canvas"></canvas>
		</div>
<?php endif; ?>

<?php if($_slider[0]->type=='svg_animation') : //code for svg_animation effect ?>
<svg version="1.1" id="svg-left" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 600 400" style="enable-background:new 0 0 600 400;" xml:space="preserve">
<g>
	<path class="blob" d="M220.262,366.814c41.228-14.367,64.978-58.826,96.198-136.802
		c43.518-108.692,53.929-137.426,67.672-149.92s154.708-58.065,177.821-65.59C576.392,9.802,591.841,5.391,596.66-2H-2v334.452
		c16.689,8.319,35.468,14.508,56.726,18.745C98.453,359.914,179.034,381.181,220.262,366.814z"/>
</g>
</svg>
<svg version="1.1" id="svg-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 600 400" style="enable-background:new 0 0 600 400;" xml:space="preserve">
<g>
	<path  class="blob2" d="M361.076,143.985c9.307,26.708,38.108,42.094,88.622,62.319
		c70.412,28.192,89.027,34.936,97.12,43.839c8.093,8.903,37.615,100.223,42.49,115.196c3.045,9.354,5.902,19.361,10.691,22.483V0
		H383.337c-5.389,10.811-9.398,22.976-12.143,36.748C365.547,65.075,351.769,117.277,361.076,143.985z"/>
</g>
</svg>
<?php endif; ?>

<?php if($_slider[0]->type=='fizzy_sparks') : //code for fizzy_sparks effect ?>
<div id="c-container">
	<canvas id="c">Sorry.</canvas>
</div>
<div id="c2-container">
	<canvas id="c2">Sorry.</canvas>
</div>
<?php endif; ?>

<?php if($_slider[0]->type=='pretend_hacker') : //code for pretent_hacker effect ?>
<div id="hero_console">

</div>

<?php endif; ?>

<?php if($_slider[0]->type=='hero_404') : //code for Hero 404 effect ?>
<div class="hero_404_shed">

</div>

<?php endif; ?>

<?php if($_slider[0]->type=='the_great_attractor') : //code for Header Banner effect ?>
	<div class="slider-hero-m-intro">

		<div id="slider-hero-particleCanvas-Orange" class="slider-hero-e-particles-orange"></div>
		<div id="slider-hero-particleCanvas-Blue" class="slider-hero-e-particles-blue"></div>
	</div>
<?php endif; ?>