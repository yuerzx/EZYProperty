/*
 * Copyright (c) 07/06/2013 MyPassion
 * Author: MyPassion 
 * This file is made for NEWS
*/


jQuery(function(){
	// -----------------------------------------------------  FLEXSLIDER
	jQuery('.flexslider').flexslider({
		animation: 'fade',
		controlNav: false,
		slideshowSpeed: 4000,
		animationDuration: 300
	});	
	
})



jQuery(document).ready(function(){
		
	"use strict";

	jQuery("ul.block2 li:nth-child(2n), div.outerwide div.outertight:nth-child(2n), .relatednews ul li:nth-child(4n)").addClass("m-r-no");


// -----------------------------------------------------  UI ELEMENTS
	jQuery( ".accordion" ).accordion({
		heightStyle: "content"
	});
	
	jQuery( "#tabs, .tabs" ).tabs();
	
	jQuery( ".tooltips" ).tooltip({
		position:{
			my: "center bottom-5",
			at: "center top"	
		}	
	});
	
	
// -----------------------------------------------------  NOTIFICATIONS CLOSER
	jQuery('span.closer').click(function(e){
		e.preventDefault();
		jQuery(this).parent('.notifications').stop().slideToggle(500);
	});

// -----------------------------------------------------  NAV SUB MENU(SUPERFISH)
	jQuery('#nav ul.sf-menu').superfish({
		delay: 200,
		animation: {opacity:'show', height:'show'},
		speed: 'fast',
		autoArrows: true,
		dropShadows: false
	});


// -----------------------------------------------------  FLICKR FEED
	jQuery('#basicuse').jflickrfeed({
		limit: 8,
		qstrings: {
			id: '52617155@N08'
		},
		itemTemplate: 
		'<li>' +
			'<a href="{{link}}" target="_blank"><img src="{{image_s}}" alt="{{title}}"  /></a>' +
		'</li>'
	});	
	
// -----------------------------------------------------  GOOGLE MAP
	var myLatlng = new google.maps.LatLng(-34.397, 150.644);
	var myOptions = {
	  center:myLatlng,
	  zoom:8,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map"),  myOptions);
	var marker = new google.maps.Marker({
	  position: myLatlng,
	  map: map,
	  title:"Click Me for more info!"
	});
	
	var infowindow = new google.maps.InfoWindow({});
	
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.setContent("Write here some description"); //sets the content of your global infowindow to string "Tests: "
		infowindow.open(map,marker); //then opens the infowindow at the marker
	});
	marker.setMap(map);

});
