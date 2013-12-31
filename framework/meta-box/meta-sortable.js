/**
 *	Meta Javascript
 *	---------------------------------------------------------------------
 * 	@author		mypassion
 * 	@link		http://themeforest.net/user/mypassion/portfolio
 * 	@copyright	Copyright (c) mypassion
 * 	---------------------------------------------------------------------
 */

jQuery(document).ready(function(){ 
	//Background Select
	jQuery('select#mypassion_bgstyle').change(function(){
		var selected_option = jQuery(this).children("option:selected").val();
		
		if(selected_option == 'image'){
			jQuery(this).parents("div.inside").children('.mypassion_bgslider, .mypassion_bgvideo, .mypassion_bgyoutube, .mypassion_bgvimeo').slideUp();
			jQuery(this).parents("div.inside").children('.mypassion_bgimg').slideDown();
		}else 
		if(selected_option == 'slider'){
			jQuery(this).parents("div.inside.inside").children('.mypassion_bgimg, .mypassion_bgvideo, .mypassion_bgyoutube, .mypassion_bgvimeo').slideUp();;
			jQuery(this).parents("div.inside").children('.mypassion_bgslider').slideDown();
		}else 
		if(selected_option == 'video'){
			jQuery(this).parents("div.inside").children('.mypassion_bgimg, .mypassion_bgslider, .mypassion_bgyoutube, .mypassion_bgvimeo').slideUp();;
			jQuery(this).parents("div.inside").children('.mypassion_bgvideo').slideDown();
		}else 
		if(selected_option == 'youtubevideo'){
			jQuery(this).parents("div.inside").children('.mypassion_bgimg, .mypassion_bgslider, .mypassion_bgvideo, .mypassion_bgvimeo').slideUp();;
			jQuery(this).parents("div.inside").children('.mypassion_bgyoutube').slideDown();
		}else 
		if(selected_option == 'vimeovideo'){
			jQuery(this).parents("div.inside").children('.mypassion_bgimg, .mypassion_bgslider, .mypassion_bgvideo, .mypassion_bgyoutube').slideUp();;
			jQuery(this).parents("div.inside").children('.mypassion_bgvimeo').slideDown();
		}	
	});
	jQuery("select#mypassion_bgstyle").triggerHandler("change");
	
	
	//Post Format Select
	jQuery('select#mypassion_postformat').change(function(){
		var selected_option = jQuery(this).children("option:selected").val();
		
		if(selected_option == 'standart'){
			jQuery(this).parents("div.inside").children('.mypassion_postgallery, .mypassion_postvideo_v, .mypassion_postvideo_y, .mypassion_postvideo_d, .mypassion_audio_soundcloud').slideUp();
			jQuery(this).parents("div.inside").children('.mypassion_postimg').slideDown();
		}else 
		if(selected_option == 'gallery'){
			jQuery(this).parents("div.inside.inside").children('.mypassion_postimg, .mypassion_postvideo_v, .mypassion_postvideo_y, .mypassion_postvideo_d, .mypassion_audio_soundcloud').slideUp();;
			jQuery(this).parents("div.inside").children('.mypassion_postgallery').slideDown();
		}else 
		if(selected_option == 'video'){
			jQuery(this).parents("div.inside").children('.mypassion_postimg, .mypassion_postgallery, .mypassion_audio_soundcloud').slideUp();;
			jQuery(this).parents("div.inside").children('.mypassion_postvideo_v, .mypassion_postvideo_y, .mypassion_postvideo_d').slideDown();
		}else 
		if(selected_option == 'audio'){
			jQuery(this).parents("div.inside").children('.mypassion_postimg, .mypassion_postgallery, .mypassion_postvideo_v, .mypassion_postvideo_y, .mypassion_postvideo_d ').slideUp();;
			jQuery(this).parents("div.inside").children('.mypassion_audio_soundcloud').slideDown();
		}
	});
	jQuery("select#mypassion_postformat").triggerHandler("change");
	
	//Review Select
	jQuery('select#mypassion_review_enable').change(function(){
		var selected_option = jQuery(this).children("option:selected").val();
		
		if(selected_option == 'disable'){
			jQuery(this).parents("div.inside").children('.mypassion_user_ratings_visibility, .mypassion_review_skin, .mypassion_review_type, .mypassion_criteria_header, .mypassion_criteria_wrapper, .mypassion_final_score, .mypassion_brief_summary, .mypassion_longer_summary, .mypassion_criteria_position').slideUp();
		}else 
		if(selected_option == 'enable'){
			jQuery(this).parents("div.inside").children('.mypassion_user_ratings_visibility, .mypassion_review_skin, .mypassion_review_type, .mypassion_criteria_header, .mypassion_criteria_wrapper, .mypassion_final_score, .mypassion_brief_summary, .mypassion_longer_summary, .mypassion_criteria_position').slideDown();
		}
	});
	jQuery("select#mypassion_review_enable").triggerHandler("change");
	
	
	
	
});