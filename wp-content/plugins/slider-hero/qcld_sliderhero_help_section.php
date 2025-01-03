<?php

function qcld_sliderhero_sessions_license_callback(){
	?>
<div id="help_section">
  <h1>Help Section</h1>
  <h3>General Settings</h3>
  <p> <strong><u>Custom:</u></strong> <br>
    This option will allow you to provide custom width and height for your slider. <br>
    <br>
    <strong><u>Full Width:</u></strong> <br>
    Provide a custom height in px for your slider. Width will be automatically calculated depending on your screen size. <br>
    <br>
    <strong><u>Full Screen:</u></strong> <br>
    No need to provide any width & height. It will automatically fit any screen size and auto-calculate necessary width and height. <br>
    <br>
    <strong><u>Auto:</u></strong> <br>
    Slider size will fit according to container width. You can define custom height. </p>
  <h3>Shortcode Options</h3>
  <p> <strong><u>preloader</u></strong> <br>
    This option will allow you to enable/disable preloader for a slider <br>
    Example: preloader="on" </p>
  <div class="hero_video_container">
    <div class="hero_section_video">
      <h3>Get Started Video</h3>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/KfH2KRpbObQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="hero_section_video">
      <h3>Intro Builder Video</h3>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/k9CFs-hiBUk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
</div>
<style>
@charset 'UTF-8';
/* Slider */
.slick-loading .slick-list {
	background: #fff url('./ajax-loader.gif') center center no-repeat;
}
/* Icons */
@font-face {
	font-family: 'slick';
	font-weight: normal;
	font-style: normal;
	src: url('./fonts/slick.eot');
	src: url('./fonts/slick.eot?#iefix') format('embedded-opentype'), url('./fonts/slick.woff') format('woff'), url('./fonts/slick.ttf') format('truetype'), url('./fonts/slick.svg#slick') format('svg');
}
/* Arrows */
.slick-prev, .slick-next {
	font-size: 0;
	line-height: 0;
	position: absolute;
	top: 50%;
	display: inline-block !important;
	width: 20px;
	height: 20px;
	padding: 0;
	-webkit-transform: translate(0, -50%);
	-ms-transform: translate(0, -50%);
	transform: translate(0, -50%);
	cursor: pointer;
	color: transparent;
	border: none !important;
	outline: none;
	background: transparent;
}
.slick-prev:hover, .slick-prev:focus, .slick-next:hover, .slick-next:focus {
	color: transparent;
	outline: none;
	background: transparent;
}
.slick-prev:hover:before, .slick-prev:focus:before, .slick-next:hover:before, .slick-next:focus:before {
	opacity: 1;
}
.slick-prev.slick-disabled:before, .slick-next.slick-disabled:before {
	opacity: .25;
}
.slick-prev:before, .slick-next:before {
	font-family: 'slick';
	font-size: 20px;
	line-height: 1;
	opacity: .75;
	color: white;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}
.slick-prev {
	left: -25px;
}
[dir='rtl'] .slick-prev {
	right: -25px;
	left: auto;
}
.slick-prev:before {
	content: '←';
}
[dir='rtl'] .slick-prev:before {
	content: '→';
}
.slick-next {
	right: -25px;
}
[dir='rtl'] .slick-next {
	right: auto;
	left: -25px;
}
.slick-next:before {
	content: '→';
}
[dir='rtl'] .slick-next:before {
	content: '←';
}
/* Dots */
.slick-dotted.slick-slider {
	margin-bottom: 30px;
}
.slick-dots {
	position: absolute;
	bottom: -25px;
	display: block;
	width: 100%;
	padding: 0;
	margin: 0;
	list-style: none;
	text-align: center;
}
.slick-dots li {
	position: relative;
	display: inline-block;
	width: 20px;
	height: 20px;
	margin: 0 5px;
	padding: 0;
	cursor: pointer;
}
.slick-dots li button {
	font-size: 0;
	line-height: 0;
	display: block;
	width: 20px;
	height: 20px;
	padding: 5px;
	cursor: pointer;
	color: transparent;
	border: 0;
	outline: none;
	background: transparent;
}
.slick-dots li button:hover, .slick-dots li button:focus {
	outline: none;
}
.slick-dots li button:hover:before, .slick-dots li button:focus:before {
	opacity: 1;
}
.slick-dots li button:before {
	font-family: 'slick';
	font-size: 6px;
	line-height: 20px;
	position: absolute;
	top: 0;
	left: 0;
	width: 20px;
	height: 20px;
	content: '•';
	text-align: center;
	opacity: .25;
	color: black;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}
.slick-dots li.slick-active button:before {
	opacity: .75;
	color: black;
}
.serviceBox {
	color: #555;
	background-color: #fff;
	text-align: left;
	padding: 0 0 0;
	margin: 40px 0 0 20px;
	border: 1px solid #e1e1e1;
	border-radius: 0px;
	position: relative;
	z-index: 1;
	transition: all ease .3s;
	display: flex;
}
/*.serviceBox:after{
    content: "";
    background: linear-gradient(to bottom,#FFC312,#F79F1F);
    width: 100%;
    height: 49px;
    border-radius: 0 0 20px 20px;
    box-shadow: 0 0 5px rgba(0,0,0,0.3) inset;
    position: absolute;
    left: 0;
    bottom: 0;
    z-index: -1;
}*/
.serviceBox .service-count {
	color: #fff;
	background: linear-gradient(to bottom, #FFC312, #F79F1F);
	font-size: 15px;
	line-height: 75px;
	width: 52px;
	height: 75px;
	margin: -15px 0 20px;
	border-radius: 40px 0 100px 100px;
	position: absolute;
	text-align: center;
	font-weight: bold;
}
.serviceBox .service-count:before, .serviceBox .service-count:after {
	content: "";
	background: #F79F1F;
	width: 25px;
	height: 15px;
	border-radius: 50px 50px 0 0;
	position: absolute;
	top: 0;
	left: 54px;
}
.serviceBox .service-count:after {
	background: #FFC312;
	border-radius: 50px 0 0 0;
	left: 40px;
	z-index: -2;
}
.serviceBox .service-icon {
	color: #afafaf;
	font-size: 60px;
	position: absolute;
	right: 20px;
	top: 10px;
	transition: all 0.3s ease 0s;
}
.serviceBox:hover .service-icon {
	transform: rotateY(360deg);
}
.serviceBox .title {
	font-size: 19px;
	font-weight: 600;
	text-transform: uppercase;
	padding: 0 15px;
	margin: 0 0 10px;
}
.serviceBox .description {
	font-size: 17px;
	text-align: left;
	line-height: 38px;
	padding: 15px 15px 0 65px;
	margin: 0 0 23px;
}
.serviceBox .read-more {
	color: #fff;
	font-size: 16px;
	font-weight: 600;
	text-transform: capitalize;
	border-bottom: 2px solid rgba(255,255,255,0.3);
	transition: all 0.3s ease 0s;
}
.serviceBox .read-more:hover {
	text-shadow: 0 0 5px #555;
}
.serviceBox.purple:after, .serviceBox.purple .service-count {
	background: linear-gradient(to bottom, #B53471, #6F1E51);
}
.serviceBox.purple .service-count:before {
	background: #6F1E51;
}
.serviceBox.purple .service-count:after {
	background: #B53471;
}
.serviceBox.red:after, .serviceBox.red .service-count {
	background: linear-gradient(to bottom, #ee3838, #ce1500);
}
.serviceBox.red .service-count:before {
	background: #ce1500;
}
.serviceBox.red .service-count:after {
	background: #ee3838;
}
.serviceBox.blue:after, .serviceBox.blue .service-count {
	background: linear-gradient(to bottom, #00adef, #00689b);
}
.serviceBox.blue .service-count:before {
	background: #00689b;
}
.serviceBox.blue .service-count:after {
	background: #00adef;
}

@media only screen and (max-width:990px) {
.serviceBox {
	margin: 15px 0 50px;
}
}
.sld-container .slick-prev:before, .sld-container .slick-next:before {
	color: #F79F1F !important;
}
.Getting_Started_img {
	min-width: 600px;
	padding: 15px;
}
.Getting_Started_img img {
	width: 100%;
}
.sld-container h3 {
	margin: 1em 0 8px 0;
}
.sld-container h3 {
	font-size: 28px;
}
.serviceBox .description {
	font-size: 24px;
}
.serviceBox {
	min-height: 610px;
}
.sldslider-Details {
	display: flex;
	align-items: center;
}
.sld_Started_carousel {
	padding: 10px;
	width: 96%;
	margin-left: 24px;
	max-width: 1234px !important;
}
.sld-container h3 {
    margin: 0 0 20px 0;
    font-weight: bold;
}
#getting_started .sld_info_item {
	height: 610px !important;
	overflow: hidden;
}
.sld_info_item.slick-slide.slick-current.slick-active {
	width: 1234px !important;
}

@media only screen and (max-width:992px) {
.serviceBox {
	display: block;
}
.Getting_Started_img {
	max-width: initial;
	padding: 15px;
}
.Getting_Started_img img {
	width: 100%;
}
.sldslider-Details {
	display: flex;
	align-items: center;
	justify-content: flex-start;
	flex-direction: row;
	flex-wrap: wrap;
}
.Getting_Started_img {
	min-width: auto;
}
#getting_started .sld_info_item {
	height: auto !important;
	overflow: auto;
}
}
.qcld_sld_tabs input {
	position: absolute;
	opacity: 0;
	z-index: -1;
}
/* Accordion styles */
.qcld_sld_tabs {
	border-radius: 8px;
	overflow: hidden;
	box-shadow: 0 4px 4px -2px rgba(0, 0, 0, 0.5);
}
.qcld_sld_tab {
	width: 100%;
	color: white;
	overflow: hidden;
	margin-bottom: -2px;
}
.qcld_sld_tab:last-child {
	margin-bottom: -4px;
}
.qcld_sld_tab-label {
	display: flex;
	justify-content: space-between;
	padding: 1em;
	background: #8c8f94;
	font-weight: bold;
	cursor: pointer;/* Icon */
}
.qcld_sld_tab-label:hover {
	background: #787c82;
}
.qcld_sld_tab-label::after {
	content: "❯";
	width: 1em;
	height: 1em;
	text-align: center;
	transition: all 0.35s;
}
.qcld_sld_tab-content {
	max-height: 0;
	padding: 0 1em;
	color: #2c3e50;
	background: white;
	transition: all 0.35s;
}
.qcld_sld_tab-close {
	display: flex;
	justify-content: flex-end;
	padding: 1em;
	font-size: 0.75em;
	background: #ddd;
	cursor: pointer;
}
.qcld_sld_tab-close:hover {
	background: #ddd;
}
.qcld_sld_tabs input:checked + .qcld_sld_tab-label {
	background: #787c82;
}
.qcld_sld_tabs input:checked + .qcld_sld_tab-label::after {
	transform: rotate(90deg);
}
.qcld_sld_tabs input:checked ~ .qcld_sld_tab-content {
	max-height: 100vh;
	padding: 1em;
	transition: 0.3s ease all;
}
.serviceBox .description {
	font-size: 18px;
	line-height: 26px;
}
.slick-slider {
	user-select: auto !important;
}

@media (min-width: 1200px){
.sld-container {
    width: 72%;
}
}


.PortfolioX-section {
    background: #fff;
    padding: 15px;
	display: flex;
	    align-items: center;
}    
.PortfolioX-img {
    min-width: 400px;
	    max-width: 400px;
}
.PortfolioX-Slider {
    margin: 25px 0 0 0;
}
.PortfolioX-Slider .owl-nav {
    text-align: center;
    margin: 0;
    padding: 0;
}
	
.PortfolioX-Slider .owl-carousel .owl-nav button.owl-next, .PortfolioX-Slider .owl-carousel .owl-nav button.owl-prev, .PortfolioX-Slider .owl-carousel button.owl-dot {
    background: #2271b1;
    color: #fff;
    border: none;
    padding: 12px 11px 22px 11px !important;
    font: inherit;
    font-size: 32px;
    line-height: 0px;
    margin: 12px 4px 4px 4px;
}	
.PortfolioX-section {
    width: 100%;
    max-width: 1220px;
    margin: 0 auto;
}
.PortfolioX-details {
    padding: 0 15px 0 0;
}


.service-count {
    color: #fff;
    background: linear-gradient(to bottom,#FFC312,#F79F1F);
    font-size: 15px;
    line-height: 75px;
    width: 52px;
    height: 75px;
    margin: -15px 0 20px;
    border-radius: 40px 0 100px 100px;
    position: absolute;
    text-align: center;
    font-weight: bold;
    top: 0;
    left: -7px;
}
.service-count:before, .service-count:after {
    content: "";
    background: #F79F1F;
    width: 25px;
    height: 15px;
    border-radius: 50px 50px 0 0;
    position: absolute;
left: 52px;
    z-index: 9999;v
}
.service-count:after {
    background: #FFC312;
    border-radius: 50px 0 0 0;
    left: 40px;
    z-index: 99;
}

.PortfolioX-section {
    position: relative;
	    border-top: 20px solid #f0f0f1;
}

.PortfolioX-section h2{
    font-size: 28px;
	margin:0;
	padding:0 0 18px 0;	
}
.PortfolioX-section p{
    font-size: 18px;
	margin:0;
	padding:0;	
}

@media only screen and (max-width:992px){
	.PortfolioX-section {
    background: #fff;
    padding: 15px;
    display: flex;
    align-items: center;
    flex-direction: column;
}
.PortfolioX-img {
    min-width: initial;
	width: 100%;
}
.PortfolioX-img img{
    width: 100%;
}
}






</style>
<?php
}


