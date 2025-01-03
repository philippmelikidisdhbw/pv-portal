jQuery(document).ready(function($){
	
	$('#hero_shortcode_generator_meta').on('click', function(){
		alert('hello');
		$.post(
			ajaxurl,
			{
				action : 'show_shortcodes_slider'
				
			},
			function(data){
				$('#wpwrap').append(data);
			}
		)
		
	})
    var selector = '';

    $(document).on( 'click', '.modal-content .close', function(){
        $(this).parent().parent().remove();
    }).on( 'click', '#add_shortcode',function(){
      var post = $('#slidergenerate').val();
      
	  
	  
	  
		var shortcodedata = '[qcld_hero';
	  if(post!==''){
		  shortcodedata +=' id="'+post+'"';

		shortcodedata +=']';
		tinyMCE.activeEditor.selection.setContent(shortcodedata);
		 $('#sm-modal').remove();
	  }else{
		  alert('Please Select Post!');return;
	  }

    });
	
	
})