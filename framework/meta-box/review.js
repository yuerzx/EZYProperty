jQuery( document ).ready( function ($)
{	
	// Divider
	$('div.inside > div.mypassion_fixer').before('<br style="clear:both" /><div style="margin-top:20px"></div>');

	//Change Meta Looks
	$('div.inside > div.mypassion_c1').wrapAll('<div class="mypassion_c1_wrapper mypassion_criteria_wrapper" />');
	$('div.inside > div.mypassion_c2').wrapAll('<div class="mypassion_c2_wrapper mypassion_criteria_wrapper" />');
	$('div.inside > div.mypassion_c3').wrapAll('<div class="mypassion_c3_wrapper mypassion_criteria_wrapper" />');
	$('div.inside > div.mypassion_c4').wrapAll('<div class="mypassion_c4_wrapper mypassion_criteria_wrapper" />');
	$('div.inside > div.mypassion_c5').wrapAll('<div class="mypassion_c5_wrapper mypassion_criteria_wrapper" />');
	$('div.inside > div.mypassion_c6').wrapAll('<div class="mypassion_c6_wrapper mypassion_criteria_wrapper" />');
	$('div.inside > div.mypassion_c7').wrapAll('<div class="mypassion_c7_wrapper mypassion_criteria_wrapper" />');
	$('div.inside > div.mypassion_c8').wrapAll('<div class="mypassion_c8_wrapper mypassion_criteria_wrapper" />');
	
	// Current Percentage
	var init_rating = $('input#mypassion_final_score').val();
	init_percentage = init_rating * 20;
	$('p#mypassion_final_score_description em').text(init_percentage);	
	

	// Calculation	
	$('input#mypassion_c1_rating, input#mypassion_c2_rating, input#mypassion_c3_rating, input#mypassion_c4_rating, input#mypassion_c5_rating, input#mypassion_c6_rating, input#mypassion_c7_rating, input#mypassion_c8_rating').change( function() {
		
		var divider	= 0;
		var final_score = 0;
	
		var rating_1 = $('input#mypassion_c1_rating').val();		
		var rating_2 = $('input#mypassion_c2_rating').val();		
		var rating_3 = $('input#mypassion_c3_rating').val();		
		var rating_4 = $('input#mypassion_c4_rating').val();		
		var rating_5 = $('input#mypassion_c5_rating').val();		
		var rating_6 = $('input#mypassion_c6_rating').val();
		var rating_7 = $('input#mypassion_c7_rating').val();		
		var rating_8 = $('input#mypassion_c8_rating').val();
		
		if (rating_1 !== '') {divider = divider + 1;} else {rating_1 = 0;}
		if (rating_2 !== '') {divider = divider + 1;} else {rating_2 = 0;}
		if (rating_3 !== '') {divider = divider + 1;} else {rating_3 = 0;}
		if (rating_4 !== '') {divider = divider + 1;} else {rating_4 = 0;}
		if (rating_5 !== '') {divider = divider + 1;} else {rating_5 = 0;}
		if (rating_6 !== '') {divider = divider + 1;} else {rating_6 = 0;}
		if (rating_7 !== '') {divider = divider + 1;} else {rating_7 = 0;}
		if (rating_8 !== '') {divider = divider + 1;} else {rating_8 = 0;}		
	
		final_score =  parseFloat(rating_1) + parseFloat(rating_2) + parseFloat(rating_3) + parseFloat(rating_4) + parseFloat(rating_5) + parseFloat(rating_6) + parseFloat(rating_7) + parseFloat(rating_8) ;
		
		final_score = final_score / divider;
		
		final_score = Math.round(final_score*10)/10;
		
		percentage = final_score * 20;
		
		$('input#mypassion_final_score').val(final_score);		
		
		$('p#mypassion_final_score_description em').text(percentage);		
		
	});
	
	
	// Give Small Preview
	$('input#mypassion_c1_rating').change( function() {	
		var rating = $(this).val();				
		percent = rating * 20;		
		$('em#mypassion_preview_rating_1').text(' (' +percent + '%)');			
	});
	
	$('input#mypassion_c2_rating').change( function() {	
		var rating = $(this).val();				
		percent = rating * 20;		
		$('em#mypassion_preview_rating_2').text(' (' +percent + '%)');		
	});
	
	$('input#mypassion_c3_rating').change( function() {	
		var rating = $(this).val();				
		percent = rating * 20;		
		$('em#mypassion_preview_rating_3').text(' (' +percent + '%)');		
	});
	
	$('input#mypassion_c4_rating').change( function() {	
		var rating = $(this).val();				
		percent = rating * 20;		
		$('em#mypassion_preview_rating_4').text(' (' +percent + '%)');			
	});
	
	$('input#mypassion_c5_rating').change( function() {	
		var rating = $(this).val();				
		percent = rating * 20;		
		$('em#mypassion_preview_rating_5').text(' (' +percent + '%)');			
	});
	
	$('input#mypassion_c6_rating').change( function() {	
		var rating = $(this).val();				
		percent = rating * 20;		
		$('em#mypassion_preview_rating_6').text(' (' +percent + '%)');			
	});
	
	$('input#mypassion_c7_rating').change( function() {	
		var rating = $(this).val();				
		percent = rating * 20;		
		$('em#mypassion_preview_rating_7').text(' (' +percent + '%)');			
	});
	
	$('input#mypassion_c8_rating').change( function() {	
		var rating = $(this).val();				
		percent = rating * 20;		
		$('em#mypassion_preview_rating_8').text(' (' +percent + '%)');			
	});
	
	
} );