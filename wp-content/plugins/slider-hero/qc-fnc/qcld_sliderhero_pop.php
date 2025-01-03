<?php 
function qcld_sliderhero_pop() {
        
?>
<div class="slider_hero_pop_modal" id="slider_hero_pop_modal" style="display:none">
  <div class="slider_hero_pop_modal_close">&times;</div>
  <h1 class="slider_hero_pop_modal_title"><?php _e( 'Slider Hero Preview', 'slider hero' ); ?></h1>

  <div class="slider_hero_pop_modal_content" id="slider_hero_pop_modal_content">
		
  </div>
</div>
<script type="text/javascript">
mainId = 'slider_hero_pop_modal_content';
</script>
<?php
}
add_action( 'admin_footer', 'qcld_sliderhero_pop');