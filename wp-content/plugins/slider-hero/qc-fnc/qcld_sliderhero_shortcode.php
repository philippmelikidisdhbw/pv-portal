<?php 
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

add_shortcode('hero-button', 'qcld_slider_hero_shortcode');

function qcld_slider_hero_shortcode($atts = array()){
	ob_start();
	global $wpdb;
	extract( shortcode_atts(
		array(
			'type' => 1,
			'id' => 1
		), $atts
	));
	if($id!=''){
	$id 	= sanitize_text_field( $id );
	$type	= sanitize_text_field( $type );

	$table       = QCLD_TABLE_SLIDES;
	$slides = @$wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table  WHERE id = %d order by ordering desc", $id ) );
	
	$btn = json_decode(wp_unslash(htmlspecialchars_decode($slides[0]->btn)));
	$btn2 = json_decode(wp_unslash(htmlspecialchars_decode($slides[0]->btn2)));
	if($type=='1' && $btn->hero_button_shortcode=='1'){
		
		
?>
			<style type="text/css">

			.slider_hero_btn_cls_one{
				<?php if($btn->button_border=='square') : ?>
				border-radius: 0px;
			<?php else : ?>
				border-radius: 35px 35px;
			<?php endif ?>
			<?php if($btn->button_style=='full_background') : ?>
				background: <?php echo esc_attr($btn->button_background_color); ?>;
			<?php else: ?>
				background: none;
			<?php endif; ?>
				border: 2px solid <?php echo esc_attr($btn->button_background_color); ?> !important;
				padding: 12px 20px;
				box-sizing: content-box;
				
			<?php 
				if(isset($btn->button_font_size) && $btn->button_font_size!=''):
			?>
				font-size: <?php echo esc_attr( $btn->button_font_size ); ?> !important;
			<?php else: ?>
				font-size: 16px;
			<?php endif; ?>
			
			<?php 
				if(isset($btn->button_letter_spacing) && $btn->button_letter_spacing!=''):
			?>
				letter-spacing: <?php echo esc_attr( $btn->button_letter_spacing ); ?> !important;
			<?php endif; ?>
			
			<?php 
				if(isset($btn->button_font_weight) && $btn->button_font_weight!=''):
			?>
				font-weight: <?php echo esc_attr( $btn->button_font_weight ); ?> !important;
			<?php endif; ?>
			
			
				text-decoration: none;
				min-width:100px;
				
				color: <?php echo esc_attr($btn->button_color); ?> !important;
				margin-right: 10px;
				
				text-shadow: none;
				display: -webkit-inline-flex;
				-webkit-box-orient: vertical;
				-webkit-box-direction: normal;
				-webkit-flex-direction: column;
				-webkit-box-pack: center;
				-webkit-flex-pack: center;
				-webkit-justify-content: center;
				-webkit-flex-align: center;
				-webkit-align-items: center;
				vertical-align: middle;
			}
			.slider_hero_btn_cls_one:hover{
				<?php if($btn->button_hover_color!='') : ?>
				color:<?php echo esc_attr($btn->button_hover_color); ?>!important;
				<?php endif; ?>
				<?php if($btn->button_background_hover_color!=''): ?>
				<?php if($btn->button_style=='full_background'): ?>
				background: <?php echo esc_attr($btn->button_background_hover_color); ?>;
				<?php else: ?>
				background: none;
				<?php endif; ?>
				
				border: 2px solid <?php echo esc_attr($btn->button_background_hover_color); ?> !important;
				<?php endif; ?>
				text-shadow: none;
			}
					
			</style>
			<?php //Button 1 Glitch Effect //
				if(isset($btn->button_effect) and $btn->button_effect=='glitch'):
			?>
				<style type="text/css">
					.shero_glitch_button > a:link{
						color: <?php echo esc_attr($btn->button_color); ?> !important;
					}
					.shero_glitch_button > a:hover{
						color: <?php echo esc_attr($btn->button_hover_color); ?>!important;
					}
				</style>
				
				<label for="switch" class="shero_glitch_button slider_hero_btn_cls_one"><a href="<?php echo esc_url($btn->button_url); ?>" target="<?php echo esc_attr($btn->button_target); ?>" class=""><?php echo esc_attr($btn->button_text); ?></a></label>
			
			<?php // Area for Animated Fill Effect
				elseif(isset($btn->button_effect) and $btn->button_effect=='fill'):
			?>
				<style type="text/css">
					.hero_btn1_fill {
					  color: <?php echo esc_attr($btn->button_color); ?> !important;
					  border: 2px solid <?php echo esc_attr($btn->button_background_color); ?> !important;
						<?php if($btn->button_border=='square') : ?>
							border-radius: 0px;
						<?php else : ?>
							border-radius: 35px 35px;
						<?php endif ?>
						text-shadow: none;
						
						<?php 
							if(isset($btn->button_font_size) && $btn->button_font_size!=''):
						?>
							font-size: <?php echo esc_attr( $btn->button_font_size ); ?> !important;
						<?php else: ?>
							font-size: 16px;
						<?php endif; ?>
						
						<?php 
							if(isset($btn->button_letter_spacing) && $btn->button_letter_spacing!=''):
						?>
							letter-spacing: <?php echo esc_attr( $btn->button_letter_spacing ); ?> !important;
						<?php endif; ?>
						
						<?php 
							if(isset($btn->button_font_weight) && $btn->button_font_weight!=''):
						?>
							font-weight: <?php echo esc_attr( $btn->button_font_weight ); ?> !important;
						<?php endif; ?>
						margin-right: 10px;
					}
					.hero_btn1_fill:before {
						background: <?php echo esc_attr($btn->button_background_color); ?>;
					}
					.hero_btn1_fill:hover {
						<?php if($btn->button_hover_color!='') : ?>
						color:<?php echo esc_attr($btn->button_hover_color); ?> !important;
						<?php endif; ?>
					}
				</style>
				<a href="<?php echo esc_url($btn->button_url); ?>" target="<?php echo esc_attr($btn->button_target); ?>" class="hero_btn hero_btn--border hero_btn--primary hero_btn--animated hero_btn1_fill"><?php echo esc_attr($btn->button_text); ?></a>
				
			<?php // Area for Spin Effect
				elseif(isset($btn->button_effect) and $btn->button_effect=='spin'):
			?>
				<a href="<?php echo esc_url($btn->button_url); ?>" target="<?php echo esc_attr($btn->button_target); ?>"><div class="hero_spinner_tag slider_hero_btn_cls_one" data-content-default="<?php echo esc_attr($btn->button_text); ?>" data-content-spinning="<?php echo esc_attr($btn->button_text); ?>"></div></a>
			
			<?php // Area for Shiney Effect
				elseif(isset($btn->button_effect) and $btn->button_effect=='shiney'):
			?>
				<a href="<?php echo esc_url($btn->button_url); ?>" target="<?php echo esc_attr($btn->button_target); ?>" class="slider_hero_btn_cls_one hero_shiney_effect"><?php echo esc_attr($btn->button_text); ?></a>
			<?php // Area for 3D Effect
				elseif(isset($btn->button_effect) and $btn->button_effect=='3d'):
			?>
				<style type="text/css">
					.hero_btn1_3d {
					  color: <?php echo esc_attr($btn->button_color); ?>;
					  background: #fff;
					  border: 5px solid <?php echo esc_attr($btn->button_background_color); ?> !important;
					  color: <?php echo esc_attr($btn->button_background_color); ?> !important;
					  padding: 12px 20px;
					  text-shadow: none;
						<?php 
						if(isset($btn->button_font_size) && $btn->button_font_size!=''):
						?>
							font-size: <?php echo esc_attr( $btn->button_font_size ); ?> !important;
						<?php else: ?>
							font-size: 16px;
						<?php endif; ?>
						
						<?php 
							if(isset($btn->button_letter_spacing) && $btn->button_letter_spacing!=''):
						?>
							letter-spacing: <?php echo esc_attr( $btn->button_letter_spacing ); ?> !important;
						<?php endif; ?>
						
						<?php 
							if(isset($btn->button_font_weight) && $btn->button_font_weight!=''):
						?>
							font-weight: <?php echo esc_attr( $btn->button_font_weight ); ?> !important;
						<?php endif; ?>
						margin-right: 10px;
					}
					.hero_btn1_3d:before{
						background: <?php echo esc_attr($btn->button_background_color); ?>;
					}
					.hero_btn1_3d:after{
						background: <?php echo esc_attr($btn->button_background_color); ?>;
					}
					.hero_btn1_3d:hover{
						background: <?php echo esc_attr($btn->button_background_color); ?>;
						<?php if($btn->button_hover_color!='') : ?>
						color:<?php echo esc_attr($btn->button_hover_color); ?>!important;
						<?php endif; ?>
					}
					
				</style>
				<a href="<?php echo esc_url($btn->button_url); ?>" target="<?php echo esc_attr($btn->button_target); ?>" class="hero_3d_button hero_btn1_3d"><?php echo esc_attr($btn->button_text); ?></a>
			<?php // Area for Expending Border Effect
				elseif(isset($btn->button_effect) and $btn->button_effect=='exborder'):
			?>
				<style type="text/css">
					.hero_btn1_exborder {
					  color: <?php echo esc_attr($btn->button_color); ?> !important;
					  background-color: <?php echo esc_attr($btn->button_background_color); ?>;
					  border: 5px solid <?php echo esc_attr($btn->button_background_color); ?> !important;
					  
						text-decoration: none;
						min-width:100px;
					  padding: 12px 20px;
					  margin-right:10px;
					 <?php 
						if(isset($btn->button_font_size) && $btn->button_font_size!=''):
					?>
						font-size: <?php echo esc_attr( $btn->button_font_size ); ?> !important;
					<?php else: ?>
						font-size: 16px;
					<?php endif; ?>
					
					<?php 
						if(isset($btn->button_letter_spacing) && $btn->button_letter_spacing!=''):
					?>
						letter-spacing: <?php echo esc_attr( $btn->button_letter_spacing ); ?> !important;
					<?php endif; ?>
					
					<?php 
						if(isset($btn->button_font_weight) && $btn->button_font_weight!=''):
					?>
						font-weight: <?php echo esc_attr( $btn->button_font_weight ); ?> !important;
					<?php endif; ?>
					margin-right: 10px;
					}
					.hero_btn1_exborder:before{
						border-color: <?php echo esc_attr($btn->button_background_color); ?> !important;
					}
					.hero_btn1_exborder:after{
						border-color: <?php echo esc_attr($btn->button_background_color); ?> !important;
					}
					
					.hero_btn1_exborder:hover,
					.hero_btn1_exborder.hover{
						background-color: <?php echo esc_attr($btn->button_background_color); ?>;
						<?php if($btn->button_hover_color!='') : ?>
						color:<?php echo esc_attr($btn->button_hover_color); ?> !important;
						<?php endif; ?>
						
					}
					
				</style>
				<a href="<?php echo esc_url($btn->button_url); ?>" target="<?php echo esc_attr($btn->button_target); ?>" class="hero_exborder hero_btn1_exborder"><?php echo esc_attr($btn->button_text); ?></a>
			<?php
				else:
			?>
				<a href="<?php echo esc_url($btn->button_url); ?>" target="<?php echo esc_attr($btn->button_target); ?>" class="slider_hero_btn_cls_one"><?php echo esc_attr($btn->button_text); ?></a>
			<?php endif; ?>
<?php
	}elseif($type=='2' && $btn2->hero_button_shortcode=='1'){
		
?>
			<style type="text/css">
			.hero_btn_cls_one2{
				<?php if($btn2->button_border=='square') : ?>
				border-radius: 0px;
			<?php else : ?>
				border-radius: 35px 35px;
			<?php endif ?>
			<?php if($btn2->button_style=='full_background') : ?>
				background: <?php echo esc_attr($btn2->button_background_color); ?>;
			<?php else: ?>
				background: none;
			<?php endif; ?>
				border: 2px solid <?php echo esc_attr($btn2->button_background_color); ?> !important;
				padding: 12px 20px;
				box-sizing: content-box;
				
				text-decoration: none;
				min-width:100px;
				
				color: <?php echo esc_attr($btn2->button_color); ?> !important;
				text-shadow: none;
			<?php 
				if(isset($btn2->button_font_size) && $btn2->button_font_size!=''):
			?>
				font-size: <?php echo esc_attr( $btn2->button_font_size ); ?> !important;
			<?php else: ?>
				font-size: 16px;
			<?php endif; ?>
			
			<?php 
				if(isset($btn2->button_letter_spacing) && $btn2->button_letter_spacing!=''):
			?>
				letter-spacing: <?php echo esc_attr( $btn2->button_letter_spacing ); ?> !important;
			<?php endif; ?>
			
			<?php 
				if(isset($btn2->button_font_weight) && $btn2->button_font_weight!=''):
			?>
				font-weight: <?php echo esc_attr( $btn2->button_font_weight ); ?> !important;
			<?php endif; ?>
				display: -webkit-inline-flex;
				-webkit-box-orient: vertical;
				-webkit-box-direction: normal;
				-webkit-flex-direction: column;
				-webkit-box-pack: center;
				-webkit-flex-pack: center;
				-webkit-justify-content: center;
				-webkit-flex-align: center;
				-webkit-align-items: center;
				vertical-align: middle;
			}
			.hero_btn_cls_one2:hover{
				<?php if($btn2->button_hover_color!='') : ?>
				color:<?php echo esc_attr($btn2->button_hover_color); ?>!important;
				<?php endif; ?>
				<?php if($btn2->button_background_hover_color!=''): ?>
				<?php if($btn2->button_style=='full_background'): ?>
				background: <?php echo esc_attr($btn2->button_background_hover_color); ?>;
				<?php else: ?>
				background: none;
				<?php endif; ?>
				
				border: 2px solid <?php echo esc_attr($btn2->button_background_hover_color); ?> !important;
				<?php endif; ?>
				
			}
			
			</style>
			<?php //Button 2 Glitch Effect //
				if(isset($btn2->button_effect) and $btn2->button_effect=='glitch'):
			?>
				<style type="text/css">
					.shero_glitch_button > a:link{
						color: <?php echo esc_attr($btn2->button_color); ?>;
					}
					.shero_glitch_button > a:hover{
						color: <?php echo esc_attr($btn2->button_hover_color); ?>!important;
					}
				</style>
			<label for="switch" class="shero_glitch_button hero_btn_cls_one2"><a href="<?php echo esc_url($btn2->button_url); ?>" target="<?php echo esc_attr($btn2->button_target); ?>" class=""><?php echo esc_attr($btn2->button_text); ?></a></label>
			<?php // Button 2 Fill Effect //
				elseif(isset($btn2->button_effect) and $btn2->button_effect=='fill'):
			?>
				<style type="text/css">
					.hero_btn2_fill {
					  color: <?php echo esc_attr($btn2->button_color); ?> !important;
					  border: 2px solid <?php echo esc_attr($btn2->button_background_color); ?> !important;
					<?php if($btn2->button_border=='square') : ?>
						border-radius: 0px;
					<?php else : ?>
						border-radius: 35px 35px;
					<?php endif ?>
						text-shadow: none;
						
					<?php 
						if(isset($btn2->button_font_size) && $btn2->button_font_size!=''):
					?>
						font-size: <?php echo esc_attr( $btn2->button_font_size ); ?> !important;
					<?php else: ?>
						font-size: 16px;
					<?php endif; ?>
					
					<?php 
						if(isset($btn2->button_letter_spacing) && $btn2->button_letter_spacing!=''):
					?>
						letter-spacing: <?php echo esc_attr( $btn2->button_letter_spacing ); ?> !important;
					<?php endif; ?>
					
					<?php 
						if(isset($btn2->button_font_weight) && $btn2->button_font_weight!=''):
					?>
						font-weight: <?php echo esc_attr( $btn2->button_font_weight ); ?> !important;
					<?php endif; ?>
					}
					.hero_btn2_fill:before {
						background: <?php echo esc_attr($btn2->button_background_color); ?>;
					}
					.hero_btn2_fill:hover {
						<?php if($btn2->button_hover_color!='') : ?>
						color:<?php echo esc_attr($btn2->button_hover_color); ?> !important;
						<?php endif; ?>
					}
				</style>
				<a href="<?php echo esc_url($btn2->button_url); ?>" target="<?php echo esc_attr($btn2->button_target); ?>" class="hero_btn hero_btn--border hero_btn--primary hero_btn--animated hero_btn2_fill"><?php echo esc_attr($btn2->button_text); ?></a>
				
			<?php // Area for Spin Effect
				elseif(isset($btn2->button_effect) and $btn2->button_effect=='spin'):
			?>
				<a href="<?php echo esc_url($btn2->button_url); ?>" target="<?php echo esc_attr($btn2->button_target); ?>"><div class="hero_spinner_tag hero_btn_cls_one2" data-content-default="<?php echo esc_attr($btn2->button_text); ?>" data-content-spinning="<?php echo esc_attr($btn2->button_text); ?>"></div></a>
			<?php // Area for Shiney Effect
				elseif(isset($btn2->button_effect) and $btn2->button_effect=='shiney'):
			?>
				<a href="<?php echo esc_url($btn2->button_url); ?>" target="<?php echo esc_attr($btn2->button_target); ?>" class="slider_hero_btn_cls_one hero_shiney_effect"><?php echo esc_attr($btn2->button_text); ?></a>
			<?php // Area for 3D Effect
				elseif(isset($btn2->button_effect) and $btn2->button_effect=='3d'):
			?>
				<style type="text/css">
					.hero_btn2_3d {
					  color: <?php echo esc_attr($btn2->button_color); ?> !important;
					  background: #fff;
					  border: 5px solid <?php echo esc_attr($btn2->button_background_color); ?> !important;
					  color: <?php echo esc_attr($btn2->button_background_color); ?>;
					  padding: 12px 20px;
					  font-size: 16px;
					  text-shadow: none;
					<?php 
						if(isset($btn2->button_font_size) && $btn2->button_font_size!=''):
					?>
						font-size: <?php echo esc_attr( $btn2->button_font_size ); ?> !important;
					<?php else: ?>
						font-size: 16px;
					<?php endif; ?>
					
					<?php 
						if(isset($btn2->button_letter_spacing) && $btn2->button_letter_spacing!=''):
					?>
						letter-spacing: <?php echo esc_attr( $btn2->button_letter_spacing ); ?> !important;
					<?php endif; ?>
					
					<?php 
						if(isset($btn2->button_font_weight) && $btn2->button_font_weight!=''):
					?>
						font-weight: <?php echo esc_attr( $btn2->button_font_weight ); ?> !important;
					<?php endif; ?>
					}
					.hero_btn2_3d:before{
						background: <?php echo esc_attr($btn2->button_background_color); ?>;
					}
					.hero_btn2_3d:after{
						background: <?php echo esc_attr($btn2->button_background_color); ?>;
					}
					.hero_btn2_3d:hover{
						background: <?php echo esc_attr($btn2->button_background_color); ?>;
						<?php if($btn2->button_hover_color!='') : ?>
						color:<?php echo esc_attr($btn2->button_hover_color); ?>!important;
						<?php endif; ?>
					}
					
				</style>
				<a href="<?php echo esc_url($btn2->button_url); ?>" target="<?php echo esc_attr($btn2->button_target); ?>" class="hero_3d_button hero_btn2_3d"><?php echo esc_attr($btn2->button_text); ?></a>
				
			<?php // Area for Expending Border Effect
				elseif(isset($btn2->button_effect) and $btn2->button_effect=='exborder'):
			?>
				<style type="text/css">
					.hero_btn2_exborder {
					  color: <?php echo esc_attr($btn2->button_color); ?> !important;
					  background-color: <?php echo esc_attr($btn2->button_background_color); ?>;
					  border: 5px solid <?php echo esc_attr($btn2->button_background_color); ?> !important;
					  font-size: 16px;
						
						text-decoration: none;
						min-width:100px;
					  padding: 12px 20px;
					  <?php 
						if(isset($btn2->button_font_size) && $btn2->button_font_size!=''):
					?>
						font-size: <?php echo esc_attr( $btn2->button_font_size ); ?> !important;
					<?php else: ?>
						font-size: 16px;
					<?php endif; ?>
					
					<?php 
						if(isset($btn2->button_letter_spacing) && $btn2->button_letter_spacing!=''):
					?>
						letter-spacing: <?php echo esc_attr( $btn2->button_letter_spacing ); ?> !important;
					<?php endif; ?>
					
					<?php 
						if(isset($btn2->button_font_weight) && $btn2->button_font_weight!=''):
					?>
						font-weight: <?php echo esc_attr( $btn2->button_font_weight ); ?> !important;
					<?php endif; ?>
					}
					.hero_btn2_exborder:before{
						border-color: <?php echo esc_attr($btn2->button_background_color); ?> !important;
					}
					.hero_btn2_exborder:after{
						border-color: <?php echo esc_attr($btn2->button_background_color); ?> !important;
					}
					
					.hero_btn2_exborder:hover,
					.hero_btn2_exborder.hover{
						background-color: <?php echo esc_attr($btn2->button_background_color); ?>;
						<?php if($btn2->button_hover_color!='') : ?>
						color:<?php echo esc_attr($btn2->button_hover_color); ?> !important;
						<?php endif; ?>
					}
					
				</style>
				<a href="<?php echo esc_url($btn2->button_url); ?>" target="<?php echo esc_attr($btn2->button_target); ?>" class="hero_exborder hero_btn2_exborder"><?php echo esc_attr($btn2->button_text); ?></a>
			<?php 
				else:
			?>
				<a href="<?php echo esc_url($btn2->button_url); ?>" target="<?php echo esc_attr($btn2->button_target); ?>" class="hero_btn_cls_one2"><?php echo esc_attr($btn2->button_text); ?></a>
			<?php endif; ?>
<?php
	}
?>

<?php
	}
$output = ob_get_contents(); 
ob_end_clean();
return $output;
}
?>