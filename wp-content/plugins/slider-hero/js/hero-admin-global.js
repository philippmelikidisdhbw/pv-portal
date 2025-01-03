jQuery(document).ready(function($){
	$('.sh_click_handle').on('click', function(e){
		e.preventDefault();
		var obj = $(this);
		container_id = obj.attr('href');
		$('.sh_click_handle').each(function(){
			$(this).removeClass('nav-tab-active');
			$($(this).attr('href')).hide();
		})
		obj.addClass('nav-tab-active');
		$(container_id).show();
	})
	var hash = window.location.hash;
	if(hash!=''){
		$('.sh_click_handle').each(function(){
			
			$($(this).attr('href')).hide();
			if($(this).attr('href')==hash){
				$(this).removeClass('nav-tab-active').addClass('nav-tab-active');
			}else{
				$(this).removeClass('nav-tab-active');
			}
		})
		$(hash).show();
	}
	
})