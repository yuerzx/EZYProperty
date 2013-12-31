<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		//$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"module_two"	=> "Module Two",
				"module_three"	=> "Module Three",
				"module_four"	=> "Module Four",	
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"module_one"	=> "Module One",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();
$url =  ADMIN_DIR . 'assets/images/';



/*----------------------------------------------------------------------------------- GENERAL SETTINGS */
$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> __('Hello There', 'framework'),
						"desc" 		=> "",
						"id" 		=> "introduction",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Welcome to The News Option Panel</h3>
						Thank you for purchasing my item. If you need any help, please don't hesitate and send a message via my profile page <a href=\"http://www.themeforest.com/user/MyPassion/\">Here</a>",
						"icon" 		=> true,
						"type" 		=> "info"
);

$of_options[] = array( 	"name" => __('Tracking Code', 'framework'),
						"desc" => "Paste your Google Analytics Code (or other) here.",
						"id" => "trackingcode",
						"std" => "",
						"type" => "textarea"
);

$of_options[] = array( 	"name" 		=> __('Layout Skin', 'framework'),
						"desc" 		=> "",
						"id" 		=> "layout_skin",
						"std" 		=> "white",
						"type" 		=> "select",
						"options" 	=> array("white","black")
);

$of_options[] = array( 	"name" 		=> __('Layout Style', 'framework'),
						"desc" 		=> __('Boxed / Wide', 'framework'),
						"id" 		=> "boxed_or_fullwidth",
						"std" 		=> 1,
						"on" 		=> "Boxed",
						"off" 		=> "Wide",
						"type" 		=> "switch"
);

$of_options[] = array( 	"name" 		=> __('Background Pattern','framework'),
						"desc" 		=> __('Select One of them','framework'),
						"id" 		=> "bg-repeat-image",
						"std" 		=> $url ."pattern/1.png",
						"type" 		=> "images",
						"options" 	=> array(
											$url . 'pattern/1.png' 	=> $url . 'bg/1.png',
											$url . 'pattern/2.png' 	=> $url . 'bg/2.png',
											$url . 'pattern/3.png' 	=> $url . 'bg/3.png',
											$url . 'pattern/4.png' 	=> $url . 'bg/4.png',
											$url . 'pattern/5.png' 	=> $url . 'bg/5.png',
											$url . 'pattern/6.png' 	=> $url . 'bg/6.png',
											$url . 'pattern/7.png' 	=> $url . 'bg/7.png',
											$url . 'pattern/8.png' 	=> $url . 'bg/8.png',
											$url . 'pattern/9.png' 	=> $url . 'bg/9.png',
											$url . 'pattern/10.png' => $url . 'bg/10.png',
											$url . 'pattern/11.png' => $url . 'bg/11.png',
											$url . 'pattern/12.png' => $url . 'bg/12.png',
											$url . 'pattern/13.png' => $url . 'bg/13.png',
											$url . 'pattern/14.png' => $url . 'bg/14.png',
											$url . 'pattern/15.png' => $url . 'bg/15.png',
											$url . 'pattern/16.png' => $url . 'bg/16.png',
											$url . 'pattern/17.png' => $url . 'bg/17.png'
										)
);
$of_options[] = array( 	"name" 		=> __('Default Bakcground Image','framework'),
						"desc" 		=> __('Upload image or put image url to input box','framework'),
						"id" 		=> "bg-cover-image",
						"std" 		=> "",
						"type" 		=> "upload"
);

$of_options[] = array( 	"name" 		=> __('Main Color','framework'),
						"desc" 		=> __('default: #EA4748','framework'),
						"id" 		=> "main-color",
						"std" 		=> "#EA4748",
						"type" 		=> "color"
);
$of_options[] = array( 	"name" 		=> __('Buton Gradient Color - Top','framework'),
						"desc" 		=> __('default: #ee6c6d','framework'),
						"id" 		=> "button_color_top",
						"std" 		=> "#ee6c6d",
						"type" 		=> "color"
);
$of_options[] = array( 	"name" 		=> __('Buton Gradient Color - Bottom','framework'),
						"desc" 		=> __('default: #bc393a','framework'),
						"id" 		=> "button_color_bottom",
						"std" 		=> "#bc393a",
						"type" 		=> "color"
);




/*----------------------------------------------------------------------------------- HOME SETTINGS */
$of_options[] = array( 	"name" 		=> "Home Settings",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> __('Homepage Style', 'framework'),
						"desc" 		=> __('Select One of Them', 'framework'),
						"id" 		=> "home_style",
						"std" 		=> "home_rightsidebar",
						"type" 		=> "images",
						"options" 	=> array(
											'home_leftsidebar' 	=> $url . '/2cl.png',
											'home_rightsidebar' => $url . '/2cr.png'
										)
);

$of_options[] = array( 	"name" 		=> __('Homepage Layout Manager', 'framework'),
						"desc" 		=> __('Organize how you want the layout to appear on the homepage. Drag and Drop moduls.', 'framework'),
						"id" 		=> "homepage_moduls",
						"std" 		=> $of_options_homepage_blocks,
						"type" 		=> "sorter"
);

$of_options[] = array(  "name" 		=> __('Logo Uploader', 'framework'),
						"desc" 		=> __('Image size should not be higher than "200x60".', 'framework'),
						"id" 		=> "logo",
						"std" 		=> "",
						"mod" 		=> "min",
						"type"      => "media"
);
					
$of_options[] = array( 	"name" 		=> __('Logo Margin Parameters', 'framework'),
						"desc" 		=> __('Default value is "35px 0px 20px 0px". Please use like this.', 'framework'),
						"id" 		=> "logo-margin",
						"std" 		=> "35px 0px 20px 0px",
						"type" 		=> "text"
);
				
$of_options[] = array(  "name" 		=> __('Favicon Uploader (16x16)', 'framework'),
						"desc" 		=> "Upload your Favicon (16x16px ico/png - use <a href='http://www.favicon.cc/' target='_blank'>favicon.cc</a> to make sure it's fully compatible)",
						"id" 		=> "favicon",
						"std" 		=> "",
						"mod" 		=> "min",
						"type"      => "media"
);
					
$of_options[] = array( 	"name" 		=> __('Apple iPhone Icon Upload (57x57)', 'framework'),
						"desc" 		=> "Upload your Apple Touch Icon (57x57px png)",
						"id" 		=> "media_favicon_iphone",
						"std" 		=> "",
						"mod" 		=> "min",
						"type" 		=> "media"
);
					
$of_options[] = array( 	"name" 		=> __('Apple iPhone Retina Icon Upload (114x114)', 'framework'),
						"desc" 		=> "Upload your Apple Touch Retina Icon (114x114px png)",
						"id" 		=> "media_favicon_iphone_retina",
						"std" 		=> "",
						"mod" 		=> "min",
						"type" 		=> "media"
);
					
$of_options[] = array( 	"name" 		=> __('Apple iPad Icon Upload (72x72)', 'framework'),
						"desc" 		=> "Upload your Apple Touch Retina Icon (144x144px png)",
						"id" 		=> "media_favicon_ipad",
						"std" 		=> "",
						"mod" 		=> "min",
						"type" 		=> "media"
);
					
$of_options[] = array( 	"name" 		=> __('Apple iPad Retina Icon Upload (144x144px)', 'framework'),
						"desc" 		=> "Upload your Apple Touch Retina Icon (144x144px png)",
						"id" 		=> "media_favicon_ipad_retina",
						"std" 		=> "",
						"mod" 		=> "min",
						"type" 		=> "media"
);


/*----------------------------------------------------------------------------------- HOME SETTINGS */
$of_options[] = array( 	"name" 		=> "Layout",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> __('POINT / POINTLESS design for all elements', 'framework'),
						"desc" 		=> "",
						"id" 		=> "point_design",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
);

$of_options[] = array( 	"name" 		=> __('POINT / POINTLESS design for menu only', 'framework'),
						"desc" 		=> "",
						"id" 		=> "point_design2",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
);

$of_options[] = array( 	"name" 		=> __('Enable Sticky Navigation Menu', 'framework'),
						"desc" 		=> "",
						"id" 		=> "sticky",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
);

$of_options[] = array( 	"name" 		=> __('Menu margin right', 'framework'),
						"desc" 		=> __('default value: 30', 'framework'),
						"id" 		=> "menu_margin_right",
						"std" 		=> "30",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
);


$of_options[] = array( 	"name" 		=> __('Enable Mobile Zoom', 'framework'),
						"desc" 		=> "",
						"id" 		=> "check_responsive",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
);

$of_options[] = array( 	"name" 		=> __('Enable Bread Crumbs', 'framework'),
						"desc" 		=> "",
						"id" 		=> "breadcrumbs",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
);

$of_options[] = array( 	"name" 		=> __('Breadcrumbs Divider', 'framework'),
						"desc" 		=> "",
						"id" 		=> "divider1",
						"std" 		=> "//",
						"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> __('Enable Header Search', 'framework'),
						"desc" 		=> "",
						"id" 		=> "header_search",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
);


$of_options[] = array( 	"name" 		=> __('Post Meta Divider', 'framework'),
						"desc" 		=> "",
						"id" 		=> "divider2",
						"std" 		=> "//",
						"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> __('Blog Excerpt Style','framework'),
						"desc" 		=> __('Select One of them','framework'),
						"id" 		=> "excerpt_style",
						"std" 		=> "excerpt1",
						"type" 		=> "images",
						"options" 	=> array(
											'excerpt1' 	=> $url . 'excerpt/1.png',
											'excerpt2' 	=> $url . 'excerpt/2.png',
											'excerpt3' 	=> $url . 'excerpt/3.png'
										)
);

$of_options[] = array( 	"name" 		=> __('Blog excerpt length', 'framework'),
						"desc" 		=> __('default value: 25', 'framework'),
						"id" 		=> "excerpt_length",
						"std" 		=> "25",
						"min" 		=> "5",
						"step"		=> "1",
						"max" 		=> "70",
						"type" 		=> "sliderui" 
);

$of_options[] = array( 	"name" 		=> __('Blog Style','framework'),
						"desc" 		=> __('Select One of them','framework'),
						"id" 		=> "blog_style",
						"std" 		=> "blog1",
						"type" 		=> "images",
						"options" 	=> array(
											'blog1' 	=> $url . 'blog/1.png',
											'blog2' 	=> $url . 'blog/2.png',
											'blog3' 	=> $url . 'blog/3.png',
											'blog4' 	=> $url . 'blog/4.png'
										)
);
$of_options[] = array( 	"name" 		=> __('Posts background', 'framework'),
						"desc" 		=> __('Make enable when you choose "Medium" or "Medium Stylish" from Blog Style', 'framework'),
						"id" 		=> "posts_bg",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
);




/*----------------------------------------------------------------------------------- MODULE-1 SETTINGS */
$of_options[] = array( 	"name" 		=> "Module-1 Settings",
						"type" 		=> "heading"
);
$of_options[] = array( 	"name" 		=> __('Modul-1 first column Title', 'framework'),
						"desc" 		=> "",
						"id" 		=> "m1_column1_title",
						"std" 		=> "Popular News",
						"type" 		=> "text"
);
$of_options[] = array( 	"name" 		=> __('Modul-1 second column Title', 'framework'),
						"desc" 		=> "",
						"id" 		=> "m1_column2_title",
						"std" 		=> "Hot News",
						"type" 		=> "text"
);
$of_options[] = array( 	"name" 		=> __('Number of Posts', 'framework'),
						"desc" 		=> __('default value: 4', 'framework'),
						"id" 		=> "m1_numberofposts",
						"std" 		=> "4",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui" 
);




/*----------------------------------------------------------------------------------- MODULE-2 SETTINGS */
$of_options[] = array( 	"name" 		=> "Module-2 Settings",
						"type" 		=> "heading"
);
$of_options[] = array( 	"name" 		=> __('Select Category For Module-2', 'framework'),
						"desc" 		=> __('Posts created under choosen category will be displayed in module-2 on homepage', 'framework'),
						"id" 		=> "m2_category",
						"std" 		=> "Select a category:",
						"type" 		=> "select",
						"options" 	=> $of_categories
);
$of_options[] = array( 	"name" 		=> __('Visible Number of Posts', 'framework'),
						"desc" 		=> __('Default value: 3', 'framework'),
						"id" 		=> "m2_visiblenumberofposts",
						"std" 		=> "3",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "15",
						"type" 		=> "sliderui" 
);
$of_options[] = array( 	"name" 		=> __('Max Number of Posts', 'framework'),
						"desc" 		=> __('Default value: 6', 'framework'),
						"id" 		=> "m2_maxnumberofposts",
						"std" 		=> "6",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "15",
						"type" 		=> "sliderui" 
);
$of_options[] = array( 	"name" 		=> __('Sliding Number of Posts', 'framework'),
						"desc" 		=> __('Default value: 1', 'framework'),
						"id" 		=> "m2_slidenumberofposts",
						"std" 		=> "1",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui" 
);
$of_options[] = array( 	"name" 		=> __('Carousel Direction', 'framework'),
						"desc" 		=> "",
						"id" 		=> "m2_carousel_direction",
						"std" 		=> "bottom",
						"type" 		=> "select",
						"options" 	=> array("bottom","up")
);



/*----------------------------------------------------------------------------------- MODULE-3 SETTINGS */
$of_options[] = array( 	"name" 		=> "Module-3 Settings",
						"type" 		=> "heading"
);
$of_options[] = array( 	"name" 		=> __('Select Category For Module-3', 'framework'),
						"desc" 		=> __('Posts created under choosen category will be displayed in module-3 on homepage', 'framework'),
						"id" 		=> "m3_category",
						"std" 		=> "Select a category:",
						"type" 		=> "select",
						"options" 	=> $of_categories
);
$of_options[] = array( 	"name" 		=> __('Max Number of Posts', 'framework'),
						"desc" 		=> __('Default value: 2', 'framework'),
						"id" 		=> "m3_maxnumberofposts",
						"std" 		=> "2",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "15",
						"type" 		=> "sliderui" 
);
$of_options[] = array( 	"name" 		=> __('Carousel Direction', 'framework'),
						"desc" 		=> "",
						"id" 		=> "m3_carousel_direction",
						"std" 		=> "left",
						"type" 		=> "select",
						"options" 	=> array("left","right")
);



/*----------------------------------------------------------------------------------- MODULE-4 SETTINGS */
$of_options[] = array( 	"name" 		=> "Module-4 Settings",
						"type" 		=> "heading"
);
$of_options[] = array( 	"name" 		=> __('Select Category For Module-4 First Column', 'framework'),
						"desc" 		=> __('Posts created under choosen category will be displayed in module-4 first column', 'framework'),
						"id" 		=> "m4_category1",
						"std" 		=> "Select a category:",
						"type" 		=> "select",
						"options" 	=> $of_categories
);
$of_options[] = array( 	"name" 		=> __('Select Category For Module-4 Second Column', 'framework'),
						"desc" 		=> __('Posts created under choosen category will be displayed in module-4 second column', 'framework'),
						"id" 		=> "m4_category2",
						"std" 		=> "Select a category:",
						"type" 		=> "select",
						"options" 	=> $of_categories
);
$of_options[] = array( 	"name" 		=> __('Number of Posts', 'framework'),
						"desc" 		=> __('Default value: 2', 'framework'),
						"id" 		=> "m4_numberofposts",
						"std" 		=> "2",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "15",
						"type" 		=> "sliderui" 
);



/*----------------------------------------------------------------------------------- SLIDER */
$of_options[] = array( 	"name" 		=> "Slider Options",
						"type" 		=> "heading"
);
$of_options[] = array( 	"name" 		=> __('Slider Section ON/OFF', 'framework'),
						"desc" 		=> "",
						"id" 		=> "slider_section",
						"std" 		=> 1,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Main Slider Posts Number', 'framework'),
						"desc" 		=> __('default value: 5', 'framework'),
						"id" 		=> "slider_post_number",
						"std" 		=> "5",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "15",
						"type" 		=> "sliderui" 
);
$of_options[] = array( 	"name" 		=> __('Main Slider Ribbons ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "ribbons_switcher",
						"std" 		=> 1,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Main Slider Ribbon Name', 'framework'),
						"desc" 		=> "",
						"id" 		=> "slider_ribbon1",
						"std" 		=> "Latest",
						"type" 		=> "text"
);
$of_options[] = array( 	"name" 		=> __('Secondary Slider Ribbon Name', 'framework'),
						"desc" 		=> "",
						"id" 		=> "slider_ribbon2",
						"std" 		=> "Hotstuff",
						"type" 		=> "text"
);



/*----------------------------------------------------------------------------------- TYPOGRAPHY */
$of_options[] = array( 	"name" 		=> "Typography",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> __('Body Font', 'framework'),
						"desc" 		=> "",
						"id" 		=> "body_font",
						"std" 		=> array('size' => '12px','face' => 'Merriweather Sans','style' => 'normal','color' => '#929292'),
						"type" 		=> "typography"
);

$of_options[] = array( 	"name" 		=> __('Navigation Font', 'framework'),
						"desc" 		=> "",
						"id" 		=> "nav_font",
						"std" 		=> array('size' => '13px','face' => 'Merriweather Sans','style' => 'bold','color' => '#696969'),
						"type" 		=> "typography"
);
$of_options[] = array( 	"name" 		=> __('Navigation Font Transform', 'framework'),
						"desc" 		=> "",
						"id" 		=> "nav_font_transform",
						"std" 		=> "uppercase",
						"type" 		=> "select",
						"options" 	=> array("uppercase","lowercase","capitalize","inherit","none")
);

$of_options[] = array( 	"name" 		=> __('Main Title Transform', 'framework'),
						"desc" 		=> "",
						"id" 		=> "main_title_transform",
						"std" 		=> "uppercase",
						"type" 		=> "select",
						"options" 	=> array("uppercase","lowercase","capitalize","inherit","none")
);

$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction",
						"std" 		=> "HEADLINE STYLES",
						"icon" 		=> true,
						"type" 		=> "info"
);

$of_options[] = array( 	"name" 		=> __('H1 - Headline Font', 'framework'),
						"desc" 		=> "",
						"id" 		=> "font_h1",
						"std" 		=> array('size' => '24px','face' => 'Merriweather Sans','style' => 'normal','color' => '#696969'),
						"type" 		=> "typography"
);

$of_options[] = array( 	"name" 		=> __('H2 - Headline Font', 'framework'),
						"desc" 		=> "",
						"id" 		=> "font_h2",
						"std" 		=> array('size' => '22px','face' => 'Merriweather Sans','style' => 'normal','color' => '#696969'),
						"type" 		=> "typography"
);

$of_options[] = array( 	"name" 		=> __('H3 - Headline Font', 'framework'),
						"desc" 		=> "Specify the H3 Headline font properties",
						"id" 		=> "font_h3",
						"std" 		=> array('size' => '20px','face' => 'Merriweather Sans','style' => 'normal','color' => '#696969'),
						"type" 		=> "typography"
); 

$of_options[] = array( 	"name" 		=> __('H4 - Headline Font', 'framework'),
						"desc" 		=> "",
						"id" 		=> "font_h4",
						"std" 		=> array('size' => '18px','face' => 'Merriweather Sans','style' => 'normal','color' => '#696969'),
						"type" 		=> "typography"
);

$of_options[] = array( 	"name" 		=> __('H5 - Headline Font', 'framework'),
						"desc" 		=> "",
						"id" 		=> "font_h5",
						"std" 		=> array('size' => '16px','face' => 'Merriweather Sans','style' => 'normal','color' => '#696969'),
						"type" 		=> "typography"
);

$of_options[] = array( 	"name" 		=> __('H6 - Headline Font', 'framework'),
						"desc" 		=> "",
						"id" 		=> "font_h6",
						"std" 		=> array('size' => '14px','face' => 'Merriweather Sans','style' => 'normal','color' => '#696969'),
						"type" 		=> "typography"
);



/*----------------------------------------------------------------------------------- PAGES SETTINGS */
$of_options[] = array( 	"name" 		=> "Pages Settings",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> __('404 Error Page', 'framework'),
						"desc" 		=> __('1-Left sidebar, 2-Right Sidebar, 3-Fullwidth', 'framework'),
						"id" 		=> "404_style",
						"std" 		=> "404_rightsidebar",
						"type" 		=> "images",
						"options" 	=> array(
											'404_leftsidebar' 	=> $url . '/2cl.png',
											'404_rightsidebar' => $url . '/2cr.png',
											'404_fullwidth' => $url . '/1col.png'
										)
);

$of_options[] = array( 	"name" 		=> __('Search Page', 'framework'),
						"desc" 		=> __('1-Left sidebar, 2-Right Sidebar', 'framework'),
						"id" 		=> "search_style",
						"std" 		=> "search_rightsidebar",
						"type" 		=> "images",
						"options" 	=> array(
											'search_leftsidebar' 	=> $url . '/2cl.png',
											'search_rightsidebar' => $url . '/2cr.png'
										)
);

$of_options[] = array( 	"name" 		=> __('Archive Page', 'framework'),
						"desc" 		=> __('1-Left sidebar, 2-Right Sidebar', 'framework'),
						"id" 		=> "archive_style",
						"std" 		=> "archive_rightsidebar",
						"type" 		=> "images",
						"options" 	=> array(
											'archive_leftsidebar' 	=> $url . '/2cl.png',
											'archive_rightsidebar' => $url . '/2cr.png'
										)
);

$of_options[] = array( 	"name" 		=> __('Category Page', 'framework'),
						"desc" 		=> __('1-Left sidebar, 2-Right Sidebar', 'framework'),
						"id" 		=> "cat_style",
						"std" 		=> "cat_rightsidebar",
						"type" 		=> "images",
						"options" 	=> array(
											'cat_leftsidebar' 	=> $url . '/2cl.png',
											'cat_rightsidebar' => $url . '/2cr.png'
										)
);
$of_options[] = array( 	"name" 		=> __('Blog and Category Page Ribbons ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "ribbons_switcher2",
						"std" 		=> 1,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Category Page Ribbon Name', 'framework'),
						"desc" 		=> "",
						"id" 		=> "cat_ribbon",
						"std" 		=> "Featured",
						"type" 		=> "text"
);



/*----------------------------------------------------------------------------------- SOCIAL SHARING */
$of_options[] = array( 	"name" 		=> "Social Sharing",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> __('All Share Buttons ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "all_share",
						"std" 		=> 1,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Facebook Share Button ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "facebook_share",
						"std" 		=> 1,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Twitter Share Button ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "twitter_share",
						"std" 		=> 1,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Pinterest Share Button ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "pinterest_share",
						"std" 		=> 1,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Linkedin Share Button ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "linkedin_share",
						"std" 		=> 0,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Reddit Share Button ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "reddit_share",
						"std" 		=> 0,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Digg Share Button ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "digg_share",
						"std" 		=> 0,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Delicious Share Button ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "delicious_share",
						"std" 		=> 0,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Google Share Button ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "google_share",
						"std" 		=> 0,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('E-mail Share Button ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "email_share",
						"std" 		=> 0,
						"type" 		=> "switch"
);




/*----------------------------------------------------------------------------------- SINGLE PAGE */
$of_options[] = array( 	"name" 		=> "Single Page",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> __('Meta Line On/Off', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "meta_box",
						"std" 		=> 1,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Post Views On/Off', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "postview_box",
						"std" 		=> 0,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Author Info Box ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "author_box",
						"std" 		=> 1,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Tags Box ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "tag_box",
						"std" 		=> 1,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Prev/Next Box', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "prev_next_box",
						"std" 		=> 1,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Related Posts Box', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "related_post_box",
						"std" 		=> 1,
						"type" 		=> "switch"
);

/*----------------------------------------------------------------------------------- REVIEW SETTINGS */
$of_options[] = array( 	"name" 		=> "Review Settings",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> __('Review ON/OFF', 'framework'),
						"desc" 		=> __('Switch ON', 'framework'),
						"id" 		=> "review_switcher",
						"std" 		=> 1,
						"type" 		=> "switch"
);
$of_options[] = array( 	"name" 		=> __('Review Content Text', 'framework'),
						"desc" 		=> "",
						"id" 		=> "review_p",
						"std" 		=> array('size' => '12px','face' => 'Merriweather Sans','style' => 'normal','color' => '#696969'),
						"type" 		=> "typography"
);

$of_options[] = array( 	"name" 		=> __('Review Header Text', 'framework'),
						"desc" 		=> "",
						"id" 		=> "review_header",
						"std" 		=> array('size' => '14px','face' => 'Merriweather Sans','style' => 'normal','color' => '#696969'),
						"type" 		=> "typography"
);
$of_options[] = array( 	"name" 		=> __('Review Final Score', 'framework'),
						"desc" 		=> "",
						"id" 		=> "review_h1",
						"std" 		=> array('size' => '24px','face' => 'Merriweather Sans','style' => 'normal','color' => '#696969'),
						"type" 		=> "typography"
);
$of_options[] = array( 	"name" 		=> __('Review Final Score Text', 'framework'),
						"desc" 		=> "",
						"id" 		=> "review_h6",
						"std" 		=> array('size' => '14px','face' => 'Merriweather Sans','style' => 'normal','color' => '#696969'),
						"type" 		=> "typography"
);



/*----------------------------------------------------------------------------------- FOOTER SETTINGS */
$of_options[] = array( 	"name" 		=> "Footer Options",
						"type" 		=> "heading"
);
				
$of_options[] = array( 	"name" 		=> __('Copyright Text', 'framework'),
						"desc" 		=> "",
						"id" 		=> "copyright",
						"std" 		=> "Copyright 2013. Designed by <a href=\"http://themeforest.net/user/MyPassion/portfolio\">MyPassion</a>",
						"type" 		=> "textarea"
);
$of_options[] = array( 	"name" 		=> "Twitter Link",
						"desc" 		=> "Enter full URL to your account",
						"id" 		=> "twitter",
						"std" 		=> "",
						"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> "Facebook Link",
						"desc" 		=> "Enter full URL to your account",
						"id" 		=> "facebook",
						"std" 		=> "",
						"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> "Dribbble Link",
						"desc" 		=> "Enter full URL to your account",
						"id" 		=> "dribble",
						"std" 		=> "",
						"type" 		=> "text"
);
$of_options[] = array( 	"name" 		=> "Google Link",
						"desc" 		=> "Enter full URL to your account",
						"id" 		=> "google",
						"std" 		=> "",
						"type" 		=> "text"
);
$of_options[] = array( 	"name" 		=> "Flickr Link",
						"desc" 		=> "Enter full URL to your account",
						"id" 		=> "flickr",
						"std" 		=> "",
						"type" 		=> "text"
);
$of_options[] = array( 	"name" 		=> "Linkedin Link",
						"desc" 		=> "Enter full URL to your account",
						"id" 		=> "linkedin",
						"std" 		=> "",
						"type" 		=> "text"
);
$of_options[] = array( 	"name" 		=> "Tumblr Link",
						"desc" 		=> "Enter full URL to your account",
						"id" 		=> "tumblr",
						"std" 		=> "",
						"type" 		=> "text"
);
$of_options[] = array( 	"name" 		=> "Skype Link",
						"desc" 		=> "Enter full URL to your account",
						"id" 		=> "skype",
						"std" 		=> "",
						"type" 		=> "text"
);
$of_options[] = array( 	"name" 		=> "Vimeo Link",
						"desc" 		=> "Enter full URL to your account",
						"id" 		=> "vimeo",
						"std" 		=> "",
						"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> "Instagram Link",
						"desc" 		=> "Enter full URL to your account",
						"id" 		=> "instagram",
						"std" 		=> "",
						"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> "Pinterest Link",
						"desc" 		=> "Enter full URL to your account",
						"id" 		=> "pinterest",
						"std" 		=> "",
						"type" 		=> "text"
);


/*----------------------------------------------------------------------------------- STYLING */			
$of_options[] = array( 	"name" 		=> "Styling Options",
						"type" 		=> "heading"
);				
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "Quickly add some CSS to your theme by adding it to this block.",
						"id" 		=> "custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
);

/*-----------------------------------------------------------------------------------额外的主题设置*/
$of_options[] = array( 	"name" 		=> "Publish Category",
						"type" 		=> "heading"
);				
				
$of_options[] = array( 	"name" 		=> "Publish Category",
						"desc" 		=> "为发布地图类型的文章选择分类",
						"id" 		=> "tt_map_category",
						"std" 		=> "",
						"type" 		=> "select2",
						"options" =>$of_categories
);

				

				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
