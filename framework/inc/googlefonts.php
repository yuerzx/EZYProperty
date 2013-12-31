<?php
function mytheme_fonts() {
	global $admin_data;
	$customfont = '';
	
	$default = array(
					'arial',
					'verdana',
					'trebuchet',
					'georgia',
					'times',
					'tahoma',
					'helvetica');
	
	$googlefonts = array(
					$admin_data['body_font']['face'],
					$admin_data['nav_font']['face'],
					$admin_data['review_p']['face'],
					$admin_data['review_h1']['face'],
					$admin_data['review_h6']['face'],
					$admin_data['review_header']['face'],
					
					$admin_data['font_h1']['face'],
					$admin_data['font_h2']['face'],
					$admin_data['font_h3']['face'],
					$admin_data['font_h4']['face'],
					$admin_data['font_h5']['face'],
					$admin_data['font_h6']['face']
					);
				
	foreach($googlefonts as $getfonts) {
		
		if(!in_array($getfonts, $default)) {
				$customfont = str_replace(' ', '+', $getfonts). ':400,400italic,700,700italic|' . $customfont;
		}
	}
	
	if($customfont != ''){
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'mytheme-opensans', "$protocol://fonts.googleapis.com/css?family=" . substr_replace($customfont ,"",-1) . "" );
	}	
}
add_action( 'wp_enqueue_scripts', 'mytheme_fonts' );
?>