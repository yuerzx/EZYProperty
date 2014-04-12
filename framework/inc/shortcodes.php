<?php

/*-----------------------------------------------------------------------------------*/
/*	Accordion
/*-----------------------------------------------------------------------------------*/
function mypassion_accordion($atts, $content=null, $code) {

	extract(shortcode_atts(array(
		'open' => '1'
	), $atts));

	if (!preg_match_all("/(.?)\[(accordion-item)\b(.*?)(?:(\/))?\](?:(.+?)\[\/accordion-item\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} 
	else {
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
						
			$output .= '<h3>' . $matches[3][$i]['title'] . '</h3><div class="accordion-inner">' . do_shortcode(trim($matches[5][$i])) .'</div>';
		}
		return '<div class="accordion" rel="'.$open.'">' . $output . '</div>';
		
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* Toggle
/*-----------------------------------------------------------------------------------*/

function mypassion_toggle( $atts, $content = null){
	extract(shortcode_atts(array(
        'title' => '',
        'icon' => '',
        'open' => "false"
    ), $atts));

	if($icon == '') {
    	$return = "";
    }
    else{
    	$return = "<i class='icon-".$icon."'></i>";
    }
    
    if($open == "true") {
	    $return2 = "active";
    }
    else{
	    $return2 = '';
    }
   
   return '<div class="toggle-box"><div class="titbox '.$return2.'"><span><span>'.$return.''.$title.'</span></span></div><div class="dropdown"><div><p>'. do_shortcode($content) . '</p></div></div></div>';
}

/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/

function mypassion_tabgroup( $atts, $content = null ) {
	$GLOBALS['tab_count'] = 0;
	$i = 1;
	$randomid = rand();

	do_shortcode( $content );

	if( is_array( $GLOBALS['tabs'] ) ){
	
		foreach( $GLOBALS['tabs'] as $tab ){	
			if( $tab['icon'] != '' ){
				$icon = '<i class="icon-'.$tab['icon'].'"></i>';
			}
			else{
				$icon = '';
			}
			$tabs[] = '<li><a href="#tabs-'.$randomid.$i.'">'.$icon . $tab['title'].'</a></li>';
			$panes[] = '<div class="panel" id="tabs-'.$randomid.$i.'"><p>'.$tab['content'].'</p></div>';
			$i++;
			$icon = '';
		}
		$return = '<div class="tabs"><ul>'.implode( "\n", $tabs ).'</ul>'.implode( "\n", $panes ).'</div>';
	}
	return $return;
}

function mypassion_tab( $atts, $content = null) {
	extract(shortcode_atts(array(
			'title' => '',
			'icon'  => ''
	), $atts));
	
	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'icon' => $icon, 'content' =>  $content );
	$GLOBALS['tab_count']++;
}


/*-----------------------------------------------------------------------------------*/
/* Testimonial
/*-----------------------------------------------------------------------------------*/

function mypassion_testimonial( $atts, $content = null ) {
	$GLOBALS['tms_count'] = 0;
	$i = 1;
	$randomid = rand();

	do_shortcode( $content );

	if( is_array( $GLOBALS['tmss'] ) ){
	
		foreach( $GLOBALS['tmss'] as $tms ){	

			$wrp[] = '<div class="tm"><p>'.$tms['content'].'</p><div class="tm-person" >'.$tms['author'].'</div></div>';
			$i++;
		}
		$return = '<div class="testimonial-wrapper">'.implode( "\n", $wrp ).'</div>';
	}
	return $return;
}


function mypassion_tms( $atts, $content = null) {
	extract(shortcode_atts(array(
			'author' => ''
	), $atts));
	
	$x = $GLOBALS['tms_count'];
	$GLOBALS['tmss'][$x] = array( 'author' => sprintf( $author, $GLOBALS['tms_count'] ), 'content' =>  $content );
	$GLOBALS['tms_count']++;
}



/*-----------------------------------------------------------------------------------*/
/*	Alert
/*-----------------------------------------------------------------------------------*/
function mypassion_alert( $atts, $content = null) {

extract( shortcode_atts( array(
      'type' 	=> 'warning',
      'close'	=> 'true'
      ), $atts ) );
      
      if($close == 'false') {
		  $var1 = '';
	  }
	  else{
		  $var1 = '<span class="closer">x</span>';
	  }
      
      return '<div class="notifications ' . $type . '">' . do_shortcode($content) . '' . $var1 . '</div>';
}

/*-----------------------------------------------------------------------------------*/
/*	Br-Tag
/*-----------------------------------------------------------------------------------*/
function mypassion_br() {
   return '<br />';
}

/*-----------------------------------------------------------------------------------*/
/*	Blockquote
/*-----------------------------------------------------------------------------------*/
function mypassion_quote( $atts, $content = null) {
extract( shortcode_atts( array(), $atts ) );
      
	return '<blockquote><p>' . do_shortcode($content) . '</p></blockquote>';
}

/*-----------------------------------------------------------------------------------*/
/* Dropcap */
/*-----------------------------------------------------------------------------------*/
function mypassion_dropcap($atts, $content = null) {
    extract(shortcode_atts(array(
        'style'      => ''
    ), $atts));
    
    if($style == '') {
    	$return = "";
    }
    else{
    	$return = "dropcap-".$style;
    }
    
	$out = "<span class='dropcap ". $return ."'>" .$content. "</span>";
    return $out;
}

/*-----------------------------------------------------------------------------------*/
/* Tooltip
/*-----------------------------------------------------------------------------------*/

function mypassion_tooltip( $atts, $content = null)
{
	extract(shortcode_atts(array(
        'text' => ''
    ), $atts));
   
   return '<span class="tooltips"><a href="#" rel="tooltip" title="'.$text.'">'. do_shortcode($content) . '</a></span>';
}

/*-----------------------------------------------------------------------------------*/
/* Highlight
/*-----------------------------------------------------------------------------------*/

function mypassion_highlight( $atts, $content = null)
{
	extract(shortcode_atts(array(
        'text' => ''
    ), $atts));
   
   return '<span class="highlight">'. do_shortcode($content) . '</span>';
}

/*-----------------------------------------------------------------------------------*/
/*	Lists
/*-----------------------------------------------------------------------------------*/

function mypassion_list( $atts, $content = null ){
	
	extract( shortcode_atts(array("type" => 'check'), $atts) );	
	
	return '<div class="shortcode-list shortcode-list-' . $type . '">' . $content . '</div>';

}


/*-----------------------------------------------------------------------------------*/
/* Buttons 
/*-----------------------------------------------------------------------------------*/
function mypassion_buttons( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
        'size'    	=> 'medium',
		'target'    => '_self',
		'lightbox'  => false, 
		'color'     => 'white',
		'icon'		=> ''
    ), $atts));
    
    if($lightbox == true) {
    	$return = "prettyPhoto ";
    }
    else{
    	$return = " ";
    }
    if($icon == '') {
    	$return2 = "";
    }
    else{
    	$return2 = "<i class='icon-".$icon."'></i>";
    }

	$out = "<a href=\"" .$link. "\" target=\"" .$target. "\" class=\"".$return."button ".$color." ".$size."\" rel=\"slides[buttonlightbox]\">". $return2 . "". do_shortcode($content). "</a>";
    return $out;
}



/*-----------------------------------------------------------------------------------*/
/*	HR Dividers
/*-----------------------------------------------------------------------------------*/
function mypassion_hr( $atts, $content = null) {
extract( shortcode_atts( array(
      'style' => '1',
      'margin' => ''
      ), $atts ) );
      
    if($margin == '') {
    	$return = "";
    } else{
    	$return = "style='margin:".$margin." !important;'";
    }
      
    return '<div class="hr hr' .$style. '" ' .$return. '></div>';  
}


/*-----------------------------------------------------------------------------------*/
/*	Gap Dividers
/*-----------------------------------------------------------------------------------*/

function mypassion_gap( $atts, $content = null) {

extract( shortcode_atts( array(
      'height' 	=> '10'
      ), $atts ) );
      
      if($height == '') {
		  $return = '';
	  }
	  else{
		  $return = 'style="height: '.$height.'px;"';
	  }
      
      return '<div class="gap" ' . $return . '></div>';
}

/*-----------------------------------------------------------------------------------*/
/*	Clear-Tag
/*-----------------------------------------------------------------------------------*/
function mypassion_clear() {  
    return '<div class="clearfix"></div>';  
}

/*-----------------------------------------------------------------------------------*/
/*	Columns
/*-----------------------------------------------------------------------------------*/
function mypassion_one_fourth( $atts, $content = null ) {
   return '<div class="column-one-fourth">' . do_shortcode($content) . '</div>';
}
function mypassion_one_fourth_last( $atts, $content = null ) {
   return '<div class="column-one-fourth last">' . do_shortcode($content) . '</div>';
}

function mypassion_three_fourth( $atts, $content = null ) {
   return '<div class="column-three-fourth">' . do_shortcode($content) . '</div>';
}
function mypassion_three_fourth_last( $atts, $content = null ) {
   return '<div class="column-three-fourth last">' . do_shortcode($content) . '</div>';
}

function mypassion_one_third( $atts, $content = null ) {
   return '<div class="column-one-third">' . do_shortcode($content) . '</div>';
}
function mypassion_one_third_last( $atts, $content = null ) {
   return '<div class="column-one-third last">' . do_shortcode($content) . '</div>';
}

function mypassion_two_third( $atts, $content = null ) {
   return '<div class="column-two-third">' . do_shortcode($content) . '</div>';
}
function mypassion_two_third_last( $atts, $content = null ) {
   return '<div class="column-two-third last">' . do_shortcode($content) . '</div>';
}

function mypassion_one_half( $atts, $content = null ) {
   return '<div class="column-one-half">' . do_shortcode($content) . '</div>';
}
function mypassion_one_half_last( $atts, $content = null ) {
   return '<div class="column-one-half last">' . do_shortcode($content) . '</div>';
}
function mypassion_one_one( $atts, $content = null ) {
   return '<div class="column">' . do_shortcode($content) . '</div>';
}


/*-----------------------------------------------------------------------------------*/
/* Map 
/*-----------------------------------------------------------------------------------*/

function mypassion_map($atts) {

	// default atts
	$atts = shortcode_atts(array(	
		'lat'   => '0', 
		'lon'    => '0',
		'id' => 'map',
		'z' => '1',
		'w' => '100%',
		'h' => '300',
		'maptype' => 'ROADMAP',
		'address' => '',
		'kml' => '',
		'kmlautofit' => 'yes',
		'marker' => '',
		'markerimage' => '',
		'traffic' => 'no',
		'bike' => 'no',
		'fusion' => '',
		'start' => '',
		'end' => '',
		'infowindow' => '',
		'infowindowdefault' => 'yes',
		'directions' => '',
		'hidecontrols' => 'false',
		'scale' => 'false',
		'scrollwheel' => 'true',
		'style' => ''		
	), $atts);
									
	$returnme = '<div id="' .$atts['id'] . '" style="width:' . $atts['w'] . 'px;height:' . $atts['h'] . 'px;" class="google_map ' . $atts['style'] . '"></div>';
	
	//directions panel
	if($atts['start'] != '' && $atts['end'] != '') 
	{
		$panelwidth = $atts['w']-20;
		$returnme .= '<div id="directionsPanel" style="width:' . $panelwidth . 'px;height:' . $atts['h'] . 'px;border:1px solid gray;padding:10px;overflow:auto;"></div><br>';
	}

	$returnme .= '
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><style type="text/css">.entry-content img {max-width: 100000%; /* override */}</style>
	<script type="text/javascript">
		var latlng = new google.maps.LatLng(' . $atts['lat'] . ', ' . $atts['lon'] . ');
		var myOptions = {
			zoom: ' . $atts['z'] . ',
			center: latlng,
			scrollwheel: ' . $atts['scrollwheel'] .',
			scaleControl: ' . $atts['scale'] .',
			disableDefaultUI: ' . $atts['hidecontrols'] .',
			mapTypeId: google.maps.MapTypeId.' . $atts['maptype'] . '
		};
		var ' . $atts['id'] . ' = new google.maps.Map(document.getElementById("' . $atts['id'] . '"),
		myOptions);
		';
				
		//kml
		if($atts['kml'] != '') 
		{
			if($atts['kmlautofit'] == 'no') 
			{
				$returnme .= '
				var kmlLayerOptions = {preserveViewport:true};
				';
			}
			else
			{
				$returnme .= '
				var kmlLayerOptions = {preserveViewport:false};
				';
			}
			$returnme .= '
			var kmllayer = new google.maps.KmlLayer(\'' . html_entity_decode($atts['kml']) . '\',kmlLayerOptions);
			kmllayer.setMap(' . $atts['id'] . ');
			';
		}

		//directions
		if($atts['start'] != '' && $atts['end'] != '') 
		{
			$returnme .= '
			var directionDisplay;
			var directionsService = new google.maps.DirectionsService();
		    directionsDisplay = new google.maps.DirectionsRenderer();
		    directionsDisplay.setMap(' . $atts['id'] . ');
    		directionsDisplay.setPanel(document.getElementById("directionsPanel"));

				var start = \'' . $atts['start'] . '\';
				var end = \'' . $atts['end'] . '\';
				var request = {
					origin:start, 
					destination:end,
					travelMode: google.maps.DirectionsTravelMode.DRIVING
				};
				directionsService.route(request, function(response, status) {
					if (status == google.maps.DirectionsStatus.OK) {
						directionsDisplay.setDirections(response);
					}
				});


			';
		}
		
		//traffic
		if($atts['traffic'] == 'yes')
		{
			$returnme .= '
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(' . $atts['id'] . ');
			';
		}
	
		//bike
		if($atts['bike'] == 'yes')
		{
			$returnme .= '			
			var bikeLayer = new google.maps.BicyclingLayer();
			bikeLayer.setMap(' . $atts['id'] . ');
			';
		}
		
		//fusion tables
		if($atts['fusion'] != '')
		{
			$returnme .= '			
			var fusionLayer = new google.maps.FusionTablesLayer(' . $atts['fusion'] . ');
			fusionLayer.setMap(' . $atts['id'] . ');
			';
		}
	
		//address
		if($atts['address'] != '')
		{
			$returnme .= '
		    var geocoder_' . $atts['id'] . ' = new google.maps.Geocoder();
			var address = \'' . $atts['address'] . '\';
			geocoder_' . $atts['id'] . '.geocode( { \'address\': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					' . $atts['id'] . '.setCenter(results[0].geometry.location);
					';
					
					if ($atts['marker'] !='')
					{
						//add custom image
						if ($atts['markerimage'] !='')
						{
							$returnme .= 'var image = "'. $atts['markerimage'] .'";';
						}
						$returnme .= '
						var marker = new google.maps.Marker({
							map: ' . $atts['id'] . ', 
							';
							if ($atts['markerimage'] !='')
							{
								$returnme .= 'icon: image,';
							}
						$returnme .= '
							position: ' . $atts['id'] . '.getCenter()
						});
						';

						//infowindow
						if($atts['infowindow'] != '') 
						{
							//first convert and decode html chars
							$thiscontent = htmlspecialchars_decode($atts['infowindow']);
							$returnme .= '
							var contentString = \'' . $thiscontent . '\';
							var infowindow = new google.maps.InfoWindow({
								content: contentString
							});
										
							google.maps.event.addListener(marker, \'click\', function() {
							  infowindow.open(' . $atts['id'] . ',marker);
							});
							';

							//infowindow default
							if ($atts['infowindowdefault'] == 'yes')
							{
								$returnme .= '
									infowindow.open(' . $atts['id'] . ',marker);
								';
							}
						}
					}
			$returnme .= '
				} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
			});
			';
		}

		//marker: show if address is not specified
		if ($atts['marker'] != '' && $atts['address'] == '')
		{
			//add custom image
			if ($atts['markerimage'] !='')
			{
				$returnme .= 'var image = "'. $atts['markerimage'] .'";';
			}

			$returnme .= '
				var marker = new google.maps.Marker({
				map: ' . $atts['id'] . ', 
				';
				if ($atts['markerimage'] !='')
				{
					$returnme .= 'icon: image,';
				}
			$returnme .= '
				position: ' . $atts['id'] . '.getCenter()
			});
			';

			//infowindow
			if($atts['infowindow'] != '') 
			{
				$returnme .= '
				var contentString = \'' . $atts['infowindow'] . '\';
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});
							
				google.maps.event.addListener(marker, \'click\', function() {
				  infowindow.open(' . $atts['id'] . ',marker);
				});
				';
				//infowindow default
				if ($atts['infowindowdefault'] == 'yes')
				{
					$returnme .= '
						infowindow.open(' . $atts['id'] . ',marker);
					';
				}				
			}
		}
		
		$returnme .= '</script>';
		
		
		return $returnme;
}
add_shortcode('map', 'mypassion_map');

/*-----------------------------------------------------------------------------------*/

function mypassion_item( $atts, $content = null ) {
	extract(shortcode_atts(array(
       	'icon'      => 'ok'
    ), $atts));
	$out = '<li><i class="icon-'.$icon.'"></i>'. do_shortcode($content) . '</li>';
    return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Member
/*-----------------------------------------------------------------------------------*/

function mypassion_member( $atts, $content = null) {
extract( shortcode_atts( array(
      'img' 	=> '',
      'name' 	=> '',
      'role'	=> '',
      'twitter' => '',
      'facebook' => '',
      'skype' => '',
      'google' => '',
      'linkedin' => '',
      'mail' => '',
      ), $atts ) );
      
      if($img == '') {
    	$return = "";
      } else{
    	$return = "<div class='member-img-wrapper'><img src='".$img."' /></div>";
      }
      
      if( $twitter != '' || $facebook != '' || $skype != '' || $google != '' || $linkedin != '' || $mail != '' ){
	      $return8 = '<ul>';
	      $return9 = '</ul>';
	      
	      if($twitter != '') {
	    	$return2 = '<li class="member-social-twitter"><a href="' .$twitter. '" target="_blank" title="Twitter"><img src="'.get_template_directory_uri().'/framework/img/socials/twitter.png"/></a></li>';
	      } else{
		     $return2 = ''; 
	      }
	      
	      if($facebook != '') {
	    	$return3 = '<li class="member-social-facebook"><a href="' .$facebook. '" target="_blank" title="Facebook"><img src="'.get_template_directory_uri().'/framework/img/socials/facebook.png" /></a></li>';
	      } else{
		      $return3 = ''; 
	      }
	      
	      if($skype != '') {
	    	$return4 = '<li class="member-social-skype"><a href="' .$skype. '" target="_blank" title="Skype"><img src="'.get_template_directory_uri().'/framework/img/socials/skype.png" /></a></li>';
	      } else{
		      $return4 = ''; 
	      }
	      
	      if($google != '') {
	    	$return5 = '<li class="member-social-google"><a href="' .$google. '" target="_blank" title="Google+"><img src="'.get_template_directory_uri().'/framework/img/socials/google.png" /></a></li>';
	      } else{
		      $return5 = ''; 
	      }
	      
	      
	      if($linkedin != '') {
	    	$return6 = '<li class="member-social-linkedin"><a href="' .$linkedin. '" target="_blank" title="LinkedIn"><img src="'.get_template_directory_uri().'/framework/img/socials/linkedin.png" /></a></li>';
	      }
	      else{
		      $return6 = ''; 
	      }
	      
	      if($mail != '') {
	    	$return7 = '<li class="member-social-email"><a href="mailto:' .$mail. '" title="Mail"><img src="'.get_template_directory_uri().'/framework/img/socials/mail.png" /></a></li>';
	      }
	      else{
		      $return7 = ''; 
	      }
      }  else {
	      $return2 = '';
	      $return3 = ''; 
	      $return4 = ''; 
	      $return5 = ''; 
	      $return6 = ''; 
	      $return7 = '';
	      $return8 = ''; 
	      $return9 = ''; 
      }   
      return '<div class="member">' .$return. '
      	<h5>' .$name. '</h5>
      	<span>' .$role. '</span><br /><br />' .$content. '' .$return8. '' .$return2. '' .$return3. '' .$return4. '' .$return5. '' .$return6. '' .$return7. '' .$return9. '</div>';
}

/*-----------------------------------------------------------------------------------*/

function mypassion_skill( $atts, $content = null ) {
	extract(shortcode_atts(array(
       	'percentage' => '0',
       	'title'      => ''
    ), $atts));
	$out = '<div class="skills"><div class="progress"><div class="percent" data-value="'.$percentage.'"><p>'.$title.'</p></div></div></div>';
    return $out;
}

//////////////////////////////////////////////////////////////////
// Pricing table
//////////////////////////////////////////////////////////////////

	function mypassion_pricing_table($atts, $content = null) {
		$str = '';
		if($atts['type'] == '2') {
			$type = 'sep';
		} else {
			$type = 'full';
		}
		$str .= '<div class="'.$type.'-boxed-pricing">';
		$str .= do_shortcode($content);
		$str .= '</div>';

		return $str;
	}

//////////////////////////////////////////////////////////////////
// Pricing Column
//////////////////////////////////////////////////////////////////
add_shortcode('pricing_column', 'shortcode_pricing_column');
	function shortcode_pricing_column($atts, $content = null) {
		$str = '<div class="pricing">';
		$str .= '<ul>';
		if($atts['title']):
		$str .= '<li class="title-row">'.$atts['title'].'</li>';
		endif;
		$str .= do_shortcode($content);
		$str .= '</ul>';
		$str .= '</div>';

		return $str;
	}

//////////////////////////////////////////////////////////////////
// Pricing Row
//////////////////////////////////////////////////////////////////
add_shortcode('pricing_price', 'shortcode_pricing_price');
	function shortcode_pricing_price($atts, $content = null) {
		$str = '';
		$str .= '<li class="pricing-row"><span class="price">';
		$str .= do_shortcode($content);
		$str .= '</span></li>';

		return $str;
	}

//////////////////////////////////////////////////////////////////
// Pricing Row
//////////////////////////////////////////////////////////////////
add_shortcode('pricing_row', 'shortcode_pricing_row');
	function shortcode_pricing_row($atts, $content = null) {
		$str = '';
		$str .= '<li class="simple-row">';
		$str .= do_shortcode($content);
		$str .= '</li>';

		return $str;
	}

//////////////////////////////////////////////////////////////////
// Pricing Footer
//////////////////////////////////////////////////////////////////
add_shortcode('pricing_footer', 'shortcode_pricing_footer');
	function shortcode_pricing_footer($atts, $content = null) {
		$str = '';
		$str .= '<li class="button-row"><a href="'.$atts['link'].'">';
		$str .= do_shortcode($content);
		$str .= '</a></li>';

		return $str;
	}



/*-----------------------------------------------------------------------------------*/
/* Headline
/*-----------------------------------------------------------------------------------*/

function mypassion_headline( $atts, $content = null){
	extract(shortcode_atts(array(
       	'headline'      => 'h5'
    ), $atts));
   
	return '<'.$headline.' class="titles">'.$content.'</'.$headline.'>';
}


/*-----------------------------------------------------------------------------------*/
/* Vimeo
/*-----------------------------------------------------------------------------------*/
function mypassion_vimeo( $atts, $content = null ){
	extract(shortcode_atts(array(
		'width' => '',
		'height' => ''
	), $atts));
	
	return '<div class="video-shortcode"><iframe src="http://player.vimeo.com/video/' . $content . '?title=0&byline=0&portrait=0" width="'. $width .'" height="'. $height .'" frameborder="0" webkitAllowFullScreen allowfullscreen></iframe></div>';
}

/*-----------------------------------------------------------------------------------*/
/* Youtube
/*-----------------------------------------------------------------------------------*/
function mypassion_youtube( $atts, $content = null ){
	extract(shortcode_atts(array(
		'width' => '',
		'height' => ''
	), $atts));
	
	return '<div class="video-shortcode"><iframe width="'. $width .'" height="'. $height .'" src="http://www.youtube.com/embed/'. $content .'" frameborder="0" allowfullscreen></iframe></div>';
}

/*-----------------------------------------------------------------------------------*/
/*	Project Details
/*-----------------------------------------------------------------------------------*/
function mypassion_projectdetails($atts, $content=null, $code) {

	extract(shortcode_atts(array(
		'open' => '1',
		'detail' => 'Project Details :'
	), $atts));

	if (!preg_match_all("/(.?)\[(detail-box)\b(.*?)(?:(\/))?\](?:(.+?)\[\/detail-box\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} 
	else {
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
						
			$output .= '<div class="project-detail-box"><p><span>'. $matches[3][$i]['title'] .':</span> ' . do_shortcode(trim($matches[5][$i])) .'</p></div>';
		}
		return '<div class="project-column" rel="'.$open.'"><h6>'. $detail .'</h6> ' . $output . '</div>';
		
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* Icon Generator
/*-----------------------------------------------------------------------------------*/
function mypassion_icons( $atts, $content = null){
	extract(shortcode_atts(array(
       	'icontype'      => ''
    ), $atts));
   
	return '<i class="'.$icontype.'"></i>';
}

/*-----------------------------------------------------------------------------------*/
/* Slider
/*-----------------------------------------------------------------------------------*/

	function shortcode_slider($atts, $content = null) {
		$str = '';
		$str .= '<div class="flexslider">';
		$str .= '<ul class="slides">';
		$str .= do_shortcode($content);
		$str .= '</ul>';
		$str .= '</div>';

		return $str;
	}

/*-----------------------------------------------------------------------------------*/
/* Slide
/*-----------------------------------------------------------------------------------*/

	function shortcode_slide($atts, $content = null) {
		$str = '';
		if($atts['type'] == 'video') {
			$str .= '<li class="video">';
		} else {
			$str .= '<li class="image">';
		}
		if($atts['link']):
		$str .= '<a href="'.$atts['link'].'">';
		endif;
		if($atts['type'] == 'video') {
			$str .= $content;
		} else {
			$str .= '<img src="'.$content.'" alt="" />';
		}
		if($atts['link']):
		$str .= '</a>';
		endif;
		$str .= '</li>';

		return $str;
	}

/*-----------------------------------------------------------------------------------*/
/* Contact Info
/*-----------------------------------------------------------------------------------*/

function mypassion_contact_info( $atts, $content = null ){
	extract(shortcode_atts(array(
		'title' => 'Location',
		'name' =>'姓名',
	), $atts));
  $contact = get_contact($name);
  if($contact["photo_url"]==''){
    $contact["photo_url"]=get_bloginfo('template_url').'/framework/images/default.png';
  }
	return '<div class="contact-info card">
                  <div class="contact_photo"><img src="'.$contact["photo_url"].'" /></div>
                    <div>
                    <ul class="table-view">
                    <li class="table-view-cell">
                        <h4>'.$contact["name"].'</h4></li>
                    <li class="table-view-cell">
                        <a href="tel:'.$contact["phone"].'" class="pull-left"><i class="phoneico"></i><p class=info>'.$contact["phone"].'</p></a></li>
                    <li class="table-view-cell">
                        <a href="'.$contact["wechat_url"].'" target="_blank"><i class="wechatico"></i><p class=info>'.$contact["wechat"].'</p></a></li>
                    <li class="table-view-cell">
                        <a href="'.$contact["weibo_url"].'" target="_blank"><i class="weboico"></i><p class=info>'.$contact["weibo"].'</p></a></li>
                    <li class="table-view-cell">'.$contact["description"].'</li></ul>
                    </div>
                </div>';
}
/*------------------------
 *添加指向wiki的链接短代码
------------------------*/
function wiki_link($atts,$content = null){
  return '<a href="http://wiki.maifang.com.au/'.$content.'">'.$content.'</a>';
}
/*----------------------------
 *房产搜索页面
-----------------------------*/
function house_search_form($atts,$content = null){
	extract(shortcode_atts(array(
		'project_name'=>'',
	),$atts));
	$string.= '<h5 class="line"><span>自助选房</span></h5><span class="liner"></span> <div class="form">
<form class="jqtransform" method="get" action="'.get_option('search_result_page').'" target="_blank">
<table>
	<tr><td><label for="house_num">房间数</label></td>
		<td>
			<p class="clearfix">
			<select name="bedroom">';
				for($i=1;$i<=5;$i++){
					$string.= '<option value="'.$i.'"';
					if($_POST['bedroom']==$i){
						$string.='selected="selected"';
					}
					$string.='>'.$i.'</option>';
				}
			$string.='</select></p>
		</td>
	</tr>
	<tr><td><label for="price">价格</label></td>
		<td>
			<p class="clearfix">
			<select name="price">';
				 $temp_arr = array(''=>'任意','300-349'=>'300-349K','350-399'=>'350-399K','400-449'=>'400-449K','450-499'=>'450-499K','500-549'=>'500-549K','550-599'=>'550-599K','600-649'=>'600-649K','650-700'=>'650-700K');
					foreach($temp_arr as $temp=>$value){ 
				
				$string.='<option value="'.$temp.'"';
					if($_POST['price']==$temp){
						$string.='selected="selected"';
					}
				$string.='>'.$value.'</option>';
				}
			$string.='</select></p>
		</td>
	</tr>
	<tr><td><label for="towards">朝向</label></td>
		<td>
			<p class="clearfix">
			<select name="towards">';
				$temp_arr = array(''=>'任意','东'=>'东','西'=>'西','南'=>'南','北'=>'北');
					foreach($temp_arr as $temp=>$value){
						$string.= '<option value="'.$temp.'"';
						if($_POST['towards']==$temp){
							$string.='selected="selected"';
						}
						$string.='>'.$value.'</option>';
					}
			$string.='</select></p>
		</td>
	</tr>
	<tr>
		<td><label for="car_park">车位</label></td>
		<td>
			<p class="clearfix">
				<select name="car_park">';
				 $temp_arr = array(''=>'任意','1'=>'1','2'=>'2','3'=>'3');
				 foreach($temp_arr as $temp=>$value){
					$string.= '<option value="'.$temp.'"';
					if($_POST['car_park']==$temp){
						$string.='selected="selected"';
					}
					$string .='>'.$value.'</option>';
				}
				$string.='</select></p>
		</td>
	</tr>
	<tr>
		<td><label for="bath">卫生间</label></td>
		<td>
			<p class="clearfix">
			<select name="bath">';
				 $temp_arr = array(''=>'任意','1'=>'1','2'=>'2','3'=>'3');
				 foreach($temp_arr as $temp=>$value){
					$string.='<option value="'.$temp.'"';
					if($_POST['bath']==$temp){
						$string.= 'selected="selected"';
					}
					$string.='>'.$value.'</option>';
				}
			$string.='</select></p>
		</td>
	</tr>
	<tr>
		<td><label for="house_level">楼层</label></td>
		<td>
			<p class="clearfix">
			<select name="house_level">
				<option value="">任意</option>';
				for($i=1;$i<=30;$i++){
					$string.='<option value="'.$i.'"';
						if($_POST['house_level']==$i){
							$string.= 'selected="selected"';
						}
						$string.='>'.$i.'</option>';
				} 
			$string.='</select></p>
		</td>
	</tr>
	<tr>
		<td><label for="int_m2">内部面积</label></td>
		<td>
			<p class="clearfix">
			<select name="int_m2">';
				 $temp_arr = array(''=>'任意','40-50'=>'40-50','51-60'=>'51-60','61-70'=>'61-70','71-80'=>'71-80');
					foreach($temp_arr as $temp=>$value){ 
				
				$string.='<option value="'.$temp.'"';
				if($_POST['int_m2']==$temp){
					$string.= 'selected="selected"';
					}
				$string.='>'.$value.'</option>';
			 }
			$string.='</select></p>
			<input type="hidden" name="project_name" value="'.$project_name.'" />
		</td>
	</tr>
	<tr><td></td><td><input type="hidden" name="current_page" value="1" /><input type="submit" value="提交"/></td></tr>
</table> 
</form>
</div>';
return $string;
}
/* ----------------------------------------------------- */
/* Activate Shortcodes */
/* ----------------------------------------------------- */

function activate_shortcodes($content) {
    global $shortcode_tags;
 
    // Backup current registered shortcodes and clear them all out
    $original_shortcode_tags = $shortcode_tags;
    remove_all_shortcodes();
    
    add_shortcode('accordion', 'mypassion_accordion');
	add_shortcode('toggle', 'mypassion_toggle');
    add_shortcode('alert', 'mypassion_alert');
	add_shortcode('quote', 'mypassion_quote');
	add_shortcode('dropcap', 'mypassion_dropcap');
	add_shortcode('tooltip', 'mypassion_tooltip');
	add_shortcode('highlight', 'mypassion_highlight');
	add_shortcode('list', 'mypassion_list');
	add_shortcode('headlines', 'mypassion_headline');
	add_shortcode('vimeo', 'mypassion_vimeo');
	add_shortcode('youtube', 'mypassion_youtube');
	add_shortcode('clear', 'mypassion_clear');
	add_shortcode('skill', 'mypassion_skill');
	add_shortcode('pricing_table', 'mypassion_pricing_table');
	add_shortcode('member', 'mypassion_member');
	add_shortcode('pricing-table', 'mypassion_pricing');
	add_shortcode('projectdetails', 'mypassion_projectdetails');
	add_shortcode('icon', 'mypassion_icons');
	add_shortcode('tabgroup', 'mypassion_tabgroup' );
	add_shortcode('tab', 'mypassion_tab' );
	
	add_shortcode('tms', 'mypassion_tms' );
	add_shortcode('testimonial', 'mypassion_testimonial' );
	add_shortcode('slider', 'shortcode_slider');
	add_shortcode('slide', 'shortcode_slide');
	add_shortcode('contact_info', 'mypassion_contact_info');
	add_shortcode('wiki','wiki_link');
	add_shortcode('house_search','house_search_form');

	
	// Columns
	add_shortcode('one_fourth', 'mypassion_one_fourth');
	add_shortcode('three_fourth', 'mypassion_three_fourth');
	add_shortcode('one_third', 'mypassion_one_third');
	add_shortcode('two_third', 'mypassion_two_third');
	add_shortcode('one_half', 'mypassion_one_half');
	add_shortcode('one_one', 'mypassion_one_one');
	add_shortcode('one_fourth_last', 'mypassion_one_fourth_last');
	add_shortcode('three_fourth_last', 'mypassion_three_fourth_last');
	add_shortcode('one_third_last', 'mypassion_one_third_last');
	add_shortcode('two_third_last', 'mypassion_two_third_last');
	add_shortcode('one_half_last', 'mypassion_one_half_last');
	
	
	
	
    //add_shortcode('button', 'mypassion_buttons'); 
    //add_shortcode('br', 'mypassion_br');
    //add_shortcode('gap', 'mypassion_gap');
    //add_shortcode('hr', 'mypassion_hr');
	//add_shortcode('pullquote', 'mypassion_pullquote');
	
	
	
	
 
    // Do the shortcode (only the one above is registered)
    $content = do_shortcode($content);
 
    // Put the original shortcodes back
    $shortcode_tags = $original_shortcode_tags;
 
    return $content;
}

 
add_filter('the_content', 'activate_shortcodes', 7);

// Allow Shortcodes in Widgets
add_filter('widget_text', 'activate_shortcodes', 7);
add_filter('show_my_shortcode','activate_shortcodes',7);

/*-----------------------------------------------------------------------------------*/
/* Add TinyMCE Buttons to Editor */
/*-----------------------------------------------------------------------------------*/
add_action('init', 'add_buttons');

function add_buttons() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_js_plugin');  
     add_filter('mce_buttons_3', 'register_buttons');  
   }  
}  

// Define Position of TinyMCE Icons
function register_buttons($buttons) {
   array_push($buttons, "one_one", "one_half", "one_third", "two_third", "one_fourth", "three_fourth", "separator"); 
   array_push($buttons, "accordion", /*"toggle",*/ "tabs", "separator");
   array_push($buttons, "vimeo", "youtube", "slider", "maps", "contact_info", "separator");
   array_push($buttons, /*"testimonial",*/ "alert", "quote", "dropcap", "tooltip", "highlight", "list", "headlines", "clear", /*"skill", "separator", "member", "pricing_table", "projectdetails", */"icon","wiki","house");  
   return $buttons;
}  

function add_js_plugin($plugin_array) {  
   $plugin_array['accordion'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['toggle'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['tabs'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['testimonial'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['alert'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['quote'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['dropcap'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['tooltip'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['highlight'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['list'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['one_one'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['one_half'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['one_third'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['two_third'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['one_fourth'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['three_fourth'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['headlines'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['vimeo'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['youtube'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['maps'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['contact_info'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['clear'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js'; 
   $plugin_array['skill'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['pricing_table'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['member'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['pricing'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['projectdetails'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['icon'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['slider'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['wiki'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   $plugin_array['house'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';   
 
   //$plugin_array['button'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   //$plugin_array['divider'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   //$plugin_array['gap'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   //$plugin_array['socialmedia'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   //$plugin_array['table'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   //$plugin_array['separatorheadline'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   //$plugin_array['googlefont'] = get_template_directory_uri().'/framework/inc/tinymce/tinymce.js';
   
   
   
   return $plugin_array;  
}  

?>