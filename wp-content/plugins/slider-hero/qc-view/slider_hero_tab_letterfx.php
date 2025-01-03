<div class="othersetting">

	<div class="params titleffect customitemstyle lfxtab lfxtitlein">
		<?php
		$fxdata = array();
		if(isset($params->lfxtitlein) and $params->lfxtitlein!=''){
			$fxdata = explode(' ',$params->lfxtitlein);
		}
		?>	

		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Title In Effect', 'qcslide'); ?>:</label>
		
		<div><input type="checkbox" name="" <?php echo (in_array('spin',$fxdata)?'checked="checked"':''); ?> value="spin">Spin</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fade',$fxdata)?'checked="checked"':''); ?> value="fade">Fade</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('grow',$fxdata)?'checked="checked"':''); ?> value="grow">Grow</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('smear',$fxdata)?'checked="checked"':''); ?> value="smear">Smear</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fall',$fxdata)?'checked="checked"':''); ?> value="fall">Fall</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('swirl',$fxdata)?'checked="checked"':''); ?> value="swirl">Swirl</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('wave',$fxdata)?'checked="checked"':''); ?> value="wave">Wave</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-top',$fxdata)?'checked="checked"':''); ?> value="fly-top">Fly Top</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-bottom',$fxdata)?'checked="checked"':''); ?> value="fly-bottom">Fly Bottom</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-left',$fxdata)?'checked="checked"':''); ?> value="fly-left">Fly Left</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-right',$fxdata)?'checked="checked"':''); ?> value="fly-right">Fly Right</input></div>
		
		<input type="hidden" id="lfxtitlein" name="params[lfxtitlein]" value="<?php echo (isset($params->lfxtitlein) && $params->lfxtitlein!=''?$params->lfxtitlein:''); ?>" />
	</div>
	
	
	<div class="params titleffect customitemstyle lfxtab lfxtitleout">
		<?php
		$fxdata = array();
		if(isset($params->lfxtitleout) and $params->lfxtitleout!=''){
			$fxdata = explode(' ',$params->lfxtitleout);
		}
		?>	

		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Title Out Effect', 'qcslide'); ?>:</label>
		
		<div><input type="checkbox" name="" <?php echo (in_array('spin',$fxdata)?'checked="checked"':''); ?> value="spin">Spin</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fade',$fxdata)?'checked="checked"':''); ?> value="fade">Fade</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('grow',$fxdata)?'checked="checked"':''); ?> value="grow">Grow</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('smear',$fxdata)?'checked="checked"':''); ?> value="smear">Smear</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fall',$fxdata)?'checked="checked"':''); ?> value="fall">Fall</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('swirl',$fxdata)?'checked="checked"':''); ?> value="swirl">Swirl</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('wave',$fxdata)?'checked="checked"':''); ?> value="wave">Wave</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-top',$fxdata)?'checked="checked"':''); ?> value="fly-top">Fly Top</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-bottom',$fxdata)?'checked="checked"':''); ?> value="fly-bottom">Fly Bottom</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-left',$fxdata)?'checked="checked"':''); ?> value="fly-left">Fly Left</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-right',$fxdata)?'checked="checked"':''); ?> value="fly-right">Fly Right</input></div>
		
		<input type="hidden" id="lfxtitleout" name="params[lfxtitleout]" value="<?php echo (isset($params->lfxtitleout) && $params->lfxtitleout!=''?$params->lfxtitleout:''); ?>" />
	</div>
	
	<div class="params titleffect customitemstyle lfxtab lfxdesin">
		<?php
		$fxdata = array();
		if(isset($params->lfxdesin) and $params->lfxdesin!=''){
			$fxdata = explode(' ',$params->lfxdesin);
		}
		?>	

		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Description In Effect', 'qcslide'); ?>:</label>
		
		<div><input type="checkbox" name="" <?php echo (in_array('spin',$fxdata)?'checked="checked"':''); ?> value="spin">Spin</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fade',$fxdata)?'checked="checked"':''); ?> value="fade">Fade</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('grow',$fxdata)?'checked="checked"':''); ?> value="grow">Grow</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('smear',$fxdata)?'checked="checked"':''); ?> value="smear">Smear</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fall',$fxdata)?'checked="checked"':''); ?> value="fall">Fall</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('swirl',$fxdata)?'checked="checked"':''); ?> value="swirl">Swirl</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('wave',$fxdata)?'checked="checked"':''); ?> value="wave">Wave</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-top',$fxdata)?'checked="checked"':''); ?> value="fly-top">Fly Top</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-bottom',$fxdata)?'checked="checked"':''); ?> value="fly-bottom">Fly Bottom</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-left',$fxdata)?'checked="checked"':''); ?> value="fly-left">Fly Left</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-right',$fxdata)?'checked="checked"':''); ?> value="fly-right">Fly Right</input></div>
		
		<input type="hidden" id="lfxdesin" name="params[lfxdesin]" value="<?php echo (isset($params->lfxdesin) && $params->lfxdesin!=''?$params->lfxdesin:''); ?>" />
	</div>
	
	
	<div class="params titleffect customitemstyle lfxtab lfxdesout">
		<?php
		$fxdata = array();
		if(isset($params->lfxdesout) and $params->lfxdesout!=''){
			$fxdata = explode(' ',$params->lfxdesout);
		}
		?>	

		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Description Out Effect', 'qcslide'); ?>:</label>
		
		<div><input type="checkbox" name="" <?php echo (in_array('spin',$fxdata)?'checked="checked"':''); ?> value="spin">Spin</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fade',$fxdata)?'checked="checked"':''); ?> value="fade">Fade</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('grow',$fxdata)?'checked="checked"':''); ?> value="grow">Grow</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('smear',$fxdata)?'checked="checked"':''); ?> value="smear">Smear</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fall',$fxdata)?'checked="checked"':''); ?> value="fall">Fall</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('swirl',$fxdata)?'checked="checked"':''); ?> value="swirl">Swirl</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('wave',$fxdata)?'checked="checked"':''); ?> value="wave">Wave</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-top',$fxdata)?'checked="checked"':''); ?> value="fly-top">Fly Top</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-bottom',$fxdata)?'checked="checked"':''); ?> value="fly-bottom">Fly Bottom</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-left',$fxdata)?'checked="checked"':''); ?> value="fly-left">Fly Left</input></div>
		
		<div><input type="checkbox" name="" <?php echo (in_array('fly-right',$fxdata)?'checked="checked"':''); ?> value="fly-right">Fly Right</input></div>
		
		<input type="hidden" id="lfxdesout" name="params[lfxdesout]" value="<?php echo (isset($params->lfxdesout) && $params->lfxdesout!=''?$params->lfxdesout:''); ?>" />
	</div>
	

</div>
