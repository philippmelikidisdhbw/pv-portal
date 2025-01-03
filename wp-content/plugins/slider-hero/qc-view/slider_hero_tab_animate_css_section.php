<div class="othersetting">
	<?php if($_slider[0]->type!='intro'): ?>						
	<div class="params titleffect customitemstyle">
		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Title In Effect', 'qcslide'); ?>:</label>
		<select class="myElements" name="params[titleffect]">
			<option value="">Normal</option>
			<optgroup label="Animate css Effect">
			<option value="bounce" <?php echo (isset($params->titleffect) && $params->titleffect=='bounce'?'selected="selected"':''); ?>>Bounce</option>
			<option value="flash" <?php echo (isset($params->titleffect) && $params->titleffect=='flash'?'selected="selected"':''); ?>>Flash</option>
			<option value="pulse" <?php echo (isset($params->titleffect) && $params->titleffect=='pulse'?'selected="selected"':''); ?>>Pulse</option>
			<option value="rubberBand" <?php echo (isset($params->titleffect) && $params->titleffect=='rubberBand'?'selected="selected"':''); ?>>RubberBand</option>
			<option value="shake" <?php echo (isset($params->titleffect) && $params->titleffect=='shake'?'selected="selected"':''); ?>>Shake</option>
			<option value="headShake" <?php echo (isset($params->titleffect) && $params->titleffect=='headShake'?'selected="selected"':''); ?>>HeadShake</option>
			<option value="swing" <?php echo (isset($params->titleffect) && $params->titleffect=='swing'?'selected="selected"':''); ?>>Swing</option>
			<option value="tada" <?php echo (isset($params->titleffect) && $params->titleffect=='tada'?'selected="selected"':''); ?>>Tada</option>
			<option value="wobble" <?php echo (isset($params->titleffect) && $params->titleffect=='wobble'?'selected="selected"':''); ?>>Wobble</option>
			<option value="jello" <?php echo (isset($params->titleffect) && $params->titleffect=='jello'?'selected="selected"':''); ?>>Jello</option>
			<option value="bounceIn" <?php echo (isset($params->titleffect) && $params->titleffect=='bounceIn'?'selected="selected"':''); ?>>BounceIn</option>
			<option value="bounceInDown" <?php echo (isset($params->titleffect) && $params->titleffect=='bounceInDown'?'selected="selected"':''); ?>>BounceInDown</option>
			<option value="bounceInLeft" <?php echo (isset($params->titleffect) && $params->titleffect=='bounceInLeft'?'selected="selected"':''); ?>>BounceInLeft</option>
			<option value="bounceInRight" <?php echo (isset($params->titleffect) && $params->titleffect=='bounceInRight'?'selected="selected"':''); ?>>BounceInRight</option>
			<option value="bounceInUp" <?php echo (isset($params->titleffect) && $params->titleffect=='bounceInUp'?'selected="selected"':''); ?>>BounceInUp</option>

			<option value="fadeIn" <?php echo (isset($params->titleffect) && $params->titleffect=='fadeIn'?'selected="selected"':''); ?>>FadeIn</option>
			<option value="fadeInDown" <?php echo (isset($params->titleffect) && $params->titleffect=='fadeInDown'?'selected="selected"':''); ?>>FadeInDown</option>
			<option value="fadeInDownBig" <?php echo (isset($params->titleffect) && $params->titleffect=='fadeInDownBig'?'selected="selected"':''); ?>>FadeInDownBig</option>
			<option value="fadeInLeft" <?php echo (isset($params->titleffect) && $params->titleffect=='fadeInLeft'?'selected="selected"':''); ?>>FadeInLeft</option>
			<option value="fadeInLeftBig" <?php echo (isset($params->titleffect) && $params->titleffect=='fadeInLeftBig'?'selected="selected"':''); ?>>FadeInLeftBig</option>
			<option value="fadeInRight" <?php echo (isset($params->titleffect) && $params->titleffect=='fadeInRight'?'selected="selected"':''); ?>>FadeInRight</option>
			<option value="fadeInRightBig" <?php echo (isset($params->titleffect) && $params->titleffect=='fadeInRightBig'?'selected="selected"':''); ?>>FadeInRightBig</option>
			<option value="fadeInUp" <?php echo (isset($params->titleffect) && $params->titleffect=='fadeInUp'?'selected="selected"':''); ?>>FadeInUp</option>
			<option value="fadeInUpBig" <?php echo (isset($params->titleffect) && $params->titleffect=='fadeInUpBig'?'selected="selected"':''); ?>>FadeInUpBig</option>

			<option value="flipInX" <?php echo (isset($params->titleffect) && $params->titleffect=='flipInX'?'selected="selected"':''); ?>>FlipInX</option>
			<option value="flipInY" <?php echo (isset($params->titleffect) && $params->titleffect=='flipInY'?'selected="selected"':''); ?>>FlipInY</option>

			<option value="lightSpeedIn" <?php echo (isset($params->titleffect) && $params->titleffect=='lightSpeedIn'?'selected="selected"':''); ?>>LightSpeedIn</option>

			<option value="rotateIn" <?php echo (isset($params->titleffect) && $params->titleffect=='rotateIn'?'selected="selected"':''); ?>>RotateIn</option>
			<option value="rotateInDownLeft" <?php echo (isset($params->titleffect) && $params->titleffect=='rotateInDownLeft'?'selected="selected"':''); ?>>RotateInDownLeft</option>
			<option value="rotateInDownRight" <?php echo (isset($params->titleffect) && $params->titleffect=='rotateInDownRight'?'selected="selected"':''); ?>>RotateInDownRight</option>
			<option value="rotateInUpLeft" <?php echo (isset($params->titleffect) && $params->titleffect=='rotateInUpLeft'?'selected="selected"':''); ?>>RotateInUpLeft</option>
			<option value="rotateInUpRight" <?php echo (isset($params->titleffect) && $params->titleffect=='rotateInUpRight'?'selected="selected"':''); ?>>RotateInUpRight</option>

			<option value="hinge" <?php echo (isset($params->titleffect) && $params->titleffect=='hinge'?'selected="selected"':''); ?>>Hinge</option>
			<option value="jackInTheBox" <?php echo (isset($params->titleffect) && $params->titleffect=='jackInTheBox'?'selected="selected"':''); ?>>JackInTheBox</option>
			<option value="rollIn" <?php echo (isset($params->titleffect) && $params->titleffect=='rollIn'?'selected="selected"':''); ?>>RollIn</option>

			<option value="zoomIn" <?php echo (isset($params->titleffect) && $params->titleffect=='zoomIn'?'selected="selected"':''); ?>>ZoomIn</option>
			<option value="zoomInDown" <?php echo (isset($params->titleffect) && $params->titleffect=='zoomInDown'?'selected="selected"':''); ?>>ZoomInDown</option>
			<option value="zoomInLeft" <?php echo (isset($params->titleffect) && $params->titleffect=='zoomInLeft'?'selected="selected"':''); ?>>ZoomInLeft</option>
			<option value="zoomInRight" <?php echo (isset($params->titleffect) && $params->titleffect=='zoomInRight'?'selected="selected"':''); ?>>ZoomInRight</option>
			<option value="zoomInUp" <?php echo (isset($params->titleffect) && $params->titleffect=='zoomInUp'?'selected="selected"':''); ?>>ZoomInUp</option>

			<option value="slideInDown" <?php echo (isset($params->titleffect) && $params->titleffect=='slideInDown'?'selected="selected"':''); ?>>SlideInDown</option>
			<option value="slideInLeft" <?php echo (isset($params->titleffect) && $params->titleffect=='slideInLeft'?'selected="selected"':''); ?>>SlideInLeft</option>
			<option value="slideInRight" <?php echo (isset($params->titleffect) && $params->titleffect=='slideInRight'?'selected="selected"':''); ?>>SlideInRight</option>
			<option value="slideInUp" <?php echo (isset($params->titleffect) && $params->titleffect=='slideInUp'?'selected="selected"':''); ?>>SlideInUp</option>
			</optgroup>

			
			
			
			<optgroup label="Custom Effect">
			<option value="hero_glitch_title" <?php echo ($params->titleffect=='hero_glitch_title'?'selected="selected"':''); ?>>Glitch Effect</option>
			
			<option value="hero_peeled_effect" <?php echo ($params->titleffect=='hero_peeled_effect'?'selected="selected"':''); ?>>Peeled Text Transforms</option>
			
			<option value="hero_pretty_shadow" <?php echo ($params->titleffect=='hero_pretty_shadow'?'selected="selected"':''); ?>>Pretty Shadow</option>
			
			<option value="anim-text-flow" <?php echo ($params->titleffect=='anim-text-flow'?'selected="selected"':''); ?>>Colorfull Text animation</option>
			
			<option value="hero_glitch_text" <?php echo ($params->titleffect=='hero_glitch_text'?'selected="selected"':''); ?>>Glitch Effect 1</option>
			
			<option value="hero_text_animation" <?php echo ($params->titleffect=='hero_text_animation'?'selected="selected"':''); ?>>Hero Text Animation</option>
			
			<option value="hero_happy_text" <?php echo ($params->titleffect=='hero_happy_text'?'selected="selected"':''); ?>>Hero Happy Text</option>
			
			<option value="hero_animated_fill" <?php echo ($params->titleffect=='hero_animated_fill'?'selected="selected"':''); ?>>Hero Animated Fill</option>
			
			<option value="hero_burn_in" <?php echo ($params->titleffect=='hero_burn_in'?'selected="selected"':''); ?>>Hero Burn-In</option>
			<option value="hero_knockout_text" <?php echo ($params->titleffect=='hero_knockout_text'?'selected="selected"':''); ?>>Hero Knockout Text</option>
			<option value="hero_multicolor" <?php echo ($params->titleffect=='hero_multicolor'?'selected="selected"':''); ?>>Hero Multicolor</option>
			<option value="hero_spin_text" <?php echo ($params->titleffect=='hero_spin_text'?'selected="selected"':''); ?>>Hero Spin Text</option>
			<option value="hero_folded_paper" <?php echo ($params->titleffect=='hero_folded_paper'?'selected="selected"':''); ?>>Folded Paper</option>
			
			<option value="hero_sliding_text" <?php echo ($params->titleffect=='hero_sliding_text'?'selected="selected"':''); ?>>Hero Sliding Text</option>
			
			<option value="hero_blur_effect" <?php echo ($params->titleffect=='hero_blur_effect'?'selected="selected"':''); ?>>Hero Blur Effect</option>
			<option value="hero_matrix" <?php echo ($params->titleffect=='hero_matrix'?'selected="selected"':''); ?>>Hero Matrix Animation</option>
			
			<!--<option value="hero_glitch" <?php echo ($params->titleffect=='hero_glitch'?'selected="selected"':''); ?>>Glitch Effect 2</option>-->
			
			<option value="hollywood_console" <?php echo ($params->titleffect=='hollywood_console'?'selected="selected"':''); ?>>Hero Hollywood Console</option>
			
			<option value="hero_shuffle" <?php echo ($params->titleffect=='hero_shuffle'?'selected="selected"':''); ?>>Hero Shuffle</option>
			
			<option value="hero_rearrange" <?php echo ($params->titleffect=='hero_rearrange'?'selected="selected"':''); ?>>Hero Rearrange</option>
			</optgroup>
		
			
			
			
			
		</select>
                                    
    </div>
								
	<div class="params deseffect customitemstyle">
		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Title Out Effect', 'qcslide'); ?>:</label>
		<select class="myElements" name="params[titleouteffect]">
			<option value="">Normal</option>
										
			<optgroup label="Animate Css Effect">
			<option value="bounce" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='bounce'?'selected="selected"':''); ?>>Bounce</option>
			<option value="flash" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='flash'?'selected="selected"':''); ?>>Flash</option>
			<option value="pulse" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='pulse'?'selected="selected"':''); ?>>Pulse</option>
			<option value="rubberBand" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rubberBand'?'selected="selected"':''); ?>>RubberBand</option>
			<option value="shake" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='shake'?'selected="selected"':''); ?>>Shake</option>
			<option value="headShake" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='headShake'?'selected="selected"':''); ?>>HeadShake</option>
			<option value="swing" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='swing'?'selected="selected"':''); ?>>Swing</option>
			<option value="tada" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='tada'?'selected="selected"':''); ?>>Tada</option>
			<option value="wobble" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='wobble'?'selected="selected"':''); ?>>Wobble</option>
			<option value="jello" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='jello'?'selected="selected"':''); ?>>Jello</option>

			<option value="bounceOut" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='bounceOut'?'selected="selected"':''); ?>>BounceOut</option>
			<option value="bounceOutDown" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='bounceOutDown'?'selected="selected"':''); ?>>BounceOutDown</option>
			<option value="bounceOutLeft" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='bounceOutLeft'?'selected="selected"':''); ?>>BounceOutLeft</option>
			<option value="bounceOutRight" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='bounceOutRight'?'selected="selected"':''); ?>>BounceOutRight</option>
			<option value="bounceOutUp" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='bounceOutUp'?'selected="selected"':''); ?>>BounceOutUp</option>

			<option value="fadeOut" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOut'?'selected="selected"':''); ?>>FadeOut</option>
			<option value="fadeOutDown" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutDown'?'selected="selected"':''); ?>>FadeOutDown</option>
			<option value="fadeOutDownBig" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutDownBig'?'selected="selected"':''); ?>>FadeOutDownBig</option>
			<option value="fadeOutLeft" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutLeft'?'selected="selected"':''); ?>>FadeOutLeft</option>
			<option value="fadeOutLeftBig" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutLeftBig'?'selected="selected"':''); ?>>FadeOutLeftBig</option>
			<option value="fadeOutRight" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutRight'?'selected="selected"':''); ?>>FadeOutRight</option>
			<option value="fadeOutRightBig" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutRightBig'?'selected="selected"':''); ?>>FadeOutRightBig</option>
			<option value="fadeOutUp" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutUp'?'selected="selected"':''); ?>>FadeOutUp</option>
			<option value="fadeOutUpBig" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutUpBig'?'selected="selected"':''); ?>>FadeOutUpBig</option>

			<option value="flipOutX" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='flipOutX'?'selected="selected"':''); ?>>FlipOutX</option>
			<option value="flipOutY" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='flipOutY'?'selected="selected"':''); ?>>FlipOutY</option>

			<option value="lightSpeedOut" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='lightSpeedOut'?'selected="selected"':''); ?>>LightSpeedOut</option>

			<option value="rotateOut" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rotateOut'?'selected="selected"':''); ?>>RotateOut</option>
			<option value="rotateOutDownLeft" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rotateOutDownLeft'?'selected="selected"':''); ?>>RotateOutDownLeft</option>
			<option value="rotateOutDownRight" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rotateOutDownRight'?'selected="selected"':''); ?>>RotateOutDownRight</option>
			<option value="rotateOutUpLeft" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rotateOutUpLeft'?'selected="selected"':''); ?>>RotateOutUpLeft</option>
			<option value="rotateOutUpRight" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rotateOutUpRight'?'selected="selected"':''); ?>>RotateOutUpRight</option>
			<option value="hinge" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='hinge'?'selected="selected"':''); ?>>Hinge</option>
			<option value="jackInTheBox" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='jackInTheBox'?'selected="selected"':''); ?>>JackInTheBox</option>

			<option value="rollOut" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rollOut'?'selected="selected"':''); ?>>RollOut</option>

			<option value="zoomOut" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='zoomOut'?'selected="selected"':''); ?>>ZoomOut</option>
			<option value="zoomOutDown" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='zoomOutDown'?'selected="selected"':''); ?>>ZoomOutDown</option>
			<option value="zoomOutLeft" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='zoomOutLeft'?'selected="selected"':''); ?>>ZoomOutLeft</option>
			<option value="zoomOutRight" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='zoomOutRight'?'selected="selected"':''); ?>>ZoomOutRight</option>
			<option value="zoomOutUp" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='zoomOutUp'?'selected="selected"':''); ?>>ZoomOutUp</option>

			<option value="slideOutDown" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='slideOutDown'?'selected="selected"':''); ?>>SlideOutDown</option>
			<option value="slideOutLeft" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='slideOutLeft'?'selected="selected"':''); ?>>SlideOutLeft</option>
			<option value="slideOutRight" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='slideOutRight'?'selected="selected"':''); ?>>SlideOutRight</option>
			<option value="slideOutUp" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='slideOutUp'?'selected="selected"':''); ?>>SlideOutUp</option>
			</optgroup>

											
										
		</select>
                                    
    </div>
								
    <div class="params deseffect customitemstyle">
		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Description In Effect', 'qcslide'); ?>:</label>
		<select class="myElements" name="params[deseffect]">
			<option value="">Normal</option>
										
			<optgroup label="Animate Css Effect">					
			<option value="bounce" <?php echo (isset($params->deseffect) && $params->deseffect=='bounce'?'selected="selected"':''); ?>>Bounce</option>
			<option value="flash" <?php echo (isset($params->deseffect) && $params->deseffect=='flash'?'selected="selected"':''); ?>>Flash</option>
			<option value="pulse" <?php echo (isset($params->deseffect) && $params->deseffect=='pulse'?'selected="selected"':''); ?>>Pulse</option>
			<option value="rubberBand" <?php echo (isset($params->deseffect) && $params->deseffect=='rubberBand'?'selected="selected"':''); ?>>RubberBand</option>
			<option value="shake" <?php echo (isset($params->deseffect) && $params->deseffect=='shake'?'selected="selected"':''); ?>>Shake</option>
			<option value="headShake" <?php echo (isset($params->deseffect) && $params->deseffect=='headShake'?'selected="selected"':''); ?>>HeadShake</option>
			<option value="swing" <?php echo (isset($params->deseffect) && $params->deseffect=='swing'?'selected="selected"':''); ?>>Swing</option>
			<option value="tada" <?php echo (isset($params->deseffect) && $params->deseffect=='tada'?'selected="selected"':''); ?>>Tada</option>
			<option value="wobble" <?php echo (isset($params->deseffect) && $params->deseffect=='wobble'?'selected="selected"':''); ?>>Wobble</option>
			<option value="jello" <?php echo (isset($params->deseffect) && $params->deseffect=='jello'?'selected="selected"':''); ?>>Jello</option>
			<option value="bounceIn" <?php echo (isset($params->deseffect) && $params->deseffect=='bounceIn'?'selected="selected"':''); ?>>BounceIn</option>
			<option value="bounceInDown" <?php echo (isset($params->deseffect) && $params->deseffect=='bounceInDown'?'selected="selected"':''); ?>>BounceInDown</option>
			<option value="bounceInLeft" <?php echo (isset($params->deseffect) && $params->deseffect=='bounceInLeft'?'selected="selected"':''); ?>>BounceInLeft</option>
			<option value="bounceInRight" <?php echo (isset($params->deseffect) && $params->deseffect=='bounceInRight'?'selected="selected"':''); ?>>BounceInRight</option>
			<option value="bounceInUp" <?php echo (isset($params->deseffect) && $params->deseffect=='bounceInUp'?'selected="selected"':''); ?>>BounceInUp</option>

			<option value="fadeIn" <?php echo (isset($params->deseffect) && $params->deseffect=='fadeIn'?'selected="selected"':''); ?>>FadeIn</option>
			<option value="fadeInDown" <?php echo (isset($params->deseffect) && $params->deseffect=='fadeInDown'?'selected="selected"':''); ?>>FadeInDown</option>
			<option value="fadeInDownBig" <?php echo (isset($params->deseffect) && $params->deseffect=='fadeInDownBig'?'selected="selected"':''); ?>>FadeInDownBig</option>
			<option value="fadeInLeft" <?php echo (isset($params->deseffect) && $params->deseffect=='fadeInLeft'?'selected="selected"':''); ?>>FadeInLeft</option>
			<option value="fadeInLeftBig" <?php echo (isset($params->deseffect) && $params->deseffect=='fadeInLeftBig'?'selected="selected"':''); ?>>FadeInLeftBig</option>
			<option value="fadeInRight" <?php echo (isset($params->deseffect) && $params->deseffect=='fadeInRight'?'selected="selected"':''); ?>>FadeInRight</option>
			<option value="fadeInRightBig" <?php echo (isset($params->deseffect) && $params->deseffect=='fadeInRightBig'?'selected="selected"':''); ?>>FadeInRightBig</option>
			<option value="fadeInUp" <?php echo (isset($params->deseffect) && $params->deseffect=='fadeInUp'?'selected="selected"':''); ?>>FadeInUp</option>
			<option value="fadeInUpBig" <?php echo (isset($params->deseffect) && $params->deseffect=='fadeInUpBig'?'selected="selected"':''); ?>>FadeInUpBig</option>

			<option value="flipInX" <?php echo (isset($params->deseffect) && $params->deseffect=='flipInX'?'selected="selected"':''); ?>>FlipInX</option>
			<option value="flipInY" <?php echo (isset($params->deseffect) && $params->deseffect=='flipInY'?'selected="selected"':''); ?>>FlipInY</option>

			<option value="lightSpeedIn" <?php echo (isset($params->deseffect) && $params->deseffect=='lightSpeedIn'?'selected="selected"':''); ?>>LightSpeedIn</option>

			<option value="rotateIn" <?php echo (isset($params->deseffect) && $params->deseffect=='rotateIn'?'selected="selected"':''); ?>>RotateIn</option>
			<option value="rotateInDownLeft" <?php echo (isset($params->deseffect) && $params->deseffect=='rotateInDownLeft'?'selected="selected"':''); ?>>RotateInDownLeft</option>
			<option value="rotateInDownRight" <?php echo (isset($params->deseffect) && $params->deseffect=='rotateInDownRight'?'selected="selected"':''); ?>>RotateInDownRight</option>
			<option value="rotateInUpLeft" <?php echo (isset($params->deseffect) && $params->deseffect=='rotateInUpLeft'?'selected="selected"':''); ?>>RotateInUpLeft</option>
			<option value="rotateInUpRight" <?php echo (isset($params->deseffect) && $params->deseffect=='rotateInUpRight'?'selected="selected"':''); ?>>RotateInUpRight</option>

			<option value="hinge" <?php echo (isset($params->deseffect) && $params->deseffect=='hinge'?'selected="selected"':''); ?>>Hinge</option>
			<option value="jackInTheBox" <?php echo (isset($params->deseffect) && $params->deseffect=='jackInTheBox'?'selected="selected"':''); ?>>JackInTheBox</option>
			<option value="rollIn" <?php echo (isset($params->deseffect) && $params->deseffect=='rollIn'?'selected="selected"':''); ?>>RollIn</option>

			<option value="zoomIn" <?php echo (isset($params->deseffect) && $params->deseffect=='zoomIn'?'selected="selected"':''); ?>>ZoomIn</option>
			<option value="zoomInDown" <?php echo (isset($params->deseffect) && $params->deseffect=='zoomInDown'?'selected="selected"':''); ?>>ZoomInDown</option>
			<option value="zoomInLeft" <?php echo (isset($params->deseffect) && $params->deseffect=='zoomInLeft'?'selected="selected"':''); ?>>ZoomInLeft</option>
			<option value="zoomInRight" <?php echo (isset($params->deseffect) && $params->deseffect=='zoomInRight'?'selected="selected"':''); ?>>ZoomInRight</option>
			<option value="zoomInUp" <?php echo (isset($params->deseffect) && $params->deseffect=='zoomInUp'?'selected="selected"':''); ?>>ZoomInUp</option>

			<option value="slideInDown" <?php echo (isset($params->deseffect) && $params->deseffect=='slideInDown'?'selected="selected"':''); ?>>SlideInDown</option>
			<option value="slideInLeft" <?php echo (isset($params->deseffect) && $params->deseffect=='slideInLeft'?'selected="selected"':''); ?>>SlideInLeft</option>
			<option value="slideInRight" <?php echo (isset($params->deseffect) && $params->deseffect=='slideInRight'?'selected="selected"':''); ?>>SlideInRight</option>
			<option value="slideInUp" <?php echo (isset($params->deseffect) && $params->deseffect=='slideInUp'?'selected="selected"':''); ?>>SlideInUp</option>
			</optgroup>
					
		</select>

    </div>	

	<div class="params deseffect customitemstyle">
		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Description Out Effect', 'qcslide'); ?>:</label>
		<select class="myElements" name="params[descouteffect]">
			<option value="">Normal</option>
			<optgroup label="Animate Css Effect">									
			<option value="bounce" <?php echo (isset($params->descouteffect) && $params->descouteffect=='bounce'?'selected="selected"':''); ?>>Bounce</option>
			<option value="flash" <?php echo (isset($params->descouteffect) && $params->descouteffect=='flash'?'selected="selected"':''); ?>>Flash</option>
			<option value="pulse" <?php echo (isset($params->descouteffect) && $params->descouteffect=='pulse'?'selected="selected"':''); ?>>Pulse</option>
			<option value="rubberBand" <?php echo (isset($params->descouteffect) && $params->descouteffect=='rubberBand'?'selected="selected"':''); ?>>RubberBand</option>
			<option value="shake" <?php echo (isset($params->descouteffect) && $params->descouteffect=='shake'?'selected="selected"':''); ?>>Shake</option>
			<option value="headShake" <?php echo (isset($params->descouteffect) && $params->descouteffect=='headShake'?'selected="selected"':''); ?>>HeadShake</option>
			<option value="swing" <?php echo (isset($params->descouteffect) && $params->descouteffect=='swing'?'selected="selected"':''); ?>>Swing</option>
			<option value="tada" <?php echo (isset($params->descouteffect) && $params->descouteffect=='tada'?'selected="selected"':''); ?>>Tada</option>
			<option value="wobble" <?php echo (isset($params->descouteffect) && $params->descouteffect=='wobble'?'selected="selected"':''); ?>>Wobble</option>
			<option value="jello" <?php echo (isset($params->descouteffect) && $params->descouteffect=='jello'?'selected="selected"':''); ?>>Jello</option>

			<option value="bounceOutDown" <?php echo (isset($params->descouteffect) && $params->descouteffect=='bounceOutDown'?'selected="selected"':''); ?>>BounceOutDown</option>
			<option value="bounceOutLeft" <?php echo (isset($params->descouteffect) && $params->descouteffect=='bounceOutLeft'?'selected="selected"':''); ?>>BounceOutLeft</option>
			<option value="bounceOutRight" <?php echo (isset($params->descouteffect) && $params->descouteffect=='bounceOutRight'?'selected="selected"':''); ?>>BounceOutRight</option>
			<option value="bounceOutUp" <?php echo (isset($params->descouteffect) && $params->descouteffect=='bounceOutUp'?'selected="selected"':''); ?>>BounceOutUp</option>

			<option value="fadeOut" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOut'?'selected="selected"':''); ?>>FadeOut</option>
			<option value="fadeOutDown" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutDown'?'selected="selected"':''); ?>>FadeOutDown</option>
			<option value="fadeOutDownBig" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutDownBig'?'selected="selected"':''); ?>>FadeOutDownBig</option>
			<option value="fadeOutLeft" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutLeft'?'selected="selected"':''); ?>>FadeOutLeft</option>
			<option value="fadeOutLeftBig" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutLeftBig'?'selected="selected"':''); ?>>FadeOutLeftBig</option>
			<option value="fadeOutRight" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutRight'?'selected="selected"':''); ?>>FadeOutRight</option>
			<option value="fadeOutRightBig" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutRightBig'?'selected="selected"':''); ?>>FadeOutRightBig</option>
			<option value="fadeOutUp" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutUp'?'selected="selected"':''); ?>>FadeOutUp</option>
			<option value="fadeOutUpBig" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutUpBig'?'selected="selected"':''); ?>>FadeOutUpBig</option>

			<option value="flipOutX" <?php echo (isset($params->descouteffect) && $params->descouteffect=='flipOutX'?'selected="selected"':''); ?>>FlipOutX</option>
			<option value="flipOutY" <?php echo (isset($params->descouteffect) && $params->descouteffect=='flipOutY'?'selected="selected"':''); ?>>FlipOutY</option>

			<option value="lightSpeedOut" <?php echo (isset($params->descouteffect) && $params->descouteffect=='lightSpeedOut'?'selected="selected"':''); ?>>LightSpeedOut</option>


			<option value="rotateOut" <?php echo (isset($params->descouteffect) && $params->descouteffect=='rotateOut'?'selected="selected"':''); ?>>RotateOut</option>
			<option value="rotateOutDownLeft" <?php echo (isset($params->descouteffect) && $params->descouteffect=='rotateOutDownLeft'?'selected="selected"':''); ?>>RotateOutDownLeft</option>
			<option value="rotateOutDownRight" <?php echo (isset($params->descouteffect) && $params->descouteffect=='rotateOutDownRight'?'selected="selected"':''); ?>>RotateOutDownRight</option>
			<option value="rotateOutUpLeft" <?php echo (isset($params->descouteffect) && $params->descouteffect=='rotateOutUpLeft'?'selected="selected"':''); ?>>RotateOutUpLeft</option>
			<option value="rotateOutUpRight" <?php echo (isset($params->descouteffect) && $params->descouteffect=='rotateOutUpRight'?'selected="selected"':''); ?>>RotateOutUpRight</option>
			<option value="hinge" <?php echo (isset($params->descouteffect) && $params->descouteffect=='hinge'?'selected="selected"':''); ?>>Hinge</option>

			<option value="zoomOut" <?php echo (isset($params->descouteffect) && $params->descouteffect=='zoomOut'?'selected="selected"':''); ?>>ZoomOut</option>
			<option value="zoomOutDown" <?php echo (isset($params->descouteffect) && $params->descouteffect=='zoomOutDown'?'selected="selected"':''); ?>>ZoomOutDown</option>
			<option value="zoomOutLeft" <?php echo (isset($params->descouteffect) && $params->descouteffect=='zoomOutLeft'?'selected="selected"':''); ?>>ZoomOutLeft</option>
			<option value="zoomOutRight" <?php echo (isset($params->descouteffect) && $params->descouteffect=='zoomOutRight'?'selected="selected"':''); ?>>ZoomOutRight</option>
			<option value="zoomOutUp" <?php echo (isset($params->descouteffect) && $params->descouteffect=='zoomOutUp'?'selected="selected"':''); ?>>ZoomOutUp</option>

			<option value="slideOutDown" <?php echo (isset($params->descouteffect) && $params->descouteffect=='slideOutDown'?'selected="selected"':''); ?>>SlideOutDown</option>
			<option value="slideOutLeft" <?php echo (isset($params->descouteffect) && $params->descouteffect=='slideOutLeft'?'selected="selected"':''); ?>>SlideOutLeft</option>
			<option value="slideOutRight" <?php echo (isset($params->descouteffect) && $params->descouteffect=='slideOutRight'?'selected="selected"':''); ?>>SlideOutRight</option>
			<option value="slideOutUp" <?php echo (isset($params->descouteffect) && $params->descouteffect=='slideOutUp'?'selected="selected"':''); ?>>SlideOutUp</option>
			</optgroup>
										
										
		</select>
		
	</div>
	<?php endif; ?>						
								
	
	<?php if($_slider[0]->type!='intro'): ?>	
	<div class="params deseffect customitemstyle">
		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Button In Effect', 'qcslide'); ?>:</label>
		<select class="myElements" name="params[btneffect]">
			<option value="">Normal</option>
										
										
			<option value="bounce" <?php echo (isset($params->btneffect) && $params->btneffect=='bounce'?'selected="selected"':''); ?>>Bounce</option>
			<option value="flash" <?php echo (isset($params->btneffect) && $params->btneffect=='flash'?'selected="selected"':''); ?>>Flash</option>
			<option value="pulse" <?php echo (isset($params->btneffect) && $params->btneffect=='pulse'?'selected="selected"':''); ?>>Pulse</option>
			<option value="rubberBand" <?php echo (isset($params->btneffect) && $params->btneffect=='rubberBand'?'selected="selected"':''); ?>>RubberBand</option>
			<option value="shake" <?php echo (isset($params->btneffect) && $params->btneffect=='shake'?'selected="selected"':''); ?>>Shake</option>
			<option value="headShake" <?php echo (isset($params->btneffect) && $params->btneffect=='headShake'?'selected="selected"':''); ?>>HeadShake</option>
			<option value="swing" <?php echo (isset($params->btneffect) && $params->btneffect=='swing'?'selected="selected"':''); ?>>Swing</option>
			<option value="tada" <?php echo (isset($params->btneffect) && $params->btneffect=='tada'?'selected="selected"':''); ?>>Tada</option>
			<option value="wobble" <?php echo (isset($params->btneffect) && $params->btneffect=='wobble'?'selected="selected"':''); ?>>Wobble</option>
			<option value="jello" <?php echo (isset($params->btneffect) && $params->btneffect=='jello'?'selected="selected"':''); ?>>Jello</option>
			<option value="bounceIn" <?php echo (isset($params->btneffect) && $params->btneffect=='bounceIn'?'selected="selected"':''); ?>>BounceIn</option>
			<option value="bounceInDown" <?php echo (isset($params->btneffect) && $params->btneffect=='bounceInDown'?'selected="selected"':''); ?>>BounceInDown</option>
			<option value="bounceInLeft" <?php echo (isset($params->btneffect) && $params->btneffect=='bounceInLeft'?'selected="selected"':''); ?>>BounceInLeft</option>
			<option value="bounceInRight" <?php echo (isset($params->btneffect) && $params->btneffect=='bounceInRight'?'selected="selected"':''); ?>>BounceInRight</option>
			<option value="bounceInUp" <?php echo (isset($params->btneffect) && $params->btneffect=='bounceInUp'?'selected="selected"':''); ?>>BounceInUp</option>

			<option value="fadeIn" <?php echo (isset($params->btneffect) && $params->btneffect=='fadeIn'?'selected="selected"':''); ?>>FadeIn</option>
			<option value="fadeInDown" <?php echo (isset($params->btneffect) && $params->btneffect=='fadeInDown'?'selected="selected"':''); ?>>FadeInDown</option>
			<option value="fadeInDownBig" <?php echo (isset($params->btneffect) && $params->btneffect=='fadeInDownBig'?'selected="selected"':''); ?>>FadeInDownBig</option>
			<option value="fadeInLeft" <?php echo (isset($params->btneffect) && $params->btneffect=='fadeInLeft'?'selected="selected"':''); ?>>FadeInLeft</option>
			<option value="fadeInLeftBig" <?php echo (isset($params->btneffect) && $params->btneffect=='fadeInLeftBig'?'selected="selected"':''); ?>>FadeInLeftBig</option>
			<option value="fadeInRight" <?php echo (isset($params->btneffect) && $params->btneffect=='fadeInRight'?'selected="selected"':''); ?>>FadeInRight</option>
			<option value="fadeInRightBig" <?php echo (isset($params->btneffect) && $params->btneffect=='fadeInRightBig'?'selected="selected"':''); ?>>FadeInRightBig</option>
			<option value="fadeInUp" <?php echo (isset($params->btneffect) && $params->btneffect=='fadeInUp'?'selected="selected"':''); ?>>FadeInUp</option>
			<option value="fadeInUpBig" <?php echo (isset($params->btneffect) && $params->btneffect=='fadeInUpBig'?'selected="selected"':''); ?>>FadeInUpBig</option>

			<option value="flipInX" <?php echo (isset($params->btneffect) && $params->btneffect=='flipInX'?'selected="selected"':''); ?>>FlipInX</option>
			<option value="flipInY" <?php echo (isset($params->btneffect) && $params->btneffect=='flipInY'?'selected="selected"':''); ?>>FlipInY</option>

			<option value="lightSpeedIn" <?php echo (isset($params->btneffect) && $params->btneffect=='lightSpeedIn'?'selected="selected"':''); ?>>LightSpeedIn</option>

			<option value="rotateIn" <?php echo (isset($params->btneffect) && $params->btneffect=='rotateIn'?'selected="selected"':''); ?>>RotateIn</option>
			<option value="rotateInDownLeft" <?php echo (isset($params->btneffect) && $params->btneffect=='rotateInDownLeft'?'selected="selected"':''); ?>>RotateInDownLeft</option>
			<option value="rotateInDownRight" <?php echo (isset($params->btneffect) && $params->btneffect=='rotateInDownRight'?'selected="selected"':''); ?>>RotateInDownRight</option>
			<option value="rotateInUpLeft" <?php echo (isset($params->btneffect) && $params->btneffect=='rotateInUpLeft'?'selected="selected"':''); ?>>RotateInUpLeft</option>
			<option value="rotateInUpRight" <?php echo (isset($params->btneffect) && $params->btneffect=='rotateInUpRight'?'selected="selected"':''); ?>>RotateInUpRight</option>

			<option value="hinge" <?php echo (isset($params->btneffect) && $params->btneffect=='hinge'?'selected="selected"':''); ?>>Hinge</option>
			<option value="jackInTheBox" <?php echo (isset($params->btneffect) && $params->btneffect=='jackInTheBox'?'selected="selected"':''); ?>>JackInTheBox</option>
			<option value="rollIn" <?php echo (isset($params->btneffect) && $params->btneffect=='rollIn'?'selected="selected"':''); ?>>RollIn</option>

			<option value="zoomIn" <?php echo (isset($params->btneffect) && $params->btneffect=='zoomIn'?'selected="selected"':''); ?>>ZoomIn</option>
			<option value="zoomInDown" <?php echo (isset($params->btneffect) && $params->btneffect=='zoomInDown'?'selected="selected"':''); ?>>ZoomInDown</option>
			<option value="zoomInLeft" <?php echo (isset($params->btneffect) && $params->btneffect=='zoomInLeft'?'selected="selected"':''); ?>>ZoomInLeft</option>
			<option value="zoomInRight" <?php echo (isset($params->btneffect) && $params->btneffect=='zoomInRight'?'selected="selected"':''); ?>>ZoomInRight</option>
			<option value="zoomInUp" <?php echo (isset($params->btneffect) && $params->btneffect=='zoomInUp'?'selected="selected"':''); ?>>ZoomInUp</option>

			<option value="slideInDown" <?php echo (isset($params->btneffect) && $params->btneffect=='slideInDown'?'selected="selected"':''); ?>>SlideInDown</option>
			<option value="slideInLeft" <?php echo (isset($params->btneffect) && $params->btneffect=='slideInLeft'?'selected="selected"':''); ?>>SlideInLeft</option>
			<option value="slideInRight" <?php echo (isset($params->btneffect) && $params->btneffect=='slideInRight'?'selected="selected"':''); ?>>SlideInRight</option>
			<option value="slideInUp" <?php echo (isset($params->btneffect) && $params->btneffect=='slideInUp'?'selected="selected"':''); ?>>SlideInUp</option>
								
										
		</select>
		
	</div>
							
	<div class="params deseffect customitemstyle">
		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Button Out Effect', 'qcslide'); ?>:</label>
		<select class="myElements" name="params[btnouteffect]">
			<option value="">Normal</option>
			<option value="bounceOutLeft" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='bounceOutLeft'?'selected="selected"':''); ?>>bounceOutLeft</option>
										
			<option value="bounce" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='bounce'?'selected="selected"':''); ?>>Bounce</option>
			<option value="flash" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='flash'?'selected="selected"':''); ?>>Flash</option>
			<option value="pulse" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='pulse'?'selected="selected"':''); ?>>Pulse</option>
			<option value="rubberBand" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='rubberBand'?'selected="selected"':''); ?>>RubberBand</option>
			<option value="shake" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='shake'?'selected="selected"':''); ?>>Shake</option>
			<option value="headShake" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='headShake'?'selected="selected"':''); ?>>HeadShake</option>
			<option value="swing" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='swing'?'selected="selected"':''); ?>>Swing</option>
			<option value="tada" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='tada'?'selected="selected"':''); ?>>Tada</option>
			<option value="wobble" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='wobble'?'selected="selected"':''); ?>>Wobble</option>
			<option value="jello" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='jello'?'selected="selected"':''); ?>>Jello</option>

			<option value="bounceOut" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='bounceOut'?'selected="selected"':''); ?>>BounceOut</option>
			<option value="bounceOutDown" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='bounceOutDown'?'selected="selected"':''); ?>>BounceOutDown</option>
			<option value="bounceOutLeft" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='bounceOutLeft'?'selected="selected"':''); ?>>BounceOutLeft</option>
			<option value="bounceOutRight" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='bounceOutRight'?'selected="selected"':''); ?>>BounceOutRight</option>
			<option value="bounceOutUp" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='bounceOutUp'?'selected="selected"':''); ?>>BounceOutUp</option>

			<option value="fadeOut" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='fadeOut'?'selected="selected"':''); ?>>FadeOut</option>
			<option value="fadeOutDown" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='fadeOutDown'?'selected="selected"':''); ?>>FadeOutDown</option>
			<option value="fadeOutDownBig" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='fadeOutDownBig'?'selected="selected"':''); ?>>FadeOutDownBig</option>
			<option value="fadeOutLeft" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='fadeOutLeft'?'selected="selected"':''); ?>>FadeOutLeft</option>
			<option value="fadeOutLeftBig" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='fadeOutLeftBig'?'selected="selected"':''); ?>>FadeOutLeftBig</option>
			<option value="fadeOutRight" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='fadeOutRight'?'selected="selected"':''); ?>>FadeOutRight</option>
			<option value="fadeOutRightBig" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='fadeOutRightBig'?'selected="selected"':''); ?>>FadeOutRightBig</option>
			<option value="fadeOutUp" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='fadeOutUp'?'selected="selected"':''); ?>>FadeOutUp</option>
			<option value="fadeOutUpBig" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='fadeOutUpBig'?'selected="selected"':''); ?>>FadeOutUpBig</option>

			<option value="flipOutX" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='flipOutX'?'selected="selected"':''); ?>>FlipOutX</option>
			<option value="flipOutY" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='flipOutY'?'selected="selected"':''); ?>>FlipOutY</option>

			<option value="lightSpeedOut" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='lightSpeedOut'?'selected="selected"':''); ?>>LightSpeedOut</option>

			<option value="rotateOut" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='rotateOut'?'selected="selected"':''); ?>>RotateOut</option>
			<option value="rotateOutDownLeft" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='rotateOutDownLeft'?'selected="selected"':''); ?>>RotateOutDownLeft</option>
			<option value="rotateOutDownRight" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='rotateOutDownRight'?'selected="selected"':''); ?>>RotateOutDownRight</option>
			<option value="rotateOutUpLeft" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='rotateOutUpLeft'?'selected="selected"':''); ?>>RotateOutUpLeft</option>
			<option value="rotateOutUpRight" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='rotateOutUpRight'?'selected="selected"':''); ?>>RotateOutUpRight</option>
			<option value="hinge" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='hinge'?'selected="selected"':''); ?>>Hinge</option>

			<option value="zoomInUp" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='zoomInUp'?'selected="selected"':''); ?>>ZoomInUp</option>
			<option value="zoomOut" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='zoomOut'?'selected="selected"':''); ?>>ZoomOut</option>
			<option value="zoomOutDown" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='zoomOutDown'?'selected="selected"':''); ?>>ZoomOutDown</option>
			<option value="zoomOutLeft" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='zoomOutLeft'?'selected="selected"':''); ?>>ZoomOutLeft</option>
			<option value="zoomOutRight" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='zoomOutRight'?'selected="selected"':''); ?>>ZoomOutRight</option>
			<option value="zoomOutUp" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='zoomOutUp'?'selected="selected"':''); ?>>ZoomOutUp</option>

			<option value="slideOutDown" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='slideOutDown'?'selected="selected"':''); ?>>SlideOutDown</option>
			<option value="slideOutLeft" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='slideOutLeft'?'selected="selected"':''); ?>>SlideOutLeft</option>
			<option value="slideOutRight" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='slideOutRight'?'selected="selected"':''); ?>>SlideOutRight</option>
			<option value="slideOutUp" <?php echo (isset($params->btnouteffect) && $params->btnouteffect=='slideOutUp'?'selected="selected"':''); ?>>SlideOutUp</option>											

		</select>
		
	</div>
	
	<?php endif; ?>
	<?php if($_slider[0]->type=='intro'): ?>
	<div class="params deseffect customitemstyle">
		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Intro Background Effect', 'qcslide'); ?>:</label>
		<select class="myElements" name="params[introbgeffect]">
			<option value="">None</option>
			
			<option value="stars" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='stars'?'selected="selected"':''); ?> disabled>Stars Effect</option>
			
			<option value="ripples" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='ripples'?'selected="selected"':''); ?> disabled>Ripples Effect</option>
			
			<option value="just_cloud" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='just_cloud'?'selected="selected"':''); ?> disabled>Just Cloud</option>
			
			<option value="warp_speed" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='warp_speed'?'selected="selected"':''); ?> disabled>Warp Speed</option>

			<option value="matrix" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='matrix'?'selected="selected"':''); ?> disabled>Matrix Effect</option>
			
			<option value="colorful_particle" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='colorful_particle'?'selected="selected"':''); ?> disabled>Colorful Particle</option>
			
			<option value="electric_clock" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='electric_clock'?'selected="selected"':''); ?> disabled>Electric Clock</option>
			
			<option value="particle_snow" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='particle_snow'?'selected="selected"':''); ?> disabled>Particle Snow</option>
			
			<option value="particle_system" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='particle_system'?'selected="selected"':''); ?> disabled>Particle System</option>
			
			<option value="particle_bubble" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='particle_bubble'?'selected="selected"':''); ?> disabled>Particle Bubble</option>
			
			<option value="particle_nasa" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='particle_nasa'?'selected="selected"':''); ?> disabled>Particle Nasa</option>
			
			<option value="link_particle" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='link_particle'?'selected="selected"':''); ?> disabled>Link Particle</option>
			
			<option value="nyan_cat" <?php echo (isset($params->introbgeffect) && $params->introbgeffect=='nyan_cat'?'selected="selected"':''); ?> disabled>Nyan Cat Effect</option>
			
		</select>
		
	</div>
	<?php endif; ?>
								
</div>